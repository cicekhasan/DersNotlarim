## GİRİŞ ÖRNEĞİ

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


Örnek index.php sayfası;

```php
<?php
session_start();
ob_start();

require('ayarlar.php');
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Anasayfa</title>
</head>
<body>
<?php
if (isset($_SESSION['kullaniciAdi'])) {
    # Oturum açmışşam...
    include('admin.php');
}else{
    # Oturum açmamışsam...
    include('giris.php');
}
?>    
</body>
</html>
```

Örnek giris.php sayfası;

```php
<?php
session_start();
require('ayarlar.php');

if (isset($_POST['submit'])) {

  $kullaniciAdi = $_POST['isim'];
  $parola       = $_POST['parol'];

  if (!$kullaniciAdi || !$parola) {
    $hata = 'Lütfen kullanıcı adınızı ya da parolanızı giriniz!';
  }elseif ($kullaniciAdi != $uye['kullaniciAdi']) {        
    $hata = 'Kullanıcı Adınız Yanlış!';
  }elseif ($parola != $uye['parola']) {        
    $hata = 'Parolanız Yanlış!';
  }else{
    $_SESSION['kullaniciAdi'] = $uye['kullaniciAdi'];
    header('Location: index.php');
  }
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <title>Giriş</title>
</head>
<body>
  <?php 
  echo $hata;
   ?>
  <form action="" method="post" accept-charset="utf-8">
    Kullanıcı Adı:<br />
    <input type="text" name="isim"><br />
    Parola:<br />
    <input type="text" name="parol"><br />
    <input type="hidden" name="submit" value="1">
    <button type="submit">GİRİŞ</button>
  </form>   
</body>
</html>
```

Örnek admin.php sayfası;

```php
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Yönetim</title>
</head>
<body>
  <h2>Hoşgeldin Admin Kardeş...</h2> <br />
  <a href="cikis.php" title="">Çıkış</a>  
</body>
</html>
```
