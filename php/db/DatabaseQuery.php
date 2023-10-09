<?php

namespace db;
include_once "DatabaseConn.php";
class DatabaseQuery extends DatabaseConn
{
    public function insertBookedTravels($table, $userId, $offerId): void
    {
        $this->conn()->query("INSERT INTO $table (UserID, OfferId) values ($userId, $offerId)");
    }

    public function selectOffers()
    {
        return $this->conn()->query("SELECT * FROM offers", true, false);
    }

    function conn() {
        return new DatabaseConn();
    }
}