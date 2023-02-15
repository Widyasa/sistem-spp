<?php
class petugasModel{
    private $petugas ='petugas',
            $pengguna = 'pengguna';

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addPetugas($nama)
    {
        $query = "insert into {$this->petugas} values (null, :nama)";
//        $query.="insert into {$this->pengguna} values (null, :username, :password, 2)";
        $this->db->query($query);
        $this->db->bind('nama', $nama);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function addPetugasPengguna($data)
    {
        $this->db->query("insert into {$this->pengguna} values (null, :username, :password, 2)");
        $this->db->bind('username', $data['username']);
        $this->db->bind('username', $data['password']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function editetugas($data)
    {
        $query = "update  {$this->petugas} set `nama`=:nama where `id_petugas`=:id_petugas";
        $this->db->query($query);
        $this->db->bind('id_petugas',$data['id_petugas']);
        $this->db->bind('nama', $data['nama']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deletePetugas($id)
    {
        $this->db->query("delete from {$this->petugas} where `id_petugas`=:id_petugas");
        $this->db->bind('id_petugas',$id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
