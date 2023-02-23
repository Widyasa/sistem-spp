<?php
class Pembayaran extends Controller{
    public function index()
    {
        if(empty($_SESSION['user'])){
            redirect('auth');
        }
        
        $data['title'] = "Pembayaran";
        $data['pembayaran'] = $this->model('pembayaranModel')->selectAllPembayaran();
        // var_dump($data['petugas']); die();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('pages/admin/pembayaran', $data);
        $this->view('templates/footer', $data);
    }

    public function addPembayaran()
    {
        if ($this->model('pembayaranModel')->addPembayaran($_POST)>0){
            Flasher::setFlash('Berhasil', 'Ditambahkan', 'success');
            redirect('pembayaran');
        }
        Flasher::setFlash('Gagal', 'Ditambahkan', 'danger');
        redirect('pembayaran');
    }

    public function editPembayaran()
    {
        if ($this->model('pembayaranModel')->editPembayaran($_POST)>0){
            Flasher::setFlash('Berhasil', 'Diubah', 'success');

            redirect('pembayaran');
        }
        Flasher::setFlash('Gagal', 'Diubah', 'danger');
        redirect('pembayaran');
    }

    public function deletePembayaran()
    {
        if ($this->model('pembayaranModel')->deletePembayaran($_POST['pembayaran_id'])) {
            Flasher::setFlash('Berhasil', 'Dihapus', 'success');
            redirect('pembayaran');  
        }
        Flasher::setFlash('Gagal', 'Dihapus', 'danger');

    }
}
