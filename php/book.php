<?php
require_once 'db/DatabaseConn.php';
session_start();
if (isset($_SESSION['user_id'])) {
    $conn = new \db\DatabaseConn();
    $data = json_decode(file_get_contents("php://input"), true);
    $conn->query("INSERT INTO bookedtravels (UserID, OfferID) values ({$_SESSION['user_id']}, {$data['id']})");
    header('Content-Type: application/json');
    echo json_encode("{$data['id']}");
} else {
    header('Content-Type: application/json');
}