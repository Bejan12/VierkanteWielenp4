<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container mt-5">
    <h2>Nieuwe Instructeur Toevoegen</h2>
    <?php if (!empty($data['error'])): ?>
        <div class="alert alert-danger">
            <?php echo $data['error']; ?>
        </div>
    <?php endif; ?>
    <form action="<?= URLROOT; ?>/instructeurs/add" method="POST">
        <div class="mb-3">
            <label for="voornaam" class="form-label">Voornaam</label>
            <input type="text" class="form-control" id="voornaam" name="voornaam" required>
        </div>
        <div class="mb-3">
            <label for="tussenvoegsel" class="form-label">Tussenvoegsel</label>
            <input type="text" class="form-control" id="tussenvoegsel" name="tussenvoegsel">
        </div>
        <div class="mb-3">
            <label for="achternaam" class="form-label">Achternaam</label>
            <input type="text" class="form-control" id="achternaam" name="achternaam" required>
        </div>
        <div class="mb-3">
            <label for="geboortedatum" class="form-label">Geboortedatum</label>
            <input type="date" class="form-control" id="geboortedatum" name="geboortedatum" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <button type="submit" class="btn btn-primary">Opslaan</button>
        <a href="<?= URLROOT; ?>/instructeurs/index" class="btn btn-secondary">Annuleren</a>
    </form>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>
