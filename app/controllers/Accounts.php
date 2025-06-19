<?php
require_once APPROOT . '/helpers/auth.php';

class Accounts extends BaseController
{
    private $accountsModel;

    public function __construct()
    {
        $this->accountsModel = $this->model('AccountsModel');
    }

    public function index()
    {
        // Stuur eventueel direct door naar login
        header('Location: ' . URLROOT . '/accounts/login');
        exit;
    }

    public function login()
    {
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $user = $this->accountsModel->getUserByUsername($username);
            $isValid = false;
            if ($user && !empty($user->Wachtwoord)) {
                if (strpos($user->Wachtwoord, '$2y$') === 0) {
                    // Nieuw account: wachtwoord is een hash
                    $isValid = password_verify($password, $user->Wachtwoord);
                } else {
                    // Oud account: wachtwoord is plain text
                    $isValid = $password === $user->Wachtwoord;
                }
            }
            if ($isValid) {
                $this->accountsModel->setUserLoggedIn($user->Id);

                $_SESSION['user_logged_in'] = true;
                $_SESSION['user_id'] = $user->Id;
                $_SESSION['username'] = $user->Gebruikersnaam;
                $_SESSION['login_success'] = "Login succesvol!";

                // Haal de rol op via het model
                $role = $this->accountsModel->getUserRole($user->Id);
                $_SESSION['rol'] = $role ? $role : 'Onbekend';

                if ($role === 'Beheerder') {
                    header('Location: ' . URLROOT . '/dashboard/index');
                } else {
                    header('Location: ' . URLROOT . '/homepages/index');
                }
                exit;   
            } else {
                $error = "Ongeldige inloggegevens";
            }
        }

        $data = [
            'error' => $error
        ];

        $this->view('accounts/login', $data);
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        session_start(); // Start opnieuw om sessie te kunnen gebruiken
        $_SESSION['logout_success'] = "Je bent succesvol uitgelogd!";
        header('Location: ' . URLROOT . '/accounts/login');
        exit;
    }

    public function overzicht()
    {
        checkLogin();

        // Log het openen van het overzicht
        $username = $_SESSION['username'] ?? 'onbekend';
        file_put_contents(
            __DIR__ . '/../../accounts.log',
            "[" . date('Y-m-d H:i:s') . "] Accountoverzicht geopend door: $username\n",
            FILE_APPEND
        );

        // Alleen voor beheerders
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'Beheerder') {
            $_SESSION['error_message'] = "Pagina niet beschikbaar voor onbevoegden";
            header('Location: ' . URLROOT . '/homepages/index');
            exit;
        }

        // Toggle standaard aan, maar respecteer expliciet uitzetten
        if (array_key_exists('toggleData', $_GET)) {
            $toggle = $_GET['toggleData'] === 'on';
        } else {
            $toggle = true;
        }
        
        if ($toggle) {
            // Haal alle gebruikers op als toggle aan staat
            $users = $this->accountsModel->getAllUsersWithEmail();
        } else {
            // Geen data ophalen als toggle uit staat
            $users = [];
        }

        $data = [
            'users' => $users,
            'toggle' => $toggle,
        ];

        $this->view('accounts/overzicht', $data);
    }

    public function register()
    {
        $data = [
            'voornaam' => '',
            'tussenvoegsel' => '',
            'achternaam' => '',
            'geboortedatum' => '',
            'gebruikersnaam' => '',
            'email' => '',
            'error' => '',
            'success' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data['voornaam'] = trim($_POST['voornaam']);
            $data['tussenvoegsel'] = trim($_POST['tussenvoegsel']);
            $data['achternaam'] = trim($_POST['achternaam']);
            $data['geboortedatum'] = trim($_POST['geboortedatum']);
            $data['gebruikersnaam'] = trim($_POST['gebruikersnaam']);
            $data['email'] = trim($_POST['email']);
            $wachtwoord = $_POST['wachtwoord'];
            $wachtwoord2 = $_POST['wachtwoord2'];

            // Validatie
            $maxGeboortedatum = (new DateTime())->sub(new DateInterval('P16Y6M'))->format('Y-m-d');

            if (
                empty($data['voornaam']) ||
                empty($data['achternaam']) ||
                empty($data['geboortedatum']) ||
                empty($data['gebruikersnaam']) ||
                empty($data['email']) ||
                empty($wachtwoord) ||
                empty($wachtwoord2)
            ) {
                $data['error'] = 'Vul alle verplichte velden in.';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['error'] = 'Vul een geldig e-mailadres in.';
            } elseif ($data['geboortedatum'] > $maxGeboortedatum) {
                $data['error'] = 'Je moet minimaal 16,5 jaar oud zijn om een account te maken.';
            } elseif ($wachtwoord !== $wachtwoord2) {
                $data['error'] = 'Wachtwoorden komen niet overeen.';
            } elseif (strlen($wachtwoord) < 6) {
                $data['error'] = 'Wachtwoord moet minimaal 6 tekens zijn.';
            } elseif ($this->accountsModel->gebruikersnaamBestaat($data['gebruikersnaam'])) {
                $data['error'] = 'Gebruikersnaam bestaat al.';
            } else {
                // Opslaan
                $hashed = password_hash($wachtwoord, PASSWORD_DEFAULT);
                $result = $this->accountsModel->registreerGebruiker(
                    $data['voornaam'],
                    $data['tussenvoegsel'],
                    $data['achternaam'],
                    $data['geboortedatum'],
                    $data['gebruikersnaam'],
                    $hashed,
                    $data['email']
                );
                if ($result) {
                    $_SESSION['register_success'] = 'Registratie gelukt! Je kunt nu inloggen.';
                    header('Location: ' . URLROOT . '/accounts/login');
                    exit;
                } else {
                    $data['error'] = 'Er is iets misgegaan, probeer het opnieuw.';
                }
            }
        }

        $this->view('accounts/register', $data);
    }

}