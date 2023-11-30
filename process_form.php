<?php

// Connect to the database
$dbHost = 'localhost';
$dbName = 'f';
$dbUser = 'root';
$dbPass = '';

$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$phoneNumber = $_POST['phoneNumber'];
$checkin = $_POST['checkin'];
$t=$_POST['t'];
$tourPackage=$_POST['tourPackage'];
// Insert data into the database
$sql = "INSERT INTO contacts (name, email, phoneNumber,checkin,t,tourPackage) VALUES ('$name', '$email', '$phoneNumber','$checkin','$t','$tourPackage')";
if ($conn->query($sql) === TRUE) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => $conn->error]);
}



$conn->close();
