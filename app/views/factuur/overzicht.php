<?php require_once APPROOT . '/views/layout.php'; ?>

<h2>Mijn Facturen</h2>
<p>Hier kunt u een overzicht vinden van al uw facturen. Klik op een factuur om de details te bekijken of betalingen te beheren.</p>

<?php if (!empty($data['error'])): ?>
    <p class="error">⚠️ <?= htmlspecialchars($data['error']) ?></p>
    <div class="center">
        <a href="<?= URLROOT ?>/factuur/overzicht" class="btn">Terug naar overzicht</a>
    </div>
<?php endif; ?>

<ul>
    <!-- Voorbeeldfactuur hardcoded -->
    <li>
        <span><strong>Factuurnummer:</strong> 5</span>
        <span><strong>Datum:</strong> 2024-05-10</span>
        <span><strong>Status:</strong> Open</span>
        <div class="button-group">
            <a href="<?= URLROOT ?>/factuur/detail/5" class="btn">Bekijk</a>
            <a href="<?= URLROOT ?>/betaling/overzicht/5" class="btn">Bekijk betalingen</a>
        </div>
    </li>

    <?php if (!empty($data['facturen'])): ?>
        <?php foreach ($data['facturen'] as $factuur): ?>
            <li>
                <span><strong>Factuurnummer:</strong> <?= htmlspecialchars($factuur->id) ?></span>
                <span><strong>Datum:</strong> <?= htmlspecialchars($factuur->datum) ?></span>
                <span><strong>Status:</strong> <?= htmlspecialchars($factuur->status) ?></span>
                <div class="button-group">
                    <a href="<?= URLROOT ?>/factuur/detail/<?= htmlspecialchars($factuur->id) ?>" class="btn">Bekijk</a>
                    <a href="<?= URLROOT ?>/betaling/overzicht/<?= htmlspecialchars($factuur->id) ?>" class="btn">Bekijk betalingen</a>
                </div>
            </li>
        <?php endforeach; ?>
    <?php else: ?>
        <li class="empty-message">Er zijn momenteel geen facturen beschikbaar.</li>
    <?php endif; ?>
</ul>

<div class="navigation-links">
    <a href="<?= URLROOT ?>/dashboard/index">Terug naar dashboard</a>
    <a href="<?= URLROOT ?>/factuur/overzicht">Facturen overzicht</a>
    <a href="<?= URLROOT ?>/melding/overzicht">Meldingen overzicht</a>
</div>

<style>
    /* Algemene body styling */
    body {
        background-color: #1e1e2f;
        color: #f0f0f0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        padding: 0;
    }

    /* Titel */
    h2 {
        font-size: 2.2rem;
        margin: 40px 0 16px;
        text-align: center;
        color: #ffffff;
        text-shadow: 1px 1px 3px #000;
    }

    /* Introductie tekst */
    p {
        text-align: center;
        font-size: 1rem;
        color: #ccc;
        margin-bottom: 24px;
        padding: 0 16px;
    }

    /* Facturen lijst */
    ul {
        list-style: none;
        padding: 0;
        max-width: 1000px;
        margin: 0 auto 32px;
    }

    /* Elk factuur item */
    li {
        background-color: #2b2b3d;
        margin-bottom: 16px;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.3);
        font-size: 1rem;
        line-height: 1.6;
        display: flex;
        flex-direction: column;
        gap: 8px;
        word-wrap: break-word;
        color: #f0f0f0;
    }

    /* Specifiek factuur details */
    li span {
        display: block;
        font-weight: normal;
    }

    /* Labels */
    li strong {
        color: #ffffff;
        font-weight: 700;
    }

    /* Lege lijst melding */
    li.empty-message {
        text-align: center;
        font-style: italic;
        color: #888;
        font-weight: 500;
    }

    /* Knop groep */
    .button-group {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-top: 12px;
    }

    /* Buttons */
    .btn {
        background-color: #0182E2;
        color: white;
        padding: 10px 18px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: bold;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        display: inline-block;
        text-align: center;
        min-width: 120px;
        user-select: none;
    }

    /* Hover effecten */
    .btn:hover {
        background-color: #006bb3;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }

    /* Focus zichtbaarheid */
    .btn:focus {
        outline: 2px solid #fff;
        outline-offset: 2px;
    }

    /* Foutmelding */
    .error {
        color: #ff4c4c;
        font-weight: bold;
        text-align: center;
        margin-bottom: 16px;
        text-shadow: 0 0 5px rgba(255, 0, 0, 0.5);
    }

    /* Centreringshulpmiddel */
    .center {
        text-align: center;
        margin-bottom: 24px;
    }

    /* Navigatie links */
    .navigation-links {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 16px;
        margin: 40px 0;
    }

    .navigation-links a {
        background-color: #005fa3;
        padding: 10px 22px;
        border-radius: 8px;
        color: #fff;
        font-weight: bold;
        text-decoration: none;
        transition: background-color 0.3s ease, transform 0.3s ease;
        user-select: none;
    }

    .navigation-links a:hover {
        background-color: #0071c2;
        transform: scale(1.05);
    }

    /* Responsive styling */
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
    }
</style>
