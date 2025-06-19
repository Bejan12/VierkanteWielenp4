<?php

class Homepages extends BaseController
{
    public function index($firstname = NULL, $infix = NULL, $lastname = NULL)
    {
        $data = [
            'title' => 'Homepagina',
        ];
        $this->view('homepages/index', $data);
    }
}