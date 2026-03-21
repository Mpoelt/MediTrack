<?php
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
$stm = $conn->prepare($sql);
$stm->bind_param("ssssss", $name, $birth_date, $birth_place, $mother_name, $address, $diagnosis);

//végrehajtás és ellenőrzés
if ($stm->execute()) {
    echo "sikeres mentés!";
} else {
    echo "Hiba: " . $stmt->error;
}

$stm->close();
$conn->close();