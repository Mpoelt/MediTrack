<?php
require 'header.php';
require "db.php"; ?>

<?php
$result = $conn->query("SELECT * FROM patients ORDER BY created_at DESC") ?>

<main>
    <!DOCTYPE html>
    <html>

    <head>
        <link rel="stylesheet" href="home.css">
    </head>

    <body>

        <h2>Az összes beteg</h2>

        <table class="table table-striped">
            <tr>
                <th><input type="search" class="form-control" placeholder="Search..." aria-label="Search"></th>
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
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= $row['birth_date'] ?></td>
                <td><?= htmlspecialchars($row['birth_place']) ?></td>
            </tr>
            <?php endwhile; ?>
        </table>

    </body>

    </html>



</main>

<?php require 'footer.php' ?>