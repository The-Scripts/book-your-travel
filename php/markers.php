<?php
require_once "db/DatabaseQuery.php";

$query = new db\DatabaseQuery();
$result = $query->selectOffers();



// Output the markers data as JSON
header('Content-Type: application/json');
echo json_encode($result);
