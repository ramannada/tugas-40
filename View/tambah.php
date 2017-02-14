<?php
use App\Barang;
use App\Kategori;
// session_start();

if (isset($_POST['simpan'])) {
    $barang = new Barang;
    $barang->addBarang($_POST['kode_barang'],$_POST['nama'],$_POST['harga'],
    $_POST['stok'], $_POST['foto'],$_POST['kategori']);
    $_SESSION['tambah'] = "sukses";
    header('location:index.php');
}
 ?>

 <form method="post">
     <div class="form-group">
         <label for="kode_barang">Kode Barang</label>
         <input type="text" name="kode_barang"  class="form-control" >
     </div>
     <div class="form-group">
         <label for="nama">Nama</label>
         <input type="text" name="nama" class="form-control" >
     </div>
     <div class="form-group">
         <label for="harga">Harga</label>
         <input type="text" name="harga" class="form-control" >
     </div>
     <div class="form-group">
         <label for="stok">Stok</label>
         <input type="stok" name="stok" class="form-control" >
     </div>
     <div class="form-group">
         <label for="foto">Foto</label>
         <input type="file" name="foto" class="form-control" >
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

         <button type="submit" name="simpan" value="1" class="btn btn-info btn-block">Simpan</button>
     </div>
 </form>
