<?php
require_once 'dbcredentials.php';

$connection = new mysqli(host_name, user_name, password, db_name);
if($connection->connect_error) die("Could not establish connection with database: " . $connection->connect_error);


