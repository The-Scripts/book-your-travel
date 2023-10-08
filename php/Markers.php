<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "db";

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to select the markers data
$sql = "SELECT Latitude, Longitude, Title FROM offers";
$result = $conn->query($sql);

$markers = [];

if ($result->num_rows > 0) {
    // Loop through the result set and store data in an array
    while ($row = $result->fetch_assoc()) {
        $markers[] = [
            'lat' => $row['Latitude'],
            'lng' => $row['Longitude'],
            'label' => $row['Title']
        ];
    }
}

// Close the connection
$conn->close();

// Output the markers data as JSON
header('Content-Type: application/json');
echo json_encode($markers);
