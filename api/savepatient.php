<?php
// Connect to MySQL database
$conn = new mysqli('localhost', 'root', '', 'health_monitoring');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle patient details
if (isset($_POST['name'], $_POST['age'], $_POST['gender'], $_POST['email'], $_POST['phone'], $_POST['address'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    
    // Insert patient data into the database
    $sql = "INSERT INTO patients (name, age, gender, email, phone, address) 
            VALUES ('$name', '$age', '$gender', '$email', '$phone', '$address')";
    if ($conn->query($sql) !== TRUE) {
        echo "Error inserting patient data: " . $conn->error;
    } else {
        $patient_id = $conn->insert_id; // Get the ID of the newly inserted patient
        echo "Patient data inserted successfully with ID: " . $patient_id;
    }
}

// Close connection
$conn->close();
?>
