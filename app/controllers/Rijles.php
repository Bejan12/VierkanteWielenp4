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
            'error' => '',
            'success' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data['datum'] = $_POST['datum'];
            $data['tijd'] = $_POST['tijd'];
            $data['instructeurId'] = $_POST['instructeurId'];

            // Validatie: tijd tussen 06:00 en 22:00
            $minTime = '06:00';
            $maxTime = '22:00';
            $inputTime = $data['tijd'];
            $inputDate = $data['datum'];

            // Huidige datum en tijd
            $now = new DateTime();
            $inputDateTime = DateTime::createFromFormat('Y-m-d H:i', $inputDate . ' ' . $inputTime);

            if ($inputTime < $minTime || $inputTime > $maxTime) {
                $data['error'] = "Je kan pas na 6 uur en voor 10 uur 's avonds een rijles plannen.";
            } elseif ($inputDateTime < $now) {
                $data['error'] = 'Je kunt geen rijles plannen in het verleden.';
            } elseif ($this->rijlesModel->isSlotTaken($data['datum'], $data['tijd'], $data['instructeurId'])) {
                $data['error'] = 'Het plannen van een rijles op deze dag en tijd is niet mogelijk.';
            } else {
                $this->rijlesModel->createRijles($data['datum'], $data['tijd'], $data['instructeurId']);
                $data['success'] = 'Rijles succesvol ingepland!';
                // Reset velden na succes
                $data['datum'] = '';
                $data['tijd'] = '';
                $data['instructeurId'] = '';
            }
        }

        $this->view('rijles/create', $data);
    }
}
