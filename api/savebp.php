<?php
// Connect to MySQL database
$conn = new mysqli('localhost', 'root', '', 'health_monitoring');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle blood pressure data
if (isset($_POST['patient_id'], $_POST['bp-day'], $_POST['bp-date'], $_POST['systolic'], $_POST['diastolic'])) {
    $patient_id = $_POST['patient_id'];
    $bp_day = $_POST['bp-day'];
    $bp_date = $_POST['bp-date'];
    $systolic = $_POST['systolic'];
    $diastolic = $_POST['diastolic'];
    
    // Insert blood pressure data into the database
    $sql = "INSERT INTO blood_pressure (patient_id, day, date, systolic, diastolic) 
            VALUES ('$patient_id', '$bp_day', '$bp_date', '$systolic', '$diastolic')";
    if ($conn->query($sql) !== TRUE) {
        echo "Error inserting blood pressure data: " . $conn->error;
    } else {
        echo "Blood pressure data inserted successfully";
    }
}

// Close connection
$conn->close();
?>
