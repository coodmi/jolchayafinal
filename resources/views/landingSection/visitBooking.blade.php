@php
    $visitSection = $projectSections['visit_booking'] ?? null;
    $title = $visitSection->title ?? 'ESCAPE TO FUN';
    $subtitle = $visitSection->content ?? 'Experience the beauty of Jolchaya. Plan your visit today and explore our premium properties.';
    $bg_image = $visitSection->image_url ?? '/images/visit-bg.jpg';
    $is_active = $visitSection->is_active ?? true;

    $extra = $visitSection->extra_data ?? [];
    if (is_string($extra))
        $extra = json_decode($extra, true);

    $loc_label = $extra['loc_label'] ?? 'Project Location';
    $loc_place = $extra['loc_place'] ?? 'Which project?';
    $date_label = $extra['date_label'] ?? 'Visit Date';
    $guest_label = $extra['guest_label'] ?? 'Guests';
    $phone_label = $extra['phone_label'] ?? 'Phone Number';
    $phone_place = $extra['phone_place'] ?? 'Your phone';
@endphp

@if($is_active)
    <style>
        .visit-booking-section {
            position: relative;
            width: 100%;
            min-height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: url('{{ $bg_image }}') no-repeat center center;
            background-size: cover;
            padding: 100px 0;
            color: #ffffff;
            text-align: center;
        }

        .visit-booking-section::before {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.4);
            z-index: 1;
        }

        .visit-content {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .visit-content h2 {
            font-size: clamp(1.4rem, 3.5vw, 2.8rem);
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 16px;
            text-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            white-space: nowrap;
        }

        @media (max-width: 768px) {
            .visit-content h2 {
                white-space: normal;
                font-size: clamp(1.2rem, 5vw, 1.8rem);
                letter-spacing: 0;
            }
        }

        .visit-content p {
            font-size: clamp(1rem, 2vw, 1.25rem);
            max-width: 800px;
            margin: 0 auto 60px auto;
            line-height: 1.6;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
            opacity: 0.9;
        }

        /* Floating Booking Bar */
        .booking-bar {
            background: #ffffff;
            border-radius: 999px;
            padding: 12px;
            display: flex;
            align-items: center;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            max-width: 900px;
            margin: 0 auto;
            width: 100%;
        }

        .booking-field {
            flex: 1;
            padding: 10px 24px;
            text-align: left;
            border-right: 1px solid #e2e8f0;
        }

        .booking-field:last-of-type {
            border-right: none;
        }

        .field-label {
            display: block;
            font-size: 14px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 4px;
        }

        .field-input-wrap {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #64748b;
        }

        .booking-field input,
        .booking-field select {
            border: none;
            outline: none;
            width: 100%;
            font-size: 15px;
            color: #64748b;
            background: transparent;
            padding: 0;
        }

        .booking-btn {
            background: #f97316;
            width: 56px;
            height: 56px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-left: 8px;
        }

        .booking-btn:hover {
            background: #ea580c;
            transform: scale(1.05);
        }

        @media (max-width: 991px) {
            .booking-bar {
                border-radius: 24px;
                flex-direction: column;
                padding: 24px;
                gap: 20px;
            }

            .booking-field {
                border-right: none;
                border-bottom: 1px solid #e2e8f0;
                width: 100%;
                padding: 0 0 15px 0;
            }

            .booking-btn {
                width: 100%;
                border-radius: 12px;
                height: 50px;
                margin-left: 0;
            }
        }
    </style>

    <section class="visit-booking-section">
        <div class="visit-content">
            <h2>{{ $title }}</h2>
            <p>{{ $subtitle }}</p>

            <form id="visitBookingForm" class="booking-bar">
                @csrf
                <div class="booking-field">
                    <label class="field-label">{{ $loc_label }}</label>
                    <div class="field-input-wrap">
                        <i class="fas fa-map-marker-alt"></i>
                        <input type="text" name="location" placeholder="{{ $loc_place }}" required>
                    </div>
                </div>
                <div class="booking-field">
                    <label class="field-label">{{ $date_label }}</label>
                    <div class="field-input-wrap">
                        <i class="far fa-calendar-alt"></i>
                        <input type="date" name="visit_date" required>
                    </div>
                </div>
                <div class="booking-field">
                    <label class="field-label">{{ $guest_label }}</label>
                    <div class="field-input-wrap">
                        <i class="fas fa-user-friends"></i>
                        <input type="number" name="guests" min="1" value="1" required>
                    </div>
                </div>
                <div class="booking-field">
                    <label class="field-label">{{ $phone_label }}</label>
                    <div class="field-input-wrap">
                        <i class="fas fa-phone"></i>
                        <input type="text" name="phone" placeholder="{{ $phone_place }}" required>
                    </div>
                </div>
                <button type="submit" class="booking-btn">
                    <i class="fas fa-paper-plane"></i>
                </button>
            </form>
        </div>
    </section>

    <script>
        document.getElementById('visitBookingForm').addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(this);

            const data = {
                location: formData.get('location'),
                visit_date: formData.get('visit_date'),
                guests: formData.get('guests'),
                phone: formData.get('phone'),
                name: "Site Visitor (" + formData.get('location') + ")",
                email: "visitor@example.com",
                message: "Site Visit Plan for " + formData.get('guests') + " guests on " + formData.get('visit_date')
            };

            try {
                const response = await fetch('/api/bookings', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    },
                    body: JSON.stringify(data)
                });

                const result = await response.json();
                
                // Check for 401 status - redirect to login immediately
                if (response.status === 401) {
                    window.location.href = result.redirect || '/login';
                    return;
                }
                
                if (result.success) {
                    showNotification(result.message, 'success');
                    this.reset();
                } else {
                    showNotification('Error: ' + (result.message || 'Unknown error'), 'error');
                }
            } catch (err) {
                showNotification('Submission failed', 'error');
                console.error(err);
            }
        });
    </script>
@endif