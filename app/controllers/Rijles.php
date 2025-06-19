<?php

class Rijles extends BaseController
{
    private $rijlesModel;

    public function __construct()
    {
        $this->rijlesModel = $this->model('RijlesModel');
    }

    public function index()
    {
        $rijlessen = $this->rijlesModel->getAllRijlessen();
        $data = [
            'title' => 'Overzicht rijlessen',
            'rijlessen' => $rijlessen
        ];
        $this->view('rijles/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Nieuwe rijles maken',
            'datum' => '',
            'tijd' => '',
            'instructeurId' => '',
            'instructeurs' => $this->rijlesModel->getAllInstructeurs(),
            'error' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data['datum'] = $_POST['datum'];
            $data['tijd'] = $_POST['tijd'];
            $data['instructeurId'] = $_POST['instructeurId'];

            if ($this->rijlesModel->isSlotTaken($data['datum'], $data['tijd'], $data['instructeurId'])) {
                $data['error'] = 'Het plannen van een rijles op deze dag en tijd is niet mogelijk.';
            } else {
                $this->rijlesModel->createRijles($data['datum'], $data['tijd'], $data['instructeurId']);
                header('Location: ' . URLROOT . '/rijles/index');
                exit;
            }
        }

        $this->view('rijles/create', $data);
    }
}
