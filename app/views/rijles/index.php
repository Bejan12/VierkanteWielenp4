<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<!-- Terug-pijl linksboven -->
<a href="<?= URLROOT; ?>/dashboard/index" class="back-arrow" title="Terug naar dashboard">
    <i class="bi bi-arrow-left"></i>
</a>

<div class="user-overview-page">
    <h2>Overzicht Rijlessen</h2>

    <div style="width: 100%; display: flex; justify-content: flex-end; margin-bottom: 20px;">
        <a href="<?= URLROOT; ?>/rijles/create" class="btn-green">
            <i class="bi bi-plus-circle"></i> Nieuwe rijles maken
        </a>
    </div>

    <?php if (!empty($data['rijlessen'])): ?>
        <table class="custom-table" role="table" aria-label="Rijlessen overzicht">
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
            </tbody>
        </table>
    <?php else: ?>
        <div class="no-users-message" role="alert" aria-live="polite">
            <p>Er zijn nog geen rijlessen beschikbaar.</p>
            <div class="progress-bar" aria-hidden="true">
                <div class="progress-fill"></div>
            </div>
        </div>
        <script>
            setTimeout(function() {
                window.location.href = "<?= URLROOT; ?>/dashboard/index";
            }, 5000);

            const progressFill = document.querySelector('.progress-fill');
            progressFill.style.width = '100%';

            let start = null;
            function animate(timestamp) {
                if (!start) start = timestamp;
                let progress = timestamp - start;
                let percentage = Math.max(100 - progress / 50, 0);
                progressFill.style.width = percentage + '%';

                if (progress < 5000) {
                    requestAnimationFrame(animate);
                }
            }
            requestAnimationFrame(animate);
        </script>
    <?php endif; ?>
</div>

<style>
    .back-arrow {
        position: fixed;
        top: 20px;
        left: 20px;
        font-size: 48px;
        color: #ccc;
        text-decoration: none;
        z-index: 1100;
        transition: color 0.3s ease;
    }
    .back-arrow:hover {
        color: #fff;
    }

    body {
        background-color: #1e1e2f;
        color: #f0f0f0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        padding: 0;
    }

    .user-overview-page {
        padding: 60px 40px;
        max-width: 1200px;
        margin: 0 auto;
        min-height: 300px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
    }

    h2 {
        font-size: 2rem;
        margin-bottom: 30px;
        text-align: center;
        color: #ffffff;
        text-shadow: 1px 1px 3px #000;
        width: 100%;
    }

    .custom-table {
        width: 100%;
        border-collapse: collapse;
        background-color: #2b2b3d;
        overflow: hidden;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
    }

    .custom-table th,
    .custom-table td {
        padding: 16px 20px;
        text-align: left;
    }

    .custom-table thead {
        background: linear-gradient(145deg, #0182E2, #005fa3);
        color: #fff;
    }

    .custom-table tbody tr {
        border-bottom: 1px solid #444;
    }

    .custom-table tbody tr:hover {
        background-color: #3a3a5c;
    }

    .custom-table td {
        color: #e0e0e0;
        font-size: 1rem;
    }

    .btn-green {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background-color: #27ae60;
        color: #fff;
        font-weight: 600;
        padding: 12px 24px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 1.1rem;
        box-shadow: 0 2px 8px rgba(39,174,96,0.15);
        transition: background 0.2s, color 0.2s;
        border: none;
        cursor: pointer;
    }
    .btn-green:hover {
        background-color: #219150;
        color: #fff;
        text-decoration: none;
    }

    .no-users-message {
        margin-top: 100px;
        background: #2b2b3d;
        padding: 40px 60px;
        box-shadow: 0 0 20px rgba(255, 255, 255, 0.1);
        color: #ccc;
        font-size: 1.4rem;
        font-style: italic;
        text-align: center;
        max-width: 600px;
    }

    .no-users-message p {
        margin: 12px 0;
    }

    .progress-bar {
        width: 100%;
        height: 8px;
        background-color: #444a6a;
        border-radius: 8px;
        overflow: hidden;
        margin-top: 20px;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }

    .progress-fill {
        height: 100%;
        background: linear-gradient(90deg, #0182E2, #005fa3);
        width: 100%;
        border-radius: 8px 0 0 8px;
        transition: width 0.1s linear;
    }
</style>
