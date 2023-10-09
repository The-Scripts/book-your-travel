<?php
    require_once "db/DatabaseConn.php";

    $conn = new db\DatabaseConn();

    $login = trim($_POST['login']);
    $pass = trim($_POST['password']);
    
