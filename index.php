<?php
require_once 'include/headers.php';
require_once 'include/functions.php';

try {
    $db = connectDB();
    $sql = "SELECT * FROM item";
    $query = $db->query($sql);
    $results = $query->fetchAll(PDO::FETCH_ASSOC);
    header("HTTP/1.1 200 OK");
    print json_encode($results, JSON_PRETTY_PRINT);
} catch (PDOException $pdoex) {
    returnError($pdoex);
}