<?php
function checkLogin()
{
    if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
        header('Location: ' . URLROOT . '/accounts/login');
        exit;
    }
}