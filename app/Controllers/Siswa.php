<?php
class Siswa extends Controller{
    public function index()
    {
        if(empty($_SESSION['user'])){
            redirect('auth');
        }
        
        $data['title'] = "Siswa";
        $data['siswa'] = $this->model('userModel')->selectAllSiswa();
        $data['kelas'] = $this->model('kelasModel')->selectAllKelas();
        $data['pembayaran'] = $this->model('pembayaranModel')->selectAllPembayaran();
        
        // var_dump($data['petugas']); die();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('pages/admin/siswa', $data);
        $this->view('templates/footer', $data);
    }

    public function addSiswa()
    {
        if ($this->model('siswaModel')->addSiswa($_POST)){
            redirect('siswa');
        }
        redirect('siswa');
    }

    public function editSiswa()
    {
        if ($this->model('siswaModel')->editSiswa($_POST) || $this->model('siswaModel')->editPengguna($_POST)){
            redirect('siswa');
        }
        redirect('siswa');
    }

    public function deleteSiswa()
    {
        // var_dump($_POST['petugas_id']); die();

        if ($this->model('siswaModel')->deleteSiswa($_POST['siswa_id'])) {
            redirect('siswa');
        }
    }
}
