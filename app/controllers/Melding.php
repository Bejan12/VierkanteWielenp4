<?php
class Melding extends BaseController
{
    private $meldingModel;

    public function __construct()
    {
        $this->meldingModel = $this->model('MeldingModel');
    }

    public function overzicht()
    {
        $datum = $_GET['datum'] ?? null;
        if ($datum) {
            $meldingen = $this->meldingModel->getMeldingenByDatum($datum);
            $data = empty($meldingen)
                ? ['melding' => 'Geen meldingen beschikbaar voor de geselecteerde datum']
                : ['meldingen' => $meldingen];
        } else {
            $meldingen = $this->meldingModel->getMeldingen();
            $data = empty($meldingen)
                ? ['melding' => 'Geen meldingen beschikbaar']
                : ['meldingen' => $meldingen];
        }
        $this->view('melding/overzicht', $data);
    }
<<<<<<< HEAD
=======

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $beschrijving = $_POST['beschrijving'];
            $datum = $_POST['datum'];
            $actief = isset($_POST['actief']) ? 1 : 0;

            // Check of melding al bestaat
            if ($this->meldingModel->meldingBestaat($beschrijving, $datum)) {
                $_SESSION['melding_error'] = "Er bestaat al een melding met deze beschrijving en datum.";
            } else {
                $result = $this->meldingModel->createMelding($beschrijving, $datum, $actief);
                if ($result) {
                    $_SESSION['melding_success'] = "Melding succesvol aangemaakt!";
                } else {
                    $_SESSION['melding_error'] = "Er is iets misgegaan bij het aanmaken van de melding.";
                }
            }
            header('Location: ' . URLROOT . '/melding/overzicht');
            exit;
        }
        $this->view('melding/create');
    }
>>>>>>> b429e29 (Mijn wijzigingen toegevoegd aan main branch)
}
