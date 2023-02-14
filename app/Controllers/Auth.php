<?php
class Auth extends Controller {
    public function index()
    {
        if (isset($_SESSION['user'] ['id_pengguna'])){
            var_dump("halo"); die();
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
        $user = $this->model('userModel')->selectUserByUsername($_POST['username']);
//        var_dump($user); die();
        if ($user){
            $this->verifyPassword($user);
        }else{
            redirect('auth/');
        }
    }

    public function logout()
    {
        session_destroy();
        unset($_SESSION['user']);
        redirect('auth');
    }
}
