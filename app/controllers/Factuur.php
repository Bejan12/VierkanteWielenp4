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
        $data = [
            'facturen' => $this->factuurModel->getFacturen()
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
}
