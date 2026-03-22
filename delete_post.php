<?php
require "db.php";

$post_id = $_POST['post_id'];
$patient_id = $_POST['patient_id'];

$sql = "DELETE FROM posts WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $post_id);

if ($stmt->execute()) {
    header("Location: patient.php?id=" . $patient_id);
    exit;
} else {
    echo "Hiba: " . $stmt->error;
}
$stmt->close();
$conn->close();