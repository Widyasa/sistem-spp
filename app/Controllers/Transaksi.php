<?php
class Siswa extends Controller{
    public function index()
    {
        if(empty($_SESSION['user'])){
            redirect('auth');
        }
        
        $data['title'] = "Transaksi";
        $data['siswa'] = $this->model('userModel')->selectAllSiswa();
        $data['siswaSingle'] = $this->model('userModel')->selectSingleSiswa();
        $data['tahun_ajaran'] = explode('/', $data['siswaSingle']['tahun_ajaran']);
        // $data['kelas'] = $this->model('kelasModel')->selectAllKelas();
        // $data['pembayaran'] = $this->model('pembayaranModel')->selectAllPembayaran();
        
        // var_dump($data['petugas']); die();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('pages/admin/transaksi', $data);
        $this->view('templates/footer', $data);
    }

    public function addTransaksi()
    {
        $condition = $this->model('transaksiModel')->getDataBulan($_POST);
        if($condition == 0){
            if ($this->model('transaksiModel')->addTransaksi($_POST)){
                redirect('transaksi');
            }
        }
        redirect('transaksi');
        
    }

    
}
