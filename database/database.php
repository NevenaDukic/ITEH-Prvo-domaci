<?php

$host = "localhost";
$port = 3306;
$database = "iteh";
$username = "root";
$password = "root";

$connection = new mysqli($host, $username, $password, $database, $port);


if ($connection->connect_errno) {
    exit("Failed to connect to DB!");
}


?>