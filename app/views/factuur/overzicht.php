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
                        <a href="<?= URLROOT ?>/factuur/detail/<?= isset($factuur->id) ? htmlspecialchars($factuur->id) : '' ?>" class="btn btn-blue">Bekijk</a>
                        <a href="<?= URLROOT ?>/betaling/overzicht/<?= isset($factuur->id) ? htmlspecialchars($factuur->id) : '' ?>" class="btn btn-blue">Bekijk betalingen</a>
                        <a href="<?= URLROOT ?>/factuur/betalingToevoegen/<?= isset($factuur->id) ? htmlspecialchars($factuur->id) : '' ?>" class="btn btn-green">Betaling toevoegen</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="4" class="empty-message">Er zijn momenteel geen facturen beschikbaar.</td></tr>
        <?php endif; ?>
    </tbody>
</table>

<div class="navigation-links">
    <a href="<?= URLROOT ?>/dashboard/index">Terug naar dashboard</a>
    <a href="<?= URLROOT ?>/factuur/overzicht">Facturen overzicht</a>
    <a href="<?= URLROOT ?>/melding/overzicht">Meldingen overzicht</a>
</div>

<!-- Popup & homestyle -->
<style>
    body {
        background-color: #1e1e2f;
        color: #f0f0f0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        padding: 0;
    }
    h2 {
        font-size: 2.2rem;
        margin: 40px 0 16px;
        text-align: center;
        color: #ffffff;
        text-shadow: 1px 1px 3px #000;
    }
    p {
        text-align: center;
        font-size: 1rem;
        color: #ccc;
        margin-bottom: 24px;
        padding: 0 16px;
    }
    .actions-bar {
        display: flex;
        justify-content: flex-end;
        margin-bottom: 18px;
    }
    .btn-green {
        background-color: #27ae60;
        color: #fff;
        padding: 10px 18px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: bold;
        margin-right: 8px;
        transition: background 0.3s;
    }
    .btn-green:hover {
        background-color: #219150;
    }
    .alert-success {
        background: #27ae60;
        color: #fff;
        padding: 12px;
        border-radius: 8px;
        margin-bottom: 16px;
        text-align: center;
    }
    .alert-error {
        background: #e74c3c;
        color: #fff;
        padding: 12px;
        border-radius: 8px;
        margin-bottom: 16px;
        text-align: center;
    }
    table.custom-table {
        width: 100%;
        border-collapse: collapse;
        margin: 0 auto 32px auto;
        background: #23233a;
        color: #fff;
        box-shadow: 0 4px 16px rgba(0,0,0,0.2);
    }
    table.custom-table th, table.custom-table td {
        padding: 14px 12px;
        border-bottom: 1px solid #333;
        text-align: left;
    }
    table.custom-table th {
        background: #0182E2;
        color: #fff;
    }
    table.custom-table tr:last-child td {
        border-bottom: none;
    }
    .empty-message {
        text-align: center;
        color: #ffcc00;
        font-weight: bold;
    }
    .btn-blue {
        background-color: #0182E2;
        color: white;
        padding: 8px 14px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: bold;
        margin-right: 6px;
        transition: background 0.3s;
    }
    .btn-blue:hover {
        background-color: #006bb3;
    }
    .popup-overlay {
        position: fixed;
        top: 0; left: 0; right: 0; bottom: 0;
        background: rgba(30,30,47,0.85);
        z-index: 9999;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .popup-content {
        background: #23233a;
        border-radius: 18px;
        padding: 38px 32px 32px 32px;
        min-width: 340px;
        max-width: 95vw;
        box-shadow: 0 8px 32px rgba(0,0,0,0.4);
        position: relative;
        color: #fff;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        animation: fadeInPopup 0.3s;
    }
    .popup-content h3 {
        margin-top: 0;
        color: #0182E2;
        font-size: 1.5rem;
        text-align: center;
        margin-bottom: 18px;
    }
    .popup-content label {
        font-weight: bold;
        margin-bottom: 6px;
        display: block;
        color: #fff;
    }
    .popup-content input[type="date"],
    .popup-content input[type="number"],
    .popup-content select {
        width: 100%;
        padding: 8px 12px;
        border-radius: 7px;
        border: none;
        margin-bottom: 16px;
        background: #2b2b3d;
        color: #fff;
        font-size: 1rem;
    }
    .popup-content .btn {
        margin-right: 10px;
        margin-top: 8px;
    }
    .close-popup {
        position: absolute;
        top: 12px;
        right: 18px;
        font-size: 2rem;
        color: #fff;
        cursor: pointer;
        font-weight: bold;
        transition: color 0.2s;
        z-index: 10001;
    }
    .close-popup:hover {
        color: #e74c3c;
    }
    @keyframes fadeInPopup {
        from { opacity: 0; transform: scale(0.95);}
        to { opacity: 1; transform: scale(1);}
    }
    @media (max-width: 768px) {
        li {
            padding: 16px;
            font-size: 0.95rem;
        }
        .button-group {
            flex-direction: column;
            align-items: stretch;
        }
        .btn {
            width: 100%;
            min-width: auto;
            text-align: center;
        }
        .navigation-links {
            flex-direction: column;
            gap: 12px;
        }
        h2 {
            font-size: 1.8rem;
        }
        p {
            font-size: 0.95rem;
        }
        .feedback-message {
            font-size: 1rem;
            padding: 24px 10px 16px 10px;
        }
    }
</style>
<script>
    // Popup open/close logic
    document.getElementById('openFactuurPopup').onclick = function() {
        document.getElementById('factuurPopupOverlay').style.display = 'flex';
    };
    document.getElementById('closeFactuurPopup').onclick = function() {
        document.getElementById('factuurPopupOverlay').style.display = 'none';
    };
    document.getElementById('annuleerFactuurPopup').onclick = function() {
        document.getElementById('factuurPopupOverlay').style.display = 'none';
    };
    // Sluit popup bij klik buiten popup-content
    document.getElementById('factuurPopupOverlay').onclick = function(e) {
        if (e.target === this) this.style.display = 'none';
    };
</script>
