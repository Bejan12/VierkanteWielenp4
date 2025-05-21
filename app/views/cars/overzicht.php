<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<!-- Terug-pijl linksboven -->
<a href="<?= URLROOT; ?>/dashboard/index" class="back-arrow">
    <i class="bi bi-arrow-left"></i>
</a>

<div class="user-overview-page">
    <h2>Auto's overzicht</h2>

    <?php if (!empty($data['autos'])): ?>
        <table class="custom-table">
            <thead>
                <tr>
                    <th>Merk</th>
                    <th>Type</th>
                    <th>Kenteken</th>
                    <th>Brandstof</th>
                    <th class="centered-header">Acties</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['autos'] as $auto): ?>
                    <tr>
                        <td><?= htmlspecialchars($auto->Merk); ?></td>
                        <td><?= htmlspecialchars($auto->Type); ?></td>
                        <td><?= htmlspecialchars($auto->Kenteken); ?></td>
                        <td><?= htmlspecialchars($auto->Brandstof); ?></td>
                        <td class="centered-cell">
                            <div class="icon-wrapper">
                                <i class="bi bi-pencil-square action-icon edit-icon" title="Wijzig"></i>
                                <i class="bi bi-trash-fill action-icon delete-icon" title="Verwijder"></i>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="<?= URLROOT; ?>/dashboard/index" class="btn btn-secondary" style="margin-top: 24px;">Terug naar dashboard</a>
    <?php else: ?>
        <div class="no-users-message">
            <p>Er zijn nog geen auto's beschikbaar.</p>
            
            <div class="progress-bar">
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
    /* Styling terug-pijl */
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
    .user-overview-page h2 {
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
    .centered-header {
        text-align: center;
    }
    .centered-cell {
        text-align: center;
    }
    .icon-wrapper {
        display: inline-flex;
        justify-content: flex-start;
        gap: 12px;
        width: 100%;
    }
    .action-icon {
        font-size: 1.2rem;
        cursor: pointer;
        transition: color 0.2s ease;
    }
    .edit-icon {
        color: #4da6ff;
    }
    .edit-icon:hover {
        color: #80cfff;
    }
    .delete-icon {
        color: #ff4d4d;
    }
    .delete-icon:hover {
        color: #ff7f7f;
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
