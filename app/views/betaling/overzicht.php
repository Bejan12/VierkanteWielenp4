<?php require_once APPROOT . '/views/layout.php'; ?>

<h2>Betalingen</h2>
<p><strong>Status:</strong> <?= $data['status'] ?></p>

<?php if ($data['melding']): ?>
    <p class="error">⚠️ <?= $data['melding'] ?></p>
<?php endif; ?>

<a href="<?= URLROOT ?>/factuur/overzicht" class="btn">Terug naar facturen</a>

<ul>
    <?php if (empty($data['betalingen'])): ?>
        <li class="no-payment">⚠️ Nog geen betaling geregistreerd voor deze factuur.</li>
    <?php else: ?>
        <?php foreach ($data['betalingen'] as $betaling): ?>
            <li>
                <strong>Betaling ID:</strong> <?= htmlspecialchars($betaling->id ?? 'Onbekend') ?> |
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
</style>
