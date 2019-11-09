<?php

    include_once 'model/model.php';

    define('dbServerName', 'localhost');
    define('dbUserName', 'root');
    define('dbPassword', '');
    define('dbName', 'mydb');

    $db = new mysqli(dbServerName, dbUserName, dbPassword, dbName);
    $db->set_charset("utf8");

    $isdb = new dbModel($db); //create instance to db

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
?>