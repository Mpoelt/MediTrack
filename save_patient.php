<?php
require "auth.php";
require "db.php"; //kapcslat az adatbázishoz

//Adatok lekérdezése POST-ból
$name = $_POST['name'];
$birth_date = $_POST['birth_date'];
$birth_place = $_POST['birth_place'];
$mother_name = $_POST['mother_name'];
$address = $_POST['address'];
$diagnosis = $_POST['diagnosis'];

//SQL beszúrás
$sql = "INSERT INTO patients (name, birth_date, birth_place,mother_name,address, diagnosis) VALUES(?, ?, ?, ?, ?, ?)";

//előkészített statement a biztonságért
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $name, $birth_date, $birth_place, $mother_name, $address, $diagnosis);

//végrehajtás és ellenőrzés
if ($stmt->execute()) {
    header("Location: home.php");
    exit;
} else {
    echo "Hiba: " . $stmt->error;
}

$stmt->close();
$conn->close();