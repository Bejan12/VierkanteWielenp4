<?php require_once APPROOT . '/views/includes/header.php'; ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

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

<!-- ✅ HERO BANNER -->
<style>
@import url('https://fonts.googleapis.com/css2?family=Catamaran:wght@100..900&family=Instrument+Sans:ital,wght@0,400..700;1,400..700&family=Ultra&display=swap');

    .hero-banner {
        background: url('/img/bannerrijles.png') center center/cover no-repeat;
        height: 100vh;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
    }

   

    .banner-content {
    color: white;
    max-width: 800px;
    padding: 2rem;
    font-weight: 900;
    font-family: 'Catamaran';
    position: relative;
    left: -8rem; 
    top: 80px;  
}


    .banner-content h1 {
        font-size: 2.8rem;
        font-weight: bold;
        margin-bottom: 1rem;
        font-weight: 900;
        font-family: 'Catamaran';
    }

    

    .banner-content .subheading {
        font-size: 2rem;
        font-weight: 600;
        margin-bottom: 1rem;
        font-weight: 900;
        font-family: 'Catamaran';
    
    }

    .banner-content p {
        font-size: 1.2rem;
        margin-bottom: 2rem;
        font-size: 15px;
        font-weight: 100;
        font-family: 'Catamaran';
    }

    .cta-button {
        background-color: #ffffff;
        color: #0182E2;
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        font-weight: bold;
        text-decoration: none;
        transition: all 0.3s ease;
        font-weight: 900;
        font-family: 'Catamaran';
    }

    .cta-button:hover {
        background-color: #0182E2;
        color: #fff;
        font-weight: 900;
        font-family: 'Catamaran';
    }
</style>

<section class="hero-banner">
    <div class="banner-overlay">
        <div class="banner-content">
            <h1>START MET RIJDEN  <br> BIJ <span class="highlight">VIERKANTE WIELEN</span></h1>
            <h2 class="subheading">GRATIS PROEFLES VOOR NIEUWE LEERLINGEN</h2>
            <br><br>
            <p>WOON JE IN TIEL EN BEN JE 16,5 JAAR OF OUDER? BEGIN VANDAAG NOG MET JE RIJOPLEIDING</p>
            <br>
            <a href="#contact" class="cta-button">PLAN JE GRATIS PROEFLES</a>
        </div>
    </div>
</section>

<!-- ✅ Einde van de banner, hier kan je normale homepage content verdergaan -->

<div class="blue-box-homepage">
    <div class="info-icons-container">
        <div class="info-icon">
            <i class="bi bi-check-lg"></i>
            <div class="icon-text">Gegarandeerd je rijbewijs</div>
        </div>
        <div class="info-icon">
            <i class="bi bi-alarm-fill"></i>
            <div class="icon-text">Snel je rijbewijs</div>
        </div>
        <div class="info-icon">
            <i class="bi bi-currency-euro"></i>
            <div class="icon-text">Goedkoop lessen</div>
        </div>
    </div>
</div>
<br><br><br>
<section class="info-section">
    <div class="info-container">
        <div class="info-text">
            <h2>Wij helpen je graag met het snel halen van je rijbewijs</h2>
            <p>
                Rijschool in Tiel met al meer dan 10 jaar ervaring en vele tevreden geslaagde klanten ben je hier aan het juiste adres. 
                We zorgen iedere week weer voor nieuwe bestuurders die de weg op mogen. Het is bij ons mogelijk om een gratis intake les aan te vragen.
            </p>
        </div>
        <div class="info-image">
            <img src="/img/inforijles.jpg" alt="Rijles Informatie">
        </div>
    </div>
</section>
<br><br><br><br><br><br><br><br><br><br>
<footer class="custom-footer">
    <div class="footer-overlay">
        <div class="footer-top">
            <p>Ma-Za: 08:30 – 19:00</p>
            <p>autorijschoolvierkantewielen@hotmail.com</p>
            <div class="footer-icons">
                <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>

        <div class="footer-bottom">
            <p>Copyright © 2025 Rijschool Vierkante Wielen | Powered by <a href="https://vanweerdencommunicatie.nl" target="_blank">vanweerdencommunicatie.nl</a></p>
            
        </div>
    </div>
</footer>


<style>
.blue-box-homepage {
    width: 100vw;
    max-width: 100%;
    height: 250px;
    background: #0182E2;
    margin: 0;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
}
.info-icons-container {
    display: flex;
    justify-content: center;
    align-items: flex-start;
    gap: 60px;
    width: 100%;
    max-width: 900px;
}
.info-icon {
    display: flex;
    flex-direction: column;
    align-items: center;
    color: #fff; /* Iconen wit */
    font-size: 2.8rem;
    background: transparent; /* Geen witte achtergrond */
    border-radius: 0;
    padding: 100px;
    box-shadow: none;
    min-width: 120px;
    min-height: 120px;
    transition: none;
}
.info-icon:hover {
    box-shadow: none;
}
.icon-text {
    color: #fff; /* Tekst ook wit */
    font-size: 1.1rem;
    margin-top: 18px;
    text-align: center;
    font-family: 'Catamaran', Arial, sans-serif;
    font-weight: 600;
}
@media (max-width: 800px) {
    .info-icons-container {
        gap: 18px;
        flex-direction: column;
        align-items: center;
    }
    .info-icon {
        width: 90vw;
        min-width: unset;
    }
}

.info-section {
    background-color: #f9f9f9;
    padding: 80px 20px;
    font-family: 'Catamaran', sans-serif;
}

.info-container {
    display: flex;
    align-items: center;
    justify-content: center;
    max-width: 1200px;
    margin: 0 auto;
    flex-wrap: wrap;
    gap: 40px;
}

.info-text {
    flex: 1 1 500px;
}

.info-text h2 {
    color: #0182E2;
    font-size: 2.2rem;
    margin-bottom: 20px;
    font-weight: 800;
}

.info-text p {
    font-size: 1.1rem;
    line-height: 1.6;
    color: #333;
    font-weight: 400;
}

.info-image {
    flex: 1 1 400px;
    text-align: center;
}

.info-image img {
    max-width: 100%;
    border-radius: 12px;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
}

.custom-footer {
    background: url('/img/rijlesfooter.jpg') center bottom/cover no-repeat;
    color: #fff;
    font-family: 'Catamaran', sans-serif;
    padding-top: 40px;
    padding-bottom: 20px;
    position: relative;
    z-index: 1;
}



.footer-top {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px;
    margin: 0 auto 30px auto;
    text-align: center;
}

.footer-top p {
    margin: 10px;
    font-size: 1rem;
}

.footer-icons {
    display: flex;
    gap: 15px;
    margin-top: 10px;
}

.social-icon {
    background-color: #fff;
    color: #002266;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1rem;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.social-icon:hover {
    background-color: #0182E2;
    color: #fff;
}

.footer-bottom {
    text-align: center;
    font-size: 0.95rem;
    color: #fff;
}

.footer-bottom a {
    color: #fff;
    text-decoration: none;
    margin: 0 10px;
}

.footer-bottom a:hover {
    text-decoration: underline;
}


</style>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>
