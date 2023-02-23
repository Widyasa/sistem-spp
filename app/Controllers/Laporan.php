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
        if($_SESSION['user']['role']=='siswa'){
        $data['laporan_siswa'] = $this->model('transaksiModel')->selectTransaksiBySiswa();
        }
        if($_SESSION['user']['role']=='petugas' || $_SESSION['user']['role'] == 'admin'){
            $data['laporan_petugas'] = $this->model('transaksiModel')->selectTransaksiByPetugas();  
        }
        // $data['petugas'] = $this->model('userModel')->selectSinglePetugas();
        
        // var_dump($data['petugas']); die();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('pages/admin/laporan', $data);
        $this->view('templates/footer', $data);
    }
    public function laporan()
    {
        $data['title'] = 'Generate Laporan';
        $data['laporan'] = $this->model('transaksiModel')->selectAllTransaksi();
        $this->view('templates/header', $data);
        $this->view('pages/admin/generateLaporan', $data);
    }

  

    

    
}
