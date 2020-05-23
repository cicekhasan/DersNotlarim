<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dosya Yukleme</title>
  <style type="text/css" media="screen">
    .resim{
      width: 250px;
      border: 1px solid red;
      float: left;
      margin: 10px;
      vertical-align:center;
      text-align:center;
      padding: 5px;
    }
    .resim img{
      height:250px;
      max-width:100%;
      object-fit:cover;
      vertical-align:center;
    }
  </style>
</head>
<body>
  <form action="sonuc.php" method="post" enctype="multipart/form-data">
    Dosya Seçin: <br /><br />
    <input type="file" name="dosya[]" multiple> <br /><br />
    <button type="submit">Yükle</button>
  </form> <br /><br />
  <?php
  $dosyalar = glob('uploads/*.*');
  foreach ($dosyalar as $dosya) {
    //echo $dosya."<br />";
    echo '
    <div class="resim">
      <a href="'.$dosya.'" title="" target="_blank"><img src="'.$dosya.'" alt=""></a>
    </div>
    ';
  }
  ?>

</body>
</html>
