<?php

namespace db;

class DatabaseQuery extends DatabaseConn
{
    private $conn;
    public function __construct()
    {
        $this->conn = new DatabaseConn();
    }

    public function insertBookedTravels($table, $userId, $offerId) {
        $this->conn->query("INSERT INTO $table (UserID, OfferId) values ($userId, $offerId)");
    }

    public function selectOffers() {
        $this->conn->query("SELECT * FROM offers", allRows: true);
    }
}