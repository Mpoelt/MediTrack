<?php
require "db.php";

$id = $_POST['id'];
$name = $_POST['name'];
$birth_date = $_POST['birth_date'];
$birth_place = $_POST['birth_place'];
$mother_name = $_POST['mother_name'];
$address = $_POST['address'];
$diagnosis = $_POST['diagnosis'];

$sql = "UPDATE patients SET name = ?, birth_date = ?, birth_place = ?, mother_name = ?, address = ?, diagnosis = ? WHERE id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param(
    "ssssssi",
    $name,
    $birth_date,
    $birth_place,
    $mother_name,
    $address,
    $diagnosis
);

if ($stmt->execute()) {
    header("Location: patient.php?id=" . $id);
} else {
    echo "Hiba: " . $stmt->error;
}

$stmt->close();
$conn->close();