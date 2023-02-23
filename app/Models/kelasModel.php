<?php

class kelasModel{
    private $kelas='kelas',
            $db;

    public function __construct()
    {
        $this->db = new Database();
    }        
    public function selectAllKelas()
    {
        $this->db->query("SELECT * from {$this->kelas}");
        return $this->db->resultAll();
    }

    public function addKelas($data)
    {
        try{
        $this->db->query("INSERT into {$this->kelas} values (null,:nama_kelas,:kompetensi_keahlian)");
        $this->db->bind('nama_kelas', $data['nama_kelas']);
        $this->db->bind('kompetensi_keahlian', $data['kompetensi_keahlian']);
        $this->db->execute();
        // return $this->db->rowCount();
        $this->db->commit();
        return true;
        } catch(Exception $e){
            $this->db->rollBack();
            return false;
        }
    }
    public function editKelas($data)
    {
        try{
        $this->db->query("UPDATE {$this->kelas} set `nama_kelas`=:nama_kelas,`kompetensi_keahlian`=:kompetensi_keahlian where `kelas_id`=:kelas_id");
        $this->db->bind('kelas_id', $data['kelas_id']);
        $this->db->bind('nama_kelas', $data['nama_kelas']);
        $this->db->bind('kompetensi_keahlian', $data['kompetensi_keahlian']);
        $this->db->execute();
        $this->db->commit();
        return true;
        } catch(Exception $e){
            $this->db->rollBack();
            return false;
        }
       
        
    }
    
    public function deleteKelas($id)
    {
        try{
            $this->db->query("DELETE from {$this->kelas} where `kelas_id`=:kelas_id");
            $this->db->bind('kelas_id', $id);
            $this->db->execute();
            $this->db->commit();
            return true;
        } catch(Exception $e){
            $this->db->rollBack();
            return false;
        }
    }
}