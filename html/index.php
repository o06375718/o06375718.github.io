<!doctype html>
<html class="h-100"   lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>LOCAL PDO PROJECT </title>

    <!-- BOOSTRAP CSS-JS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity=
    "sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity=
    "sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <!-- FONT-AWESOME-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity=
    "sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="h-100 d-flex align-items-center"  > <!-- h-100 tüm dikey de ortalasın align-items-center dikey olarak ortalanmasını sağlar  -->
<div class="mx-auto" style="width: 330px;"> <!-- mx-auto yatay olarak ortalanmasını sağlar  -->
    <h1>Giriş Formu</h1>
    <form action="index.php" method="post">
        <div class="mb-3">
            <label>Kullanıcı Adı </label>
            <input class="form-control <?=$validasyon['kullaniciAdi']['inputClass']?>" type="text" name="kullanici-adi" required>
            <div  class="<?=$validasyon['kullaniciAdi']['msgClass']?>">
                <?=$validasyon['kullaniciAdi']['msg']?>
            </div>
        </div>
        <div class="mb-3">
            <label >Şifre </label>
            <input class="form-control <?=$validasyon['sifre']['inputClass']?>" type="password" name="sifre" required>
            <div class="<?=$validasyon['sifre']['msgClass']?>">
                <?=$validasyon['sifre']['msg']?>
            </div>
        </div>
        <button class="btn btn-primary">Giriş</button>

    </form>

</div>

</body>
</html>

