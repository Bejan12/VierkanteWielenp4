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

<!-- Terugkoppeling melding -->
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

        // Progress bar animatie
        const progressFill = document.querySelector('.feedback-message .progress-fill');
        if (progressFill) {
            progressFill.style.width = '100%';
            let start = null;
            function animate(timestamp) {
                if (!start) start = timestamp;
                let progress = timestamp - start;
                let percentage = Math.max(100 - progress / 40, 0); // 4000ms = 100%
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
    ul {
        list-style: none;
        padding: 0;
        max-width: 1000px;
        margin: 0 auto 32px;
    }
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
    li span {
        display: block;
        font-weight: normal;
    }
    li strong {
        color: #ffffff;
        font-weight: 700;
    }
    li.empty-message {
        text-align: center;
        font-style: italic;
        color: #888;
        font-weight: 500;
    }
    .button-group {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-top: 12px;
    }
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
    .btn:hover {
        background-color: #006bb3;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }
    .btn:focus {
        outline: 2px solid #fff;
        outline-offset: 2px;
    }
    .error {
        color: #ff4c4c;
        font-weight: bold;
        text-align: center;
        margin-bottom: 16px;
        text-shadow: 0 0 5px rgba(255, 0, 0, 0.5);
    }
    .center {
        text-align: center;
        margin-bottom: 24px;
    }
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
    /* Feedback melding styling */
    .feedback-message {
        margin: 40px auto 0;
        background: #2b2b3d;
        color: #fff;
        font-size: 1.2rem;
        font-weight: bold;
        text-align: center;
        border-radius: 10px;
        padding: 32px 24px 24px 24px;
        max-width: 500px;
        box-shadow: 0 0 20px rgba(0,0,0,0.2);
        position: relative;
    }
    .progress-bar {
        width: 100%;
        height: 6px;
        background: #444;
        border-radius: 4px;
        margin-top: 18px;
        overflow: hidden;
    }
    .progress-fill {
        height: 100%;
        background: linear-gradient(90deg, #0182E2, #005fa3);
        width: 100%;
        transition: width 0.2s linear;
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