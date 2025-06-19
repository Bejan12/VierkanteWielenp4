<?php
class Betaling extends BaseController
{
    private $betalingModel;

    public function __construct()
    {
        $this->betalingModel = $this->model('BetalingModel');
    }

    public function overzicht($factuurId = null)
    {
        // Haal altijd het factuurId op uit GET of parameter
        if (!$factuurId && isset($_GET['factuurId'])) {
            $factuurId = $_GET['factuurId'];
        }

        $betalingen = $factuurId ? $this->betalingModel->getBetalingenByFactuurId($factuurId) : [];

        $data = [
            'betalingen' => $betalingen,
            'status' => empty($betalingen) ? 'Open' : 'Betaald',
            'melding' => empty($betalingen) ? '' : null,
            'factuurId' => $factuurId
        ];

        $this->view('betaling/overzicht', $data);
    }

    public function create($factuurId = null)
    {
        $factuurModel = $this->model('FactuurModel');
        $factuur = $factuurModel->getFactuurById($factuurId);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $factuurId = $_POST['factuurId'];
            $datum = $_POST['datum'];
            $bedrag = $_POST['bedrag'];
            $status = $_POST['status'];
            $actief = isset($_POST['actief']) ? 1 : 0;

            $result = $this->betalingModel->createBetaling($factuurId, $datum, $bedrag, $status, $actief);

            if ($result) {
                header('Location: ' . URLROOT . '/betaling/overzicht/' . $factuurId . '?success=Betaling succesvol toegevoegd!');
            } else {
                header('Location: ' . URLROOT . '/betaling/overzicht/' . $factuurId . '?error=Betaling toevoegen mislukt.');
            }
            exit;
        }

        $this->view('betaling/create', [
            'factuurId' => $factuurId,
            'factuurnummer' => $factuur ? $factuur->nummer : '',
            'bedrag' => isset($_POST['bedrag']) ? $_POST['bedrag'] : '0.00',
            'datum' => isset($_POST['datum']) ? $_POST['datum'] : date('Y-m-d'),
            'status' => isset($_POST['status']) ? $_POST['status'] : 'In behandeling',
            'actief' => isset($_POST['actief']) ? $_POST['actief'] : 1
        ]);
    }
}
