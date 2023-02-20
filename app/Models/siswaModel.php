<?php
class siswaModel{
    private $siswa ='siswa',
            $pengguna = 'pengguna';

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addSiswa($data)
    {   
        $this->db->query("insert into {$this->pengguna} values (null, :username, :password, 'siswa')");
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $data['password']);
        $this->db->execute();

        $limit = $this->getPenggunaLimit1();

        $query = "insert into {$this->siswa} values (null, :nisn, :nis,  :nama, :alamat, :telepon, :kelas_id, :pengguna_id, :pembayaran_id)";
            $this->db->query($query);
        $this->db->bind('nisn', $data['nisn']);
        $this->db->bind('nis', $data['nis']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('telepon', $data['telepon']);
        $this->db->bind('kelas_id', $data['kelas_id']);
        $this->db->bind('pengguna_id', $limit['pengguna_id']);
        $this->db->bind('pembayaran_id', $data['pembayaran_id']);
        $this->db->execute();


        return $this->db->rowCount();
    }



    public function editSiswa($data)
    {
        $this->db->query("update  {$this->siswa} set `nisn`=:nisn, `nis`=:nis, `nama`=:nama, `alamat`=:alamat, `telepon`=:telepon, `kelas_id`=:kelas_id, `pengguna_id`=:pengguna_id, `pembayaran_id`=:pembayaran_id where `siswa_id`=:siswa_id");
        $this->db->bind('siswa_id', $data['siswa_id']);
        $this->db->bind('nisn', $data['nisn']);
        $this->db->bind('nis', $data['nis']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('telepon', $data['telepon']);
        $this->db->bind('kelas_id', $data['kelas_id']);
        $this->db->bind('pengguna_id', $data['pengguna_id']);
        $this->db->bind('pembayaran_id', $data['pembayaran_id']);
        $this->db->execute();
        
        
        return $this->db->rowCount();
    }

    public function editPengguna($data)
    {
        $this->db->query("update {$this->pengguna} set `username`=:username, `password`=:password where `pengguna_id`=:pengguna_id");
        $this->db->bind('pengguna_id',$data['pengguna_id']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $data['password']);
        $this->db->execute();   

        return $this->db->rowCount();
    }
    public function deleteSiswa($id)
    {
        $this->db->query("DELETE from {$this->siswa} where `siswa_id`=:siswa_id");
        $this->db->bind('siswa_id',$id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getPenggunaLimit1()
    {
        $query = "select * from {$this->pengguna} order by `pengguna_id` desc limit 1";
        $this->db->query($query);
        return $this->db->resultSingle();
    }
    public function selectPenggunaById($data)
    {
        $this->db->query("SELECT * FROM {$this->pengguna} WHERE `pengguna_id`=:pengguna_id ");
        $this->db->bind('pengguna_id', $data['pengguna_id']);
        return $this->db->resultSingle();
    }
}
