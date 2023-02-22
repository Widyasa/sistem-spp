<?php
class Auth extends Controller {
    public function index()
    {
        if (isset($_SESSION['user'] ['id_pengguna'])){
            redirect('dashboard/index');
        }
        $data['title']= 'Login';
        $this->view('templates/header', $data);
        $this->view('pages/login', $data);
        $this->view('templates/footer', $data);
    }

    public function createSession($user)
    {
        $_SESSION['user'] = $user;
    }
    public function verifyPassword($data)
    {
        if( $_POST['password']  === $data['password']){
            $this->createSession($data);
            redirect('dashboard/');
        }
        redirect('auth/');
    }
    public function login()
    {
        // $user = $this->model('userModel')->selectUserByUsername($_POST['username']);
        $petugas = $this->model('userModel')->selectPetugasByUsername($_POST['username']);
        $siswa = $this->model('userModel')->selectSiswaByUsername($_POST['username']);
        if ($petugas){
            $this->verifyPassword($petugas);
        }
        if ($siswa){
            $this->verifyPassword($siswa);
        }
    }
    public function logout()
    {
        session_destroy();
        unset($_SESSION['user']);
        redirect('auth');
    }
}
