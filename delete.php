<?php require "header.php";
require "db.php";

$result = $conn->query("SELECT * FROM patients ORDER BY created_at DESC");

?>

<div class="container mt-4">
    <h2>Betegek eltávolítása</h2>
    <div>
        <table class="table table-striped">

            <tr>
                <th>Név</th>
                <th>Születési idő</th>
                <th>Születési hely</th>
                <th>Művelet</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['birth_date']) ?></td>
                <td><?= htmlspecialchars($row['birth_place']) ?></td>
                <td>
                    <form action="delete_patient.php" method="POST" style="display: inline;">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <button type="submit" class="btn btn-danger">Törlés</button>
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</div>


<?php require "footer.php" ?>