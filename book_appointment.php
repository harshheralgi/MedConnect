<?php
// book_appointment.php

// Get form data
$name = $_POST['name'] ?? '';
$age = $_POST['age'] ?? '';
$date = $_POST['date'] ?? '';
$time = $_POST['time'] ?? '';

// Check if all required fields are provided
if (empty($name) || empty($age) || empty($date) || empty($time)) {
    echo json_encode(['message' => 'All fields are required!']);
    exit;
}

// Prepare the appointment data
$appointment = [
    'name' => $name,
    'age' => $age,
    'date' => $date,
    'time' => $time
];

// File to save appointments
$appointmentsFile = 'appointments.json';

// Read existing appointments from the JSON file
if (file_exists($appointmentsFile)) {
    $appointments = json_decode(file_get_contents($appointmentsFile), true);
} else {
    $appointments = [];
}

// Add the new appointment to the list
$appointments[] = $appointment;

// Save the updated list back to the JSON file
file_put_contents($appointmentsFile, json_encode($appointments, JSON_PRETTY_PRINT));

// Send a success response
echo json_encode(['message' => 'Appointment successfully booked!']);
?>
