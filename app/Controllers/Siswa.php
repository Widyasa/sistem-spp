<?php
class Siswa extends Controller{
    public function index()
    {
        if(empty($_SESSION['user'])){
            redirect('auth');
        }
        $data['title'] = "Siswa";
   

        if(isset($_POST['nis'])){
            $data['siswa'] = $this->model('userModel')->selectSiswaByNis();
            $data['kelas'] = $this->model('kelasModel')->selectAllKelas();
            $data['pembayaran'] = $this->model('pembayaranModel')->selectAllPembayaran();
            $this->view('templates/header', $data);
            $this->view('templates/sidebar', $data);
            $this->view('pages/admin/crudSiswa', $data);
            $this->view('templates/footer', $data);
        } else{
            $data['kelas'] = $this->model('kelasModel')->selectAllKelas();
            $data['pembayaran'] = $this->model('pembayaranModel')->selectAllPembayaran();
            $this->view('templates/header', $data);
            $this->view('templates/sidebar', $data);
            $this->view('pages/admin/siswa', $data);
            $this->view('templates/footer', $data);
        }
  
    }


    public function addSiswa()
    {
        if ($this->model('siswaModel')->addSiswa($_POST)>0){
             Flasher::setFlash('Berhasil', 'Ditambahkan', 'success');
             $data['title'] = "Siswa";
             if(isset($_POST['nis'])){
                $data['siswa'] = $this->model('userModel')->selectSiswaByNis();
                $data['kelas'] = $this->model('kelasModel')->selectAllKelas();
                $data['pembayaran'] = $this->model('pembayaranModel')->selectAllPembayaran();
                $this->view('templates/header', $data);
                $this->view('templates/sidebar', $data);
                $this->view('pages/admin/crudSiswa', $data);
                $this->view('templates/footer', $data);
             }
             else{
                $data['kelas'] = $this->model('kelasModel')->selectAllKelas();
                $data['pembayaran'] = $this->model('pembayaranModel')->selectAllPembayaran();
                $this->view('templates/header', $data);
                $this->view('templates/sidebar', $data);
                $this->view('pages/admin/siswa', $data);
                $this->view('templates/footer', $data);
             }
     
        }
        Flasher::setFlash('Gagal', 'Data', 'danger');
        if(isset($_POST['nis'])){
            $data['siswa'] = $this->model('userModel')->selectSiswaByNis();
            $data['kelas'] = $this->model('kelasModel')->selectAllKelas();
            $data['pembayaran'] = $this->model('pembayaranModel')->selectAllPembayaran();
            $this->view('templates/header', $data);
            $this->view('templates/sidebar', $data);
            $this->view('pages/admin/crudSiswa', $data);
            $this->view('templates/footer', $data);
         }
         else{
            $data['kelas'] = $this->model('kelasModel')->selectAllKelas();
            $data['pembayaran'] = $this->model('pembayaranModel')->selectAllPembayaran();
            $this->view('templates/header', $data);
            $this->view('templates/sidebar', $data);
            $this->view('pages/admin/siswa', $data);
            $this->view('templates/footer', $data);
         }
        
    }

    public function editSiswa()
    {
      
        if ($this->model('siswaModel')->editSiswa($_POST)>0){
            Flasher::setFlash('Berhasil', 'Diubah', 'success');
            $data['title'] = "Siswa";
             if(isset($_POST['nis'])){
                $data['siswa'] = $this->model('userModel')->selectSiswaByNis();
                $data['kelas'] = $this->model('kelasModel')->selectAllKelas();
                $data['pembayaran'] = $this->model('pembayaranModel')->selectAllPembayaran();
                $this->view('templates/header', $data);
                $this->view('templates/sidebar', $data);
                $this->view('pages/admin/crudSiswa', $data);
                $this->view('templates/footer', $data);
             }
             else{
                $data['kelas'] = $this->model('kelasModel')->selectAllKelas();
                $data['pembayaran'] = $this->model('pembayaranModel')->selectAllPembayaran();
                $this->view('templates/header', $data);
                $this->view('templates/sidebar', $data);
                $this->view('pages/admin/siswa', $data);
                $this->view('templates/footer', $data);
             }
        }
            Flasher::setFlash('Gagal', 'Diubah', 'danger');
            $data['title'] = "Siswa";
             if(isset($_POST['nis'])){
                $data['siswa'] = $this->model('userModel')->selectSiswaByNis();
                $data['kelas'] = $this->model('kelasModel')->selectAllKelas();
                $data['pembayaran'] = $this->model('pembayaranModel')->selectAllPembayaran();
                $this->view('templates/header', $data);
                $this->view('templates/sidebar', $data);
                $this->view('pages/admin/crudSiswa', $data);
                $this->view('templates/footer', $data);
             }
             else{
                $data['kelas'] = $this->model('kelasModel')->selectAllKelas();
                $data['pembayaran'] = $this->model('pembayaranModel')->selectAllPembayaran();
                $this->view('templates/header', $data);
                $this->view('templates/sidebar', $data);
                $this->view('pages/admin/siswa', $data);
                $this->view('templates/footer', $data);
             }
        
    }

    public function deleteSiswa()
    {
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
