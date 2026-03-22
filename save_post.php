<?php
require "auth.php";
require "db.php";

$patient_id = $_POST['patient_id'];
$content = $_POST['content'];

$sql = "INSERT INTO posts (patient_id, content) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("is", $patient_id, $content);

if ($stmt->execute()) {
    header("Location: patient.php?id=" . $patient_id);
    exit;
} else {
    echo "Hiba: " . $stmt->error;
}

$stmt->close();
$conn->close();