<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "meditrack";

$conn = new mysqli($host, $user, $password, $database);

// Hiba ellenőrzés
if ($conn->connect_error) {
    die("Kapcsolódási hiba: " . $conn->connect_error);
}