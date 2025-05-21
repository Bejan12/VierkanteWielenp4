<?php

require_once APPROOT . '/helpers/auth.php';

class Dashboard extends BaseController
{
    public function index()
    {
        checkLogin();

        $data = [
            'title' => 'Dashboard'
        ];

        $this->view('dashboard/index', $data);
    }
}