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
        $betalingen = $factuurId ? $this->betalingModel->getBetalingenByFactuurId($factuurId) : [];
        $data = [
            'betalingen' => $betalingen,
            'status' => empty($betalingen) ? 'Open' : 'Betaald',
            'melding' => empty($betalingen) ? '' : null
        ];
        $this->view('betaling/overzicht', $data);
    }
}
