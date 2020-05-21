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
    $_SESSION['zaman'] = time() + 10;
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
