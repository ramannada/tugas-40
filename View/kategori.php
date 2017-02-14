<?php
use App\Kategori;
?>
<ul class="list-group">
    <a href="#"><li class="list-group-item">Semua</li></a>
</ul>
<?php
    $kategori = new Kategori;
    $kategoriParent = $kategori->getKategoriParent();
    foreach ($kategoriParent as  $val) :
 ?>
    <ul class="list-group">
        <a href="#"><li class="list-group-item"><?=$val['nama']?></li></a>
        <?php
        $kategoriChild = $kategori->getKategoriChild($val['id']);
        foreach ($kategoriChild as $value): ?>
        <a href="#"><li class="list-group-item"><?=$value['nama']?></li></a>
        <?php endforeach; ?>
    </ul>
<?php endforeach; ?>
