<?php require 'tema/ust.php' ;?>
    <div class="d-flex">
        <h1 class="me-auto" >Ürün Ekle</h1>
        <div class="ms-auto">
            <a class="btn btn-success" href="urunler.php">
                <i class="fa-solid fa-backward"></i>
                Geri Gel</a>
        </div>
    </div>
    <form action="urun-ekle.php" method="post">
        <div class="mb-3">
            <label> Ad </label><span class="text-danger">
            <input class="form-control " type="text" name="ad" required>
        </div>
        <div class="mb-3">
            <label>Stok </label><span class="text-danger"> </span>
            <input class="form-control" type="number" name="stok" required>
        </div>
        <div class="mb-3">
            <label>Fiyat </label><span class="text-danger"> </span>
            <input class="form-control" type="number" step="0.1" name="fiyat" required>
        </div>
        <button class="btn btn-primary btn-lg w-100">Ekle</button>
    </form>
</div>

<?php require 'tema/alt.php' ;?>