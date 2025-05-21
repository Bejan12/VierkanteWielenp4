<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<div class="user-overview-page">
    <h2>Gebruikersoverzicht</h2>
    <table class="custom-table">
        <thead>
            <tr>
                <th>E-mail</th>
                <th>Gebruikersnaam</th>
                <th>Wachtwoord</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($data['users'])): ?>
                <?php foreach ($data['users'] as $user): ?>
                    <tr>
                        <td><?= htmlspecialchars($user->Email ?? ''); ?></td>
                        <td><?= htmlspecialchars($user->Gebruikersnaam); ?></td>
                        <td><?= str_repeat('*', strlen($user->Wachtwoord)); ?></td>
                        <td>
                            <div class="icon-wrapper">
                                <i class="bi bi-pencil-square action-icon edit-icon" title="Wijzig"></i>
                                <i class="bi bi-trash-fill action-icon delete-icon" title="Verwijder"></i>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="no-users">Geen gebruikers gevonden.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<style>
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
    }

    .user-overview-page h2 {
        font-size: 2rem;
        margin-bottom: 30px;
        text-align: center;
        color: #ffffff;
        text-shadow: 1px 1px 3px #000;
    }

    .custom-table {
        width: 100%;
        border-collapse: collapse;
        background-color: #2b2b3d;
        border-radius: 12px;
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

    .icon-wrapper {
        display: flex;
        justify-content: flex-end;
        gap: 12px;
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

    .no-users {
        text-align: center;
        padding: 20px;
        font-style: italic;
        color: #bbb;
    }
</style>
