<?php require 'tema/ust.php' ;?>

    <div class="d-flex">
        <h1 class="me-auto" >Ürünler</h1>
        <div class="ms-auto">
            <a class="btn btn-success" href="urun-ekle.php">
                <i class="fa-regular fa-plus"></i>
                Ürün Ekle</a>
        </div>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th>NO</th>
            <th>AD</th>
            <th>STOK</th>
            <th>FIYAT</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($urunler as $item => $urun ){   ?>
            <tr>
                <td><?=$urun['NO'] ?></td>
                <td><?=$urun['AD'] ?></td>
                <td><?=$urun['STOK'] ?></td>
                <td><?=$urun['FIYAT'] ?></td>
                <td class="text-end">
                    <a class="btn btn-sm btn-primary" href="urun-duzenle.php?urun-no=<?=$urun['NO'] ?>">
                        <i class="fa-solid fa-pen-to-square"></i>
                        Düzenle</a>
                    <a class="btn btn-sm btn-danger" href="urun-sil.php?urun-no=<?=$urun['NO'] ?>">
                        <i class="fa-solid fa-trash-can"></i>
                        Sil</a>
                </td>
            </tr>
        <?php  } ?>
        </tbody>
    </table>
<nav>
    <ul class="pagination">
        <?php for($i=1; $i<=$toplamSayfaSayisi; $i++){
        $active = ($i==$sayfa) ? 'active': ''; // if in kısa kullanım şeklidir
        ?>
            <li class="page-item <?=$active ?> "><a class="page-link" href="?sayfa=<?=$i ?>"><?=$i?></a></li>
        <?php } ?>

    </ul>
</nav>

</div>


