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
        $this->db->query("INSERT into {$this->kelas} values (null,:nama,:kompetensi_keahlian)");
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('kompetensi_keahlian', $data['kompetensi_keahlian']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function editKelas($data)
    {
        $this->db->query("UPDATE {$this->kelas} set `nama`=:nama,`kompetensi_keahlian`=:kompetensi_keahlian where `kelas_id`=:kelas_id");
        $this->db->bind('kelas_id', $data['kelas_id']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('kompetensi_keahlian', $data['kompetensi_keahlian']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    
    public function deleteKelas($id)
    {
        $this->db->query("DELETE from {$this->kelas} where `kelas_id`=:kelas_id");
        $this->db->bind('kelas_id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}