<?php
class Petugas extends Controller{
    public function index()
    {
        if(empty($_SESSION['user'])){
            redirect('auth');
        }
        
        $data['title'] = "Petugas";
        $data['petugas'] = $this->model('userModel')->selectAllPetugas();
        // var_dump($data['petugas']); die();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('pages/admin/petugas', $data);
        $this->view('templates/footer', $data);
    }

    public function addPetugas()
    {
        if ($this->model('petugasModel')->addPetugas($_POST)>0){
            redirect('petugas');
        }
        redirect('petugas');
    }

    public function editPetugas()
    {
        if ($this->model('petugasModel')->editPetugas($_POST)>0){
            redirect('petugas');
        }
        redirect('petugas');
    }

    public function deletePetugas()
    {
        // var_dump($_POST['petugas_id']); die();

        if ($this->model('petugasModel')->deletePetugas($_POST['petugas_id'])>0) {
            redirect('petugas');
        }
    }
}
