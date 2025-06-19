<?php

class Instructeurs extends BaseController
{
    private $instructeursModel;

    public function __construct()
    {
        $this->instructeursModel = $this->model('InstructeursModel');
    }

    public function index()
    {
        // Haal alle instructeurs op via het model
        $instructeurs = $this->instructeursModel->getAllInstructeurs();

        // Data doorgeven aan de view
        $data = [
            'title' => 'Overzicht Instructeurs',
            'instructeurs' => $instructeurs
        ];

        $this->view('instructeurs/index', $data);
    }
}