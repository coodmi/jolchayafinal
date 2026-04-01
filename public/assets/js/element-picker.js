// Element Picker Tool - Click any element to copy its CSS selector
(function() {
    let pickerActive = false;
    let highlightOverlay = null;
    let pickerButton = null;
    let tooltip = null;

    // Create the floating button
    function createPickerButton() {
        pickerButton = document.createElement('button');
        pickerButton.id = 'element-picker-btn';
        pickerButton.innerHTML = `
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M3 3l7.07 16.97 2.51-7.39 7.39-2.51L3 3z"/>
            </svg>
            <span>Pick Element</span>
        `;
        pickerButton.title = 'Click to pick elements from the page';
        document.body.appendChild(pickerButton);

        pickerButton.addEventListener('click', togglePicker);
    }

    // Create highlight overlay
    function createHighlightOverlay() {
        highlightOverlay = document.createElement('div');
        highlightOverlay.id = 'element-picker-overlay';
        document.body.appendChild(highlightOverlay);
    }

    // Create tooltip
    function createTooltip() {
        tooltip = document.createElement('div');
        tooltip.id = 'element-picker-tooltip';
        document.body.appendChild(tooltip);
    }

    // Toggle picker mode
    function togglePicker(e) {
        e.stopPropagation();
        pickerActive = !pickerActive;
        
        if (pickerActive) {
            pickerButton.classList.add('active');
            pickerButton.innerHTML = `
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
                <span>Cancel</span>
            `;
            document.addEventListener('mouseover', handleMouseOver);
            document.addEventListener('click', handleClick, true);
        } else {
            deactivatePicker();
        }
    }

    // Deactivate picker
    function deactivatePicker() {
        pickerActive = false;
        pickerButton.classList.remove('active');
        pickerButton.innerHTML = `
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M3 3l7.07 16.97 2.51-7.39 7.39-2.51L3 3z"/>
            </svg>
            <span>Pick Element</span>
        `;
        highlightOverlay.style.display = 'none';
        tooltip.style.display = 'none';
        document.removeEventListener('mouseover', handleMouseOver);
        document.removeEventListener('click', handleClick, true);
    }

    // Handle mouse over
    function handleMouseOver(e) {
        if (!pickerActive) return;
        
        const target = e.target;
        if (target === pickerButton || target === highlightOverlay || target === tooltip) return;

        const rect = target.getBoundingClientRect();
        highlightOverlay.style.display = 'block';
        highlightOverlay.style.top = rect.top + window.scrollY + 'px';
        highlightOverlay.style.left = rect.left + window.scrollX + 'px';
        highlightOverlay.style.width = rect.width + 'px';
        highlightOverlay.style.height = rect.height + 'px';

        // Show tooltip with selector
        const selector = getSelector(target);
        tooltip.textContent = selector;
        tooltip.style.display = 'block';
        tooltip.style.top = (rect.top + window.scrollY - 30) + 'px';
        tooltip.style.left = (rect.left + window.scrollX) + 'px';
    }

    // Handle click
    function handleClick(e) {
        if (!pickerActive) return;
        
        e.preventDefault();
        e.stopPropagation();

        const target = e.target;
        if (target === pickerButton || target === highlightOverlay || target === tooltip) return;

        const selector = getSelector(target);
        
        // Copy to clipboard
        copyToClipboard(selector);
        
        // Show success notification
        showNotification(`Copied: ${selector}`);
        
        // Deactivate picker
        deactivatePicker();
    }

    // Generate CSS selector for element
    function getSelector(element) {
        if (element.id) {
            return '#' + element.id;
        }
        
        if (element.className && typeof element.className === 'string') {
            const classes = element.className.trim().split(/\s+/).filter(c => c);
            if (classes.length > 0) {
                return '.' + classes.join('.');
            }
        }
        
        // Fallback to tag name with nth-child
        const parent = element.parentElement;
        if (parent) {
            const siblings = Array.from(parent.children).filter(child => child.tagName === element.tagName);
            const index = siblings.indexOf(element) + 1;
            if (siblings.length > 1) {
                return element.tagName.toLowerCase() + ':nth-child(' + index + ')';
            }
            return element.tagName.toLowerCase();
        }
        
        return element.tagName.toLowerCase();
    }

    // Copy to clipboard
    function copyToClipboard(text) {
        if (navigator.clipboard && navigator.clipboard.writeText) {
            navigator.clipboard.writeText(text).catch(err => {
                console.error('Failed to copy:', err);
                fallbackCopy(text);
            });
        } else {
            fallbackCopy(text);
        }
    }

    // Fallback copy method
    function fallbackCopy(text) {
        const textarea = document.createElement('textarea');
        textarea.value = text;
        textarea.style.position = 'fixed';
        textarea.style.opacity = '0';
        document.body.appendChild(textarea);
        textarea.select();
        try {
            document.execCommand('copy');
        } catch (err) {
            console.error('Fallback copy failed:', err);
        }
        document.body.removeChild(textarea);
    }

    // Show notification
    function showNotification(message) {
        const notification = document.createElement('div');
        notification.className = 'element-picker-notification';
        notification.textContent = message;
        document.body.appendChild(notification);

        setTimeout(() => {
            notification.classList.add('show');
        }, 10);

        setTimeout(() => {
            notification.classList.remove('show');
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 300);
        }, 2000);
    }

    // Initialize
    function init() {
        // Wait for DOM to be ready
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', init);
            return;
        }

        createPickerButton();
        createHighlightOverlay();
        createTooltip();
    }

    init();
})();
