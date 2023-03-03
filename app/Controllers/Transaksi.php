<?php
class Transaksi extends Controller
{
    public function index()
    {
        if(empty($_SESSION['user'])){
            redirect('auth');
        }
        
        $data['title'] = "Transaksi";
        if (isset($_POST['keyword'])) {
            $data['siswa'] = $this->model('userModel')->selectSiswaByNis();   
            $data['siswaSingle'] = $this->model('userModel')->selectSingleSiswa();
            $data['tahun_ajaran'] = explode('/', $data['siswaSingle']['tahun_ajaran']);
            $this->view('templates/header', $data);
            $this->view('templates/sidebar', $data);
            $this->view('pages/admin/transaksiSiswa', $data);
            $this->view('templates/footer', $data);
        } else{
            $this->view('templates/header', $data);
            $this->view('templates/sidebar', $data);
            $this->view('pages/admin/transaksi', $data);
            $this->view('templates/footer', $data);
        }

       
    }

    public function addTransaksi()
    {
        $condition = $this->model('transaksiModel')->getDataBulan($_POST);
        if($condition == 0){
            if ($this->model('transaksiModel')->addTransaksi($_POST)){
                Flasher::setFlash('Pembayaran SPP Berhasil', 'Ditambahkan', 'success');
                redirect('transaksi');
            }
        }
        Flasher::setFlash('Pembayaran SPP', 'Sudah Ada', 'danger');

        redirect('transaksi');
        
    }

    

    
}
