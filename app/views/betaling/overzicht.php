<?php require_once APPROOT . '/views/layout.php'; ?>

<h2>Betalingen</h2>
<p><strong>Status:</strong> <?= $data['status'] ?></p>

<<<<<<< HEAD
<?php if ($data['melding']): ?>
    <p class="error">⚠️ <?= $data['melding'] ?></p>
<?php endif; ?>

<a href="<?= URLROOT ?>/factuur/overzicht" class="btn">Terug naar facturen</a>
=======
<?php
// Popup melding bepalen
$popupMessage = '';
$popupType = '';
if (!empty($data['melding'])) {
    $popupMessage = $data['melding'];
    $popupType = 'error';
} elseif (isset($_GET['success'])) {
    $popupMessage = htmlspecialchars($_GET['success']);
    $popupType = 'success';
} elseif (isset($_GET['error'])) {
    $popupMessage = htmlspecialchars($_GET['error']);
    $popupType = 'error';
}
?>

<?php if ($popupMessage): ?>
    <div id="betalingPopup" class="betaling-popup <?= $popupType ?>">
        <?= $popupMessage ?>
        <div class="progress-bar"></div>
    </div>
    <script>
        setTimeout(function () {
            const el = document.getElementById('betalingPopup');
            if (el) {
                   el.style.animation = 'fadeOutAlert 0.5s ease-in forwards';
                setTimeout(() => el.remove(), 500);
            }
        }, 3000);
    </script>
<?php endif; ?>

<a href="<?= URLROOT ?>/factuur/overzicht" class="btn">Terug naar facturen</a>
<a href="<?= URLROOT ?>/betaling/create/<?= htmlspecialchars($data['factuurId'] ?? $_GET['factuurId'] ?? $data['betalingen'][0]->factuur_id ?? '') ?>" class="btn btn-green">Nieuwe betaling toevoegen</a>
>>>>>>> b429e29 (Mijn wijzigingen toegevoegd aan main branch)

<ul>
    <?php if (empty($data['betalingen'])): ?>
        <li class="no-payment">⚠️ Nog geen betaling geregistreerd voor deze factuur.</li>
    <?php else: ?>
        <?php foreach ($data['betalingen'] as $betaling): ?>
            <li>
<<<<<<< HEAD
                <strong>Betaling ID:</strong> <?= htmlspecialchars($betaling->id ?? 'Onbekend') ?> |
=======
>>>>>>> b429e29 (Mijn wijzigingen toegevoegd aan main branch)
                <strong>Datum:</strong> <?= htmlspecialchars($betaling->datum ?? 'Onbekend') ?> |
                <strong>Bedrag:</strong> €<?= htmlspecialchars($betaling->bedrag ?? '0.00') ?> |
                <strong>Status:</strong> <?= htmlspecialchars($betaling->status ?? 'Onbekend') ?>
                <?= $betaling->actief
                    ? '<span class="badge badge-green">(Actief)</span>'
                    : '<span class="badge badge-gray">(Inactief)</span>'
                ?>
            </li>
        <?php endforeach; ?>
    <?php endif; ?>
</ul>

<div class="navigation-links">
    <a href="<?= URLROOT ?>/dashboard/index">Terug naar dashboard</a>
    <a href="<?= URLROOT ?>/factuur/overzicht">Facturen overzicht</a>
    <a href="<?= URLROOT ?>/melding/overzicht">Meldingen overzicht</a>
</div>

<style>
    body {
        background-color: #1e1e2f;
        color: #f0f0f0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    h2 {
        font-size: 2rem;
        margin-top: 40px;
        margin-bottom: 16px;
        text-align: center;
        color: #ffffff;
        text-shadow: 1px 1px 3px #000;
    }

    p {
        text-align: center;
        font-size: 1rem;
        color: #ccc;
        margin-bottom: 24px;
    }

    .error {
        color: red;
        font-weight: bold;
        text-align: center;
        margin-bottom: 20px;
    }

    .btn {
        background-color: #0182E2;
        color: white;
        padding: 10px 16px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: bold;
        transition: background-color 0.3s ease;
        display: inline-block;
        margin: 12px auto;
        text-align: center;
    }

    .btn:hover {
        background-color: #006bb3;
    }

<<<<<<< HEAD
=======
    .btn-green {
        background-color: #4caf50;
    }

    .btn-green:hover {
        background-color: #45a049;
    }

>>>>>>> b429e29 (Mijn wijzigingen toegevoegd aan main branch)
    ul {
        list-style: none;
        padding: 0;
        max-width: 1000px;
        margin: 0 auto 32px auto;
    }

    li {
        background-color: #2b2b3d;
        margin-bottom: 16px;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.3);
        font-size: 1rem;
        line-height: 1.6;
    }

    .no-payment {
        text-align: center;
        font-weight: bold;
        color: #ffcc00;
    }

    .badge {
        font-weight: bold;
        padding-left: 8px;
    }

    .badge-green {
        color: #4caf50;
    }

    .badge-gray {
        color: #999;
    }

    .navigation-links {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 16px;
        margin-bottom: 40px;
    }

    .navigation-links a {
        background-color: #005fa3;
        padding: 10px 20px;
        border-radius: 8px;
        color: #fff;
        font-weight: bold;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .navigation-links a:hover {
        background-color: #0071c2;
    }
<<<<<<< HEAD
=======

    /* Popup styling */
    .betaling-popup {
        position: fixed;
        top: 40px;
        left: 50%;
        transform: translateX(-50%) translateY(-20px);
        min-width: 350px;
        max-width: 90vw;
        z-index: 9999;
        padding: 22px 40px 18px 40px;
        border-radius: 14px;
        font-size: 1.15rem;
        font-weight: bold;
        text-align: center;
        box-shadow: 0 8px 24px rgba(0,0,0,0.2);
        opacity: 0;
        animation: fadeInAlert 0.5s ease-out forwards;
        overflow: hidden;
    }
    .betaling-popup.success {
        background: #27ae60;
        color: #fff;
    }
    .betaling-popup.error {
        background: #e74c3c;
        color: #fff;
    }
    .betaling-popup .progress-bar {
        height: 5px;
        background-color: rgba(255,255,255,0.7);
        position: absolute;
        bottom: 0;
        left: 0;
        animation: progressShrink 3s linear forwards;
        width: 100%;
    }
    @keyframes fadeInAlert {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    @keyframes fadeOutAlert {
        to {
            opacity: 0;
            transform: translateY(-20px);
        }
    }
    @keyframes progressShrink {
        from {
            width: 100%;
        }
        to {
            width: 0%;
        }
    }
>>>>>>> b429e29 (Mijn wijzigingen toegevoegd aan main branch)
</style>
