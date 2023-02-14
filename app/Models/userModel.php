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

}
