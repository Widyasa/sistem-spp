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
        try{
        $this->db->query("INSERT into {$this->pembayaran} values (null,:tahun_ajaran,:nominal)");
        $this->db->bind('tahun_ajaran', $data['tahun_ajaran']);
        $this->db->bind('nominal', $data['nominal']);
        $this->db->execute();
        $this->db->commit();
        return true;
        } catch(Exception $e){
            $this->db->rollBack();
            return false;
        }
        
    }
    public function editPembayaran($data)
    {
        try{
        $this->db->query("UPDATE {$this->pembayaran} set `tahun_ajaran`=:tahun_ajaran,`nominal`=:nominal where `pembayaran_id`=:pembayaran_id");
        $this->db->bind('pembayaran_id', $data['pembayaran_id']);
        $this->db->bind('tahun_ajaran', $data['tahun_ajaran']);
        $this->db->bind('nominal', $data['nominal']);
        $this->db->execute();
        $this->db->commit();
        return true;
        } catch(Exception $e){
            $this->db->rollBack();
            return false;
        }
        
    }
    
    public function deletePembayaran($id)
    {
        try{
        $this->db->query("DELETE from {$this->pembayaran} where `pembayaran_id`=:pembayaran_id");
        $this->db->bind('pembayaran_id', $id);
        $this->db->execute();
        $this->db->commit();
        return true;
        } catch(Exception $e){
            $this->db->rollBack();
            return false;
        }
    }
}