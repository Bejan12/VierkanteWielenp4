<?php require_once APPROOT . '/views/layout.php'; ?>

<!-- Terug-pijl linksboven -->
<a href="<?= htmlspecialchars(URLROOT); ?>/factuur/overzicht" class="back-arrow">
    <i class="bi bi-arrow-left"></i>
</a>

<div class="factuur-details-page">
    <h2>Factuur Details</h2>

    <div class="factuur-detail-container">
        <p><strong>Factuurnummer:</strong> <?= isset($data['factuur']->nummer) ? htmlspecialchars($data['factuur']->nummer) : 'Onbekend' ?></p>
        <p><strong>Datum:</strong> <?= isset($data['factuur']->datum) ? htmlspecialchars($data['factuur']->datum) : 'Onbekend' ?></p>
        <p><strong>Klant:</strong> <?= isset($data['factuur']->klant_naam) ? htmlspecialchars($data['factuur']->klant_naam) : 'Onbekend' ?></p>
        <p><strong>Totaalbedrag:</strong> €<?= isset($data['factuur']->totaal) ? htmlspecialchars($data['factuur']->totaal) : '0.00' ?></p>

        <button onclick="window.print()" class="btn btn-blue">🖨️ Print factuur</button>
    </div>

    <div class="navigation-links">
        <a href="<?= URLROOT ?>/factuur/overzicht" class="btn">Terug naar overzicht</a>
        <a href="<?= URLROOT ?>/dashboard/index" class="btn">Dashboard</a>
    </div>
</div>

<style>
    body {
        background-color: #1e1e2f;
        color: #f0f0f0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        padding: 0;
    }

    h2 {
        font-size: 2rem;
        margin-bottom: 30px;
        text-align: center;
        color: #ffffff;
        text-shadow: 1px 1px 3px #000;
    }

    .factuur-details-page {
        padding: 60px 20px;
        max-width: 800px;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .factuur-detail-container {
        background: #2b2b3d;
        border-radius: 16px;
        padding: 32px;
        width: 100%;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
    }

    .factuur-detail-container p {
        font-size: 1.15rem;
        margin-bottom: 14px;
        line-height: 1.6;
    }

    .btn {
        background-color: #0182E2;
        color: white;
        padding: 10px 20px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: bold;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        display: inline-block;
        text-align: center;
    }

    .btn:hover {
        background-color: #006bb3;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    }

    .btn-blue {
        background: linear-gradient(145deg, #0182E2, #005fa3);
        padding: 12px 24px;
        font-size: 1rem;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        border-radius: 12px;
        margin-top: 20px;
    }

    .btn-blue:hover {
        background: linear-gradient(145deg, #1a96f0, #0071c2);
    }

    .navigation-links {
        margin-top: 40px;
        display: flex;
        flex-wrap: wrap;
        gap: 16px;
        justify-content: center;
    }

    .back-arrow {
        position: fixed;
        top: 20px;
        left: 20px;
        font-size: 40px;
        color: #ccc;
        text-decoration: none;
        z-index: 1100;
        transition: color 0.3s ease, transform 0.3s ease;
    }

    .back-arrow:hover {
        color: #ffffff;
        transform: scale(1.1);
    }

    /* Responsive Styling */
    @media (max-width: 768px) {
        .factuur-detail-container {
            padding: 24px;
        }

        .btn, .btn-blue {
            width: 100%;
            text-align: center;
        }

        .back-arrow {
            font-size: 32px;
        }
    }
</style>
