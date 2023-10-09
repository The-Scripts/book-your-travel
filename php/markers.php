<?php
require_once "db/DatabaseConn.php";

$conn = new db\DatabaseConn();
$result = $conn->query("SELECT * FROM offers", true);

header('Content-Type: application/json');
echo json_encode($result);
