<?php
namespace App;

use App\Config;

class Barang
{
    protected $db;

    public function __construct()
    {
        $this->db = new Config;
    }
    public function getBarang($del = 0)
    {
        $query = "select barang.kode_barang, barang.nama, barang.harga, barang.stok,
        barang.foto, kategori.nama as kategori from barang inner join kategori on
        barang.id_kategori = kategori.id where barang.deleted = :del";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":del",$del);


        $stmt->execute();
        return $stmt->fetchAll($this->db::FETCH_ASSOC);
    }
    public function getSatuBarang($kode_barang)
    {
        $query = "select barang.id, barang.kode_barang, barang.nama, barang.harga, barang.stok,
        barang.foto, kategori.nama as kategori from barang inner join kategori on
        barang.id_kategori = kategori.id where barang.kode_barang = :kode";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":kode",$kode_barang);
        $stmt->execute();
        return $stmt->fetchAll($this->db::FETCH_ASSOC);
    }
    public function addBarang($kode, $nama, $harga, $stok, $foto, $kategori)
    {
            $query = "insert into barang (kode_barang, nama, harga, stok, foto,id_kategori) values
            (:kode_barang, :nama, :harga, :stok, :foto,:kategori)";

            $stmt = $this->db->prepare($query);
            $stmt->bindParam(":kode_barang",$kode);
            $stmt->bindParam(":nama",$nama);
            $stmt->bindParam(":harga",$harga);
            $stmt->bindParam(":stok",$stok);
            $stmt->bindParam(":foto",$foto);
            $stmt->bindParam(":kategori",$kategori);
            $stmt->execute();

            $query = "select id from barang where kode_barang = :kode_barang";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(":kode_barang",$kode);
            $stmt->execute();

            $id = $stmt->fetchColumn();
            $query = "insert into laptop (id_barang) values (:id)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(":id",$id);
            $stmt->execute();
            return "sukses";

    }
    public function updateBarang($id, $kode, $nama, $harga, $stok, $foto, $kategori)
    {

            $query = "update barang set kode_barang = :kode_barang, nama = :nama,
            harga = :harga, stok = :stok, foto = :foto, id_kategori = :kategori where id = :id ";

            $stmt = $this->db->prepare($query);
            $stmt->bindParam(":id",$id);
            $stmt->bindParam(":kode_barang",$kode);
            $stmt->bindParam(":nama",$nama);
            $stmt->bindParam(":harga",$harga);
            $stmt->bindParam(":stok",$stok);
            $stmt->bindParam(":foto",$foto);
            $stmt->bindParam(":kategori", $kategori);
            $stmt->execute();
            return "sukses";

    }
    public function tmpDeleteBarang($id)
    {

            $query = "update barang set deleted = 1 where kode_barang = :id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(":id",$id);
            $stmt->execute();
            return "sukses";
    }
}
?>
