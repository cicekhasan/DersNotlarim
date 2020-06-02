<?php
require 'db.php';
$id = 1;
$sorgu = $db->prepare('SELECT * FROM uyeler WHERE id = ?');
$sorgu->execute([$id]);
$uye = $sorgu->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>

  <form action="form.php" method="post">
    Hakkında: <br />
    <textarea name="hakkinda" cols="30" rows="10"><?php echo $uye['hakkinda']; ?></textarea>
    <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
    <button type="submit">Gönder</button>
  </form>

</body>
</html>
