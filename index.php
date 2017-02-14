<?php
require __DIR__  . ('/vendor/autoload.php');
use App\Barang;

session_start();
if (isset($_GET['delete'])) {
    $barang = new Barang;
    $barang->tmpDeleteBarang($_GET['delete']);
    $_SESSION['delete'] = 'sukses';
    header('location:./index.php');
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>

        <!-- CSS bootsrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </head>
    <body>

        <?php include "./View/menu-admin.html"; ?>

        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <?php include "./View/kategori.php"; ?>
                </div>

                <div class="col-sm-10">
                    <?php if (isset($_GET['edit'])): ?>
                        <?php include "./View/edit.php";?>
                    <?php elseif (isset($_GET['tambah'])) : ?>
                        <?php include "./View/tambah.php"; ?>
                    <?php else: ?>
                        <?php if (isset($_SESSION['tambah'])): ?>
                            <p class="bg-success">Penambahan barang berhasil</p>
                            <?php unset($_SESSION['tambah']); ?>
                        <?php elseif (isset($_SESSION['edit'])): ?>
                            <p class="bg-success">Update barang berhasil</p>
                            <?php unset($_SESSION['edit']); ?>
                        <?php elseif(isset($_SESSION['delete'])): ?>
                            <p class="bg-success">Delete barang berhasil</p>
                            <?php
                            var_dump($_SESSION['delete']); 
                            unset($_SESSION['delete']); ?>
                        <?php
                            endif; ?>
                        <?php include "./View/item.php";?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </body>
</html>
