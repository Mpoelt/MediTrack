<?php
require "auth.php";
require 'header.php';
require "db.php";

$search = $_GET['search'] ?? '';
?>



<?php
if (!empty($search)) {
    $sql = "SELECT * FROM patients WHERE name LIKE ? 
    OR birth_place like ? 
    OR birth_date LIKE ?
    ORDER BY created_at DESC";

    $stmt = $conn->prepare($sql);
    $like = "%" . $search . "%";
    $stmt->bind_param("sss", $like, $like, $like);
    $stmt->execute();

    $result = $stmt->get_result();
} else {
    $result = $conn->query("SELECT * FROM patients ORDER BY created_at DESC");
}

?>






<link rel="stylesheet" href="home.css">


<body>

    <h2>Az páciensek listája</h2>

    <table class="table table-striped">
        <tr>
            <th>
                <form action="home.php" method="GET" class="d-flex">
                    <input type="search" name="search" class="form-control" placeholder="Keresés..."
                        value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
                </form>
            </th>
            <th><a href="create.php" class="btn btn-success">Hozzáadás</a> </th>
            <th><a href="delete.php" class="btn btn-danger">Eltávolítás</a> </th>
        </tr>
        <tr>
            <th>Név</th>
            <th>Születési idő</th>
            <th>Születési hely</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td>
                <a href="patient.php?id=<?= $row['id'] ?>"><?= htmlspecialchars($row['name']) ?>
                </a>
            </td>


            <td><?= $row['birth_date'] ?></td>
            <td><?= htmlspecialchars($row['birth_place']) ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

</body>







<?php require 'footer.php' ?>