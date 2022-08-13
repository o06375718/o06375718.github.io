<?php
function kullaniciVer($kullaniciAdi){
    $db = veritabaninaBaglan();
    $sorgu = $db->prepare('SELECT * FROM kullanicilar WHERE KULLANICI_ADI=:kullaniciAdi');
    $sorgu->execute(['kullaniciAdi' => $kullaniciAdi]);
    return $sorgu->fetch(PDO::FETCH_ASSOC);
}

function urunVer($no){
    $db = veritabaninaBaglan();
    $sorgu = $db->prepare('SELECT * FROM urunler WHERE NO=:no');
    $sorgu->execute(['no' => $no]);
    return $sorgu->fetch(PDO::FETCH_ASSOC);
}
function toplamUrunSayisiniVer(){
    $db = veritabaninaBaglan();
    $toplamUrunSayisiSorgusu = $db->query('SELECT COUNT(*) FROM urunler');
    $toplamUrunSayisiSorgusuSonucu = $toplamUrunSayisiSorgusu->fetch();// bu bir array döndürüyor
    return $toplamUrunSayisiSorgusuSonucu['COUNT(*)']; // integer olarak değer döndürdü
}

function urunGuncelle($veriler){
    $db = veritabaninaBaglan();
    $sorgu = $db->prepare('UPDATE urunler SET AD=:ad, STOK=:stok, FIYAT=:fiyat WHERE NO=:no');
    $sorgu->execute($veriler);
}
function urunEkle($veriler){
    $db = veritabaninaBaglan();
    $sorgu = $db->prepare('INSERT INTO urunler (AD, STOK, FIYAT) VALUES (:ad, :stok, :fiyat)');// kullanıcılara güvenmiyoruz zararlı yazılımlar da yazabilecekleri için sorgumun içine hemen yazmıyorum
    $sorgu->execute($veriler);
}
function urunSil($no){
    $db = veritabaninaBaglan();
    $sorgu = $db->prepare('DELETE FROM urunler WHERE NO=:no');
    $sorgu->execute(['no' => $no]);

}