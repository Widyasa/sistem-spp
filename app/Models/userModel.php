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
        $query = "SELECT * FROM {$this->pengguna} where `username`=:username";
        $this->db->query($query);
        $this->db->bind('username', $username);
        $this->db->execute();
        return $this->db->resultSingle();
    }

    public function selectPetugasByUsername($username)
    {
        $this->db->query("SELECT {$this->pengguna}.*, {$this->petugas}.* from {$this->pengguna} inner join {$this->petugas} on {$this->petugas}.pengguna_id = {$this->pengguna}.pengguna_id where {$this->pengguna}.username=:username");
        $this->db->bind('username', $username);
        $this->db->execute();
        return $this->db->resultSingle();
    }
    public function selectSiswaByUsername($username)
    {
        $this->db->query("SELECT {$this->pengguna}.*, {$this->siswa}.* from {$this->pengguna} inner join {$this->siswa} on {$this->siswa}.pengguna_id = {$this->pengguna}.pengguna_id where {$this->pengguna}.username=:username");
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
    public function selectSinglePetugas($data)
    {
        $query = " SELECT {$this->pengguna}.*, {$this->petugas}.* FROM {$this->pengguna} INNER JOIN {$this->petugas} ON {$this->pengguna}.pengguna_id = {$this->petugas}.pengguna_id WHERE {$this->pengguna}.role='petugas' and {$this->petugas}.petugas_id=:petugas_id ";
        $this->db->query($query);
        $this->db->bind('petugas_id', $data['petugas_id']);
        return $this->db->resultSingle();
        
        
    }
    public function selectAllSiswa()
    {
        $query = "SELECT {$this->siswa}.*, {$this->pengguna}.*, {$this->kelas}.*, {$this->pembayaran}.* from ((({$this->siswa} inner join {$this->pengguna} on {$this->siswa}.pengguna_id = {$this->pengguna}.pengguna_id) inner join {$this->kelas} on {$this->siswa}.kelas_id = {$this->kelas}.kelas_id) inner join {$this->pembayaran} on {$this->siswa}.pembayaran_id = {$this->pembayaran}.pembayaran_id)";
        $this->db->query($query);
        return $this->db->resultALl();
    }
    public function selectSiswaByNis()
    {
        $keyword = $_POST['nis'];
        $query = "SELECT {$this->siswa}.*, {$this->pengguna}.*, {$this->kelas}.*, {$this->pembayaran}.* from ((({$this->siswa} inner join {$this->pengguna} on {$this->siswa}.pengguna_id = {$this->pengguna}.pengguna_id) inner join {$this->kelas} on {$this->siswa}.kelas_id = {$this->kelas}.kelas_id) inner join {$this->pembayaran} on {$this->siswa}.pembayaran_id = {$this->pembayaran}.pembayaran_id) where :keyword = {$this->siswa}.nis";
        $this->db->query($query);
        $this->db->bind('keyword', $keyword);
        return $this->db->resultALl();
    }
    public function selectSiswaById()
    {
        $siswa_id = $_POST['siswa_id'];
        $query = "SELECT {$this->siswa}.*, {$this->pengguna}.*, {$this->kelas}.*, {$this->pembayaran}.* from ((({$this->siswa} inner join {$this->pengguna} on {$this->siswa}.pengguna_id = {$this->pengguna}.pengguna_id) inner join {$this->kelas} on {$this->siswa}.kelas_id = {$this->kelas}.kelas_id) inner join {$this->pembayaran} on {$this->siswa}.pembayaran_id = {$this->pembayaran}.pembayaran_id) where :siswa_id = {$this->siswa}.siswa_id";
        $this->db->query($query);
        $this->db->bind('siswa_id', $siswa_id);
        return $this->db->resultSingle();
    }


    public function selectSIngleSiswa()
    {
        $query = "SELECT {$this->siswa}.*, {$this->pengguna}.*, {$this->kelas}.*, {$this->pembayaran}.* from ((({$this->siswa} inner join {$this->pengguna} on {$this->siswa}.pengguna_id = {$this->pengguna}.pengguna_id) inner join {$this->kelas} on {$this->siswa}.kelas_id = {$this->kelas}.kelas_id) inner join {$this->pembayaran} on {$this->siswa}.pembayaran_id = {$this->pembayaran}.pembayaran_id)";
        $this->db->query($query);
        return $this->db->resultSingle();
    }

}
