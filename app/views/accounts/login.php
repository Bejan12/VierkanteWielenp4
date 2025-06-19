<style>
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

    /* Achtergrond-watermerk logo (optioneel) */
    .bg-logo {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 400px;
        opacity: 0.05;
        transform: translate(-50%, -50%);
        z-index: 0;
    }

    form {
        background-color: #fff;
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        width: 350px;
        z-index: 1;
        animation: fadeIn 1s ease-in-out;
        position: relative;
        text-align: center;
    }

    form h2 {
        margin-bottom: 20px;
        color: #0182E2;
    }

    .logo-img {
        width: 100px;
        margin-bottom: 20px;
        border-radius: 12px;
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
    input[type="password"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 8px;
        transition: border-color 0.3s, box-shadow 0.3s;
    }

    input[type="text"]:focus,
    input[type="password"]:focus {
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

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<?php if (!empty($_SESSION['logout_success'])): ?>
    <style>
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
    <div id="logoutSuccess" class="custom-alert-success">
        <?= $_SESSION['logout_success']; unset($_SESSION['logout_success']); ?>
        <div class="progress-bar"></div>
    </div>
    <script>
        setTimeout(function () {
            const el = document.getElementById('logoutSuccess');
            if (el) {
                el.style.animation = 'fadeOutAlert 0.5s ease-in forwards';
                setTimeout(() => el.remove(), 500);
            }
        }, 3000);
    </script>
<?php endif; ?>

<<<<<<< HEAD
=======
<?php if (!empty($_SESSION['register_success'])): ?>
    <style>
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
    <div id="registerSuccess" class="custom-alert-success">
        <?= $_SESSION['register_success']; unset($_SESSION['register_success']); ?>
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

>>>>>>> b429e29 (Mijn wijzigingen toegevoegd aan main branch)
<!-- Optioneel watermerk logo -->
<img src="<?= URLROOT; ?>/img/logovierkantewielen.png" alt="Logo Watermerk" class="bg-logo">

<form method="post" id="loginForm">
    <!-- Logo bovenaan het formulier -->
    <img src="<?= URLROOT; ?>/img/logovierkantewielen.png" alt="Logo" class="logo-img">
    <h2>Inloggen</h2>
    <?php if (!empty($data['error'])) echo "<div class='alert'>{$data['error']}</div>"; ?>
    <div>
        <label>Gebruikersnaam:</label>
        <input type="text" name="username" required>
    </div>
    <div>
        <label>Wachtwoord:</label>
        <input type="password" name="password" required>
    </div>
    <button type="submit">Inloggen</button>
<<<<<<< HEAD
=======
    <a href="<?= URLROOT; ?>/accounts/register" class="register-link-btn">Nog geen account?</a>
>>>>>>> b429e29 (Mijn wijzigingen toegevoegd aan main branch)
</form>

<script>
    document.getElementById('loginForm').addEventListener('submit', function (e) {
        const btn = this.querySelector('button');
        btn.innerText = 'Bezig met inloggen...';
        btn.disabled = true;
        btn.style.backgroundColor = '#aaa';
    });
</script>

<<<<<<< HEAD
=======
<style>
    .register-link-btn {
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
    }
    .register-link-btn:hover {
        background: #0182E2;
        color: #fff;
        border: 1px solid #0166b3;
    }
</style>

>>>>>>> b429e29 (Mijn wijzigingen toegevoegd aan main branch)
<?php require_once APPROOT . '/views/includes/footer.php'; ?>
