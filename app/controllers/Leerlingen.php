<?php

class Leerlingen extends BaseController
{
    private $leerlingenModel;

    public function __construct()
    {
        $this->leerlingenModel = $this->model('LeerlingenModel');
    }

    public function index()
    {
        // Haal alle leerlingen op via het model
        $leerlingen = $this->leerlingenModel->getAllLeerlingen();

        // Data doorgeven aan de view
        $data = [
            'title' => 'Overzicht Leerlingen',
            'leerlingen' => $leerlingen
        ];

        $this->view('leerlingen/index', $data);
    }
}