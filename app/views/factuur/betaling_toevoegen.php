<?php if (!$betalingGeregistreerd): ?>
    <div class="alert alert-warning">
        ⚠️ Nog geen betaling geregistreerd voor deze factuur.
    </div>
<?php endif; ?>

<form method="post" class="betaling-form">
    <label>Bedrag:</label>
    <input type="number" name="bedrag" step="0.01" required>
    <label>Datum:</label>
    <input type="date" name="datum" required>
    <button type="submit" class="btn btn-green">Betaling toevoegen</button>
    <a href="<?= URLROOT ?>/betaling/overzicht/<?= htmlspecialchars($factuurId ?? '') ?>" class="btn">Annuleren</a>
</form>

<style>
    body {
        background-color: #1e1e2f;
        color: #f0f0f0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .alert-warning {
        background: #ffcc00;
        color: #333;
        padding: 14px;
        border-radius: 8px;
        margin-bottom: 18px;
        text-align: center;
        font-size: 1.1rem;
        font-weight: bold;
        box-shadow: 0 2px 8px rgba(255,204,0,0.15);
    }
    .betaling-form {
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
    input[type="number"] {
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
</style>