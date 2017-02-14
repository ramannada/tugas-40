<?php
use App\Barang;
use App\Laptop;

if (isset($_GET['delete'])) {
    $barang = new Barang;
    $barang->tmpDeleteBarang($_GET['delete']);
    $_SESSION['delete'] = 'sukses';
    header('location:../index.php');
}
?>
