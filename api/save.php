<?php
// Connect to MySQL database
$conn = new mysqli('localhost', 'root', '', 'health_monitoring');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract patient details
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    // Extract blood pressure data
    $bp_day = $_POST['bp_day'];
    $bp_date = $_POST['bp_date'];
    $systolic = $_POST['systolic'];
    $diastolic = $_POST['diastolic'];

    // Extract water intake data
    $water_day = $_POST['water_day'];
    $water_date = $_POST['water_date'];
    $water_intake = $_POST['water_intake'];

    // Extract diet data
    $diet_day = $_POST['diet_day'];
    $diet_date = $_POST['diet_date'];
    $calories = $_POST['calories'];

    // Extract sleep data
    $sleep_day = $_POST['sleep_day'];
    $sleep_date = $_POST['sleep_date'];
    $duration = $_POST['duration'];

    // Insert patient details into the database
    $sql_patient = "INSERT INTO patients (name, age, gender, email, phone, address) 
                    VALUES ('$name', '$age', '$gender', '$email', '$phone', '$address')";
    if ($conn->query($sql_patient) !== TRUE) {
        echo "Error inserting patient details: " . $conn->error;
    }

    // Insert blood pressure data into the database
    $sql_bp = "INSERT INTO blood_pressure (day, date, systolic, diastolic) 
               VALUES ('$bp_day', '$bp_date', '$systolic', '$diastolic')";
    if ($conn->query($sql_bp) !== TRUE) {
        echo "Error inserting blood pressure data: " . $conn->error;
    }

    // Insert water intake data into the database
    $sql_water = "INSERT INTO water_intake (day, date, ml) 
                  VALUES ('$water_day', '$water_date', '$water_intake')";
    if ($conn->query($sql_water) !== TRUE) {
        echo "Error inserting water intake data: " . $conn->error;
    }

    // Insert diet data into the database
    $sql_diet = "INSERT INTO diet (day, date, calories) 
                 VALUES ('$diet_day', '$diet_date', '$calories')";
    if ($conn->query($sql_diet) !== TRUE) {
        echo "Error inserting diet data: " . $conn->error;
    }

    // Insert sleep data into the database
    $sql_sleep = "INSERT INTO sleep (day, date, duration) 
                  VALUES ('$sleep_day', '$sleep_date', '$duration')";
    if ($conn->query($sql_sleep) !== TRUE) {
        echo "Error inserting sleep data: " . $conn->error;
    }
  

}

// Close connection
$conn->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheets" href="../styles.css">
    <title>Save Data</title>
</head>
<body>
    <h1>Data saved successfully!</h1>
    <p>Thank you for submitting your data.</p>
    <!-- Add a link to home.html -->
    <a href="../home.html">Go to Home</a>
</body>
</html>
