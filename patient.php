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

$post_sql = "SELECT * FROM posts WHERE patient_id = ? ORDER BY created_at DESC";
$post_stmt = $conn->prepare($post_sql);
$post_stmt->bind_param("i", $id);
$post_stmt->execute();

$post_result = $post_stmt->get_result();

?>

<body>

    <div class="d-grid gap-3" style="grid-template-columns: 2fr 3fr;">
        <div class="bg-body-tertiary border rounded-3">
            <header class="py-3 mb-4 border-bottom">
                <div class="container d-flex flex-wrap justify-content-center"> <a href="/"
                        class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto link-body-emphasis text-decoration-none">
                        <span class="fs-4"><?= htmlspecialchars($patient['name']) ?></span> </a>
                    <a href="update.php?id=<?= $patient['id'] ?>" class="btn btn-success">Szerkesztés</a>

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
            <form action="save_post.php" method="POST">
                <input type="hidden" name="patient_id" value="<?= $patient['id'] ?>">
                <div class="mb-3">
                    <label class="form-label">Bejegyzés létrehozása</label>
                    <textarea class="form-control" name="content" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Mentés</button>
            </form>

            <!-- BEJEGYZÉSEK -->
            <div class="mt-4">
                <?php while ($post = $post_result->fetch_assoc()): ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <p><?= nl2br(htmlspecialchars($post['content'])) ?></p>
                        <small class="text-muted"><?= htmlspecialchars($post['created_at']) ?></small>
                        <form action="delete_post.php" method="POST" class="mt-2">
                            <input type="hidden" name="post_id" value="<?= $post['id'] ?>">
                            <input type="hidden" name="patient_id" value="<?= $patient['id'] ?>">
                            <button type="submit" class="btn btn-danger btn-sm">Törlés</button>
                        </form>
                    </div>
                </div>
                <?php endwhile ?>
            </div>

        </div>
    </div>

</body>

<?php require "footer.php" ?>