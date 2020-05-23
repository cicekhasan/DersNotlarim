<?php 
//print_r($_FILES);

function cokluDosyaYukle($dosyalar){
  $sonuc = [];

  // Hataları kontrol et...
  foreach ($dosyalar['error'] as $key => $error) {
    if ($error == 4) {
      $sonuc['hata'] = 'Lütfen bir dosya seçiniz!';
    }elseif ($error != 0) {
      $sonuc['hata'][] = 'Dosya yüklenirken bir sorun oluştu #'.$dosyalar['name'][$key];
    }
  }

  // Hata yoksa devam et...
  if (!isset($sonuc['hata'])) {
    // Dosya uzantılarını kontrol et...
    $gecerliUzantilar = ['image/jpg', 'image/png', 'image/jpeg'];
    foreach ($dosyalar['type'] as $key => $type) {
      if (!in_array($type, $gecerliUzantilar)) {
        $sonuc['hata'][] = 'Dosya geçersiz formatta #'.$dosyalar['name'][$key];
      }
    }
    // Boyutu kontrol edelim...
    if (!isset($sonuc['hata'])) {
      $maxBoyut = (1024 * 1024 * 4);
      foreach ($dosyalar['size'] as $key => $size) {
        if ($size > $maxBoyut) {
          $sonuc['hata'][] = 'Dosya beklenenden fazla büyük boyutta #'.$dosyalar['name'][$key];
        }
      }
      // Dosyaları yükle...
      if (!isset($sonuc['hata'])) {
        foreach ($dosyalar['tmp_name'] as $key => $tmp) {
          $dosyaAdi = $dosyalar['name'][$key];
          $yukle = move_uploaded_file($tmp, 'uploads/'.$dosyaAdi);
          if ($yukle) {
            $sonuc['dosya'][] = 'uploads/'.$dosyaAdi;
            header('Location: index.php');
          }else{
            $sonuc['hata'][] = 'Dosya yüklenemedi #'.$dosyaAdi;
          }
        }
      }
    }
  }

  return $sonuc; 
}

$sonuc = cokluDosyaYukle($_FILES['dosya']);

if (isset($sonuc['dosya'])) {
  print_r($sonuc['dosya']);
  if (isset($sonuc['hata'])) {
    print_r($sonuc['hata']);
  }
}elseif (isset($sonuc['hata'])) {
  if (is_array($sonuc['hata'])) {
    echo implode('<br />', $sonuc['hata']);
  }else{
    echo $sonuc['hata'];
  }
}

?>
<br /><br />
<a href="index.php" title="">Anasayfa</a>
