<?php
namespace App;

use App\Config;

class Kategori
{
    private $db;

    public function __construct()
    {
        $this->db = new Config;
    }
    public function getKategori()
    {
        $query = "select id, nama from kategori";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll($this->db::FETCH_ASSOC);
    }
    public function getKategoriBarang($id)
    {
        $query = "select kategori.nama as nama from kategori inner join kategori_barang
        on kategori.id = kategori_barang.id_kategori where kategori_barang.id_barang = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id",$id);
        $stmt->execute();

        return $stmt->fetchAll($this->db::FETCH_ASSOC);
    }
    public function getKategoriChild($id)
    {
        $query = "select id, nama from kategori where parent = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id",$id);
        $stmt->execute();

        return $stmt->fetchAll($this->db::FETCH_ASSOC);
    }
    public function getKategoriParent()
    {
        $query = "select id, nama from kategori where parent = 0";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll($this->db::FETCH_ASSOC);
    }
}
 ?>
