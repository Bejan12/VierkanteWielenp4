<?php
class Factuur extends BaseController
{
    private $factuurModel;

    public function __construct()
    {
        $this->factuurModel = $this->model('FactuurModel');
    }

    public function overzicht()
    {
        $success = isset($_GET['success']) ? $_GET['success'] : '';
        $error = isset($_GET['error']) ? $_GET['error'] : '';

        $inschrijvingen = $this->factuurModel->getInschrijvingen();

        $data = [
            'facturen' => $this->factuurModel->getFacturen(),
            'success' => $success,
            'error' => $error,
            'inschrijvingen' => $inschrijvingen
        ];

        $this->view('factuur/overzicht', $data);
    }

    public function detail($id)
    {
        $factuur = $this->factuurModel->getFactuurById($id);

        if (!$factuur) {
            $data = [
                'error' => 'Deze factuur bestaat niet',
                'facturen' => $this->factuurModel->getFacturen()
            ];
            $this->view('factuur/overzicht', $data);
        } else {
            $data = ['factuur' => $factuur];
            $this->view('factuur/detail', $data);
        }
    }

    public function downloadPdf($id)
    {
        require_once APPROOT . '/../public/fpdf/fpdf.php';

        $factuur = $this->factuurModel->getFactuurById($id);

        if (!$factuur) {
            die('Factuur niet gevonden');
        }

        $pdf = new \FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, 'Factuur', 0, 1, 'C');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Ln(10);
        $pdf->Cell(0, 10, 'Factuurnummer: ' . $factuur->id, 0, 1);
        $pdf->Cell(0, 10, 'Datum: ' . $factuur->datum, 0, 1);
        $pdf->Cell(0, 10, 'Klant: ' . $factuur->klant_naam, 0, 1);
        $pdf->Cell(0, 10, 'Totaalbedrag: ' . $factuur->totaal, 0, 1);
        $pdf->Output('D', 'factuur_' . $factuur->id . '.pdf');
        exit;
    }

    public function verwijder($id)
    {
        $this->factuurModel->deleteFactuur($id);

        $data = [
            'facturen' => $this->factuurModel->getFacturen(),
            'feedback' => 'Factuur succesvol verwijderd!'
        ];

        $this->view('factuur/overzicht', $data);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datum = $_POST['datum'];
            $bedrag = $_POST['bedrag'];
            $status = $_POST['status'];
            $inschrijvingId = $_POST['inschrijvingId'];

            if ($this->factuurModel->factuurBestaatVoorInschrijving($inschrijvingId)) {
                header('Location: ' . URLROOT . '/factuur/overzicht?error=Klant+al+gebruikt');
                exit;
            }

            $result = $this->factuurModel->createFactuur($datum, $bedrag, $status, $inschrijvingId);
            if ($result) {
                header('Location: ' . URLROOT . '/factuur/overzicht?success=Factuur+is+aangemaakt');
            } else {
                header('Location: ' . URLROOT . '/factuur/overzicht?error=Factuur+kon+niet+worden+aangemaakt');
            }
            exit;
        }

        $this->view('factuur/create');
    }

    public function betalingToevoegen($factuurId)
    {
        $betalingGeregistreerd = $this->factuurModel->isBetalingGeregistreerd($factuurId);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $bedrag = $_POST['bedrag'];
            $datum = $_POST['datum'];
            $status = 'Betaald';
            $actief = 1;

            $betalingModel = $this->model('BetalingModel');
            $betalingModel->createBetaling($factuurId, $datum, $bedrag, $status, $actief);

            header('Location: ' . URLROOT . '/betaling/overzicht/' . $factuurId . '?success=Betaling+succesvol+toegevoegd!');
            exit;
        }

        $this->view('factuur/betaling_toevoegen', [
            'factuurId' => $factuurId,
            'betalingGeregistreerd' => $betalingGeregistreerd
        ]);
    }
}
