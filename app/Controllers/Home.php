<?php

class Home
{
    public function index()
    {
        if (empty($_SESSION['user'])){
            redirect('auth/');
        }
        return var_dump('tessting');
    }
}