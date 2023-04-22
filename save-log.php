<?php
session_start();
// Database connection settings
$host = "localhost"; // Your database host
$username = "root"; // Your database username
$password = ""; // Your database password
$database = "useraccounts"; // Your database name

// Establish database connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check for errors
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the log data from the request
$logData = $_POST['logData'];

// Convert the log data to an array
$logArray = explode("\n", $logData);

// Loop through each row of the log data
foreach ($logArray as $logRow) {
    // Convert the row data to an array
    $logRowArray = explode(",", $logRow);

    // Extract the individual fields from the row data
    $session = mysqli_real_escape_string($conn, $logRowArray[0]);
    $date = mysqli_real_escape_string($conn, $logRowArray[1]);
    $startTime = mysqli_real_escape_string($conn, $logRowArray[2]);
    $endTime = mysqli_real_escape_string($conn, $logRowArray[3]);
    $time = mysqli_real_escape_string($conn, $logRowArray[4]);
    $description = mysqli_real_escape_string($conn, $logRowArray[5]);

    // Insert the data into the database
    $sql = "INSERT INTO logs (session, date, startTime, endTime, time, description) VALUES ('$session', '$date', '$startTime', '$endTime', '$time', '$description')";

    if (!mysqli_query($conn, $sql)) {
        die("Error: " . mysqli_error($conn));
    }
}

// Close the database connection
mysqli_close($conn);

?>