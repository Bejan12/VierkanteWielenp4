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
<<<<<<< HEAD
    {
        checkLogin();

        // Alleen voor beheerders
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'Beheerder') {
            $_SESSION['error_message'] = "Pagina niet beschikbaar voor onbevoegden";
            header('Location: ' . URLROOT . '/homepages/index');
            exit;
        }

        $autos = $this->autoModel->getAllAutos();

        $data = [
            'autos' => $autos
        ];

        $this->view('cars/overzicht', $data);
    }
=======
{
    checkLogin();

    // Alleen voor beheerders
    if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'Beheerder') {
        $_SESSION['error_message'] = "Pagina niet beschikbaar voor onbevoegden";
        header('Location: ' . URLROOT . '/homepages/index');
        exit;
    }

    // Toggle check
    $toggle = isset($_GET['toggleData']) && $_GET['toggleData'] === 'on';

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

>>>>>>> b429e29 (Mijn wijzigingen toegevoegd aan main branch)
}