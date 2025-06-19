<?php

require_once APPROOT . '/helpers/auth.php';

class Homepages extends BaseController
{
    public function index($firstname = NULL, $infix = NULL, $lastname = NULL)
    {
        checkLogin(); // <-- Toegevoegd

        /**
         * Het $data-array geeft informatie mee aan de view-pagina
         */

        $data = [
            'title' => 'Homepagina',
        ];
        $this->view('homepages/index', $data);
    }
}