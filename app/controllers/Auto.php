<?php


require_once APPROOT . '/helpers/auth.php';

class Auto extends BaseController
{
    private $autoModel;

    public function __construct()
    {
        $this->autoModel = $this->model('AutoModel');
    }

    public function overzicht()
{
    checkLogin();

    // Alleen voor beheerders
    if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'Beheerder') {
        $_SESSION['error_message'] = "Pagina niet beschikbaar voor onbevoegden";
        header('Location: ' . URLROOT . '/homepages/index');
        exit;
    }

    // Toggle check
    $toggle = isset($_GET['toggleData']) ? $_GET['toggleData'] === 'on' : true;



    if ($toggle) {
        $autos = $this->autoModel->getAllAutos();
    } else {
        $autos = [];
    }

    $data = [
        'autos' => $autos,
        'toggle' => $toggle,
    ];

    $this->view('cars/overzicht', $data);
}

public function addcar()
{
    checkLogin();

    // Alleen voor beheerders
    if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'Beheerder') {
        $_SESSION['error_message'] = "Pagina niet beschikbaar voor onbevoegden";
        header('Location: ' . URLROOT . '/homepages/index');
        exit;
    }

    $data = [
        'merk' => '',
        'type' => '',
        'kenteken' => '',
        'brandstof' => '',
        'opmerking' => '',
        'error' => '',
        'success' => ''
    ];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $merk = trim($_POST['merk'] ?? '');
        if ($merk === 'Anders') {
            $merk = trim($_POST['merk_anders'] ?? '');
        }
        $data['merk'] = $merk;
        $data['type'] = trim($_POST['type'] ?? '');
        $data['kenteken'] = trim($_POST['kenteken'] ?? '');
        $data['brandstof'] = trim($_POST['brandstof'] ?? '');
        $data['opmerking'] = trim($_POST['opmerking'] ?? '');

        // Validatie
        if (
            empty($data['merk']) ||
            empty($data['type']) ||
            empty($data['kenteken']) ||
            empty($data['brandstof'])
        ) {
            $data['error'] = 'Vul alle verplichte velden in.';
        } else {
            // Probeer op te slaan
            $result = $this->autoModel->addAuto(
                $data['merk'],
                $data['type'],
                $data['kenteken'],
                $data['brandstof'],
                $data['opmerking']
            );
            if ($result) {
                $_SESSION['auto_success'] = 'Auto succesvol toegevoegd!';
                header('Location: ' . URLROOT . '/auto/overzicht');
                exit;
            } else {
                $data['error'] = 'Fout bij toevoegen auto. Mogelijk bestaat het kenteken al.';
            }
        }
    }

    $this->view('cars/addcar', $data);
}

}