<?php
// Connect to MySQL database
$conn = new mysqli('localhost', 'root', '', 'health_monitoring');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle sleep data
if (isset($_POST['patient_id'], $_POST['sleep-day'], $_POST['sleep-date'], $_POST['duration'])) {
    $patient_id = $_POST['patient_id'];
    $sleep_day = $_POST['sleep-day'];
    $sleep_date = $_POST['sleep-date'];
    $duration_minutes = $_POST['duration'];
    
    // Insert sleep data into the database
    $sql = "INSERT INTO sleep (patient_id, day, date, duration_minutes) 
            VALUES ('$patient_id', '$sleep_day', '$sleep_date', '$duration_minutes')";
    if ($conn->query($sql) !== TRUE) {
        echo "Error inserting sleep data: " . $conn->error;
    } else {
        echo "Sleep data inserted successfully";
    }
}

// Close connection
$conn->close();
?>
