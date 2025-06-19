<?php

class Instructeurs extends BaseController
{
    private $instructeursModel;

    public function __construct()
    {
        $this->instructeursModel = $this->model('InstructeursModel');
    }

    public function index()
    {
        // Haal alle instructeurs op via het model
        $instructeurs = $this->instructeursModel->getAllInstructeurs();

        // Data doorgeven aan de view
        $data = [
            'title' => 'Overzicht Instructeurs',
            'instructeurs' => $instructeurs
        ];

        $this->view('instructeurs/index', $data);
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
                $this->view('instructeurs/add', $data);
                return;
            }

            if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['error'] = 'E-mailadres is niet geldig.';
                $this->view('instructeurs/add', $data);
                return;
            }

            // Check if email already exists
            if ($this->instructeursModel->emailExists($data['email'])) {
                $data['error'] = 'E-mailadres bestaat al.';
                $this->view('instructeurs/add', $data);
                return;
            }

            // Voeg instructeur toe via het model
            if ($this->instructeursModel->addInstructeur($data)) {
                // Sla succesmelding op in sessie
                $_SESSION['success_message'] = 'De instructeur is succesvol toegevoegd.';
                // Redirect naar instructeurs overzicht
                header('Location: ' . URLROOT . '/instructeurs/index');
                exit;
            } else {
                die('Er is iets misgegaan.');
            }
        } else {
            // Laad de view
            $this->view('instructeurs/add');
        }
    }
}
