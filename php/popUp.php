<?php
require_once 'db/DatabaseConn.php';
$conn = new \db\DatabaseConn();
$data = json_decode(file_get_contents("php://input"), true);

header('Content-Type: application/json');
echo json_encode($conn->query("SELECT * FROM offers WHERE ID = {$data['id']}", true));
