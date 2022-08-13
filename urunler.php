<?php
session_start();
require 'php/fonksiyonlar.php';
require 'php/sorgular.php';

oturumYoksaYonlenVeDur('index.php');

//VERİ İLKLENDİRME
$sayfa = $_GET['sayfa'] ?? 1;
$adet = 5;


//TOPLAM URUN SAYISINI VER
$db = veritabaninaBaglan();
$toplamUrunSayisiSorgusu = $db->query('SELECT COUNT(*) FROM urunler');
$toplamUrunSayisiSorgusuSonucu = $toplamUrunSayisiSorgusu->fetch();// bu bir array döndürüyor
$toplamUrunSayisi = $toplamUrunSayisiSorgusuSonucu['COUNT(*)']; // integer olarak değer döndürdü

$toplamSayfaSayisi = ceil($toplamUrunSayisi / $adet );// 21 urunum varsa her sayfa da 10 urun gösterilecekse 21/10 1 urun de olsa 3.sayfada 1 urun gosterilecek

$sayfa = minMax($sayfa, 1, $toplamSayfaSayisi);

// URUNLERİ LİMİTLE VER
$baslangic = ($sayfa-1)* $adet ;
$sorgu = $db->query("SELECT * FROM urunler LIMIT {$baslangic},{$adet}"); // çif tırnak içine almazsak içerideki değişkenler çalışmaz
$urunler = $sorgu->fetchAll(PDO::FETCH_ASSOC);



//HTML ÇIKTISI
require 'html/urunler.php';

