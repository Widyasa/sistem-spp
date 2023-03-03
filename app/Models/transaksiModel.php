<?php
class transaksiModel{
    private $transaksi = 'transaksi',
            $pembayaran = 'pembayaran',
            $siswa = 'siswa',
            $petugas = 'petugas';
    private $db;
    
    public function __construct()
    {
       $this->db = new Database();
    }

    public function selectTransaksiBySiswa()
    {
        $this->db->query("SELECT {$this->transaksi}.*, {$this->siswa}.nama as 'nama_siswa', {$this->petugas}.nama as 'nama_petugas', {$this->pembayaran}.* from transaksi inner join petugas on petugas.petugas_id = transaksi.petugas_id inner join pembayaran on transaksi.pembayaran_id = pembayaran.pembayaran_id inner join siswa on siswa.siswa_id = transaksi.siswa_id   where transaksi.siswa_id=:siswa_id");
        $this->db->bind('siswa_id', $_SESSION['user']['siswa_id']);
        $this->db->execute();
        return $this->db->resultAll();   
    }
    public function selectTransaksiByPetugas()
    {
        $this->db->query("SELECT {$this->transaksi}.*, {$this->siswa}.nama as 'nama_siswa', {$this->petugas}.nama as 'nama_petugas', {$this->pembayaran}.* from transaksi inner join petugas on petugas.petugas_id = transaksi.petugas_id inner join pembayaran on transaksi.pembayaran_id = pembayaran.pembayaran_id inner join siswa on transaksi.siswa_id = siswa.siswa_id where transaksi.petugas_id=:petugas_id");
        $this->db->bind('petugas_id', $_SESSION['user']['petugas_id']);
        $this->db->execute();
        return $this->db->resultAll();   
    }
    public function selectAllTransaksi()
    {
        $this->db->query("SELECT {$this->transaksi}.*, {$this->petugas}.nama as 'nama_petugas', {$this->siswa}.nama as 'nama_siswa', {$this->pembayaran}.* from transaksi inner join petugas on petugas.petugas_id = transaksi.petugas_id inner join pembayaran on transaksi.pembayaran_id = pembayaran.pembayaran_id inner join siswa on siswa.siswa_id = transaksi.siswa_id");
        return $this->db->resultAll();   
    }


    public function getDataBulan($data)
    {
        $this->db->query("SELECT * from {$this->transaksi} where `bulan_dibayar`=:bulan_dibayar and `tahun_dibayar`=:tahun_dibayar and `siswa_id`=:siswa_id");
        $this->db->bind('bulan_dibayar', $data['bulan_dibayar'] );
        $this->db->bind('tahun_dibayar', $data['tahun_dibayar'] );
        $this->db->bind('siswa_id', $data['siswa_id'] );
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function addTransaksi($data)
    {
        try{
        $this->db->query("INSERT into {$this->transaksi}  values (null, :tanggal_bayar, :bulan_dibayar, :tahun_dibayar, :siswa_id, :petugas_id, :pembayaran_id)");
        $this->db->bind('tanggal_bayar', date("Y/m/d H:i:s"));
        $this->db->bind('bulan_dibayar', $data['bulan_dibayar']);
        $this->db->bind('tahun_dibayar', $data['tahun_dibayar']);
        $this->db->bind('siswa_id', $data['siswa_id']);
        $this->db->bind('petugas_id', $data['petugas_id']);
        $this->db->bind('pembayaran_id', $data['pembayaran_id']);
        $this->db->execute();
        $this->db->commit();
        return true;
        } catch(Exception $e){
            $this->db->rollBack();
            return false;
        }
    } 
}