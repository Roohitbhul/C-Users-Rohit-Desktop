<?php
// Database connection
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "healthcare_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// User authentication
function login($username, $password) {
    global $conn;
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($query);
    if ($result->num_rows == 1) {
        return true;
    } else {
        return false;
    }
}

// Appointment scheduling
function scheduleAppointment($patient_id, $doctor_id, $date, $time) {
    global $conn;
    $query = "INSERT INTO appointments (patient_id, doctor_id, date, time) VALUES ('$patient_id', '$doctor_id', '$date', '$time')";
    if ($conn->query($query) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Medical records management
function addMedicalRecord($patient_id, $doctor_id, $diagnosis, $prescription) {
    global $conn;
    $query = "INSERT INTO medical_records (patient_id, doctor_id, diagnosis, prescription) VALUES ('$patient_id', '$doctor_id', '$diagnosis', '$prescription')";
    if ($conn->query($query) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Example usage
$username = "user123";
$password = "password123";
if (login($username, $password)) {
    echo "Login successful";
} else {
    echo "Invalid username or password";
}

$patient_id = 1;
$doctor_id = 2;
$date = "2024-03-24";
$time = "10:00 AM";
if (scheduleAppointment($patient_id, $doctor_id, $date, $time)) {
    echo "Appointment scheduled successfully";
} else {
    echo "Failed to schedule appointment";
}

$diagnosis = "Fever";
$prescription = "Take rest and drink plenty of fluids";
if (addMedicalRecord($patient_id, $doctor_id, $diagnosis, $prescription)) {
    echo "Medical record added successfully";
} else {
    echo "Failed to add medical record";
}

$conn->close();
?>