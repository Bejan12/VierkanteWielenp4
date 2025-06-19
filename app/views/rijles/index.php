<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container mt-3">
    <div class="row mb-3">
        <div class="col-12">
            <h3><?= $data['title']; ?></h3>
            <a href="<?= URLROOT; ?>/rijles/create" class="btn btn-success mb-3">Nieuwe rijles maken</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Datum</th>
                        <th>Tijd</th>
                        <th>Instructeur</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['rijlessen'] as $rijles): ?>
                        <tr>
                            <td><?= htmlspecialchars($rijles->Begindatum ?? ''); ?></td>
                            <td><?= htmlspecialchars(substr($rijles->Begintijd ?? '', 0, 5)); ?></td>
                            <td><?= htmlspecialchars(($rijles->Voornaam ?? '') . ' ' . ($rijles->Achternaam ?? '')); ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if (empty($data['rijlessen'])): ?>
                        <tr>
                            <td colspan="3" class="text-center">Geen rijlessen gevonden.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <a href="<?= URLROOT; ?>/homepages/index" class="btn btn-secondary">Terug naar home</a>
        </div>
    </div>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>
