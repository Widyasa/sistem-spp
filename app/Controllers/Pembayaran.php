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
        if ($this->model('pembayaranModel')->addPembayaran($_POST)){
            redirect('pembayaran');
        }
        redirect('pembayaran');
    }

    public function editPembayaran()
    {
        if ($this->model('pembayaranModel')->editPembayaran($_POST)){
            redirect('pembayaran');
        }
        redirect('pembayaran');
    }

    public function deletePembayaran()
    {
        if ($this->model('pembayaranModel')->deletePembayaran($_POST['pembayaran_id'])) {
            redirect('pembayaran');  
        }
    }
}
