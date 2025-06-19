<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container mt-3">
    <div class="row mb-3">
        <div class="col-3"></div>
        <div class="col-6">
            <h3><?= $data['title']; ?></h3>
            <?php if (!empty($data['error'])): ?>
                <div class="alert alert-danger"><?= $data['error']; ?></div>
            <?php elseif (!empty($data['success'])): ?>
                <div class="alert alert-success"><?= $data['success']; ?></div>
            <?php endif; ?>
            <form method="post">
                <div class="mb-3">
                    <label for="datum" class="form-label">Datum</label>
                    <input type="date" name="datum" id="datum" class="form-control" value="<?= htmlspecialchars($data['datum']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="tijd" class="form-label">Tijd</label>
                    <input type="time" name="tijd" id="tijd" class="form-control" value="<?= htmlspecialchars($data['tijd']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="instructeurId" class="form-label">Instructeur</label>
                    <select name="instructeurId" id="instructeurId" class="form-control" required>
                        <option value="">Selecteer een instructeur</option>
                        <?php foreach ($data['instructeurs'] as $inst): ?>
                            <option value="<?= $inst->Id; ?>" <?= $data['instructeurId'] == $inst->Id ? 'selected' : ''; ?>>
                                <?= htmlspecialchars($inst->Voornaam . ' ' . $inst->Achternaam); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">Inplannen</button>
                </div>
            </form>
        </div>
        <div class="col-3"></div>
    </div>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>
