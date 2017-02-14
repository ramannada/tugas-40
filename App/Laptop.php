<?php
namespace App;

use App\Barang;

class Laptop extends Barang
{
    public function getLaptop()
    {
        $query = "select barang.kode_barang, barang.nama, barang.harga, barang.stok,
        barang.foto, laptop.layar, laptop.prosesor, laptop.vga, laptop.ram, laptop.harddrive,
        laptop.ssd, laptop.optical_drive, laptop.webcam, laptop.os, laptop.garansi,
        laptop.keterangan from barang inner join laptop on barang.id = laptop.id_barang
        where deleted = 0";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $stmt->fetchAll($this->db::FETCH_ASSOC);
    }
    public function addLaptop($id, $layar, $prosesor, $vga, $ram, $harddrive, $ssd,
    $optical_drive, $webcam, $os, $garansi, $keterangan)
    {
        $query = "insert into laptop (id_barang, layar, prosesor, vga, ram, harddrive, ssd,
        optical_drive, webcam, os, garansi, keterangan) values (:id_barang, :layar, : prosesor, :vga,
        :ram, :harddrive, :ssd, :optical_drive, :webcam, :os, :garansi, :keterangan)";

        $this->db->prepare($query);
        $this->db->bindParam(":id_barang", $id);
        $this->db->bindParam(":layar", $layar);
        $this->db->bindParam(":prosesor", $prosesor);
        $this->db->bindParam(":vga", $vga);
        $this->db->bindParam(":ram", $ram);
        $this->db->bindParam(":harddrive", $harddrive);
        $this->db->bindParam(":ssd", $ssd);
        $this->db->bindParam(":optical_drive", $optical_drive);
        $this->db->bindParam(":webcam", $webcam);
        $this->db->bindParam(":os", $os);
        $this->db->bindParam(":garansi", $garansi);
        $this->db->bindParam(":keterangan", $keterangan);
        $this->db->execute();
        return "sukses";
    }
    public function updateLaptop($id_barang, $layar, $prosesor, $vga, $ram, $harddrive, $ssd,
    $optical_drive, $webcam, $os, $garansi, $keterangan)
    {
        $query = "update laptop set  layar = :layar, prosesor = :prosesor,
        vga = :vga, ram = :ram, harddrive = :hdd, ssd = :ssd, optical_drive = :optical_drive,
        webcam = :webcam, os = :os, garansi = :garansi, keterangan = :keterangan where
        id_barang = :id_barang";
        $db->prepare($query);
        $this->db->prepare($query);
        $this->db->prepare($query);
        $this->db->bindParam(":id_barang", $id);
        $this->db->bindParam(":layar", $layar);
        $this->db->bindParam(":prosesor", $prosesor);
        $this->db->bindParam(":vga", $vga);
        $this->db->bindParam(":ram", $ram);
        $this->db->bindParam(":harddrive", $harddrive);
        $this->db->bindParam(":ssd", $ssd);
        $this->db->bindParam(":optical_drive", $optical_drive);
        $this->db->bindParam(":webcam", $webcam);
        $this->db->bindParam(":os", $os);
        $this->db->bindParam(":garansi", $garansi);
        $this->db->bindParam(":keterangan", $keterangan);
        $this->db->execute();

        return "sukses";
    }
    public function tmpDeleteLaptop($id_barang)
    {
        $query = "update laptop set deleted = 1 where id_barang = :id_barang";
        $db->prepare($query);
        $db->bindParam(":id_barang", $id_barang);
        $db->execute();
        return "sukses";
    }
}
?>
