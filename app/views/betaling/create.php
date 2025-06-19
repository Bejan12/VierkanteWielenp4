<?php require_once APPROOT . '/views/layout.php'; ?>
<h2>Nieuwe Betaling Toevoegen</h2>
<?php if (!empty($_GET['success'])): ?>
    <div class="alert alert-success">
        <?= htmlspecialchars($_GET['success']) ?>
    </div>
<?php endif; ?>
<form method="post">
    <input type="hidden" name="factuurId" value="<?= htmlspecialchars($factuurId ?? '') ?>">
    <div>
        <label>Factuurnummer:</label>
        <input type="text" value="<?= htmlspecialchars($factuurnummer ?? '') ?>" disabled>
    </div>
    <div>
        <label>Bedrag:</label>
        <input type="number" name="bedrag" step="0.01" value="<?= isset($bedrag) ? htmlspecialchars($bedrag) : '0.00' ?>" required>
    </div>
    <div>
        <label>Datum:</label>
        <input type="date" name="datum" value="<?= isset($datum) ? htmlspecialchars($datum) : date('Y-m-d') ?>" required>
    </div>
    <div>
        <label>Status:</label>
        <select name="status" required>
            <option value="In behandeling" <?= (isset($status) && $status == 'In behandeling') ? 'selected' : '' ?>>In behandeling</option>
            <option value="Betaald" <?= (isset($status) && $status == 'Betaald') ? 'selected' : '' ?>>Betaald</option>
            <option value="Open" <?= (isset($status) && $status == 'Open') ? 'selected' : '' ?>>Open</option>
        </select>
    </div>
    <div>
        <label>Actief:</label>
        <input type="checkbox" name="actief" value="1" <?= (!isset($actief) || $actief) ? 'checked' : '' ?>>
    </div>
    <button type="submit" class="btn btn-green">Betaling toevoegen</button>
</form>
<a href="<?= URLROOT ?>/betaling/overzicht/<?= htmlspecialchars($factuurId ?? '') ?>" class="btn">Annuleren</a>

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
        margin-top: 40px;
        margin-bottom: 16px;
        text-align: center;
        color: #ffffff;
        text-shadow: 1px 1px 3px #000;
    }
    form {
        background: #23233a;
        padding: 32px 24px;
        border-radius: 16px;
        max-width: 420px;
        margin: 32px auto 16px auto;
        box-shadow: 0 4px 16px rgba(0,0,0,0.2);
        display: flex;
        flex-direction: column;
        gap: 18px;
    }
    label {
        font-weight: bold;
        margin-bottom: 8px;
        color: #fff;
    }
    input[type="date"],
    input[type="number"],
    input[type="text"] {
        padding: 8px 12px;
        border-radius: 6px;
        border: none;
        font-size: 1rem;
        margin-top: 4px;
        margin-bottom: 12px;
        width: 100%;
        background: #2b2b3d;
        color: #fff;
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
        margin-top: 8px;
        margin-bottom: 8px;
        display: inline-block;
        text-align: center;
    }
    .btn:hover {
        background-color: #006bb3;
    }
    .btn-green {
        background-color: #27ae60;
    }
    .btn-green:hover {
        background-color: #219150;
    }
    a.btn {
        margin-left: 24px;
    }
    @media (max-width: 600px) {
        form {
            padding: 18px 8px;
        }
        h2 {
            font-size: 1.3rem;
        }
    }
</style>
