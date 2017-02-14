<?php
use App\Barang;
use App\Kategori;
// session_start();
$barang = new Barang;

if (isset($_POST['simpan'])) {
    $barang->updateBarang($_POST['id'],$_POST['kode_barang'], $_POST['nama'],
    $_POST['harga'], $_POST['stok'], $_POST['foto'], $_POST['kategori']);
    $_SESSION['edit'] = 'sukses';
    header('location:./index.php');
}


$data = $barang->getSatuBarang($_GET['edit']);
foreach ($data as $val):
?>

<form method="post">
    <div class="form-group">
        <label for="kode_barang">Kode Barang</label>
        <input type="text" name="kode_barang"  class="form-control" value="<?=$val['kode_barang']?>">
    </div>
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" name="nama" class="form-control" value="<?=$val['nama']?>">
    </div>
    <div class="form-group">
        <label for="harga">Harga</label>
        <input type="text" name="harga" class="form-control" value="<?=$val['harga']?>">
    </div>
    <div class="form-group">
        <label for="stok">Stok</label>
        <input type="stok" name="stok" class="form-control" value="<?=$val['stok']?>">
    </div>
    <div class="form-group">
        <label for="foto">Foto</label>
        <input type="file" name="foto" class="form-control" value="<?=$val['foto']?>">
    </div>
    <div class="form-group">
        <label for="kategori">Kategori</label>
        <div class="form-group">
            <select class="form-control" name="kategori">
                <?php
                $kategori = new Kategori;
                $kategoriData = $kategori->getKategori();
                foreach ($kategoriData as $value) :
                ?>

                    <option value="<?=$value['id']?>"><?=$value['nama']?></option>

                <?php endforeach; ?>
            </select>
        </div>

        <input type="hidden" name="id" value="<?=$val['id']?>">
        <button type="submit" name="simpan" value="1" class="btn btn-info btn-block">Simpan</button>
    </div>
</form>
<?php endforeach; ?>
