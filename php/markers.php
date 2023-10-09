<?php
$query = new \db\DatabaseQuery();
$result = $query->selectOffers();

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

// Output the markers data as JSON
header('Content-Type: application/json');
echo json_encode($markers);
