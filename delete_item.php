<?php
require_once "include/headers.php";
require_once "include/functions.php";

$input = json_decode(file_get_contents("php://input"));
$id = filter_var($input->id, FILTER_SANITIZE_SPECIAL_CHARS);

try {
    $db = connectDB();;

    $query = $db->prepare("DELETE FROM item WHERE id = (:id)");
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();

    header("HTTP/1.1 200 OK");
    $data = array("id" => $id);
    print json_encode($data);
} catch (PDOException $pdoex) {
    returnError($pdoex);
}
