<?php
session_start();
require 'php/fonksiyonlar.php';
require 'php/sorgular.php';

oturumYoksaYonlenVeDur('index.php');

if($_POST){
    // Ekle butonunu basılıp form post edilmişse
    $formdanGelenUrunVerileri = [
        'ad'    => $_POST['ad']    ?? NULL, // Eger yoksa hata uretme yerine null yaz,
        'stok'  => $_POST['stok']  ?? NULL,
        'fiyat' => $_POST['fiyat'] ?? NULL
    ];

    urunEkle($formdanGelenUrunVerileri);

    yonlenVeDur('urunler.php');

}
require 'html/urun-ekle.php';

