<?php
session_start();
ob_start();

require('ayarlar.php');

if (isset($_SESSION['zaman']) && time() > $_SESSION['zaman']) {
  session_destroy();
  header('Location: oturumSonlandi.php');
}else{    
  $_SESSION['zaman'] = time() + 10;
}
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
