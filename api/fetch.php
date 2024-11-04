<?php
// Connect to MySQL database
// Allow requests from any origin
header("Access-Control-Allow-Origin: *");
// Allow requests with the following methods
header("Access-Control-Allow-Methods: GET, POST");
// Allow requests with the following headers
header("Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token");
$conn = new mysqli('localhost', 'root', '', 'health_monitoring');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch patient details
$sql = "SELECT * FROM patients";
$result = $conn->query($sql);
$patients = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $patients[] = $row;
    }
}

// Fetch health data
$health_data = [];
$tables = ['blood_pressure', 'water_intake', 'diet', 'sleep'];
foreach ($tables as $table) {
    $sql = "SELECT * FROM $table";
    $result = $conn->query($sql);
    $entries = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $entries[] = $row;
        }
    }
    $health_data[$table] = $entries;
}

// Close connection
$conn->close();

// Prepare data to be sent as JSON
$data = [
    'patients' => $patients,
    'health_data' => $health_data
];

// Send JSON response
header('Content-Type: application/json');
echo json_encode($data);
?>
