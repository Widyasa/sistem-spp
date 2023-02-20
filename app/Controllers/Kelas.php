<?php
class kelas extends Controller{
    public function index()
    {
        if(empty($_SESSION['user'])){
            redirect('auth');
        }
        
        $data['title'] = "Kelas";
        $data['kelas'] = $this->model('kelasModel')->selectAllKelas();
        // var_dump($data['petugas']); die();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('pages/admin/kelas', $data);
        $this->view('templates/footer', $data);
    }

    public function addKelas()
    {
        if ($this->model('kelasModel')->addKelas($_POST)){
            redirect('kelas');
        }
        redirect('kelas');
    }

    public function editKelas()
    {
        if ($this->model('kelasModel')->editKelas($_POST)){
            redirect('kelas');
        }
        redirect('kelas');
    }

    public function deleteKelas()
    {
        if ($this->model('kelasModel')->deleteKelas($_POST['kelas_id'])) {
            redirect('kelas');  
        }
    }
}
