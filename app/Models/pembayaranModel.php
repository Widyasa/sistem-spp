<?php

class pembayaranModel{
    private $pembayaran='pembayaran',
            $db;

    public function __construct()
    {
        $this->db = new Database();
    }        
    public function selectAllPembayaran()
    {
        $this->db->query("SELECT * from {$this->pembayaran}");
        return $this->db->resultAll();
    }

    public function addPembayaran($data)
    {
        $this->db->query("INSERT into {$this->pembayaran} values (null,:tahun_ajaran,:nominal)");
        $this->db->bind('tahun_ajaran', $data['tahun_ajaran']);
        $this->db->bind('nominal', $data['nominal']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function editPembayaran($data)
    {
        $this->db->query("UPDATE {$this->pembayaran} set `tahun_ajaran`=:tahun_ajaran,`nominal`=:nominal where `pembayaran_id`=:pembayaran_id");
        $this->db->bind('pembayaran_id', $data['pembayaran_id']);
        $this->db->bind('tahun_ajaran', $data['tahun_ajaran']);
        $this->db->bind('nominal', $data['nominal']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    
    public function deletePembayaran($id)
    {
        $this->db->query("DELETE from {$this->pembayaran} where `pembayaran_id`=:pembayaran_id");
        $this->db->bind('pembayaran_id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}