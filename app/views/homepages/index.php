<?php require_once APPROOT . '/views/includes/header.php'; ?>

<?php
// Verzamel meldingen zonder direct te unsetten
$loginSuccess = $_SESSION['login_success'] ?? '';
$errorMessage = $_SESSION['error_message'] ?? '';
?>

<?php if (!empty($loginSuccess) || !empty($errorMessage)): ?>
    <style>
        .custom-alert-success,
        .custom-alert-error {
            position: fixed;
            top: 30px;
            left: 35%;
            transform: translateX(-50%) translateY(-20px);
            color: #fff;
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

        .custom-alert-success {
            background-color: #0182E2;
        }

        .custom-alert-error {
            background-color: #e74c3c;
        }

        .progress-bar {
            height: 5px;
            background-color: rgba(255, 255, 255, 0.7);
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
<?php endif; ?>

<?php if (!empty($loginSuccess)): ?>
    <div id="loginSuccess" class="custom-alert-success">
        <?= $loginSuccess; ?>
        <div class="progress-bar"></div>
    </div>
<?php endif; ?>

<?php if (!empty($errorMessage)): ?>
    <div id="errorMessage" class="custom-alert-error">
        <?= $errorMessage; ?>
        <div class="progress-bar"></div>
    </div>
<?php endif; ?>

<?php
// Meldingen pas na het tonen verwijderen
unset($_SESSION['login_success'], $_SESSION['error_message']);
?>

<?php if (!empty($loginSuccess) || !empty($errorMessage)): ?>
    <script>
        setTimeout(function () {
            const success = document.getElementById('loginSuccess');
            const error = document.getElementById('errorMessage');
            [success, error].forEach(el => {
                if (el) {
                    el.style.animation = 'fadeOutAlert 0.5s ease-in forwards';
                    setTimeout(() => el.remove(), 500);
                }
            });
        }, 3000);
    </script>
<?php endif; ?>

<!-- Je bestaande content -->

<?php require_once APPROOT . '/views/includes/footer.php'; ?>
