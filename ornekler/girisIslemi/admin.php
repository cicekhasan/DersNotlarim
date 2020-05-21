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
  <h2>Hoşgeldin <?php echo $_SESSION['kullaniciAdi']; ?> Kardeş...</h2> <br />
  <a href="cikis.php" title="">Çıkış</a>  
</body>
</html>
