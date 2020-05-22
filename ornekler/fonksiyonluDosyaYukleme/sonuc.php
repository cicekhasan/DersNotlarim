<?php 
 function dosyaYukle($dosya, $boyut = 1, $uzantilar = null){
  $sonuc = [];
  if ($dosya['error']==4) {
    $sonuc['hata'] = "Lütfen bir dosya seçiniz!";
  }else{
    if (is_uploaded_file($dosya['tmp_name'])) {
      $gecerliUzantilar = $uzantilar ? $uzantilar : ['image/jpg', 'image/png', 'image/jpeg'];
      $gecerliBoyut     = (1024 * 1024) * $boyut;
      $uzanti           = $dosya['type'];
      $uzantiParcala    = explode('/', $uzanti);
      $zaman            = explode('-', date('g-m-Y'));
      $saat             = explode(':', date('H:i:s'));
      $vakit            = $zaman[0].$zaman[1].$zaman[2].$saat[0].$saat[1].$saat[2];
        //$isim             = uniqid(); // Kullanılabilir...
      $isim             = rand(100000, 999999);
      $isim            .= '-'.$vakit;
      $isim            .= ".".$uzantiParcala[1];

      if (in_array($uzanti, $gecerliUzantilar)) {
        if ($gecerliBoyut >= $dosya['size']) {
          $yukle = move_uploaded_file($dosya['tmp_name'], 'uploads/'.$isim);
          if ($yukle) {            
              //$sonuc['dosya'] = "Dosya yüklendi...<br />";
              $sonuc['dosya'] = 'uploads/'.$isim;
          }else{
            $sonuc['hata'] = "Dosya yüklenemedi...";
          }
        }else{
          $sonuc['hata'] = "En fazla 4MB dosya yükleyebilirsiniz!";
        }
      }else{
        $sonuc['hata'] = "Yüklediğiniz dosya geçerli formatta değildir!";
      }
    }else{
      $sonuc['hata'] = "Dosya yüklenirken bir sorun oluştu!";
    }  
  } 
  return $sonuc;  
}

$sonuc = dosyaYukle($_FILES['dosya'], 4);
if (isset($sonuc['hata'])) {
  echo $sonuc['hata'];
}else{
  echo '<a href="'.$sonuc['dosya'].'" target="_blank">Dosyayı görmek için tıklayınız...</a>';
}

?>
<br /><br />
<a href="index.php" title="">Anasayfa</a>
