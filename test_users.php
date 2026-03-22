<?php
require "db.php";

$email = "admin@test.com";
$password = password_hash("123456", PASSWORD_DEFAULT);

$sql = "INSERT INTO users (email, password) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
echo "User létrehozva";