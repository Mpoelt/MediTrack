<?php
require "auth.php";
require "header.php";
require "db.php";

$id = $_GET['id'];

$sql = "SELECT * FROM patients WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
$patient = $result->fetch_assoc();
?>

<body>
    <form action="update_patient.php" method="POST" class="container mt-4">
        <input type="hidden" name="id" value="<?= $patient['id'] ?>">
        <div class="row">

            <!-- Név -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Név</label>
                <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($patient['name']) ?>"
                    placeholder="Teljes név">
            </div>

            <!-- Születési hely -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Születési hely</label>
                <input type="text" class="form-control" name="birth_place"
                    value="<?= htmlspecialchars($patient['birth_place']) ?>" placeholder="Pl. Budapest">
            </div>

            <!-- Születési idő -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Születési idő</label>
                <input type="date" class="form-control" name="birth_date"
                    value="<?= htmlspecialchars($patient['birth_date']) ?>">
            </div>

            <!-- Anyja neve -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Anyja neve</label>
                <input type="text" class="form-control" name="mother_name"
                    value="<?= htmlspecialchars($patient['mother_name']) ?>">
            </div>

            <!-- Lakcím -->
            <div class="col-12 mb-3">
                <label class="form-label">Lakcím</label>
                <input type="text" class="form-control" name="address"
                    value="<?= htmlspecialchars($patient['address']) ?>">
            </div>

            <!-- Diagnózis -->
            <div class="col-12 mb-3">
                <label class="form-label">Diagnózis</label>
                <textarea class="form-control" name="diagnosis" rows="3"
                    placeholder="Diagnózis leírása"><?= htmlspecialchars($patient['diagnosis']) ?></textarea>
            </div>

        </div>

        <!-- Gomb -->
        <button type="submit" class="btn btn-primary">Mentés</button>

    </form>
</body>

<?php require "footer.php" ?>