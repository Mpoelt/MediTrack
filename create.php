<?php require "header.php" ?>

<body>
    <form action="save_patient.php" method="POST" class="container mt-4">

        <div class="row">

            <!-- Név -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Név</label>
                <input type="text" class="form-control" name="name" placeholder="Teljes név">
            </div>

            <!-- Születési hely -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Születési hely</label>
                <input type="text" class="form-control" name="birth_place" placeholder="Pl. Budapest">
            </div>

            <!-- Születési idő -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Születési idő</label>
                <input type="date" class="form-control" name="birth_date">
            </div>

            <!-- Anyja neve -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Anyja neve</label>
                <input type="text" class="form-control" name="mother_name">
            </div>

            <!-- Lakcím -->
            <div class="col-12 mb-3">
                <label class="form-label">Lakcím</label>
                <input type="text" class="form-control" name="address">
            </div>

            <!-- Diagnózis -->
            <div class="col-12 mb-3">
                <label class="form-label">Diagnózis</label>
                <textarea class="form-control" name="diagnosis" rows="3" placeholder="Diagnózis leírása"></textarea>
            </div>

        </div>

        <!-- Gomb -->
        <button type="submit" class="btn btn-primary">Mentés</button>

    </form>
</body>

<?php require "footer.php" ?>