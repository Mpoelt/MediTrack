<?php require 'header.php' ?>

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
            <tr>
                <td>Alfreds Futterkiste</td>
                <td>Maria Anders</td>
                <td>Germany</td>
            </tr>
            <tr>
                <td>Centro comercial Moctezuma</td>
                <td>Francisco Chang</td>
                <td>Mexico</td>
            </tr>
            <tr>
                <td>Ernst Handel</td>
                <td>Roland Mendel</td>
                <td>Austria</td>
            </tr>
            <tr>
                <td>Island Trading</td>
                <td>Helen Bennett</td>
                <td>UK</td>
            </tr>
            <tr>
                <td>Laughing Bacchus Winecellars</td>
                <td>Yoshi Tannamuri</td>
                <td>Canada</td>
            </tr>
            <tr>
                <td>Magazzini Alimentari Riuniti</td>
                <td>Giovanni Rovelli</td>
                <td>Italy</td>
            </tr>
        </table>

    </body>

    </html>



</main>

<?php require 'footer.php' ?>