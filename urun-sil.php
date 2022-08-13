<?php
session_start();

require 'php/fonksiyonlar.php';
require 'php/sorgular.php';

oturumYoksaYonlenVeDur('index.php');

// Bu sayfada hangi ürünü silmemiz gerektiğini bilmemiz için her ürüne özel no değerini adres satırında illetik(get ile gelir)
$urunNo = $_GET['urun-no'] ?? NULL  ;

if(!$urunNo){
    yonlenVeDur('urunler.php');
}

urunSil($urunNo);

yonlenVeDur('urunler.php');

