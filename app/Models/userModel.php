<?php
class userModel{
    private $pengguna = 'pengguna';
    private $siswa = 'siswa';
    private $petugas = 'petugas';
    private $admin = 'admin';
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function selectUserByUsername($username)
    {
//        var_dump($username); die();
        $query = "SELECT * FROM {$this->pengguna} where `username`=:username";
        $this->db->query($query);
        $this->db->bind('username', $username);
        $this->db->execute();
        return $this->db->resultSingle();
    }

    public function selectAllPetugas()
    {
        $query = " SELECT {$this->pengguna}.*, {$this->petugas}.* FROM {$this->pengguna} INNER JOIN {$this->petugas} ON {$this->pengguna}.pengguna_id = {$this->petugas}.pengguna_id WHERE {$this->pengguna}.role='petugas' ";
        $this->db->query($query);
        return $this->db->resultAll();
        
        
    }
    public function selectAllSiswa()
    {
        $this->db->query("select * from {$this->pengguna} where `role`='siswa'");
        return $this->db->resultALl();
    }

}
