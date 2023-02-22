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
        if ($this->model('siswaModel')->addSiswa($_POST)>0){
             Flasher::setFlash('Berhasil', 'Ditambahkan', 'success');
            redirect('siswa');
        }
        Flasher::setFlash('Gagal', 'Data', 'danger');
        redirect('siswa');
    }

    public function editSiswa()
    {
        if ($this->model('siswaModel')->editSiswa($_POST)>0){
            Flasher::setFlash('Berhasil', 'Diubah', 'success');
            redirect('siswa');
        }
            Flasher::setFlash('Gagal', 'Ditambahkan', 'danger');
            redirect('siswa');
        
    }

    public function deleteSiswa()
    {
        // var_dump($_POST['petugas_id']); die();

        if ($this->model('siswaModel')->deleteSiswa($_POST['siswa_id'])==1) {
            Flasher::setFlash('Berhasil', 'Dihapus', 'success');
            redirect('siswa');
        }
    }

    public function detailTransaksi($id)
    {
        $data['transaksiSingle'] = $this->model('transaksiModel')->selectTransaksiBySiswa($id);

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('pages/admin/detailTransaksi', $data);
        $this->view('templates/footer', $data);

    }
}
