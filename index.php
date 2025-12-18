<?php
/**
 * Auto-cleanup old drafts on page load
 * Runs lightweight check (5% of page loads)
 */
define('AUTO_CLEANUP_ENABLED', true);
require_once __DIR__ . '/drafts/auto-cleanup.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Inspection Expert - PDI (EV Inspection) Report</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo"><img src="https://carinspectionexpert.com/wp-content/uploads/2025/03/Black-and-Red-Modern-Car-Services-Logo-2-e1742534862460.png"
        alt="Car Inspection Expert Logo" class="logo"> </div>
            <h1 class="logo-title">PDI (EV Inspection) Report</h1>
        </div>

        <!-- Progress Bar -->
        <div class="progress-container">
            <div class="progress-bar" id="progressBar"></div>
            <div class="progress-text" id="progressText">Step 1 of 20</div>
        </div>

        <!-- Form Container -->
        <form id="inspectionForm" enctype="multipart/form-data">
            
            <!-- STEP 1: CAR INSPECTION -->
            <div class="form-step active" data-step="1">
                <h2>⊙ Car Inspection</h2>
                
                <div class="form-group">
                    <label>Enter Booking ID <span class="required">*</span></label>
                    <input type="text" name="booking_id" required>
                </div>

                <div class="form-group">
                    <label>Assigned Expert Name <span class="required">*</span></label>
                    <input type="text" name="expert_name" required>
                </div>

                <div class="form-group">
                    <label>Inspection Expert City <span class="required">*</span></label>
                    <input type="text" name="expert_city" required placeholder="Enter city name...">
                </div>

                <div class="form-group">
                    <label>Customer Name <span class="required">*</span></label>
                    <input type="text" name="customer_name" required>
                </div>

                <div class="form-group">
                    <label>Customer Phone Number <span class="required">*</span></label>
                    <input type="tel" name="customer_phone" required>
                </div>

                <div class="form-group">
                    <label>OBD Scanning <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="obd_scanning" value="Yes" required> Yes
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="obd_scanning" value="No"> No
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Car</label>
                    <input type="text" name="car">
                </div>
            </div>

            <!-- STEP 2: PAYMENT TAKING -->
            <div class="form-step" data-step="2">
                <h2>⊙ Payment Taking</h2>
                
                <div class="form-group">
                    <label>Payment <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="payment_taken" value="Yes" id="payment_yes" required> Yes
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="payment_taken" value="No" id="payment_no"> No
                        </label>
                    </div>
                </div>

                <!-- Payment Details Section (shown only if Yes is selected) -->
                <div id="payment_details_section" style="display: none;">
                    <div class="form-group">
                        <label>Payment Type <span class="required">*</span></label>
                        <div class="radio-group">
                            <label class="radio-label">
                                <input type="radio" name="payment_type" value="Online" id="payment_online"> Online
                            </label>
                            <label class="radio-label">
                                <input type="radio" name="payment_type" value="Cash" id="payment_cash"> Cash
                            </label>
                        </div>
                    </div>

                    <!-- QR Code and Payment Proof (shown only if Online is selected) -->
                    <div id="online_payment_section" style="display: none;">
                        <div class="form-group">
                            <label>Payment QR Code</label>
                            <div style="text-align: center; padding: 20px; background: #f5f5f5; border-radius: 8px; margin-bottom: 15px;">
                                <img src="https://carinspectionexpert.com/wp-content/uploads/2025/04/WhatsApp-Image-2025-04-07-at-5.55.42-PM.jpeg" alt="Payment QR Code" style="max-width: 200px; height: auto;">
                                <p style="margin-top: 10px; font-size: 14px; color: #666;">Scan to pay via UPI</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Payment Proof <span class="required">*</span></label>
                            <div class="file-upload">
                                <input type="file" name="payment_proof" id="paymentProof" accept="image/*">
                                <label for="paymentProof" class="file-label">
                                    <span class="camera-icon">📷</span>
                                    <span class="file-text">Choose Image</span>
                                </label>
                                <div class="file-preview" id="paymentProofPreview"></div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Amount Paid <span class="required">*</span></label>
                        <input type="number" name="amount_paid" step="0.01" min="0">
                    </div>
                </div>
            </div>

            <!-- STEP 3: EXPERT DETAILS -->
            <div class="form-step" data-step="3">
                <h2>⊙ Expert Details</h2>
                
                <div class="form-group">
                    <label>Inspection 45 Minutes Delayed? <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="inspection_delayed" value="Yes" required> Yes
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="inspection_delayed" value="No"> No
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Your photo with car's number plate <span class="required">*</span></label>
                    <div class="file-upload">
                        <input type="file" name="car_photo" id="carPhoto" accept="image/*" required>
                        <label for="carPhoto" class="file-label">
                            <span class="camera-icon">📷</span>
                            <span class="file-text">Choose Image</span>
                        </label>
                        <div class="file-preview" id="carPhotoPreview"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Current Location <span class="required">*</span></label>
                    <div class="location-help" style="background: #e3f2fd; padding: 10px; border-radius: 4px; margin-bottom: 10px; font-size: 13px; color: #1565c0;">
                        📍 <strong>Tap "Get Location"</strong> and allow permission when your browser asks. Your coordinates will be filled automatically.
                    </div>
                    <div class="location-group">
                        <div class="form-row">
                            <input type="text" name="latitude" id="latitude" placeholder="Lat" readonly required>
                            <input type="text" name="longitude" id="longitude" placeholder="Long" readonly required>
                            <button type="button" class="btn-location" id="fetchLocation" title="Click to get your current location">📍 Get Location</button>
                        </div>
                        <textarea name="location_address" id="locationAddress" rows="2" placeholder="Location where the inspection is happening" readonly required></textarea>
                        <div class="location-error" id="locationError" style="display: none;"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Date</label>
                    <input type="text" name="expert_date" id="expertDate" readonly>
                </div>

                <div class="form-group">
                    <label>Time</label>
                    <input type="text" name="expert_time" id="expertTime" readonly>
                </div>
            </div>

            <!-- STEP 4: CAR DETAILS -->
            <div class="form-step" data-step="4">
                <h2>⊙ Car Details</h2>
                
                <div class="form-group">
                    <label>Car Company <span class="required">*</span></label>
                    <input type="text" name="car_company" required>
                </div>

                <div class="form-group">
                    <label>Car Variant <span class="required">*</span></label>
                    <input type="text" name="car_variant" required>
                </div>

                <div class="form-group">
                    <label>Car Registered State <span class="required">*</span></label>
                    <input type="text" name="car_registered_state" required>
                </div>



                <div class="form-group">
                    <label>Car Color <span class="required">*</span></label>
                    <input type="text" name="car_colour" required>
                </div>

                <div class="form-group">
                    <label>Car KM Current Reading <span class="required">*</span></label>
                    <input type="text" name="car_km_reading" required>
                </div>

                <div class="form-group">
                    <label>Car KM Reading Photo <span class="required">*</span></label>
                    <div class="file-upload">
                        <input type="file" name="car_km_photo" id="carKmPhoto" accept="image/*" required>
                        <label for="carKmPhoto" class="file-label">
                            <span class="camera-icon">📷</span>
                            <span class="file-text">Choose Image</span>
                        </label>
                        <div class="file-preview" id="carKmPhotoPreview"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Number of Car Keys Available <span class="required">*</span></label>
                    <input type="number" name="car_keys_available" required min="0">
                </div>

                <div class="form-group">
                    <label>Chassis Number <span class="required">*</span></label>
                    <input type="text" name="chassis_number" required>
                </div>

                <div class="form-group">
                    <label>Engine Number <span class="required">*</span></label>
                    <input type="text" name="engine_number" required>
                </div>

                <div class="form-group">
                    <label>Chassis No. Plate <span class="required">*</span></label>
                    <div class="file-upload">
                        <input type="file" name="chassis_plate_photo" id="chassisPlatePhoto" accept="image/*" required>
                        <label for="chassisPlatePhoto" class="file-label">
                            <span class="camera-icon">📷</span>
                            <span class="file-text">Choose Image</span>
                        </label>
                        <div class="file-preview" id="chassisPlatePhotoPreview"></div>
                    </div>
                </div>
            </div>

            <!-- STEP 5: EXTERIOR BODY -->
            <div class="form-step" data-step="5">
                <h2>⊙ Exterior Body</h2>
                <p style="color: #666; font-size: 14px; margin-bottom: 20px;">
                    <strong>Note:</strong> Select "Ok" if no issues found. If you select any other option, an image upload field will appear.
                </p>
                
                <?php
                // Define all exterior body fields with their options
                $exteriorFields = [
                    'driver_front_door' => ['label' => 'Driver Front Door', 'options' => ['Repainted', 'Minor Scratches', 'Major Scratches', "Minor Dent's", "Major Dent's", 'Rusted', 'Replaced', 'Panel Gaps', 'Not Opening Comfortably', 'Ok']],
                    'driver_front_fender' => ['label' => 'Driver - Front Fender', 'options' => ['Panel Gaps', "Major Dent's", 'Minor Scratches', 'Repainted', 'Rusted', 'Major Scratches', "Minor Dent's", 'Ok']],
                    'driver_front_door_window' => ['label' => 'Driver - Front Door Window', 'options' => ['Damaged', 'Scratches', 'Loose', 'Ok']],
                    'driver_side_view_mirror_housing' => ['label' => 'Driver - Side View Mirror Housing', 'options' => ['Not Ok', 'Ok', 'Scratches']],
                    'driver_side_view_mirror_glass' => ['label' => 'Driver - Side View Mirror Glass', 'options' => ['Scratches', 'Damaged', 'Ok', 'Loose']],
                    'driver_indicator_front' => ['label' => 'Driver - Indicator Front', 'options' => ['Ok', 'Scratches', 'Damaged']],

                    'driver_roof_rail' => ['label' => 'Driver - Roof Rail', 'options' => ['Ok', 'Not Available', 'Damaged']],
                    'driver_door_sill' => ['label' => 'Driver - Door Sill', 'options' => ['Repainted', 'Major Scratches', 'Minor Scratches', "Major Dent's", 'Ok', 'Rusted', "Minor Dent's"]],
                    'driver_back_door' => ['label' => 'Driver -Back Door', 'options' => ["Minor Dent's", 'Repainted', 'Replaced', "Major Dent's", 'Major Scratches', 'Rusted', 'Ok', 'Panel Gaps', 'Not Opening Comfortable', 'Minor Scratches']],
                    'driver_back_door_window' => ['label' => 'Driver - Back Door Window', 'options' => ['Ok', 'Scratches', 'Damaged', 'Loose']],

                    'driver_back_quarter_panel' => ['label' => 'Driver - Back Quarter Panel', 'options' => ['Ok', 'Repainted', "Minor Dent's", 'Major Scratches', "Major Dent's", 'Panel Gaps', 'Minor Scratches', 'Rusted']],
                    'driver_back_indicated' => ['label' => 'Driver - Back Indicated', 'options' => ['Ok', 'Scratches', 'Damaged']],
                    'passenger_back_indicated' => ['label' => 'Passenger - Back Indicated', 'options' => ['Damaged', 'Ok', 'Scratches']],
                    'rear_windshield' => ['label' => 'Rear Windshield', 'options' => ['Ok', 'Damaged', 'Loose', 'Scratches']],
                    'connected_taillights' => ['label' => 'Connected Taillights', 'options' => ['Scratches', 'Yellowish', 'Not Applicable', 'Damaged', 'Ok']],
                    'driver_taillights' => ['label' => 'Driver Taillights', 'options' => ['Ok', 'Scratches', 'Damaged', 'Yellowish']],
                    'passenger_taillights' => ['label' => 'Passenger Taillights', 'options' => ['Ok', 'Yellowish', 'Scratches', 'Damaged']],
                    'rear_number_plate' => ['label' => 'Rear Number Plate', 'options' => ['Ok', 'Not Applicable', 'Damaged']],
                    'front_bumper' => ['label' => 'Front Bumper', 'options' => ['Repainted', 'Minor Scratches', 'Major Scratches', 'Minor Dents', 'Major Dents', 'Damaged', 'Replaced', 'Panel Gaps', 'Ok']],
                    'rear_bumper' => ['label' => 'Rear Bumper', 'options' => ['Replaced', "Major Dent's", "Minor Dent's", 'Major Scratches', 'Ok', 'Damaged', 'Repainted', 'Panel Gaps', 'Minor Scratches']],
                    'boot_space_door' => ['label' => 'Boot Space Door/ Backdoor', 'options' => ['Damaged', 'Ok', 'Major Scratches', 'Replaced', "Minor Dent's", 'Repainted', 'Panel Gaps', "Major Dent's", 'Minor Scratches', 'Rusted']],
                    'passenger_back_door' => ['label' => 'Passenger - Back Door', 'options' => ['Panel Gaps', "Major Dent's", 'Damaged', "Minor Dent's", 'Minor Scratches', 'Repainted', 'Not Opening Comfortably', 'Replaced', 'Rusted', 'Ok', 'Major Scratches']],
                    'passenger_back_door_window' => ['label' => 'Passenger - Back Door Window', 'options' => ['Damaged', 'Loose', 'Ok', 'Scratches']],

                    'fuel_filter_flap' => ['label' => 'Charger Flap', 'options' => ['Scratches', 'Damaged', 'Ok', 'Loose']],
                    'passenger_door_sill' => ['label' => 'Passenger Door Sill', 'options' => ['Rusted', 'Major Scratches', 'Scratches', 'Repainted', 'Damaged', "Major Dent 's", 'Minor scratches', 'Ok', "Minor Dent's"]],
                    'passenger_back_quarter_panel' => ['label' => 'Passenger Back Quarter Panel', 'options' => ['Ok', 'Minor scratches', 'Panels Gaps', 'Rusted', 'Damaged', 'Major Scratches', "Minor Dent's", 'Scratches', "Major Dent 's", 'Repainted']],
                    'passenger_roof_rail' => ['label' => 'Passenger - Roof Rail', 'options' => ['Damaged', 'Ok', 'Not Available']],
                    'passenger_front_door' => ['label' => 'Passenger Front Door', 'options' => ["Major Dent's", 'Repainted', "Minor Dent's", 'Panel Gaps', 'Minor Scratches', 'Major Scratches', 'Not Applicable', 'Ok', 'Replaced', 'Damaged', 'Rusted', 'Not Opening comfortable']],
                    'passenger_front_door_window' => ['label' => 'Passenger Front Door Window', 'options' => ['Loose', 'Scratches', 'Ok', 'Damaged']],
                    'passenger_side_view_mirror_housing' => ['label' => 'Passenger Side View Mirror Housing', 'options' => ['Not ok', 'Ok', 'Scratches']],
                    'passenger_side_view_mirror_glass' => ['label' => 'Passenger Side View Mirror Glass', 'options' => ['Scratches', 'Ok', 'Loose', 'Damage']],
                    'passenger_front_indicator' => ['label' => 'Passenger Front Indicator', 'options' => ['Ok', 'Scratches', 'Damage']],
                    'passenger_front_fender' => ['label' => 'Passenger Front Fender', 'options' => ['Minor Scratches', 'Ok', "Minor Dent's", 'Damage', "Major Dent's", 'Scratches', 'Rusted', 'Major Scratches', 'Panel Gaps', 'Repainted']],

                    'windshields' => ['label' => 'Windshields', 'options' => ['Loose', 'Ok', 'Damaged', 'Scratches']],
                    'match_all_glasses_serial_number' => ['label' => 'Match all Glasses Serial Number', 'options' => ['Matching', 'Not Matching', 'Not Matching But Original']],
                    'front_bonnet_top' => ['label' => 'Front Bonnet Top', 'options' => ['Rusted', 'Replaced', 'Repainted', 'Minor Scratches', 'Ok', 'Panel Gaps', "Minor Dent's", 'Major Scratches', "Major Dent's"]],
                    'front_grill' => ['label' => 'Front Grill', 'options' => ['Panel Gaps', 'Minor Scratches', 'Damaged', 'Ok', 'Repainted', "Major Dent's", "Minor Dent's", 'Rusted', 'Replaced']],
                    'fog_lights' => ['label' => "Fog Light's", 'options' => ['Ok', 'Damaged', 'Not Available']],
                    'driver_headlight' => ['label' => 'Driver Headlight', 'options' => ['Yellowish', 'Ok', 'Scratches', 'Damage']],
                    'passenger_headlight' => ['label' => 'Passenger Headlight', 'options' => ['Yellowish', 'Scratches', 'Damage', 'Ok']],
                    'front_number_plate' => ['label' => 'Front Number Plate', 'options' => ['Not Avaliable', 'Ok', 'Damage']],
                    'car_roof_outside' => ['label' => 'Car Roof Outside', 'options' => ['Major Scratches', 'Ok', "Major Dent's", 'Minor Dents', 'Damage', 'Panel Gaps', 'Minor Scratches', 'Repainted', 'Bent']],
                ];

                foreach ($exteriorFields as $fieldName => $fieldData) {
                    $fieldId = str_replace('_', '', ucwords($fieldName, '_'));
                    $fieldId = lcfirst($fieldId);
                    echo '<div class="form-group" data-ok-group="' . $fieldName . '">';
                    echo '<label>' . $fieldData['label'] . ' <span class="required">*</span></label>';
                    echo '<div class="checkbox-group">';
                    
                    foreach ($fieldData['options'] as $option) {
                        $isOk = ($option === 'Ok' || $option === 'Matching');
                        $dataAttr = $isOk ? ' data-ok-checkbox' : '';
                        echo '<label class="checkbox-label">';
                        echo '<input type="checkbox" name="' . $fieldName . '[]" value="' . htmlspecialchars($option) . '"' . $dataAttr . '> ' . htmlspecialchars($option);
                        echo '</label>';
                    }
                    
                    echo '</div>';
                    
                    // Special handling for match_all_glasses_serial_number - use text remark instead of image
                    if ($fieldName === 'match_all_glasses_serial_number') {
                        echo '<div class="form-group" id="' . $fieldName . '_remark_container" style="display: none; margin-top: 10px;">';
                        echo '<label>Match Glasses Serial Number Remark <span class="required">*</span></label>';
                        echo '<textarea name="match_glasses_serial_number_remark" id="matchGlassesSerialNumberRemark" rows="3" placeholder="Enter remark about glass serial number mismatch..."></textarea>';
                        echo '</div>';
                    } else {
                        // Standard image upload for other fields
                        echo '<div class="file-upload" id="' . $fieldName . '_image_container" style="display: none; margin-top: 10px;">';
                        echo '<input type="file" name="' . $fieldName . '_image" id="' . $fieldId . 'Image" accept="image/*">';
                        echo '<label for="' . $fieldId . 'Image" class="file-label">';
                        echo '<span class="camera-icon">📷</span>';
                        echo '<span class="file-text">Upload Image</span>';
                        echo '</label>';
                        echo '<div class="file-preview" id="' . $fieldId . 'ImagePreview"></div>';
                        echo '</div>';
                    }
                    
                    echo '</div>';
                }
                ?>
            </div>

            <!-- STEP 6: BATTERY, CHARGER AND HOOD -->
            <div class="form-step" data-step="6">
                <h2>⊙ Battery, Charger and Hood</h2>
                
                <div class="form-group">
                    <label>Charger Output (KilloWatts) <span class="required">*</span></label>
                    <input type="text" name="charger_output_kw" required placeholder="Enter charger output in KW...">
                </div>

                <div class="form-group">
                    <label>Charger <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="charger" value="Working" required> Working
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="charger" value="Not Working"> Not Working
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="charger" value="Damaged"> Damaged
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="charger" value="Not Able to Work"> Not Able to Work
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Charger Port <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="charger_port" value="Working" required> Working
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="charger_port" value="Not Working"> Not Working
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="charger_port" value="Damaged"> Damaged
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Charger Photo <span class="required">*</span></label>
                    <div class="file-upload">
                        <input type="file" name="charger_photo" id="chargerPhoto" accept="image/*" required>
                        <label for="chargerPhoto" class="file-label">
                            <span class="camera-icon">📷</span>
                            <span class="file-text">Choose Image</span>
                        </label>
                        <div class="file-preview" id="chargerPhotoPreview"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Charger Port Photo <span class="required">*</span></label>
                    <div class="file-upload">
                        <input type="file" name="charger_port_photo" id="chargerPortPhoto" accept="image/*" required>
                        <label for="chargerPortPhoto" class="file-label">
                            <span class="camera-icon">📷</span>
                            <span class="file-text">Choose Image</span>
                        </label>
                        <div class="file-preview" id="chargerPortPhotoPreview"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Battery Charging on Connecting Charger <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="battery_charging_on_charger" value="Yes" required> Yes
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="battery_charging_on_charger" value="No"> No
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="battery_charging_on_charger" value="Not Able to Check"> Not Able to Check
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Motor Coolant Level <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="motor_coolant_level" value="Ok" required> Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="motor_coolant_level" value="Not Ok"> Not Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="motor_coolant_level" value="Not Checked"> Not Checked
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Motor <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="motor" value="Ok" required> Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="motor" value="Not Ok"> Not Ok
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Abnormal Motor Noise <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="abnormal_motor_noise" value="Present" required> Present
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="abnormal_motor_noise" value="Not Present"> Not Present
                        </label>
                    </div>
                </div>



                <div class="form-group">
                    <label>Cables <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="cables" value="Ok" required> Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="cables" value="Not Ok"> Not Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="cables" value="Damaged"> Damaged
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Fuse Box <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="fuse_box" value="Ok" required> Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="fuse_box" value="Not Ok"> Not Ok
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Auxilliary Battery <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="auxilliary_battery" value="Ok" required> Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="auxilliary_battery" value="Not Ok"> Not Ok
                        </label>
                    </div>
                </div>
            </div>

            <!-- STEP 7: BODY FRAME ACCIDENTAL CHECKLIST -->
            <div class="form-step" data-step="7">
                <h2>⊙ Body Frame Accidental Checklist</h2>
                <p style="color: #666; font-size: 14px; margin-bottom: 20px;">
                    <strong>Note:</strong> Image upload is mandatory for all items. If you select any option other than "OK/ok/Matching", a remark field will appear (optional).
                </p>
                
                <?php
                // Define all body frame fields with their options
                $bodyFrameFields = [
                    'radiator_core_support' => ['label' => 'Radiator Core Support', 'options' => ['Accidental', 'Rusted', 'OK']],
                    'match_chassis_no_plate' => ['label' => 'Match Chassis No Plate with the Real Body', 'options' => ['Matching', 'Not Matching', 'Not Able to Locate']],
                    'driver_strut_tower_apron' => ['label' => 'Driver side Strut Tower Apron', 'options' => ['Accidental', 'Rusted', 'ok']],
                    'passenger_strut_tower_apron' => ['label' => 'Passenger Strut Tower Apron', 'options' => ['Accidental', 'Rusted', 'ok']],

                    'front_bonnet_underbody' => ['label' => 'Front Bonnet UnderBody', 'options' => ['Accidental', 'Rusted', 'Scratches', 'Repainted', 'ok']],

                    'driver_side_running_board' => ['label' => 'Driver Side Running Board', 'options' => ['Accidental', 'Rusted', 'Scratches', 'Repainted', 'ok']],


                    'passenger_side_running_board' => ['label' => 'Passenger Side Running Board', 'options' => ['Accidental', 'Rusted', 'Scratches', 'Repainted', 'ok']],
                ];

                foreach ($bodyFrameFields as $fieldName => $fieldData) {
                    $fieldId = str_replace('_', '', ucwords($fieldName, '_'));
                    $fieldId = lcfirst($fieldId);
                    
                    echo '<div class="form-group" data-ok-group="' . $fieldName . '" data-step7-group>';
                    
                    // Checkbox options
                    echo '<label>' . $fieldData['label'] . ' <span class="required">*</span></label>';
                    echo '<div class="checkbox-group">';
                    foreach ($fieldData['options'] as $option) {
                        $isOk = ($option === 'OK' || $option === 'ok' || $option === 'Ok' || $option === 'Matching');
                        $dataAttr = $isOk ? ' data-ok-checkbox' : '';
                        echo '<label class="checkbox-label">';
                        echo '<input type="checkbox" name="' . $fieldName . '[]" value="' . htmlspecialchars($option) . '"' . $dataAttr . '> ' . htmlspecialchars($option);
                        echo '</label>';
                    }
                    echo '</div>';
                    
                    // Image upload - ALWAYS VISIBLE, NO JAVASCRIPT CONTROL
                    echo '<div class="form-group" style="margin-top: 15px;">';
                    echo '<label>' . $fieldData['label'] . ' Image <span class="required">*</span></label>';
                    echo '<div class="file-upload">';
                    echo '<input type="file" name="' . $fieldName . '_image" id="' . $fieldId . 'Image" accept="image/*" required>';
                    echo '<label for="' . $fieldId . 'Image" class="file-label">';
                    echo '<span class="camera-icon">📷</span>';
                    echo '<span class="file-text">Upload Image</span>';
                    echo '</label>';
                    echo '<div class="file-preview" id="' . $fieldId . 'ImagePreview"></div>';
                    echo '</div>';
                    echo '</div>';
                    
                    // Text remark - OPTIONAL, controlled by JavaScript
                    echo '<div class="form-group" id="' . $fieldName . '_remark_container" style="display: none; margin-top: 10px;">';
                    echo '<label>' . $fieldData['label'] . ' Remark</label>';
                    echo '<input type="text" name="' . $fieldName . '_remark" id="' . $fieldId . 'Remark" placeholder="Enter remark (optional)...">';
                    echo '</div>';
                    
                    echo '</div>';
                }
                ?>
            </div>

            <!-- STEP 8: ELECTRICAL AND INTERIOR -->
            <div class="form-step" data-step="8">
                <h2>⊙ Electrical and Interior</h2>
                
                <div class="form-group">
                    <label>Central Lock Working <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="central_lock_working" value="Ok" required> Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="central_lock_working" value="Not Ok"> Not Ok
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Ignition Switch / Push Button <span class="required">*</span></label>
                    <small class="helper-text">Start The Car Engine</small>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="ignition_switch" value="Ok" required> Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="ignition_switch" value="Not Ok"> Not Ok
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Driver - Front Indicator <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="driver_front_indicator_elec" value="Working" required> Working
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="driver_front_indicator_elec" value="Not Working"> Not Working
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Passenger - Front Indicator <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="passenger_front_indicator_elec" value="Working" required> Working
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="passenger_front_indicator_elec" value="Not Working"> Not Working
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Driver Headlight <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="driver_headlight_working" value="Working" required> Working
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="driver_headlight_working" value="Not Working"> Not Working
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Passenger Headlight <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="passenger_headlight_working" value="Working" required> Working
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="passenger_headlight_working" value="Not Working"> Not Working
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Driver Headlight Highbeam <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="driver_headlight_highbeam" value="Working" required> Working
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="driver_headlight_highbeam" value="Not Working"> Not Working
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Passenger Headlight Highbeam <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="passenger_headlight_highbeam" value="Working" required> Working
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="passenger_headlight_highbeam" value="Not Working"> Not Working
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Front Number Plate Light <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="front_number_plate_light" value="Working" required> Working
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="front_number_plate_light" value="Not Working"> Not Working
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="front_number_plate_light" value="Not Available"> Not Available
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Driver Back Indicator <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="driver_back_indicator_elec" value="Working" required> Working
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="driver_back_indicator_elec" value="Not Working"> Not Working
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Passenger Back Indicator <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="passenger_back_indicator_elec" value="Working" required> Working
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="passenger_back_indicator_elec" value="Not Working"> Not Working
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Back Number Plate Light <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="back_number_plate_light" value="Working" required> Working
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="back_number_plate_light" value="Not Working"> Not Working
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="back_number_plate_light" value="Not Available"> Not Available
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Brake Light Driver <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="brake_light_driver" value="Working" required> Working
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="brake_light_driver" value="Not Working"> Not Working
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Brake Light Passenger <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="brake_light_passenger" value="Working" required> Working
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="brake_light_passenger" value="Not Working"> Not Working
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Driver Tail Light <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="driver_tail_light" value="Working" required> Working
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="driver_tail_light" value="Not Working"> Not Working
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Passenger Tail Light <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="passenger_tail_light" value="Working" required> Working
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="passenger_tail_light" value="Not Working"> Not Working
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Steering Wheel Condition <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="steering_wheel_condition" value="OK" required> OK
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="steering_wheel_condition" value="Not Ok"> Not Ok
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Steering Mountain Controls <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="steering_mountain_controls" value="Working" required> Working
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="steering_mountain_controls" value="Not Working"> Not Working
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="steering_mountain_controls" value="Not Applicable"> Not Applicable
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Back Camera <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="back_camera" value="Working" required> Working
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="back_camera" value="Not Working"> Not Working
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="back_camera" value="Not Applicable"> Not Applicable
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Reverse Parking Sensor <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="reverse_parking_sensor" value="Working" required> Working
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="reverse_parking_sensor" value="Not Working"> Not Working
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="reverse_parking_sensor" value="Not Applicable"> Not Applicable
                        </label>
                    </div>
                </div>



                <div class="form-group">
                    <label>Car Horn <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="car_horn" value="Working" required> Working
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="car_horn" value="Not Working"> Not Working
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Entertainment System <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="entertainment_system" value="Working" required> Working
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="entertainment_system" value="Not Working"> Not Working
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="entertainment_system" value="Not Applicable"> Not Applicable
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Cruise Control <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="cruise_control" value="Working" required> Working
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="cruise_control" value="Not Working"> Not Working
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="cruise_control" value="Not Applicable"> Not Applicable
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="cruise_control" value="Not Able To Check"> Not Able To Check
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Interior Lights <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="interior_lights" value="Working" required> Working
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="interior_lights" value="Not Working"> Not Working
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Sun Roof <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="sun_roof" value="Working" required> Working
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="sun_roof" value="Not Working"> Not Working
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="sun_roof" value="Not Applicable"> Not Applicable
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Bonnet Release Operation <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="bonnet_release_operation" value="Working" required> Working
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="bonnet_release_operation" value="Not Working"> Not Working
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="bonnet_release_operation" value="Not Applicable"> Not Applicable
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Charging Port Cap Release Operation <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="fuel_cap_release_operation" value="Working" required> Working
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="fuel_cap_release_operation" value="Not Working"> Not Working
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="fuel_cap_release_operation" value="Not Applicable"> Not Applicable
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Window Safety Lock <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="window_safety_lock" value="Working" required> Working
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="window_safety_lock" value="Not Working"> Not Working
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Driver ORVM Controls <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="driver_orvm_controls" value="Ok" required> Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="driver_orvm_controls" value="Not Ok"> Not Ok
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Passenger ORVM Controls <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="passenger_orvm_controls" value="OK" required> OK
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="passenger_orvm_controls" value="Not Ok"> Not Ok
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Glove Box <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="glove_box" value="Ok" required> Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="glove_box" value="Not Ok"> Not Ok
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Wiper <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="wiper" value="Ok" required> Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="wiper" value="Not Ok"> Not Ok
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Rear View Mirror <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="rear_view_mirror" value="Ok" required> Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="rear_view_mirror" value="Not Ok"> Not Ok
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Dashboard Condition <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="dashboard_condition" value="Ok" required> Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="dashboard_condition" value="Not Ok"> Not Ok
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Car Roof From Inside <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="car_roof_from_inside" value="Ok" required> Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="car_roof_from_inside" value="Not Ok"> Not Ok
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Car Roof From Inside Image <span class="required">*</span></label>
                    <div class="file-upload">
                        <input type="file" name="car_roof_from_inside_image" id="carRoofFromInsideImage" accept="image/*" required>
                        <label for="carRoofFromInsideImage" class="file-label">
                            <span class="camera-icon">📷</span>
                            <span class="file-text">Choose Image</span>
                        </label>
                        <div class="file-preview" id="carRoofFromInsideImagePreview"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Seat Adjustment Driver Side <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="seat_adjustment_driver_side" value="Working" required> Working
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="seat_adjustment_driver_side" value="Not Working"> Not Working
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Front Driver Side Seat Condition <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="front_driver_side_seat_condition" value="Ok" required> Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="front_driver_side_seat_condition" value="Not Ok"> Not Ok
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Front Driver Side Floor <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="front_driver_side_floor" value="Ok" required> Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="front_driver_side_floor" value="Not Ok"> Not Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="front_driver_side_floor" value="Covered - Not Able To See"> Covered - Not Able To See
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Front Driver Side Seat Belt <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="front_driver_side_seat_belt" value="Ok" required> Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="front_driver_side_seat_belt" value="Not Ok"> Not Ok
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Front Passenger Side Seat Condition <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="front_passenger_side_seat_condition" value="Ok" required> Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="front_passenger_side_seat_condition" value="Not Ok"> Not Ok
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Front Passenger Side Floor <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="front_passenger_side_floor" value="Ok" required> Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="front_passenger_side_floor" value="Not Ok"> Not Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="front_passenger_side_floor" value="Covered - Not Able To See"> Covered - Not Able To See
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Front Passenger Side Seat Belt <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="front_passenger_side_seat_belt" value="Ok" required> Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="front_passenger_side_seat_belt" value="Not Ok"> Not Ok
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Seat Adjustment Passenger Side <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="seat_adjustment_passenger_side" value="Working" required> Working
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="seat_adjustment_passenger_side" value="Not Working"> Not Working
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Window Driver Side <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="window_driver_side" value="Working" required> Working
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="window_driver_side" value="Not Working"> Not Working
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Window Passenger Rear Side <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="window_passenger_rear_side" value="Working" required> Working
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="window_passenger_rear_side" value="Not Working"> Not Working
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Window Driver Rear Side <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="window_driver_rear_side" value="Working" required> Working
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="window_driver_rear_side" value="Not Working"> Not Working
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Seat Adjustment Driver Rear Side <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="seat_adjustment_driver_rear_side" value="Working" required> Working
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="seat_adjustment_driver_rear_side" value="Not Working"> Not Working
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="seat_adjustment_driver_rear_side" value="Not Applicable"> Not Applicable
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Back Driver Side Floor <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="back_driver_side_floor" value="Ok" required> Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="back_driver_side_floor" value="Not Ok"> Not Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="back_driver_side_floor" value="Covered - Not Able To See"> Covered - Not Able To See
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Back Driver Side Seat Belt <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="back_driver_side_seat_belt" value="Ok" required> Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="back_driver_side_seat_belt" value="Not Ok"> Not Ok
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Back Driver Side Seat Condition <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="back_driver_side_seat_condition" value="Ok" required> Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="back_driver_side_seat_condition" value="Not Ok"> Not Ok
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Back Passenger Side Floor <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="back_passenger_side_floor" value="Ok" required> Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="back_passenger_side_floor" value="Not Ok"> Not Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="back_passenger_side_floor" value="Covered - Not Able To See"> Covered - Not Able To See
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Back Passenger Side Seat Condition <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="back_passenger_side_seat_condition" value="Ok" required> Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="back_passenger_side_seat_condition" value="Not Ok"> Not Ok
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Back Passenger Side Seat Belt <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="back_passenger_side_seat_belt" value="Ok" required> Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="back_passenger_side_seat_belt" value="Not Ok"> Not Ok
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Child Safety Lock <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="child_safety_lock" value="Working" required> Working
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="child_safety_lock" value="Not Working"> Not Working
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Window Passenger Side <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="window_passenger_side" value="Working" required> Working
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="window_passenger_side" value="Not Working"> Not Working
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="window_passenger_side" value="Not Applicable"> Not Applicable
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Seat Adjustment Passenger Rear Side <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="seat_adjustment_passenger_rear" value="Working" required> Working
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="seat_adjustment_passenger_rear" value="Not Working"> Not Working
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="seat_adjustment_passenger_rear" value="Not Applicable"> Not Applicable
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Check All Buttons</label>
                    <small class="helper-text">Mention if Anything not working</small>
                    <input type="text" name="check_all_buttons" placeholder="Mention if anything not working...">
                </div>
            </div>

            <!-- STEP 9: WARNING LIGHTS -->
            <div class="form-step" data-step="9">
                <h2>⊙ Warning Lights</h2>
                
                <div class="form-group">
                    <label>Charging System Warning <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="charging_system_warning" value="Present" required> Present
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="charging_system_warning" value="Not Present"> Not Present
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Power Steering Problem <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="power_steering_problem" value="Present" required> Present
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="power_steering_problem" value="Not Present"> Not Present
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="power_steering_problem" value="NA"> NA
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>ABS Sensor Problem <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="abs_sensor_problem" value="Present" required> Present
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="abs_sensor_problem" value="Not Present"> Not Present
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="abs_sensor_problem" value="NA"> NA
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Airbag Sensor Problem <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="airbag_sensor_problem" value="Present" required> Present
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="airbag_sensor_problem" value="Not Present"> Not Present
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="airbag_sensor_problem" value="NA"> NA
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Battery Problem <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="battery_problem" value="Present" required> Present
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="battery_problem" value="Not Present"> Not Present
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Low Coolant / Overheating <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="low_coolant_overheating" value="Present" required> Present
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="low_coolant_overheating" value="Not Present"> Not Present
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Brake System Warning <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="brake_system_warning" value="Present" required> Present
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="brake_system_warning" value="Not Present"> Not Present
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Any Other Lights Found? <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="any_other_lights_found" value="Present" required> Present
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="any_other_lights_found" value="Not Present"> Not Present
                        </label>
                    </div>
                </div>
            </div>

            <!-- STEP 10: AIR CONDITIONING -->
            <div class="form-step" data-step="10">
                <h2>⊙ Air Conditioning</h2>
                
                <div class="form-group">
                    <label>Air Conditioning Turning On <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="ac_turning_on" value="Ok" required> Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="ac_turning_on" value="Not Ok"> Not Ok
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>AC Cool Temperature</label>
                    <input type="text" name="ac_cool_temperature" placeholder="Enter cool temperature...">
                </div>

                <div class="form-group">
                    <label>AC Cool Image <span class="required">*</span></label>
                    <div class="file-upload">
                        <input type="file" name="ac_cool_image" id="acCoolImage" accept="image/*" required>
                        <label for="acCoolImage" class="file-label">
                            <span class="camera-icon">📷</span>
                            <span class="file-text">Choose Image</span>
                        </label>
                        <div class="file-preview" id="acCoolImagePreview"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label>AC Hot Temperature</label>
                    <input type="text" name="ac_hot_temperature" placeholder="Enter hot temperature...">
                </div>

                <div class="form-group">
                    <label>AC Hot Image <span class="required">*</span></label>
                    <div class="file-upload">
                        <input type="file" name="ac_hot_image" id="acHotImage" accept="image/*" required>
                        <label for="acHotImage" class="file-label">
                            <span class="camera-icon">📷</span>
                            <span class="file-text">Choose Image</span>
                        </label>
                        <div class="file-preview" id="acHotImagePreview"></div>
                    </div>
                </div>



                <div class="form-group">
                    <label>Air Condition Direction Mode Working <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="ac_direction_mode" value="Ok" required> Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="ac_direction_mode" value="Not Ok"> Not Ok
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>De Fogger Front Vent Working <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="defogger_front_vent" value="Ok" required> Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="defogger_front_vent" value="Not Ok"> Not Ok
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>De Fogger rear Vent Working <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="defogger_rear_vent" value="Ok" required> Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="defogger_rear_vent" value="Not Ok"> Not Ok
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Air Conditioning All Vents <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="ac_all_vents" value="Ok" required> Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="ac_all_vents" value="Not Ok"> Not Ok
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>AC Abnormal Vibration <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="ac_abnormal_vibration" value="Present" required> Present
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="ac_abnormal_vibration" value="Not Present"> Not Present
                        </label>
                    </div>
                </div>
            </div>

            <!-- STEP 11: BRAKES & STEERING -->
            <div class="form-step" data-step="11">
                <h2>⊙ Brakes & Steering</h2>
                <small>During Test Drive</small>

                <div class="form-group">
                    <label>Brake Pedal <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="brake_pedal" value="Ok" required> Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="brake_pedal" value="Not Ok"> Not Ok
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Steering Rotating Smoothly <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="steering_rotating_smoothly" value="Ok" required> Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="steering_rotating_smoothly" value="Not Ok"> Not Ok
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Steering Coming Back While Driving <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="steering_coming_back" value="Ok" required> Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="steering_coming_back" value="Not Ok"> Not Ok
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Steering Weird Noise <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="steering_weird_noise" value="Present" required> Present
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="steering_weird_noise" value="Not Present"> Not Present
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Alignment <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="alignment" value="Ok" required> Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="alignment" value="Not Ok"> Not Ok
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Bubbling <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="bubbling" value="Present" required> Present
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="bubbling" value="Not Present"> Not Present
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Steering Vibration <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="steering_vibration" value="Present" required> Present
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="steering_vibration" value="Not Present"> Not Present
                        </label>
                    </div>
                </div>
            </div>

            <!-- STEP 12: AXLE -->
            <div class="form-step" data-step="12">
                <h2>⊙ Axle</h2>
                <small>During Test Drive</small>

                <div class="form-group">
                    <label>Left Axle <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="left_axle" value="Ok" required> Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="left_axle" value="Not Ok"> Not Ok
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Right Axle <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="right_axle" value="Ok" required> Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="right_axle" value="Not Ok"> Not Ok
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Abnormal Noise <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="abnormal_noise" value="Present" required> Present
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="abnormal_noise" value="Not Present"> Not Present
                        </label>
                    </div>
                </div>
            </div>

            <!-- STEP 13: TYRES -->
            <div class="form-step" data-step="13">
                <h2>⊙ Tyres</h2>
                
                <div class="form-group">
                    <label>Tyre Size <span class="required">*</span></label>
                    <input type="text" name="tyre_size" required placeholder="Enter tyre size...">
                </div>

                <div class="form-group">
                    <label>Tyre Type <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="tyre_type" value="With Tube" required> With Tube
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="tyre_type" value="Tubeless"> Tubeless
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Rim Type <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="rim_type" value="Normal" required> Normal
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="rim_type" value="Alloy"> Alloy
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Driver Front Tyre Depth Check <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="driver_front_tyre_depth_check" value="Good" required> Good
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="driver_front_tyre_depth_check" value="Average"> Average
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="driver_front_tyre_depth_check" value="Bad"> Bad
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Driver Front Tyre Tread Depth <span class="required">*</span></label>
                    <div class="file-upload">
                        <input type="file" name="driver_front_tyre_tread_depth" id="driverFrontTyreTreadDepth" accept="image/*" required>
                        <label for="driverFrontTyreTreadDepth" class="file-label">
                            <span class="camera-icon">📷</span>
                            <span class="file-text">Choose Image</span>
                        </label>
                        <div class="file-preview" id="driverFrontTyreTreadDepthPreview"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Driver Front Tyre Manufacturing Date <span class="required">*</span></label>
                    <input type="text" name="driver_front_tyre_date" placeholder="Enter manufacturing date..." required>
                </div>

                <div class="form-group">
                    <label>Driver Front Tyre Shape <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="driver_front_tyre_shape" value="ok" required> ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="driver_front_tyre_shape" value="Damaged"> Damaged
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Driver Back Tyre Depth Check <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="driver_back_tyre_depth_check" value="Good" required> Good
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="driver_back_tyre_depth_check" value="Bad"> Bad
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="driver_back_tyre_depth_check" value="Average"> Average
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Driver Back Tyre Tread Depth <span class="required">*</span></label>
                    <div class="file-upload">
                        <input type="file" name="driver_back_tyre_tread_depth" id="driverBackTyreTreadDepth" accept="image/*" required>
                        <label for="driverBackTyreTreadDepth" class="file-label">
                            <span class="camera-icon">📷</span>
                            <span class="file-text">Choose Image</span>
                        </label>
                        <div class="file-preview" id="driverBackTyreTreadDepthPreview"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Driver Back Tyre Manufacturing Date <span class="required">*</span></label>
                    <input type="text" name="driver_back_tyre_date" placeholder="Enter manufacturing date..." required>
                </div>

                <div class="form-group">
                    <label>Driver Back Tyre Shape <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="driver_back_tyre_shape" value="ok" required> ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="driver_back_tyre_shape" value="Damaged"> Damaged
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Passenger Back Tyre Depth Check <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="passenger_back_tyre_depth_check" value="Good" required> Good
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="passenger_back_tyre_depth_check" value="Bad"> Bad
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="passenger_back_tyre_depth_check" value="Average"> Average
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Passenger Back Tyre Tread Depth <span class="required">*</span></label>
                    <div class="file-upload">
                        <input type="file" name="passenger_back_tyre_tread_depth" id="passengerBackTyreTreadDepth" accept="image/*" required>
                        <label for="passengerBackTyreTreadDepth" class="file-label">
                            <span class="camera-icon">📷</span>
                            <span class="file-text">Choose Image</span>
                        </label>
                        <div class="file-preview" id="passengerBackTyreTreadDepthPreview"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Passenger Back Tyre Manufacturing Date <span class="required">*</span></label>
                    <input type="text" name="passenger_back_tyre_date" placeholder="Enter manufacturing date..." required>
                </div>

                <div class="form-group">
                    <label>Passenger Back Tyre Shape <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="passenger_back_tyre_shape" value="ok" required> ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="passenger_back_tyre_shape" value="Damaged"> Damaged
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Passenger Front Tyre Depth Check <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="passenger_front_tyre_depth_check" value="Good" required> Good
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="passenger_front_tyre_depth_check" value="Bad"> Bad
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="passenger_front_tyre_depth_check" value="Average"> Average
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Passenger Front Tyre Tread Depth <span class="required">*</span></label>
                    <div class="file-upload">
                        <input type="file" name="passenger_front_tyre_tread_depth" id="passengerFrontTyreTreadDepth" accept="image/*" required>
                        <label for="passengerFrontTyreTreadDepth" class="file-label">
                            <span class="camera-icon">📷</span>
                            <span class="file-text">Choose Image</span>
                        </label>
                        <div class="file-preview" id="passengerFrontTyreTreadDepthPreview"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Passenger Front Tyre Manufacturing Date <span class="required">*</span></label>
                    <input type="text" name="passenger_front_tyre_date" placeholder="Enter manufacturing date..." required>
                </div>

                <div class="form-group">
                    <label>Passenger Front Tyre Shape <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="passenger_front_tyre_shape" value="ok" required> ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="passenger_front_tyre_shape" value="Damaged"> Damaged
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Stepney Tyre Depth Check <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="stepney_tyre_depth_check" value="Good" required> Good
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="stepney_tyre_depth_check" value="Bad"> Bad
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="stepney_tyre_depth_check" value="Average"> Average
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="stepney_tyre_depth_check" value="Stepney Not Available"> Stepney Not Available
                        </label>
                    </div>
                </div>

                <div class="form-group" id="stepney_tread_depth_container">
                    <label>Stepney Tyre Tread Depth <span class="required">*</span></label>
                    <div class="file-upload">
                        <input type="file" name="stepney_tyre_tread_depth" id="stepneyTyreTreadDepth" accept="image/*" required>
                        <label for="stepneyTyreTreadDepth" class="file-label">
                            <span class="camera-icon">📷</span>
                            <span class="file-text">Choose Image</span>
                        </label>
                        <div class="file-preview" id="stepneyTyreTreadDepthPreview"></div>
                    </div>
                </div>

                <div class="form-group" id="stepney_date_container">
                    <label>Stepney Tyre Manufacturing Date <span class="required">*</span></label>
                    <input type="text" name="stepney_tyre_date" id="stepneyTyreDate" placeholder="Enter manufacturing date..." required>
                </div>

                <div class="form-group" id="stepney_shape_container">
                    <label>Stepney Front Tyre Shape <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="stepney_tyre_shape" value="ok" required> ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="stepney_tyre_shape" value="Damaged"> Damaged
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Sign of Camber Issue <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="sign_of_camber_issue" value="Present" required> Present
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="sign_of_camber_issue" value="Not Present"> Not Present
                        </label>
                    </div>
                </div>
            </div>

            <!-- STEP 14: BRAKES -->
            <div class="form-step" data-step="14">
                <h2>⊙ Brakes</h2>
                
                <div class="form-group">
                    <label>Brake Pads Front Driver Side <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="brake_pads_front_driver" value="Ok" required> Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="brake_pads_front_driver" value="Not Ok"> Not Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="brake_pads_front_driver" value="Not Applicable"> Not Applicable
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Brake Discs Front Driver Side <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="brake_discs_front_driver" value="Ok" required> Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="brake_discs_front_driver" value="Not Ok"> Not Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="brake_discs_front_driver" value="Not Applicable"> Not Applicable
                        </label>
                    </div>
                </div>



                <div class="form-group">
                    <label>Brake Pads Front Passenger Side <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="brake_pads_front_passenger" value="Ok" required> Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="brake_pads_front_passenger" value="Not Ok"> Not Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="brake_pads_front_passenger" value="Not Applicable"> Not Applicable
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Brake Discs Front Passenger Side <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="brake_discs_front_passenger" value="Ok" required> Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="brake_discs_front_passenger" value="Not Ok"> Not Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="brake_discs_front_passenger" value="Not Applicable"> Not Applicable
                        </label>
                    </div>
                </div>



                <div class="form-group">
                    <label>Brake Pads Back Passenger Side <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="brake_pads_back_passenger" value="Ok" required> Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="brake_pads_back_passenger" value="Not Ok"> Not Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="brake_pads_back_passenger" value="Not Applicable"> Not Applicable
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Brake Discs Back Passenger Side <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="brake_discs_back_passenger" value="Ok" required> Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="brake_discs_back_passenger" value="Not Ok"> Not Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="brake_discs_back_passenger" value="Not Applicable"> Not Applicable
                        </label>
                    </div>
                </div>



                <div class="form-group">
                    <label>Brake Pads Back Driver Side <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="brake_pads_back_driver" value="Ok" required> Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="brake_pads_back_driver" value="Not Ok"> Not Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="brake_pads_back_driver" value="Not Applicable"> Not Applicable
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Brake Discs Back Driver Side <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="brake_discs_back_driver" value="Ok" required> Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="brake_discs_back_driver" value="Not Ok"> Not Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="brake_discs_back_driver" value="Not Applicable"> Not Applicable
                        </label>
                    </div>
                </div>



                <div class="form-group">
                    <label>Brake Fluid Reservoir <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="brake_fluid_reservoir" value="Ok" required> Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="brake_fluid_reservoir" value="Not Ok"> Not Ok
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Brake Fluid Cap <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="brake_fluid_cap" value="Ok" required> Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="brake_fluid_cap" value="Not Ok"> Not Ok
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Parking Hand Brake <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="parking_hand_brake" value="Ok" required> Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="parking_hand_brake" value="Not Ok"> Not Ok
                        </label>
                    </div>
                </div>
            </div>

            <!-- STEP 15: SUSPENSION -->
            <div class="form-step" data-step="15">
                <h2>⊙ Suspension</h2>
                
                <div class="form-group">
                    <label>Car Height <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="car_height" value="Ok" required> Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="car_height" value="Not Ok"> Not Ok
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Shocker Bounce Test <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="shocker_bounce_test" value="Ok" required> Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="shocker_bounce_test" value="Not Ok"> Not Ok
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Driver Side Suspension Assembly <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="driver_side_suspension_assembly" value="Ok" required> Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="driver_side_suspension_assembly" value="Not Ok"> Not Ok
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Passenger Side Suspension Assembly <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="passenger_side_suspension_assembly" value="Ok" required> Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="passenger_side_suspension_assembly" value="Not Ok"> Not Ok
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Passenger Side Shocker Leakage <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="passenger_side_shocker_leakage" value="Present" required> Present
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="passenger_side_shocker_leakage" value="Not Present"> Not Present
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Driver Side Shocker Leakage <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="driver_side_shocker_leakage" value="Present" required> Present
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="driver_side_shocker_leakage" value="Not Present"> Not Present
                        </label>
                    </div>
                </div>
            </div>

            <!-- STEP 16: UNDER BODY -->
            <div class="form-step" data-step="16">
                <h2>⊙ Under Body</h2>
                
                <div class="form-group" data-ok-group="driver_side_body_chasis">
                    <label>Driver Side Body Chasis <span class="required">*</span></label>
                    <div class="checkbox-group">
                        <label class="checkbox-label">
                            <input type="checkbox" name="driver_side_body_chasis[]" value="Not Ok"> Not Ok
                        </label>
                        <label class="checkbox-label">
                            <input type="checkbox" name="driver_side_body_chasis[]" value="Rusted"> Rusted
                        </label>
                        <label class="checkbox-label">
                            <input type="checkbox" name="driver_side_body_chasis[]" value="Accidental"> Accidental
                        </label>
                        <label class="checkbox-label">
                            <input type="checkbox" name="driver_side_body_chasis[]" value="Not able to check"> Not able to check
                        </label>
                        <label class="checkbox-label">
                            <input type="checkbox" name="driver_side_body_chasis[]" value="Ok" data-ok-checkbox> Ok
                        </label>
                    </div>
                </div>

                <div class="form-group" data-ok-group="passenger_side_body_chasis">
                    <label>Passenger Side Body Chasis <span class="required">*</span></label>
                    <div class="checkbox-group">
                        <label class="checkbox-label">
                            <input type="checkbox" name="passenger_side_body_chasis[]" value="Not Ok"> Not Ok
                        </label>
                        <label class="checkbox-label">
                            <input type="checkbox" name="passenger_side_body_chasis[]" value="Rusted"> Rusted
                        </label>
                        <label class="checkbox-label">
                            <input type="checkbox" name="passenger_side_body_chasis[]" value="Accidental"> Accidental
                        </label>
                        <label class="checkbox-label">
                            <input type="checkbox" name="passenger_side_body_chasis[]" value="Not able to check"> Not able to check
                        </label>
                        <label class="checkbox-label">
                            <input type="checkbox" name="passenger_side_body_chasis[]" value="Ok" data-ok-checkbox> Ok
                        </label>
                    </div>
                </div>

                <div class="form-group" data-ok-group="rear_subframe">
                    <label>Rear Subframe <span class="required">*</span></label>
                    <div class="checkbox-group">
                        <label class="checkbox-label">
                            <input type="checkbox" name="rear_subframe[]" value="Not Ok"> Not Ok
                        </label>
                        <label class="checkbox-label">
                            <input type="checkbox" name="rear_subframe[]" value="Rusted"> Rusted
                        </label>
                        <label class="checkbox-label">
                            <input type="checkbox" name="rear_subframe[]" value="Accidental"> Accidental
                        </label>
                        <label class="checkbox-label">
                            <input type="checkbox" name="rear_subframe[]" value="Not able to check"> Not able to check
                        </label>
                        <label class="checkbox-label">
                            <input type="checkbox" name="rear_subframe[]" value="Ok" data-ok-checkbox> Ok
                        </label>
                    </div>
                </div>

                <div class="form-group" data-ok-group="front_protection_cover">
                    <label>Front Protection Cover <span class="required">*</span></label>
                    <div class="checkbox-group">
                        <label class="checkbox-label">
                            <input type="checkbox" name="front_protection_cover[]" value="Not Ok"> Not Ok
                        </label>
                        <label class="checkbox-label">
                            <input type="checkbox" name="front_protection_cover[]" value="Rusted"> Rusted
                        </label>
                        <label class="checkbox-label">
                            <input type="checkbox" name="front_protection_cover[]" value="Accidental"> Accidental
                        </label>
                        <label class="checkbox-label">
                            <input type="checkbox" name="front_protection_cover[]" value="Not able to check"> Not able to check
                        </label>
                        <label class="checkbox-label">
                            <input type="checkbox" name="front_protection_cover[]" value="Ok" data-ok-checkbox> Ok
                        </label>
                    </div>
                </div>

                <div class="form-group" data-ok-group="underbody_cables">
                    <label>Underbody Cables <span class="required">*</span></label>
                    <div class="checkbox-group">
                        <label class="checkbox-label">
                            <input type="checkbox" name="underbody_cables[]" value="Loose"> Loose
                        </label>
                        <label class="checkbox-label">
                            <input type="checkbox" name="underbody_cables[]" value="Damaged"> Damaged
                        </label>
                        <label class="checkbox-label">
                            <input type="checkbox" name="underbody_cables[]" value="Not Ok"> Not Ok
                        </label>
                        <label class="checkbox-label">
                            <input type="checkbox" name="underbody_cables[]" value="Not able to check"> Not able to check
                        </label>
                        <label class="checkbox-label">
                            <input type="checkbox" name="underbody_cables[]" value="Ok" data-ok-checkbox> Ok
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Rear Protection Cover <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="rear_protection_cover" value="Ok" required> Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="rear_protection_cover" value="Not Ok"> Not Ok
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="rear_protection_cover" value="Not Applicable"> Not Applicable
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="rear_protection_cover" value="Not able to check"> Not able to check
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Any Fuel Leaks under Body <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="fuel_leaks_under_body" value="Present" required> Present
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="fuel_leaks_under_body" value="Not Present"> Not Present
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="fuel_leaks_under_body" value="Not Able Check"> Not Able Check
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Underbody Left <span class="required">*</span></label>
                    <div class="file-upload">
                        <input type="file" name="underbody_left" id="underbodyLeft" accept="image/*" required>
                        <label for="underbodyLeft" class="file-label">
                            <span class="camera-icon">📷</span>
                            <span class="file-text">Choose Image</span>
                        </label>
                        <div class="file-preview" id="underbodyLeftPreview"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Underbody Rear <span class="required">*</span></label>
                    <div class="file-upload">
                        <input type="file" name="underbody_rear" id="underbodyRear" accept="image/*" required>
                        <label for="underbodyRear" class="file-label">
                            <span class="camera-icon">📷</span>
                            <span class="file-text">Choose Image</span>
                        </label>
                        <div class="file-preview" id="underbodyRearPreview"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Underbody Front <span class="required">*</span></label>
                    <div class="file-upload">
                        <input type="file" name="underbody_front" id="underbodyFront" accept="image/*" required>
                        <label for="underbodyFront" class="file-label">
                            <span class="camera-icon">📷</span>
                            <span class="file-text">Choose Image</span>
                        </label>
                        <div class="file-preview" id="underbodyFrontPreview"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Underbody Right <span class="required">*</span></label>
                    <div class="file-upload">
                        <input type="file" name="underbody_right" id="underbodyRight" accept="image/*" required>
                        <label for="underbodyRight" class="file-label">
                            <span class="camera-icon">📷</span>
                            <span class="file-text">Choose Image</span>
                        </label>
                        <div class="file-preview" id="underbodyRightPreview"></div>
                    </div>
                </div>
            </div>

            <!-- STEP 17: EQUIPMENTS -->
            <div class="form-step" data-step="17">
                <h2>⊙ Equipments</h2>
                
                <div class="form-group">
                    <label>Tool Kit <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="tool_kit" value="Present" required> Present
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="tool_kit" value="Not Present"> Not Present
                        </label>
                    </div>
                </div>

                <div class="form-group" id="toolKitImageGroup" style="display: none;">
                    <label>Tool Kit Image <span class="required">*</span></label>
                    <div class="file-upload">
                        <input type="file" name="tool_kit_image" id="toolKitImage" accept="image/*">
                        <label for="toolKitImage" class="file-label">
                            <span class="camera-icon">📷</span>
                            <span class="file-text">Choose Image</span>
                        </label>
                        <div class="file-preview" id="toolKitImagePreview"></div>
                    </div>
                </div>
            </div>

            <!-- STEP 18: Car Images From All Side -->
            <div class="form-step" data-step="18">
                <h2>⊙ Car Images From All Side</h2>
                
                <div class="form-group">
                    <label>Front <span class="required">*</span></label>
                    <div class="file-upload">
                        <input type="file" name="car_image_front" id="carImageFront" accept="image/*" required>
                        <label for="carImageFront" class="file-label">
                            <span class="camera-icon">📷</span>
                            <span class="file-text">Choose Image</span>
                        </label>
                        <div class="file-preview" id="carImageFrontPreview"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Back <span class="required">*</span></label>
                    <div class="file-upload">
                        <input type="file" name="car_image_back" id="carImageBack" accept="image/*" required>
                        <label for="carImageBack" class="file-label">
                            <span class="camera-icon">📷</span>
                            <span class="file-text">Choose Image</span>
                        </label>
                        <div class="file-preview" id="carImageBackPreview"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Driver Side <span class="required">*</span></label>
                    <div class="file-upload">
                        <input type="file" name="car_image_driver_side" id="carImageDriverSide" accept="image/*" required>
                        <label for="carImageDriverSide" class="file-label">
                            <span class="camera-icon">📷</span>
                            <span class="file-text">Choose Image</span>
                        </label>
                        <div class="file-preview" id="carImageDriverSidePreview"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Passenger Side <span class="required">*</span></label>
                    <div class="file-upload">
                        <input type="file" name="car_image_passenger_side" id="carImagePassengerSide" accept="image/*" required>
                        <label for="carImagePassengerSide" class="file-label">
                            <span class="camera-icon">📷</span>
                            <span class="file-text">Choose Image</span>
                        </label>
                        <div class="file-preview" id="carImagePassengerSidePreview"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Front Dashboard <span class="required">*</span></label>
                    <div class="file-upload">
                        <input type="file" name="car_image_dashboard" id="carImageDashboard" accept="image/*" required>
                        <label for="carImageDashboard" class="file-label">
                            <span class="camera-icon">📷</span>
                            <span class="file-text">Choose Image</span>
                        </label>
                        <div class="file-preview" id="carImageDashboardPreview"></div>
                    </div>
                </div>
            </div>

            <!-- STEP 19: FINAL RESULT -->
            <div class="form-step" data-step="19">
                <h2>⊙ Final Result</h2>
                
                <div class="form-group">
                    <label>Any Issues Found in Car <span class="required">*</span></label>
                    <small class="helper-text">Short Note</small>
                    <textarea name="issues_found_in_car" rows="4" required placeholder="Describe any issues found..."></textarea>
                </div>

                <div class="form-group">
                    <label>Issue Photo 1</label>
                    <div class="file-upload">
                        <input type="file" name="issue_photo_1" id="issuePhoto1" accept="image/*">
                        <label for="issuePhoto1" class="file-label">
                            <span class="camera-icon">📷</span>
                            <span class="file-text">Choose Image</span>
                        </label>
                        <div class="file-preview" id="issuePhoto1Preview"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Issue Photo 2</label>
                    <div class="file-upload">
                        <input type="file" name="issue_photo_2" id="issuePhoto2" accept="image/*">
                        <label for="issuePhoto2" class="file-label">
                            <span class="camera-icon">📷</span>
                            <span class="file-text">Choose Image</span>
                        </label>
                        <div class="file-preview" id="issuePhoto2Preview"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Issue Photo 3</label>
                    <div class="file-upload">
                        <input type="file" name="issue_photo_3" id="issuePhoto3" accept="image/*">
                        <label for="issuePhoto3" class="file-label">
                            <span class="camera-icon">📷</span>
                            <span class="file-text">Choose Image</span>
                        </label>
                        <div class="file-preview" id="issuePhoto3Preview"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Issue Photo 4</label>
                    <div class="file-upload">
                        <input type="file" name="issue_photo_4" id="issuePhoto4" accept="image/*">
                        <label for="issuePhoto4" class="file-label">
                            <span class="camera-icon">📷</span>
                            <span class="file-text">Choose Image</span>
                        </label>
                        <div class="file-preview" id="issuePhoto4Preview"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Issue Photo 5</label>
                    <div class="file-upload">
                        <input type="file" name="issue_photo_5" id="issuePhoto5" accept="image/*">
                        <label for="issuePhoto5" class="file-label">
                            <span class="camera-icon">📷</span>
                            <span class="file-text">Choose Image</span>
                        </label>
                        <div class="file-preview" id="issuePhoto5Preview"></div>
                    </div>
                </div>
            </div>




            <!-- Navigation Buttons -->
            <div class="form-navigation">
                <button type="button" class="btn btn-secondary" id="prevBtn">Previous</button>
                <button type="button" class="btn btn-primary" id="nextBtn">Next</button>
                <button type="submit" class="btn btn-success" id="submitBtn" style="display:none;">Submit</button>
                <button type="button" class="btn btn-info" id="saveDraftBtn">Save Draft</button>
                <button type="button" class="btn btn-secondary" id="discardDraftBtn">Discard Draft</button>
            </div>

            <!-- Loading Overlay -->
            <div class="loading-overlay" id="loadingOverlay">
                <div class="spinner"></div>
                <p>Processing your submission...</p>
            </div>

            <!-- Success Message -->
            <div class="success-message" id="successMessage">
                <div class="success-content">
                    <div class="success-icon">✓</div>
                    <h3>Inspection Submitted Successfully!</h3>
                    <p>PDF has been generated and sent to the email.</p>
                    <button type="button" class="btn btn-primary" onclick="location.reload()">New Inspection</button>
                </div>
            </div>
        </form>
    </div>

    <script src="script.js"></script>
</body>
</html>

    