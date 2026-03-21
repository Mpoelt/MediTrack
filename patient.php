<?php
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

    <div class="d-grid gap-3" style="grid-template-columns: 2fr 3fr;">
        <div class="bg-body-tertiary border rounded-3">
            <header class="py-3 mb-4 border-bottom">
                <div class="container d-flex flex-wrap justify-content-center"> <a href="/"
                        class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto link-body-emphasis text-decoration-none">
                        <span class="fs-4"><?= htmlspecialchars($patient['name']) ?></span> </a>
                    <button type="button" class="btn btn-success">Szerkesztés</button>
                </div>
            </header>
            <div>
                <table class="table table-striped">
                    <tr>
                        <th>Név</th>
                        <td><?= htmlspecialchars($patient['name']) ?></td>
                    </tr>
                    <tr>
                        <th> Születési idő</th>
                        <td> <?= htmlspecialchars($patient['birth_date']) ?></td>
                    </tr>
                    <tr>
                        <th>Születési hely</th>
                        <td><?= htmlspecialchars($patient['birth_place']) ?></td>
                    </tr>
                    <tr>
                        <th>Anyja neve</th>
                        <td><?= htmlspecialchars($patient['mother_name']) ?></td>
                    </tr>
                    <tr>
                        <th>Lakcím</th>
                        <td><?= htmlspecialchars($patient['address']) ?></td>
                    </tr>
                    <tr>
                        <th>Diagnózis</th>
                        <td><?= htmlspecialchars($patient['diagnosis']) ?></td>
                    </tr>
                </table>
            </div>


        </div>
        <div class="bg-body-tertiary border rounded-3 p-3">

            <!-- FORM -->
            <form>
                <div class="mb-3">
                    <label class="form-label">Bejegyzés létrehozása</label>
                    <textarea class="form-control" rows="3"></textarea>
                </div>
                <button class="btn btn-primary">Mentés</button>
            </form>

            <!-- BEJEGYZÉSEK -->
            <div class="mt-4">

                <div class="card mb-3">
                    <div class="card-body">
                        <p>Első bejegyzés...</p>
                        <small class="text-muted">időpont</small>
                    </div>
                </div>

            </div>

        </div>
    </div>

</body>

<?php require "footer.php" ?>