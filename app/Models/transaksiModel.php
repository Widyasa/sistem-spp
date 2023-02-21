<?php
class transaksiModel{
    private $transaksi = 'transaksi',
            $pembayaran = 'pembayaran',
            $siswa = 'siswa';
    private $db;
    
    public function __construct()
    {
       $this->db = new Database();
    }

    public function getDataBulan($data)
    {
        $bulan = date_format(date_create($data['bulan_tahun_bayar']), 'm');
        $tahun = date_format(date_create($data['bulan_tahun_bayar']), 'Y');
        $this->db->query("select * from {$this->transaksi} where `bulan_dibayar`=:bulan_dibayar && `tahun_dibayar`=:tahun_dibayar   && `siswa_id`=:siswa_id");
        $this->db->bind('bulan_dibayar', $bulan );
        $this->db->bind('tahun_dibayar', $tahun );
        $this->db->bind('siswa_id', $data['siswa_id'] );
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function addTransaksi($data)
    {
        $bulan = date_format(date_create($data['bulan_tahun_bayar']), 'm');
        $tahun = date_format(date_create($data['bulan_tahun_bayar']), 'Y');
        $this->db->query("INSERT into {$this->transaksi} values (:null, :tanggal_bayar, :bulan_bayar, :tahun_bayar, :siswa_id, :petugas_id, :pembayaran_id)");
        $this->db->bind('tanggal_bayar', date('YYYY-mm-dd'));
        $this->db->bind('bulan_bayar', $bulan);
        $this->db->bind('tahun_bayar', $tahun);
        $this->db->bind('siswa_id', $data['siswa_id']);
        $this->db->bind('petugas_id', $data['petugas_id']);
        $this->db->bind('pembayaran_id', $data['pembayaran_id']);

        $this->db->execute();
        return $this->db->rowCount();
    }
}