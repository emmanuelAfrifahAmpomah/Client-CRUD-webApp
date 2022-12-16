<?php
require_once 'backend/dbconnection.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "DELETE FROM clients_data WHERE id = $id ";
    $result = $connection->query($sql);

    if(!$result) {
        echo "unable to delete client: " .$connection->connect_error;
    }

    header("location: index.php");
    exit;
}

