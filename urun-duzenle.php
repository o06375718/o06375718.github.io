<?php
session_start();

require 'php/fonksiyonlar.php';
require 'php/sorgular.php';

oturumYoksaYonlenVeDur('index.php');



// $_GET ile de kontrol edebilirdik ama veri döndürmüyorsa bu çalışmayacak
if($_SERVER['REQUEST_METHOD']== 'GET'){
    // Sayfa get ile görüntüleniyorsa
    // Get ile görüntülediğimizde urun-np adres satırında illetildiği için biliniyor ama duzenle ye basıp post ettiğimizde bilemiyoruz
    $urunNo = $_GET['urun-no'] ?? NULL;

    if(!$urunNo){
        yonlenVeDur('urunler.php');
    }


    $urun = urunVer($urunNo);

    if(!$urun){
        yonlenVeDur('urunler.php');
    }


}elseif ($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Ekle butonunu basılıp form post edilmişse
    $formdanGelenUrunVerileri = [
        'no'    => $_POST['no']  ?? NULL,
        'ad'    => $_POST['ad']    ?? NULL, // Eger yoksa hata uretme yerine null yaz,
        'stok'  => $_POST['stok']  ?? NULL,
        'fiyat' => $_POST['fiyat'] ?? NULL
    ];

    if(!$formdanGelenUrunVerileri['no']){
        // Eğer no değeri yoksa bütün verileri girilen değerle günceller bu yüzden bunun kontrölünü yapmamız önemli
        yonlenVeDur('urunler.php');

    }
    urunGuncelle($formdanGelenUrunVerileri);

    yonlenVeDur('urunler.php');
}
require 'html/urun-duzenle.php';