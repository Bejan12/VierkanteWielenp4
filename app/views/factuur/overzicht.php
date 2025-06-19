<?php require_once APPROOT . '/views/layout.php'; ?>

<h2>Mijn Facturen</h2>
<p>Hier kunt u een overzicht vinden van al uw facturen. Klik op een factuur om de details te bekijken of betalingen te beheren.</p>

<!-- Popup trigger -->
<div class="actions-bar">
    <button id="openFactuurPopup" class="btn btn-green">Factuur aanmaken</button>
</div>

<!-- Popup overlay -->
<div id="factuurPopupOverlay" class="popup-overlay" style="display:none;">
    <div class="popup-content">
        <span class="close-popup" id="closeFactuurPopup">&times;</span>
        <h3>Nieuwe Factuur Aanmaken</h3>
        <form method="post" action="<?= URLROOT ?>/factuur/create" class="factuur-aanmaak-form">
            <label for="datum">Datum:</label>
            <input type="date" name="datum" required>
            <label for="bedrag">Bedrag (incl. btw):</label>
            <input type="number" name="bedrag" step="0.01" required>
            <label for="status">Status:</label>
            <select name="status" required>
                <option value="Open">Open</option>
                <option value="Betaald">Betaald</option>
            </select>
            <label for="inschrijvingId">Klant:</label>
            <select name="inschrijvingId" required>
                <option value="">Selecteer klant</option>
                <?php foreach ($data['inschrijvingen'] as $inschrijving): ?>
                    <option value="<?= htmlspecialchars($inschrijving->Id) ?>">
                        <?= htmlspecialchars($inschrijving->naam) ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <button type="submit" class="btn btn-green">Aanmaken</button>
            <button type="button" id="annuleerFactuurPopup" class="btn btn-blue">Annuleren</button>
        </form>
    </div>
</div>

<?php if (!empty($data['success'])): ?>
    <div class="alert alert-success">
        <?= htmlspecialchars($data['success']) ?>
    </div>
<?php endif; ?>
<?php if (!empty($data['error'])): ?>
    <div class="alert alert-error">
        <?= htmlspecialchars($data['error']) ?>
    </div>
<?php endif; ?>

<table class="custom-table" role="table" aria-label="Facturen overzicht">
    <thead>
        <tr>
            <th>Factuurnummer</th>
            <th>Datum</th>
            <th>Status</th>
            <th>Acties</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($data['facturen'])): ?>
            <?php foreach ($data['facturen'] as $factuur): ?>
                <tr>
                    <td><?= isset($factuur->nummer) ? htmlspecialchars($factuur->nummer) : '' ?></td>
                    <td><?= isset($factuur->datum) ? htmlspecialchars($factuur->datum) : '' ?></td>
                    <td><?= isset($factuur->status) ? htmlspecialchars($factuur->status) : '' ?></td>
                    <td>
                        <a href="<?= URLROOT ?>/factuur/detail/<?= htmlspecialchars($factuur->id) ?>" class="btn btn-blue">Bekijk</a>
                        <a href="<?= URLROOT ?>/betaling/overzicht/<?= htmlspecialchars($factuur->id) ?>" class="btn btn-blue">Bekijk betalingen</a>
                        <a href="<?= URLROOT ?>/factuur/betalingToevoegen/<?= htmlspecialchars($factuur->id) ?>" class="btn btn-green">Betaling toevoegen</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="4" class="empty-message">Er zijn momenteel geen facturen beschikbaar.</td></tr>
        <?php endif; ?>
    </tbody>
</table>

<?php if (!empty($data['feedback'])): ?>
    <div class="feedback-message" id="feedbackMessage">
        <?= htmlspecialchars($data['feedback']) ?>
        <div class="progress-bar">
            <div class="progress-fill"></div>
        </div>
    </div>
    <script>
        setTimeout(function() {
            window.location.href = "<?= URLROOT; ?>/factuur/overzicht";
        }, 4000);

        const progressFill = document.querySelector('.feedback-message .progress-fill');
        if (progressFill) {
            progressFill.style.width = '100%';
            let start = null;
            function animate(timestamp) {
                if (!start) start = timestamp;
                let progress = timestamp - start;
                let percentage = Math.max(100 - progress / 40, 0);
                progressFill.style.width = percentage + '%';
                if (progress < 4000) {
                    requestAnimationFrame(animate);
                }
            }
            requestAnimationFrame(animate);
        }
    </script>
<?php endif; ?>

<div class="navigation-links">
    <a href="<?= URLROOT ?>/dashboard/index">Terug naar dashboard</a>
    <a href="<?= URLROOT ?>/factuur/overzicht">Facturen overzicht</a>
    <a href="<?= URLROOT ?>/melding/overzicht">Meldingen overzicht</a>
</div>

<!-- Popup logica -->
<script>
    document.getElementById('openFactuurPopup').onclick = () => {
        document.getElementById('factuurPopupOverlay').style.display = 'flex';
    };
    document.getElementById('closeFactuurPopup').onclick =
    document.getElementById('annuleerFactuurPopup').onclick =
    () => {
        document.getElementById('factuurPopupOverlay').style.display = 'none';
    };
    document.getElementById('factuurPopupOverlay').onclick = (e) => {
        if (e.target === e.currentTarget) e.currentTarget.style.display = 'none';
    };
</script>
