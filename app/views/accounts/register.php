<?php
// Bereken de max-geboortedatum voor 16,5 jaar (vandaag min 16 jaar en 6 maanden)
$maxGeboortedatum = (new DateTime())->sub(new DateInterval('P16Y6M'))->format('Y-m-d');
?>
<style>
    /* ...bestaande CSS... */
    body {
        margin: 0;
        padding: 0;
        font-family: 'Segoe UI', sans-serif;
        background: linear-gradient(135deg, #0182E2, #00c6ff);
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        overflow: hidden;
    }
    form {
        background-color: #fff;
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        width: 420px;
        z-index: 1;
        animation: fadeIn 1s ease-in-out;
        position: relative;
        text-align: center;
    }
    .form-row {
        display: flex;
        gap: 16px;
        margin-bottom: 20px;
    }
    .form-row > div {
        flex: 1;
        min-width: 0;
    }
    form div {
        margin-bottom: 20px;
        text-align: left;
    }
    label {
        display: block;
        margin-bottom: 5px;
        color: #333;
    }
    input[type="text"],
    input[type="password"],
    input[type="date"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 8px;
        transition: border-color 0.3s, box-shadow 0.3s;
        box-sizing: border-box;
    }
    input[type="text"]:focus,
    input[type="password"]:focus,
    input[type="date"]:focus {
        border-color: #0182E2;
        box-shadow: 0 0 5px rgba(1, 130, 226, 0.5);
        outline: none;
    }
    button {
        width: 100%;
        padding: 10px;
        background-color: #0182E2;
        color: #fff;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s, transform 0.2s;
    }
    button:hover {
        background-color: #0166b3;
        transform: translateY(-2px);
    }
    .alert {
        padding: 10px;
        margin-bottom: 15px;
        border-radius: 5px;
        color: white;
        background-color: #e74c3c;
        text-align: center;
    }
    .alert-success {
        background-color: #27ae60;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .login-link-btn {
        display: block;
        margin-top: 18px;
        background: #fff;
        color: #0182E2;
        border: 1px solid #0182E2;
        border-radius: 8px;
        padding: 10px;
        text-decoration: none;
        font-size: 16px;
        transition: background 0.3s, color 0.3s, border 0.3s;
        text-align: center;
    }
    .login-link-btn:hover {
        background: #0182E2;
        color: #fff;
        border: 1px solid #0166b3;
    }

    .logo-img {
        width: 100px;
        height: auto;
        margin-bottom: 20px;
        border-radius: 12px;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
    .bg-logo {
        width: 400px;
        height: auto;
        position: absolute;
        top: 50%;
        left: 50%;
        opacity: 0.05;
        transform: translate(-50%, -50%);
        z-index: 0;
        pointer-events: none;
        user-select: none;
    }
    .custom-alert-success {
        position: fixed;
        top: 30px;
        left: 37%;
        transform: translateX(-50%) translateY(-20px);
        background-color: white;
        color: #0182E2;
        padding: 25px 50px 20px 50px;
        border-radius: 16px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
        font-size: 22px;
        z-index: 9999;
        opacity: 0;
        animation: fadeInAlert 0.5s ease-out forwards;
        overflow: hidden;
        min-width: 400px;
        max-width: 90vw;
        text-align: center;
    }
    .progress-bar {
        height: 5px;
        background-color: #0182E2;
        position: absolute;
        bottom: 0;
        left: 0;
        animation: progressShrink 3s linear forwards;
    }
    @keyframes fadeInAlert {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    @keyframes fadeOutAlert {
        to {
            opacity: 0;
            transform: translateY(-20px);
        }
    }
    @keyframes progressShrink {
        from {
            width: 100%;
        }
        to {
            width: 0%;
        }
    }
</style>

<!-- Optioneel watermerk logo -->
<img src="<?= URLROOT; ?>/img/logovierkantewielen.png" alt="Logo Watermerk" class="bg-logo">

<?php if (!empty($data['success'])): ?>
    <div id="registerSuccess" class="custom-alert-success">
        <?= $data['success']; ?>
        <div class="progress-bar"></div>
    </div>
    <script>
        setTimeout(function () {
            const el = document.getElementById('registerSuccess');
            if (el) {
                el.style.animation = 'fadeOutAlert 0.5s ease-in forwards';
                setTimeout(() => el.remove(), 500);
            }
        }, 3000);
    </script>
<?php endif; ?>

<form method="post" id="registerForm">
    <img src="<?= URLROOT; ?>/img/logovierkantewielen.png" alt="Logo" class="logo-img">
    <h2>Registreren</h2>
    <?php if (!empty($data['error'])): ?>
        <div class="alert"><?= $data['error']; ?></div>
    <?php endif; ?>

    <div class="form-row">
        <div>
            <label>Voornaam:</label>
            <input type="text" name="voornaam" required value="<?= isset($data['voornaam']) ? htmlspecialchars($data['voornaam']) : '' ?>">
        </div>
        <div>
            <label>Achternaam:</label>
            <input type="text" name="achternaam" required value="<?= isset($data['achternaam']) ? htmlspecialchars($data['achternaam']) : '' ?>">
        </div>
    </div>
    <div class="form-row">
        <div>
            <label>Tussenvoegsel:</label>
            <input type="text" name="tussenvoegsel" value="<?= isset($data['tussenvoegsel']) ? htmlspecialchars($data['tussenvoegsel']) : '' ?>">
        </div>
        <div>
            <label>Geboortedatum:</label>
            <input type="date" name="geboortedatum" required max="<?= $maxGeboortedatum ?>" value="<?= isset($data['geboortedatum']) ? htmlspecialchars($data['geboortedatum']) : '' ?>">
        </div>
    </div>
    <div>
        <label>Gebruikersnaam:</label>
        <input type="text" name="gebruikersnaam" required value="<?= isset($data['gebruikersnaam']) ? htmlspecialchars($data['gebruikersnaam']) : '' ?>">
    </div>
    <div>
        <label>Wachtwoord:</label>
        <input type="password" name="wachtwoord" required>
    </div>
    <div>
        <label>Herhaal wachtwoord:</label>
        <input type="password" name="wachtwoord2" required>
    </div>
    <button type="submit">Registreren</button>
    <a href="<?= URLROOT; ?>/accounts/login" class="login-link-btn">Heb je al een account?</a>
</form>

<script>
    document.getElementById('registerForm').addEventListener('submit', function (e) {
        const btn = this.querySelector('button');
        btn.innerText = 'Bezig met registreren...';
        btn.disabled = true;
        btn.style.backgroundColor = '#aaa';
    });
</script>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>
