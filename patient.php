<?php require "header.php" ?>

<body>

    <div class="d-grid gap-3" style="grid-template-columns: 2fr 3fr;">
        <div class="bg-body-tertiary border rounded-3">
            <header class="py-3 mb-4 border-bottom">
                <div class="container d-flex flex-wrap justify-content-center"> <a href="/"
                        class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto link-body-emphasis text-decoration-none">
                        <span class="fs-4">NÉV</span> </a>
                    <button type="button" class="btn btn-success">Szerkesztés</button>
                </div>
            </header>
            <div>
                <?php require "memberTable.php" ?>
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