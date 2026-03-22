<?php
session_start();
require "db.php";

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"] ?? "");
    $password = $_POST["password"] ?? "";
    $confirm_password = $_POST["confirm_password"] ?? "";

    if (empty($email) || empty($password) || empty($confirm_password)) {
        $error = "Minden mező kitöltése kötelező.";
    } elseif ($password !== $confirm_password) {
        $error = "A két jelszó nem egyezik.";
    } else {
        $check_sql = "SELECT id FROM users WHERE email = ?";
        $check_stmt = $conn->prepare($check_sql);
        $check_stmt->bind_param("s", $email);
        $check_stmt->execute();
        $check_result = $check_stmt->get_result();

        if ($check_result->num_rows > 0) {
            $error = "Ez az email cím már regisztrálva van.";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $insert_sql = "INSERT INTO users (email, password) VALUES (?, ?)";
            $insert_stmt = $conn->prepare($insert_sql);
            $insert_stmt->bind_param("ss", $email, $hashed_password);

            if ($insert_stmt->execute()) {
                header("Location: login.php");
                exit;
            } else {
                $error = "Hiba történt a regisztráció során.";
            }
        }
    }
}
?>

<!doctype html>
<html lang="hu">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous" />
    <title>Regisztráció</title>
</head>

<body>
    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
        <div class="row align-items-center g-lg-5 py-5">
            <div class="col-lg-7 text-center text-lg-start">
                <h1 class="display-4 fw-bold lh-1 text-body-emphasis mb-3">
                    MediTrack
                </h1>
                <p class="col-lg-10 fs-4">
                    Hozz létre egy új felhasználói fiókot.
                </p>
            </div>

            <div class="col-md-10 mx-auto col-lg-5">
                <form action="register.php" method="POST" class="p-4 p-md-5 border rounded-3 bg-body-tertiary">
                    <?php if (!empty($error)): ?>
                    <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
                    <?php endif; ?>

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingEmail" name="email"
                            placeholder="name@example.com" required>
                        <label for="floatingEmail">Email cím</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" name="password"
                            placeholder="Jelszó" required>
                        <label for="floatingPassword">Jelszó</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingConfirmPassword" name="confirm_password"
                            placeholder="Jelszó újra" required>
                        <label for="floatingConfirmPassword">Jelszó újra</label>
                    </div>

                    <button class="w-100 btn btn-lg btn-primary" type="submit">
                        Regisztráció
                    </button>

                    <hr class="my-4" />

                    <small class="text-body-secondary">
                        Már van fiókod? <a href="login.php">Bejelentkezés</a>
                    </small>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
</body>

</html>