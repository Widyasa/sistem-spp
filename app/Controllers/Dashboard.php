<?php
class Dashboard extends Controller{
    public function index()
    {
        if (empty($_SESSION['user'])){
            redirect('auth/');
        }
        $data['title'] = 'Dashboard';
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('pages/dashboard', $data);
        $this->view('templates/footer', $data);
    }
}
