<?php
class Laporan extends Controller{
    public function index()
    {
        if(empty($_SESSION['user'])){
            redirect('auth');
        }
        
        $data['title'] = "Laporan";
        $data['siswa'] = $this->model('userModel')->selectAllSiswa();
        $data['laporan'] = $this->model('transaksiModel')->selectAllTransaksi();
        $data['siswaSingle'] = $this->model('userModel')->selectSingleSiswa();
        $data['tahun_ajaran'] = explode('/', $data['siswaSingle']['tahun_ajaran']);
        // $data['petugas'] = $this->model('userModel')->selectSinglePetugas();
        
        // var_dump($data['petugas']); die();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('pages/admin/laporan', $data);
        $this->view('templates/footer', $data);
    }

  

    

    
}
