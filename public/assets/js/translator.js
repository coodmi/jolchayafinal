/**
 * Translation Manager for Jolchaya Website
 * All content loaded from database via API — no localStorage fallbacks.
 */

class Translator {
  constructor() {
    this.currentLang = "bn";
    this.translations = {};
    this.init();
  }

  async init() {
    await this.loadTranslations();
    this.applyTranslations();
    this.loadDynamicContent();
  }

  async loadTranslations() {
    try {
      const response = await fetch(`/translations/bn.json`);
      if (!response.ok) throw new Error("Failed to load translations");
      this.translations = await response.json();
    } catch (error) {
      console.error("Error loading translations:", error);
    }
  }

  translate(key) {
    const keys = key.split(".");
    let value = this.translations;
    for (const k of keys) {
      if (value && typeof value === "object" && k in value) {
        value = value[k];
      } else {
        return key;
      }
    }
    return value;
  }

  applyTranslations() {
    // Apply data-translate attributes
    document.querySelectorAll("[data-translate]").forEach((el) => {
      const key = el.getAttribute("data-translate");
      const translated = this.translate(key);
      const attr = el.getAttribute("data-translate-attr");
      if (attr) {
        el.setAttribute(attr, translated);
      } else {
        el.textContent = translated;
      }
    });

    window.dispatchEvent(
      new CustomEvent("translationsLoaded", {
        detail: { lang: this.currentLang, translations: this.translations },
      })
    );
  }

  // Load all dynamic content from API (no localStorage)
  async loadDynamicContent() {
    await Promise.allSettled([
      this.loadHeaderFromApi(),
    ]);
  }

  // Load header nav labels from API
  async loadHeaderFromApi() {
    try {
      const res = await fetch("/api/header-settings", { cache: "no-store" });
      if (!res.ok) return;
      const data = await res.json();

      const navMap = {
        navHome: data.home_label,
        navAbout: data.about_label,
        navFeatures: data.features_label,
        navPricing: data.pricing_label,
        navTestimonials: data.testimonials_label,
        navOtherProjects: data.other_projects_label,
        navContact: data.contact_label,
      };

      Object.entries(navMap).forEach(([id, val]) => {
        const el = document.getElementById(id);
        if (el && val && String(val).trim()) el.textContent = val;
      });

      const cta = document.getElementById("navCta");
      if (cta && data.cta_href) cta.setAttribute("href", data.cta_href);

      const ctaSpan = document.querySelector("#navCta span");
      if (ctaSpan && data.cta_text) ctaSpan.textContent = data.cta_text;
    } catch (e) {
      // silently fail — server-rendered values remain
    }
  }

  t(key) {
    return this.translate(key);
  }
}

// Initialize
let translator;
if (document.readyState === "loading") {
  document.addEventListener("DOMContentLoaded", () => {
    translator = new Translator();
    window.translator = translator;
  });
} else {
  translator = new Translator();
  window.translator = translator;
}

window.Translator = Translator;
