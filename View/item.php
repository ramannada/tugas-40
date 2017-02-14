<?php

use App\Barang;
?>
        <div class="row">
            <div class="col-sm-11">
                <h3>Barang</h3>
            </div>
            <div class="col-sm-1">
                <a href="index.php/?tambah=1" class="btn btn-primary pull-right">Tambah</a>
            </div>
        </div>

        <table class="table table-striped table-hover">
            <tr>
                <th>Kode Barang</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Foto</th>
                <th>Kategori</th>
                <th>Detail</th>
                <th>Edit</th>
                <th></th>
            </tr>
            <?php
            $barang = new Barang;
            $dataBarang = $barang->getBarang();
            if (empty($dataBarang)) {
                $dataBarang = [];
            }
            foreach ($dataBarang as $key => $val) :
            ?>
                <tr>
                    <td><?=$val['kode_barang']?></td>
                    <td><?=$val['nama']?></td>
                    <td><?=$val['harga']?></td>
                    <td><?=$val['stok']?></td>
                    <td><?=$val['foto']?></td>
                    <td><?=$val['kategori']?></td>
                    <td><a href="#" class="btn btn-info">Detail Barang</a></td>
                    <td>
                        <a href="index.php?edit=<?=$val['kode_barang']?>" class="btn btn-warning">Edit</a></td>
                        <td><a href="index.php?delete=<?=$val['kode_barang']?>" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>



<!-- <div class="container">
    <div class="row">
        <div class="col-sm-2">
            <ul class="list-group">
                <a href="#"><li class="list-group-item">Barang</li></a>
            </ul>
        </div>

        <div class="col-sm-10">
                <h1 class="page-header">Daftar Barang</h1>
                <a href="#" class="btn btn-primary pull-right">Tambah</a>
        </div>
    </div>
</div> -->
