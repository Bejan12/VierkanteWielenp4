<?php

require_once APPROOT . '/helpers/auth.php';

class Dashboard extends BaseController
{
    public function index()
    {
        checkLogin();

        // Controleer of de gebruiker beheerder is
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'Beheerder') {
            $_SESSION['error_message'] = "Pagina niet beschikbaar voor onbevoegden";
            header('Location: ' . URLROOT . '/homepages/index');
            exit;
        }

        $data = [
            'title' => 'Dashboard'
        ];

        $this->view('dashboard/index', $data);
    }
}