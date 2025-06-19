<?php require_once APPROOT . '/views/layout.php'; ?>

<<<<<<< HEAD
=======
<?php if (!empty($_SESSION['melding_success'])): ?>
    <div class="alert alert-success"><?= $_SESSION['melding_success']; unset($_SESSION['melding_success']); ?></div>
<?php endif; ?>
<?php if (!empty($_SESSION['melding_error'])): ?>
    <div class="alert alert-error"><?= $_SESSION['melding_error']; unset($_SESSION['melding_error']); ?></div>
<?php endif; ?>

>>>>>>> b429e29 (Mijn wijzigingen toegevoegd aan main branch)
<h2>Meldingen Overzicht</h2>

<form method="GET" action="" class="filter-form">
    <label for="filter-datum">Filter op datum:</label>
    <input type="date" id="filter-datum" name="datum" value="<?= htmlspecialchars($_GET['datum'] ?? '') ?>">
    <button type="submit" class="btn">Filter</button>
</form>

<?php if (isset($data['melding'])): ?>
    <p class="error">⚠️ <?= $data['melding'] ?></p>
    <a href="<?= URLROOT ?>/melding/overzicht" class="btn">Terug naar meldingen</a>
<?php else: ?>
    <?php if (empty($data['meldingen'])): ?>
        <p class="no-melding">Geen meldingen beschikbaar.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($data['meldingen'] as $melding): ?>
                <li>
                    <strong>Beschrijving:</strong> <?= htmlspecialchars($melding->beschrijving) ?> |
                    <strong>Datum:</strong> <?= htmlspecialchars($melding->datum) ?>
                    <?= $melding->actief
                        ? '<span class="badge badge-green">(Actief)</span>'
                        : '<span class="badge badge-gray">(Inactief)</span>' ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
<?php endif; ?>

<div class="navigation-links">
    <a href="<?= URLROOT ?>/dashboard/index">Terug naar dashboard</a>
    <a href="<?= URLROOT ?>/factuur/overzicht">Facturen overzicht</a>
    <a href="<?= URLROOT ?>/melding/overzicht">Meldingen overzicht</a>
</div>

<<<<<<< HEAD
=======
<div class="actions-bar">
    <a href="<?= URLROOT ?>/melding/create" class="btn btn-green">Nieuwe melding opstellen</a>
</div>

>>>>>>> b429e29 (Mijn wijzigingen toegevoegd aan main branch)
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

    .filter-form {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 12px;
        margin-bottom: 24px;
        flex-wrap: wrap;
    }

    .filter-form label {
        font-weight: bold;
    }

    .filter-form input[type="date"] {
        padding: 6px 10px;
        border-radius: 6px;
        border: none;
        font-size: 1rem;
    }

    .btn {
        background-color: #0182E2;
        color: white;
        padding: 10px 16px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: bold;
        transition: background-color 0.3s ease;
        border: none;
        cursor: pointer;
    }

    .btn:hover {
        background-color: #006bb3;
    }

    .error {
        color: red;
        font-weight: bold;
        text-align: center;
        margin-bottom: 16px;
    }

    .no-melding {
        text-align: center;
        color: #ffcc00;
        font-weight: bold;
    }

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

    .actions-bar {
        text-align: center;
        margin-top: 24px;
    }

    .btn-green {
        background-color: #4caf50;
    }

    .btn-green:hover {
        background-color: #45a049;
    }

    .alert-success {
        background: #27ae60;
        color: #fff;
        padding: 16px;
        border-radius: 8px;
        margin-bottom: 18px;
        text-align: center;
        font-size: 1.1rem;
        font-weight: bold;
        box-shadow: 0 2px 8px rgba(39,174,96,0.15);
    }
    .alert-error {
        background: #e74c3c;
        color: #fff;
        padding: 16px;
        border-radius: 8px;
        margin-bottom: 18px;
        text-align: center;
        font-size: 1.1rem;
        font-weight: bold;
        box-shadow: 0 2px 8px rgba(231,76,60,0.15);
    }
>>>>>>> b429e29 (Mijn wijzigingen toegevoegd aan main branch)
</style>
