<?php
// Connect to MySQL database
$conn = new mysqli('localhost', 'root', '', 'health_monitoring');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle diet data
if (isset($_POST['patient_id'], $_POST['diet-day'], $_POST['diet-date'], $_POST['calories'])) {
    $patient_id = $_POST['patient_id'];
    $diet_day = $_POST['diet-day'];
    $diet_date = $_POST['diet-date'];
    $calories = $_POST['calories'];
    
    // Insert diet data into the database
    $sql = "INSERT INTO diet (patient_id, day, date, calories) 
            VALUES ('$patient_id', '$diet_day', '$diet_date', '$calories')";
    if ($conn->query($sql) !== TRUE) {
        echo "Error inserting diet data: " . $conn->error;
    } else {
        echo "Diet data inserted successfully";
    }
}

// Close connection
$conn->close();
?>
