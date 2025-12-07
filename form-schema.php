<?php
/**
 * Form Schema - Source of Truth
 * Complete field mapping for all 24 steps
 */

return [
    // STEP 1: Car Inspection
    1 => [
        'title' => 'Car Inspection',
        'fields' => [
            'booking_id' => ['label' => 'Booking ID', 'type' => 'text', 'required' => true],
            'expert_name' => ['label' => 'Assigned Expert Name', 'type' => 'text', 'required' => true],
            'expert_city' => ['label' => 'Inspection Expert City', 'type' => 'text', 'required' => true],
            'customer_name' => ['label' => 'Customer Name', 'type' => 'text', 'required' => true],
            'customer_phone' => ['label' => 'Customer Phone Number', 'type' => 'text', 'required' => false],
            'inspection_date' => ['label' => 'Date', 'type' => 'date', 'required' => true],
            'inspection_time' => ['label' => 'Time', 'type' => 'time', 'required' => true],
            'inspection_address' => ['label' => 'Inspection Address', 'type' => 'textarea', 'required' => true],
            'obd_scanning' => ['label' => 'OBD Scanning', 'type' => 'radio', 'required' => true],
            'car' => ['label' => 'Car', 'type' => 'text', 'required' => false],
            'lead_owner' => ['label' => 'Lead Owner', 'type' => 'text', 'required' => false],
            'pending_amount' => ['label' => 'Pending Amount', 'type' => 'number', 'required' => false],
        ]
    ],
    
    // STEP 2: Expert Details
    2 => [
        'title' => 'Expert Details',
        'fields' => [
            'inspection_delayed' => ['label' => 'Inspection 45 Minutes Delayed?', 'type' => 'radio', 'required' => true],
            'car_photo' => ['label' => 'Photo with Car Number Plate', 'type' => 'file', 'required' => true],
            'latitude' => ['label' => 'Latitude', 'type' => 'text', 'required' => true],
            'longitude' => ['label' => 'Longitude', 'type' => 'text', 'required' => true],
            'location_address' => ['label' => 'Location Address', 'type' => 'textarea', 'required' => true],
            'expert_date' => ['label' => 'Date', 'type' => 'text', 'required' => false],
            'expert_time' => ['label' => 'Time', 'type' => 'text', 'required' => false],
        ]
    ],
    
    // STEP 3: Car Details
    3 => [
        'title' => 'Car Details',
        'fields' => [
            'car_company' => ['label' => 'Car Company', 'type' => 'text', 'required' => true],
            'car_variant' => ['label' => 'Car Variant', 'type' => 'text', 'required' => true],
            'car_registered_state' => ['label' => 'Car Registered State', 'type' => 'text', 'required' => true],
            'car_registered_city' => ['label' => 'Car Registered City', 'type' => 'text', 'required' => false],
            'car_colour' => ['label' => 'Car Color', 'type' => 'text', 'required' => true],
            'car_km_reading' => ['label' => 'Car KM Current Reading', 'type' => 'text', 'required' => true],
            'car_km_photo' => ['label' => 'Car KM Reading Photo', 'type' => 'file', 'required' => true],
            'car_keys_available' => ['label' => 'Number of Car Keys Available', 'type' => 'number', 'required' => true],
            'chassis_number' => ['label' => 'Chassis Number', 'type' => 'text', 'required' => true],
            'engine_number' => ['label' => 'Engine Number', 'type' => 'text', 'required' => true],
            'chassis_plate_photo' => ['label' => 'Chassis No. Plate', 'type' => 'file', 'required' => true],
        ]
    ],
    
    // STEP 4: Car Documents
    4 => [
        'title' => 'Car Documents',
        'fields' => [
            'vehicle_insurance' => ['label' => 'Vehicle Insurance', 'type' => 'radio', 'required' => true],
            'form_22' => ['label' => 'Form 22', 'type' => 'radio', 'required' => true],
            'form_21' => ['label' => 'Form 21', 'type' => 'radio', 'required' => true],
            'registration_certificate' => ['label' => 'Registration Certificate', 'type' => 'radio', 'required' => true],
            'road_tax_receipt' => ['label' => 'Road Tax Receipt', 'type' => 'radio', 'required' => true],
            'warranty_card' => ['label' => 'Warranty Card', 'type' => 'radio', 'required' => true],
            'owners_manual' => ['label' => 'Owner\'s Manual', 'type' => 'radio', 'required' => true],
            'service_booklet' => ['label' => 'Service Booklet', 'type' => 'radio', 'required' => true],
            'bank_finance_noc' => ['label' => 'Bank finance NOC', 'type' => 'radio', 'required' => true],
            'extended_warranty' => ['label' => 'Extended warranty', 'type' => 'radio', 'required' => true],
            'accessories_invoice' => ['label' => 'Accessories Invoice', 'type' => 'radio', 'required' => true],
        ]
    ],
    
    // STEP 5: Exterior Body (60 fields with conditional images)
    5 => [
        'title' => 'Exterior Body',
        'fields' => [
            // All 60 exterior body fields - each with checkbox and conditional image
            'driver_front_door' => ['label' => 'Driver Front Door', 'type' => 'checkbox', 'required' => true, 'has_image' => true],
            'driver_front_fender' => ['label' => 'Driver - Front Fender', 'type' => 'checkbox', 'required' => true, 'has_image' => true],
            // ... (48 more fields)
            'car_roof_outside' => ['label' => 'Car Roof Outside', 'type' => 'checkbox', 'required' => true, 'has_image' => true],
            'passenger_rear_wheel_arch' => ['label' => 'Passenger - Rear Wheel Arch / Fender Lining', 'type' => 'checkbox', 'required' => true, 'has_image' => true],
            'passenger_rear_cladding' => ['label' => 'Passenger - Rear Cladding', 'type' => 'checkbox', 'required' => true, 'has_image' => true],
            'passenger_back_mud_flap' => ['label' => 'Passenger - Back Mud flap', 'type' => 'checkbox', 'required' => true, 'has_image' => true],
            'passenger_roof_rail' => ['label' => 'Passenger - Roof Rail', 'type' => 'checkbox', 'required' => true, 'has_image' => true],
            'passenger_front_mud_flap' => ['label' => 'Passenger - Front Mud flap', 'type' => 'checkbox', 'required' => true, 'has_image' => true],
            'passenger_front_wheel_arch' => ['label' => 'Passenger - Front Wheel Arch / Fender Lining', 'type' => 'checkbox', 'required' => true, 'has_image' => true],
            'passenger_front_cladding' => ['label' => 'Passenger - Front Cladding', 'type' => 'checkbox', 'required' => true, 'has_image' => true],
            'front_bumper' => ['label' => 'Front Bumper', 'type' => 'checkbox', 'required' => true, 'has_image' => true],
        ]
    ],
    
    // STEP 6: Battery, Charger and Hood
    6 => [
        'title' => 'Battery, Charger and Hood',
        'fields' => [
            'charger_output_kw' => ['label' => 'Charger Output (KilloWatts)', 'type' => 'text', 'required' => true],
            'charger' => ['label' => 'Charger', 'type' => 'radio', 'required' => true],
            'charger_port' => ['label' => 'Charger Port', 'type' => 'radio', 'required' => true],
            'charger_photo' => ['label' => 'Charger Photo', 'type' => 'file', 'required' => true],
            'charger_port_photo' => ['label' => 'Charger Port Photo', 'type' => 'file', 'required' => true],
            'battery_charging_on_charger' => ['label' => 'Battery Charging on Connecting Charger', 'type' => 'radio', 'required' => true],
            'motor_coolant_level' => ['label' => 'Motor Coolant Level', 'type' => 'radio', 'required' => true],
            'motor' => ['label' => 'Motor', 'type' => 'radio', 'required' => true],
            'abnormal_motor_noise' => ['label' => 'Abnormal Motor Noise', 'type' => 'radio', 'required' => true],
            'motor_manufacturing_date' => ['label' => 'Motor Manufacturing Date', 'type' => 'date', 'required' => false],
            'cables' => ['label' => 'Cables', 'type' => 'radio', 'required' => true],
            'fuse_box' => ['label' => 'Fuse Box', 'type' => 'radio', 'required' => true],
            'auxilliary_battery' => ['label' => 'Auxilliary Battery', 'type' => 'radio', 'required' => true],
        ]
    ],
    
    // STEP 7: Body Frame Accidental Checklist (20 fields with conditional images)
    7 => [
        'title' => 'Body Frame Accidental Checklist',
        'fields' => [
            'radiator_core_support' => ['label' => 'Radiator Core Support', 'type' => 'checkbox', 'required' => true, 'has_image' => true],
            'match_chassis_no_plate' => ['label' => 'Match Chassis No Plate with the Real Body', 'type' => 'checkbox', 'required' => true, 'has_image' => false],
            'driver_strut_tower_apron' => ['label' => 'Driver side Strut Tower Apron', 'type' => 'checkbox', 'required' => true, 'has_image' => true],
            'passenger_strut_tower_apron' => ['label' => 'Passenger Strut Tower Apron', 'type' => 'checkbox', 'required' => true, 'has_image' => true],
            'driver_side_front_rail' => ['label' => 'Driver side Front Rail', 'type' => 'checkbox', 'required' => true, 'has_image' => true],
            'passenger_side_front_rail' => ['label' => 'Passenger Side Front Rail', 'type' => 'checkbox', 'required' => true, 'has_image' => true],
            'front_bonnet_underbody' => ['label' => 'Front Bonnet UnderBody', 'type' => 'checkbox', 'required' => true, 'has_image' => true],
            'driver_side_a_pillar' => ['label' => 'Driver Side A Pillar', 'type' => 'checkbox', 'required' => true, 'has_image' => true],
            'driver_side_b_pillar' => ['label' => 'Driver Side B Pillar', 'type' => 'checkbox', 'required' => true, 'has_image' => true],
            'driver_side_c_pillar' => ['label' => 'Driver Side C Pillar', 'type' => 'checkbox', 'required' => true, 'has_image' => true],
            'driver_side_d_pillar' => ['label' => 'Driver Side D Pillar', 'type' => 'checkbox', 'required' => true, 'has_image' => true],
            'driver_side_running_board' => ['label' => 'Driver Side Running Board', 'type' => 'checkbox', 'required' => true, 'has_image' => true],
            'boot_lock_pillar' => ['label' => 'Boot Lock Pillar', 'type' => 'checkbox', 'required' => true, 'has_image' => true],
            'boot_floor' => ['label' => 'Boot Floor', 'type' => 'checkbox', 'required' => true, 'has_image' => true],
            'rear_sub_frame_z_axle' => ['label' => 'Rear Sub Frame / Z Axle', 'type' => 'checkbox', 'required' => true, 'has_image' => true],
            'passenger_side_d_pillar' => ['label' => 'Passenger Side D Pillar', 'type' => 'checkbox', 'required' => true, 'has_image' => true],
            'passenger_side_c_pillar' => ['label' => 'Passenger Side C Pillar', 'type' => 'checkbox', 'required' => true, 'has_image' => true],
            'passenger_side_b_pillar' => ['label' => 'Passenger Side B Pillar', 'type' => 'checkbox', 'required' => true, 'has_image' => true],
            'passenger_side_a_pillar' => ['label' => 'Passenger Side A Pillar', 'type' => 'checkbox', 'required' => true, 'has_image' => true],
            'passenger_side_running_board' => ['label' => 'Passenger Side Running Board', 'type' => 'checkbox', 'required' => true, 'has_image' => true],
        ]
    ],
    
    // STEP 8: Electrical and Interior
    8 => [
        'title' => 'Electrical and Interior',
        'fields' => [
            'central_lock_working' => ['label' => 'Central Lock Working', 'type' => 'radio', 'required' => true],
            'ignition_switch' => ['label' => 'Ignition Switch / Push Button', 'type' => 'radio', 'required' => true],
            'driver_front_indicator_elec' => ['label' => 'Driver - Front Indicator', 'type' => 'radio', 'required' => true],
            'passenger_front_indicator_elec' => ['label' => 'Passenger - Front Indicator', 'type' => 'radio', 'required' => true],
            'driver_headlight_working' => ['label' => 'Driver Headlight', 'type' => 'radio', 'required' => true],
            'passenger_headlight_working' => ['label' => 'Passenger Headlight', 'type' => 'radio', 'required' => true],
            'driver_headlight_highbeam' => ['label' => 'Driver Headlight Highbeam', 'type' => 'radio', 'required' => true],
            'passenger_headlight_highbeam' => ['label' => 'Passenger Headlight Highbeam', 'type' => 'radio', 'required' => true],
            'front_number_plate_light' => ['label' => 'Front Number Plate Light', 'type' => 'radio', 'required' => true],
            'driver_back_indicator_elec' => ['label' => 'Driver Back Indicator', 'type' => 'radio', 'required' => true],
            'passenger_back_indicator_elec' => ['label' => 'Passenger Back Indicator', 'type' => 'radio', 'required' => true],
            'back_number_plate_light' => ['label' => 'Back Number Plate Light', 'type' => 'radio', 'required' => true],
            'brake_light_driver' => ['label' => 'Brake Light Driver', 'type' => 'radio', 'required' => true],
            'brake_light_passenger' => ['label' => 'Brake Light Passenger', 'type' => 'radio', 'required' => true],
            'driver_tail_light' => ['label' => 'Driver Tail Light', 'type' => 'radio', 'required' => true],
            'passenger_tail_light' => ['label' => 'Passenger Tail Light', 'type' => 'radio', 'required' => true],
            'steering_wheel_condition' => ['label' => 'Steering Wheel Condition', 'type' => 'radio', 'required' => true],
            'steering_mountain_controls' => ['label' => 'Steering Mountain Controls', 'type' => 'radio', 'required' => true],
            'back_camera' => ['label' => 'Back Camera', 'type' => 'radio', 'required' => true],
            'reverse_parking_sensor' => ['label' => 'Reverse Parking Sensor', 'type' => 'radio', 'required' => true],
            'multi_function_display' => ['label' => 'Multi Function Display', 'type' => 'radio', 'required' => true],
            'multi_function_display_car_on' => ['label' => 'Multi Function Display (Car On)', 'type' => 'file', 'required' => true],
            'multi_function_display_car_start' => ['label' => 'Multi Function Display (Car Start)', 'type' => 'file', 'required' => true],
            'car_horn' => ['label' => 'Car Horn', 'type' => 'radio', 'required' => true],
            'entertainment_system' => ['label' => 'Entertainment System', 'type' => 'radio', 'required' => true],
            'cruise_control' => ['label' => 'Cruise Control', 'type' => 'radio', 'required' => true],
            'interior_lights' => ['label' => 'Interior Lights', 'type' => 'radio', 'required' => true],
            'sun_roof' => ['label' => 'Sun Roof', 'type' => 'radio', 'required' => true],
            'bonnet_release_operation' => ['label' => 'Bonnet Release Operation', 'type' => 'radio', 'required' => true],
            'fuel_cap_release_operation' => ['label' => 'Charging Port Cap Release Operation', 'type' => 'radio', 'required' => true],
            'window_safety_lock' => ['label' => 'Window Safety Lock', 'type' => 'radio', 'required' => true],
            'driver_orvm_controls' => ['label' => 'Driver ORVM Controls', 'type' => 'radio', 'required' => true],
            'passenger_orvm_controls' => ['label' => 'Passenger ORVM Controls', 'type' => 'radio', 'required' => true],
            'glove_box' => ['label' => 'Glove Box', 'type' => 'radio', 'required' => true],
            'wiper' => ['label' => 'Wiper', 'type' => 'radio', 'required' => true],
            'rear_view_mirror' => ['label' => 'Rear View Mirror', 'type' => 'radio', 'required' => true],
            'dashboard_condition' => ['label' => 'Dashboard Condition', 'type' => 'radio', 'required' => true],
            'car_roof_from_inside' => ['label' => 'Car Roof From Inside', 'type' => 'radio', 'required' => true],
            'car_roof_from_inside_image' => ['label' => 'Car Roof From Inside Image', 'type' => 'file', 'required' => true],
            'seat_adjustment_driver_side' => ['label' => 'Seat Adjustment Driver Side', 'type' => 'radio', 'required' => true],
            'front_driver_side_seat_condition' => ['label' => 'Front Driver Side Seat Condition', 'type' => 'radio', 'required' => true],
            'front_driver_side_floor' => ['label' => 'Front Driver Side Floor', 'type' => 'radio', 'required' => true],
            'front_driver_side_seat_belt' => ['label' => 'Front Driver Side Seat Belt', 'type' => 'radio', 'required' => true],
            'front_passenger_side_seat_condition' => ['label' => 'Front Passenger Side Seat Condition', 'type' => 'radio', 'required' => true],
            'front_passenger_side_floor' => ['label' => 'Front Passenger Side Floor', 'type' => 'radio', 'required' => true],
            'front_passenger_side_seat_belt' => ['label' => 'Front Passenger Side Seat Belt', 'type' => 'radio', 'required' => true],
            'seat_adjustment_passenger_side' => ['label' => 'Seat Adjustment Passenger Side', 'type' => 'radio', 'required' => true],
            'window_driver_side' => ['label' => 'Window Driver Side', 'type' => 'radio', 'required' => true],
            'window_passenger_rear_side' => ['label' => 'Window Passenger Rear Side', 'type' => 'radio', 'required' => true],
            'window_driver_rear_side' => ['label' => 'Window Driver Rear Side', 'type' => 'radio', 'required' => true],
            'seat_adjustment_driver_rear_side' => ['label' => 'Seat Adjustment Driver Rear Side', 'type' => 'radio', 'required' => true],
            'back_driver_side_floor' => ['label' => 'Back Driver Side Floor', 'type' => 'radio', 'required' => true],
            'back_driver_side_seat_belt' => ['label' => 'Back Driver Side Seat Belt', 'type' => 'radio', 'required' => true],
            'back_driver_side_seat_condition' => ['label' => 'Back Driver Side Seat Condition', 'type' => 'radio', 'required' => true],
            'back_passenger_side_floor' => ['label' => 'Back Passenger Side Floor', 'type' => 'radio', 'required' => true],
            'back_passenger_side_seat_condition' => ['label' => 'Back Passenger Side Seat Condition', 'type' => 'radio', 'required' => true],
            'back_passenger_side_seat_belt' => ['label' => 'Back Passenger Side Seat Belt', 'type' => 'radio', 'required' => true],
            'child_safety_lock' => ['label' => 'Child Safety Lock', 'type' => 'radio', 'required' => true],
            'window_passenger_side' => ['label' => 'Window Passenger Side', 'type' => 'radio', 'required' => true],
            'seat_adjustment_passenger_rear' => ['label' => 'Seat Adjustment Passenger Rear Side', 'type' => 'radio', 'required' => true],
            'check_all_buttons' => ['label' => 'Check All Buttons', 'type' => 'text', 'required' => false],
        ]
    ],
    
    // STEP 9: Warning Lights
    9 => [
        'title' => 'Warning Lights',
        'fields' => [
            'charging_system_warning' => ['label' => 'Charging System Warning', 'type' => 'radio', 'required' => true],
            'power_steering_problem' => ['label' => 'Power Steering Problem', 'type' => 'radio', 'required' => true],
            'abs_sensor_problem' => ['label' => 'ABS Sensor Problem', 'type' => 'radio', 'required' => true],
            'airbag_sensor_problem' => ['label' => 'Airbag Sensor Problem', 'type' => 'radio', 'required' => true],
            'battery_problem' => ['label' => 'Battery Problem', 'type' => 'radio', 'required' => true],
            'low_coolant_overheating' => ['label' => 'Low Coolant / Overheating', 'type' => 'radio', 'required' => true],
            'brake_system_warning' => ['label' => 'Brake System Warning', 'type' => 'radio', 'required' => true],
            'any_other_lights_found' => ['label' => 'Any Other Lights Found?', 'type' => 'radio', 'required' => true],
        ]
    ],
    
    // STEP 10: Air Conditioning
    10 => [
        'title' => 'Air Conditioning',
        'fields' => [
            'ac_turning_on' => ['label' => 'Air Conditioning Turning On', 'type' => 'radio', 'required' => true],
            'ac_cool_temperature' => ['label' => 'AC Cool Temperature', 'type' => 'text', 'required' => false],
            'ac_hot_temperature' => ['label' => 'AC Hot Temperature', 'type' => 'text', 'required' => false],
            'ac_image' => ['label' => 'Air Condition Image at Fan Max Speed', 'type' => 'file', 'required' => false],
            'ac_direction_mode' => ['label' => 'Air Condition Direction Mode Working', 'type' => 'radio', 'required' => true],
            'defogger_front_vent' => ['label' => 'De Fogger Front Vent Working', 'type' => 'radio', 'required' => true],
            'defogger_rear_vent' => ['label' => 'De Fogger rear Vent Working', 'type' => 'radio', 'required' => true],
            'ac_all_vents' => ['label' => 'Air Conditioning All Vents', 'type' => 'radio', 'required' => true],
            'ac_abnormal_vibration' => ['label' => 'AC Abnormal Vibration', 'type' => 'radio', 'required' => true],
        ]
    ],
    
    // STEP 11: Brakes & Steering
    11 => [
        'title' => 'Brakes & Steering',
        'fields' => [
            'brake_pedal' => ['label' => 'Brake Pedal', 'type' => 'radio', 'required' => true],
            'steering_rotating_smoothly' => ['label' => 'Steering Rotating Smoothly', 'type' => 'radio', 'required' => true],
            'steering_coming_back' => ['label' => 'Steering Coming Back While Driving', 'type' => 'radio', 'required' => true],
            'steering_weird_noise' => ['label' => 'Steering Weird Noise', 'type' => 'radio', 'required' => true],
            'alignment' => ['label' => 'Alignment', 'type' => 'radio', 'required' => true],
            'bubbling' => ['label' => 'Bubbling', 'type' => 'radio', 'required' => true],
            'steering_vibration' => ['label' => 'Steering Vibration', 'type' => 'radio', 'required' => true],
        ]
    ],
    
    // STEP 12: Axle
    12 => [
        'title' => 'Axle',
        'fields' => [
            'left_axle' => ['label' => 'Left Axle', 'type' => 'radio', 'required' => true],
            'right_axle' => ['label' => 'Right Axle', 'type' => 'radio', 'required' => true],
            'abnormal_noise' => ['label' => 'Abnormal Noise', 'type' => 'radio', 'required' => true],
        ]
    ],
    
    // STEP 13: Tyres
    13 => [
        'title' => 'Tyres',
        'fields' => [
            'tyre_size' => ['label' => 'Tyre Size', 'type' => 'text', 'required' => true],
            'tyre_type' => ['label' => 'Tyre Type', 'type' => 'radio', 'required' => true],
            'rim_type' => ['label' => 'Rim Type', 'type' => 'radio', 'required' => true],
            'driver_front_tyre_depth_check' => ['label' => 'Driver Front Tyre Depth Check', 'type' => 'radio', 'required' => true],
            'driver_front_tyre_tread_depth' => ['label' => 'Driver Front Tyre Tread Depth', 'type' => 'file', 'required' => true],
            'driver_front_tyre_date' => ['label' => 'Driver Front Tyre Manufacturing Date', 'type' => 'text', 'required' => false],
            'driver_front_tyre_shape' => ['label' => 'Driver Front Tyre Shape', 'type' => 'radio', 'required' => true],
            'driver_back_tyre_depth_check' => ['label' => 'Driver Back Tyre Depth Check', 'type' => 'radio', 'required' => true],
            'driver_back_tyre_tread_depth' => ['label' => 'Driver Back Tyre Tread Depth', 'type' => 'file', 'required' => true],
            'driver_back_tyre_date' => ['label' => 'Driver Back Tyre Manufacturing Date', 'type' => 'text', 'required' => false],
            'driver_back_tyre_shape' => ['label' => 'Driver Back Tyre Shape', 'type' => 'radio', 'required' => true],
            'passenger_back_tyre_depth_check' => ['label' => 'Passenger Back Tyre Depth Check', 'type' => 'radio', 'required' => true],
            'passenger_back_tyre_tread_depth' => ['label' => 'Passenger Back Tyre Tread Depth', 'type' => 'file', 'required' => true],
            'passenger_back_tyre_date' => ['label' => 'Passenger Back Tyre Manufacturing Date', 'type' => 'text', 'required' => false],
            'passenger_back_tyre_shape' => ['label' => 'Passenger Back Tyre Shape', 'type' => 'radio', 'required' => true],
            'passenger_front_tyre_depth_check' => ['label' => 'Passenger Front Tyre Depth Check', 'type' => 'radio', 'required' => true],
            'passenger_front_tyre_tread_depth' => ['label' => 'Passenger Front Tyre Tread Depth', 'type' => 'file', 'required' => true],
            'passenger_front_tyre_date' => ['label' => 'Passenger Front Tyre Manufacturing Date', 'type' => 'text', 'required' => false],
            'passenger_front_tyre_shape' => ['label' => 'Passenger Front Tyre Shape', 'type' => 'radio', 'required' => true],
            'stepney_tyre_depth_check' => ['label' => 'Stepney Tyre Depth Check', 'type' => 'radio', 'required' => true],
            'stepney_tyre_tread_depth' => ['label' => 'Stepney Tyre Tread Depth', 'type' => 'file', 'required' => 'conditional'], // Required only if stepney_tyre_depth_check != "Stepney Not Available"
            'stepney_tyre_date' => ['label' => 'Stepney Tyre Manufacturing Date', 'type' => 'text', 'required' => false],
            'stepney_tyre_shape' => ['label' => 'Stepney Front Tyre Shape', 'type' => 'radio', 'required' => 'conditional'], // Required only if stepney_tyre_depth_check != "Stepney Not Available"
            'sign_of_camber_issue' => ['label' => 'Sign of Camber Issue', 'type' => 'radio', 'required' => true],
        ]
    ],
    
    // STEP 14: Brakes
    14 => [
        'title' => 'Brakes',
        'fields' => [
            'brake_pads_front_driver' => ['label' => 'Brake Pads Front Driver Side', 'type' => 'radio', 'required' => true],
            'brake_discs_front_driver' => ['label' => 'Brake Discs Front Driver Side', 'type' => 'radio', 'required' => true],
            'brake_calipers_front_driver' => ['label' => 'Brake Calipers Front Driver Side', 'type' => 'radio', 'required' => true],
            'brake_pads_front_passenger' => ['label' => 'Brake Pads Front Passenger Side', 'type' => 'radio', 'required' => true],
            'brake_discs_front_passenger' => ['label' => 'Brake Discs Front Passenger Side', 'type' => 'radio', 'required' => true],
            'brake_calipers_front_passenger' => ['label' => 'Brake Calipers Front Passenger Side', 'type' => 'radio', 'required' => true],
            'brake_pads_back_passenger' => ['label' => 'Brake Pads Back Passenger Side', 'type' => 'radio', 'required' => true],
            'brake_discs_back_passenger' => ['label' => 'Brake Discs Back Passenger Side', 'type' => 'radio', 'required' => true],
            'brake_calipers_back_passenger' => ['label' => 'Brake Calipers Back Passenger Side', 'type' => 'radio', 'required' => true],
            'brake_pads_back_driver' => ['label' => 'Brake Pads Back Driver Side', 'type' => 'radio', 'required' => true],
            'brake_discs_back_driver' => ['label' => 'Brake Discs Back Driver Side', 'type' => 'radio', 'required' => true],
            'brake_calipers_back_driver' => ['label' => 'Brake Calipers Back Driver Side', 'type' => 'radio', 'required' => true],
            'brake_fluid_reservoir' => ['label' => 'Brake Fluid Reservoir', 'type' => 'radio', 'required' => true],
            'brake_fluid_cap' => ['label' => 'Brake Fluid Cap', 'type' => 'radio', 'required' => true],
            'parking_hand_brake' => ['label' => 'Parking Hand Brake', 'type' => 'radio', 'required' => true],
        ]
    ],
    
    // STEP 15: Suspension
    15 => [
        'title' => 'Suspension',
        'fields' => [
            'car_height' => ['label' => 'Car Height', 'type' => 'radio', 'required' => true],
            'shocker_bounce_test' => ['label' => 'Shocker Bounce Test', 'type' => 'radio', 'required' => true],
            'driver_side_suspension_assembly' => ['label' => 'Driver Side Suspension Assembly', 'type' => 'radio', 'required' => true],
            'passenger_side_suspension_assembly' => ['label' => 'Passenger Side Suspension Assembly', 'type' => 'radio', 'required' => true],
            'passenger_side_shocker_leakage' => ['label' => 'Passenger Side Shocker Leakage', 'type' => 'radio', 'required' => true],
            'driver_side_shocker_leakage' => ['label' => 'Driver Side Shocker Leakage', 'type' => 'radio', 'required' => true],
        ]
    ],
    
    // STEP 16: Under Body
    16 => [
        'title' => 'Under Body',
        'fields' => [
            'driver_side_body_chasis' => ['label' => 'Driver Side Body Chasis', 'type' => 'checkbox', 'required' => true],
            'passenger_side_body_chasis' => ['label' => 'Passenger Side Body Chasis', 'type' => 'checkbox', 'required' => true],
            'rear_subframe' => ['label' => 'Rear Subframe', 'type' => 'checkbox', 'required' => true],
            'front_protection_cover_new' => ['label' => 'Front Protection Cover', 'type' => 'checkbox', 'required' => true],
            'underbody_cables_new' => ['label' => 'Underbody Cables', 'type' => 'checkbox', 'required' => true],
            'rear_protection_cover_new' => ['label' => 'Rear Protection Cover', 'type' => 'radio', 'required' => true],
            'fuel_leaks_under_body' => ['label' => 'Any Fuel Leaks under Body', 'type' => 'radio', 'required' => true],
            'underbody_left' => ['label' => 'Underbody Left', 'type' => 'file', 'required' => true],
            'underbody_rear' => ['label' => 'Underbody Rear', 'type' => 'file', 'required' => true],
            'underbody_front' => ['label' => 'Underbody Front', 'type' => 'file', 'required' => true],
            'underbody_right' => ['label' => 'Underbody Right', 'type' => 'file', 'required' => true],
        ]
    ],
    
    // STEP 17: Equipments
    17 => [
        'title' => 'Equipments',
        'fields' => [
            'tool_kit' => ['label' => 'Tool Kit', 'type' => 'radio', 'required' => true],
            'tool_kit_image' => ['label' => 'Tool Kit Image', 'type' => 'file', 'required' => true],
        ]
    ],
    
    // STEP 18: Car Images
    18 => [
        'title' => 'Car Images',
        'fields' => [
            'car_image_front' => ['label' => 'Front', 'type' => 'file', 'required' => true],
            'car_image_back' => ['label' => 'Back', 'type' => 'file', 'required' => true],
            'car_image_driver_side' => ['label' => 'Driver Side', 'type' => 'file', 'required' => true],
            'car_image_passenger_side' => ['label' => 'Passenger Side', 'type' => 'file', 'required' => true],
            'car_image_dashboard' => ['label' => 'Front Dashboard', 'type' => 'file', 'required' => true],
        ]
    ],
    
    // STEP 19: Final Result
    19 => [
        'title' => 'Final Result',
        'fields' => [
            'issues_found_in_car' => ['label' => 'Any Issues Found in Car', 'type' => 'textarea', 'required' => true],
            'photo_of_issues' => ['label' => 'Photo of Issues', 'type' => 'file', 'required' => false],
        ]
    ],
    
    // STEP 20: Payment Taking
    20 => [
        'title' => 'Payment Taking',
        'fields' => [
            'payment_taken' => ['label' => 'Payment', 'type' => 'radio', 'required' => true],
            'payment_type' => ['label' => 'Payment Type', 'type' => 'radio', 'required' => false],
            'payment_proof' => ['label' => 'Payment Proof', 'type' => 'file', 'required' => false],
            'amount_paid' => ['label' => 'Amount Paid', 'type' => 'number', 'required' => false],
        ]
    ],
];
