<?php
// Connect to MySQL database
$conn = new mysqli('localhost', 'root', '', 'health_monitoring');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle water intake data
if (isset($_POST['patient_id'], $_POST['water-day'], $_POST['water-date'], $_POST['water-intake'])) {
    $patient_id = $_POST['patient_id'];
    $water_day = $_POST['water-day'];
    $water_date = $_POST['water-date'];
    $water_intake = $_POST['water-intake'];
    
    // Insert water intake data into the database
    $sql = "INSERT INTO water_intake (patient_id, day, date, ml) 
            VALUES ('$patient_id', '$water_day', '$water_date', '$water_intake')";
    if ($conn->query($sql) !== TRUE) {
        echo "Error inserting water intake data: " . $conn->error;
    } else {
        echo "Water intake data inserted successfully";
    }
}

// Close connection
$conn->close();
?>
