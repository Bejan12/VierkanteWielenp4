<?php

class Leerlingen extends BaseController
{
    private $leerlingenModel;

    public function __construct()
    {
        $this->leerlingenModel = $this->model('LeerlingenModel');
    }

    public function index()
    {
        // Haal alle leerlingen op via het model
        $leerlingen = $this->leerlingenModel->getAllLeerlingen();

        // Data doorgeven aan de view
        $data = [
            'title' => 'Overzicht Leerlingen',
            'leerlingen' => $leerlingen
        ];

        $this->view('leerlingen/index', $data);
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $data = [
                'voornaam' => htmlspecialchars(trim($_POST['voornaam'])),
                'tussenvoegsel' => htmlspecialchars(trim($_POST['tussenvoegsel'])),
                'achternaam' => htmlspecialchars(trim($_POST['achternaam'])),
                'geboortedatum' => htmlspecialchars(trim($_POST['geboortedatum'])),
                'email' => htmlspecialchars(trim($_POST['email'])),
                'error' => ''
            ];

            // Validate email field
            if (empty($data['email'])) {
                $data['error'] = 'E-mailadres is verplicht.';
                $this->view('leerlingen/add', $data);
                return;
            }

            if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['error'] = 'E-mailadres is niet geldig.';
                $this->view('leerlingen/add', $data);
                return;
            }

            // Check if email already exists
            if ($this->leerlingenModel->emailExists($data['email'])) {
                $data['error'] = 'E-mailadres bestaat al.';
                $this->view('leerlingen/add', $data);
                return;
            }

            // Voeg leerling toe via het model
            if ($this->leerlingenModel->addLeerling($data)) {
                $_SESSION['success_message'] = 'De leerling is succesvol toegevoegd.';
                header('Location: ' . URLROOT . '/leerlingen/index');
                exit;
            } else {
                die('Er is iets misgegaan.');
            }
        } else {
            $this->view('leerlingen/add');
        }
    }
}