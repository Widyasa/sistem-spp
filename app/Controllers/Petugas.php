<?php
class Petugas extends Controller{
    public function index()
    {
        $data['title'] = "Petugas";
        $this->view('templates/header');
        $this->view('templates/sidebar');
        $this->view('templates/header');
        $this->view('templates/footer');
    }

    public function addPetugas()
    {
        if ($this->model('petugasModel')->addPetugas($_POST['nama'])){
            $this->model('petugasModel')->addPetugasPengguna($_POST['username'],$_POST['password']);
            redirect('petugas');
        }
    }
}
