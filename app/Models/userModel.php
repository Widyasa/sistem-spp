<?php
class userModel{
    private $pengguna = 'pengguna';
    private $siswa = 'siswa';
    private $petugas = 'petugas';
    private $admin = 'admin';
    private $kelas = 'kelas';
    private $pembayaran = 'pembayaran';
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
    public function selectSinglePetugas()
    {
        $query = " SELECT {$this->pengguna}.*, {$this->petugas}.* FROM {$this->pengguna} INNER JOIN {$this->petugas} ON {$this->pengguna}.pengguna_id = {$this->petugas}.pengguna_id WHERE {$this->pengguna}.role='petugas' ";
        $this->db->query($query);
        return $this->db->resultSingle();
        
        
    }
    public function selectAllSiswa()
    {
        $query = "SELECT {$this->siswa}.*, {$this->pengguna}.*, {$this->kelas}.*, {$this->pembayaran}.* from ((({$this->siswa} inner join {$this->pengguna} on {$this->siswa}.pengguna_id = {$this->pengguna}.pengguna_id) inner join {$this->kelas} on {$this->siswa}.kelas_id = {$this->kelas}.kelas_id) inner join {$this->pembayaran} on {$this->siswa}.pembayaran_id = {$this->pembayaran}.pembayaran_id)";
        $this->db->query($query);
        return $this->db->resultALl();
    }
    public function selectSIngleSiswa()
    {
        $query = "SELECT {$this->siswa}.*, {$this->pengguna}.*, {$this->kelas}.*, {$this->pembayaran}.* from ((({$this->siswa} inner join {$this->pengguna} on {$this->siswa}.pengguna_id = {$this->pengguna}.pengguna_id) inner join {$this->kelas} on {$this->siswa}.kelas_id = {$this->kelas}.kelas_id) inner join {$this->pembayaran} on {$this->siswa}.pembayaran_id = {$this->pembayaran}.pembayaran_id)";
        $this->db->query($query);
        return $this->db->resultSingle();
    }

}
