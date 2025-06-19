<?php require_once APPROOT . '/views/layout.php'; ?>
<h2>Nieuwe Melding Opstellen</h2>
<form method="post">
    <label>Beschrijving: <input type="text" name="beschrijving" required></label><br>
    <label>Datum: <input type="date" name="datum" required></label><br>
    <label>Actief: <input type="checkbox" name="actief" value="1"></label><br>
    <button type="submit" class="btn btn-green">Opslaan</button>
</form>
<a href="<?= URLROOT ?>/melding/overzicht" class="btn">Annuleren</a>

<?php if (!empty($_SESSION['melding_success'])): ?>
    <div class="alert alert-success"><?= $_SESSION['melding_success']; unset($_SESSION['melding_success']); ?></div>
<?php endif; ?>
<?php if (!empty($_SESSION['melding_error'])): ?>
    <div class="alert alert-error"><?= $_SESSION['melding_error']; unset($_SESSION['melding_error']); ?></div>
<?php endif; ?>

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
    @media (max-width: 600px) {
        form {
            padding: 18px 8px;
        }
        h2 {
            font-size: 1.3rem;
        }
    }
</style>
