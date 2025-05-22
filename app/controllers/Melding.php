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
}
