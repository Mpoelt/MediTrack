<?php
require "db.php";

$id = $_POST['id'];

$sql = "DELETE FROM patients WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: delete.php");
    exit;
} else {
    echo "Hiba: " . $stmt->error;
}

$stmt->close();
$conn->close();