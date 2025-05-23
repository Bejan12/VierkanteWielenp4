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

            if ($user && $user->Wachtwoord === $password) {
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

        $users = $this->accountsModel->getAllUsersWithEmail();

        $data = [
            'users' => $users
        ];

        $this->view('accounts/overzicht', $data);
    }
}