<?php
class petugasModel{
    private $petugas ='petugas',
            $pengguna = 'pengguna';

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addPetugas($data)
    {   try{
        $this->db->query("insert into {$this->pengguna} values (null, :username, :password, 'petugas')");
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $data['password']);
        $this->db->execute();

        $limit = $this->getPenggunaLimit1();

        $query = "insert into {$this->petugas} values (null, :nama, :pengguna_id)";
            $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('pengguna_id', $limit['pengguna_id']);
        $this->db->execute();
        
        $this->db->commit();
        return true;
    } catch(Exception $e){
        $this->db->rollBack();
        return false;
    }


        
    }

    public function editPetugas($data)
    {
        try{
        $this->db->query("update  {$this->petugas} set `nama`=:nama where `petugas_id`=:petugas_id");
        $this->db->bind('petugas_id',$data['petugas_id']);
        $this->db->bind('nama', $data['nama']);
        $this->db->execute();
        
        $this->db->query("update {$this->pengguna} set `username`=:username, `password`=:password where `pengguna_id`=:pengguna_id");
        $this->db->bind('pengguna_id',$data['pengguna_id']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $data['password']);
        $this->db->execute(); 
        $this->db->commit();
        return true;
        }
        catch(Exception $e){
            $this->db->rollBack();
            return false;
        }
    }


    public function deletePetugas($id)
    {
        try{
        $this->db->query("DELETE from {$this->petugas} where `petugas_id`=:petugas_id");
        $this->db->bind('petugas_id',$id);
        $this->db->execute();
        $this->db->commit();
        return true;
        } catch(Exception $e){
            $this->db->rollBack();
            return false;
        }
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
