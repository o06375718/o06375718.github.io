<?php
session_start();

require 'php/fonksiyonlar.php';
require 'php/sorgular.php';

oturumVarsaYonlenVeDur('urunler.php');


//VALİDASYON İLKLENDİRME
// İlklendirme yapmamdaki amaç giriş sayfası ilk açıldığında bu dizi değişkeninde böyle bir değer yok hatası almamak için

$validasyonDurum = true;
$validasyon = [
        'kullaniciAdi' => [
            'inputClass' => '',
            'msgClass' => '',
            'msg'   => '',

        ],
        'sifre' =>[
            'inputClass' => '',
            'msgClass' => '',
            'msg'   => ''
        ]
];


if($_POST) {
    // form gönderilmişse burası çalışsın

    //FORMADAN GELEN POST VERİLERİ
    $kullaniciAdi = $_POST['kullanici-adi'] ?? null;
    $sifre = $_POST['sifre'] ?? null;

    // Validasyon => Formdan gelen verinin istediğimiz kriterlere olup olmadığını doğrulamaktır
    if ($kullaniciAdi) {
        //KULLANICI ADI VARSA
        if(!filter_var($kullaniciAdi,FILTER_VALIDATE_EMAIL)){ // FILTER_VALIDATE_DOMAIN böyle bir e posta ıp adresinde var mı diye kontrol ediyor
            $validasyon['kullaniciAdi'] = validasyonOlumsuz('Kullanıcı adı e posta yazım kuralarına uygun değil');

        }else if (strlen($kullaniciAdi) < 6) {     // mb_strlen($kullanıcıAdi, utf8) türkçe karakterleri de saymasını istersek
            $validasyon['kullaniciAdi'] = validasyonOlumsuz('Kullanıcı adı 5 karakterden kısa olamaz');

        } else {

            $validasyon['kullaniciAdi'] = validasyonOlumlu('Kullanıcı adı uygun');

        }

    } else {
        // KULLANICI ADI YOKSA
        $validasyon['kullaniciAdi'] =validasyonOlumsuz('Kullanıcı adı olmadan giriş yapılamaz');
    }
    if ($sifre) {
        // SİFRE VARSA
        if (strlen($sifre) < 6) {
            //SİFRE 6 KARAKTERDEN KISA
            $validasyon['sifre'] = validasyonOlumsuz('Şifreniz 6 karakterden kısa olamaz');

        } else {
            //SİFRE 6 KARAKTERDEN UZUN
            $validasyon['sifre'] = validasyonOlumlu('Şifreniz uygun');

        }

    } else {
        // ŞİFRE YOKSA
        $validasyon['sifre'] =validasyonOlumsuz('Şifre olmadan giriş yapılamaz');

    }

    if ($validasyonDurum) {
        // VERİTABANI İŞLEMLERİ

        $kullanici = kullaniciVer($kullaniciAdi);

        // VERİTABANINDAN GELEN VERİLERLE KULLANICI GİRİŞ KONTROLÜ
        if ($kullanici) {
            // Kullanıcı varsa
            if ($sifre == $kullanici['SIFRE']) {
                $_SESSION['KULLANICI_ADI'] = $kullaniciAdi;
                yonlenVeDur('urunler.php');

            } else {
                // Şifre hatasından giriş hatalı
                $validasyon['kullaniciAdi']= validasyonOlumlu('Kullanıcı bulundu');

                $validasyon['sifre'] = validasyonOlumsuz('Şifreniz hatalı');

            }
        } else {
            $validasyon['kullaniciAdi'] = validasyonOlumsuz('Böyle bir kullanıcı yok');

            $validasyon['sifre'] =validasyonOlumsuz('');
        }
    } else {
        // FORM VALİDASYONA UYGUN DEĞİL
    }
}
require 'html/index.php';
