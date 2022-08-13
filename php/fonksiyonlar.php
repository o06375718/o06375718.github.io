<?php
function oturumYoksaYonlenVeDur($adres){
    if(empty($_SESSION['KULLANICI_ADI'])){
        header('location:'.$adres);
        exit();
    }
}
function oturumVarsaYonlenVeDur($adres){
    if (!(empty($_SESSION['KULLANICI_ADI']))) {
        header('location:' . $adres);
        exit();
    /*if(isset($_SESSION['KULLANICI_ADI'])){
    header('location:urunler.php');
    exit();
    }*/
    }
}
function veritabaninaBaglan()
{
    static $db = false; // veritabanına 1 kere bağlanmamızı sağlar. 1 kere veritabanına bağlanır daha sonra bakıcak
    // db değişkeni statik o zaman onceki değerini koruyup false olmadığı için tekrardan veritabanına bağlanmayacak

    if ($db == false) {
        try {
            $db = new PDO('mysql:host=localhost;dbname=site-veritabani;charset=utf8', 'root', "");// PDO nesnesini oluşturduk
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
        return $db;

    }
}



function yonlenVeDur($adres){
    header('location:'.$adres);
    exit();
}
function validasyonOlumlu($msg){
    return [
        'inputClass' => 'is-valid',
        'msgClass' => 'valid-feedback',
        'msg'   => $msg,
    ];
}
function validasyonOlumsuz($msg){
    global $validasyonDurum;
    $validasyonDurum = false ;
    return [
        'inputClass' => 'is-invalid',
        'msgClass' => 'invalid-feedback',
        'msg'   => $msg,
    ];

}
function minMax($deger, $min, $max){
    //SAYFA MIN DEGER
    if($deger<$min){
        return $min;
    }
    //SAYFA MAX DEĞER
    if($deger>$max){
        return $max;
    }
    return $deger;
}