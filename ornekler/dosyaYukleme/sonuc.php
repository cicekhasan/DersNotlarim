<?php 
  // $_FILES
  if ($_FILES['dosya']['error']==4) {
    echo "Lütfen bir dosya seçiniz!";
  }else{
    if (is_uploaded_file($_FILES['dosya']['tmp_name'])) {
      $gecerliUzantilar = ['image/jpg', 'image/png', 'image/jpeg'];
      $gecerliBoyut     = (1024 * 1024 * 3);
      $uzanti           = $_FILES['dosya']['type'];
      $uzantiParcala    = explode('/', $uzanti);
      $zaman            = explode('-', date('g-m-Y'));
      $saat             = explode(':', date('H:i:s'));
      $vakit            = $zaman[0].$zaman[1].$zaman[2].$saat[0].$saat[1].$saat[2];
      //$isim             = uniqid(); // Kullanılabilir...
      $isim             = rand(1000, 9999);
      $isim            .= $vakit;
      $isim            .= ".".$uzantiParcala[1];

      if (in_array($uzanti, $gecerliUzantilar)) {
        if ($gecerliBoyut >= $_FILES['dosya']['size']) {
          $yukle = move_uploaded_file($_FILES['dosya']['tmp_name'], 'uploads/'.$isim);
          if ($yukle) {            
            //echo "Dosya yüklendi...<br />";
            //echo '<img src="uploads/'.$_FILES['dosya']['name'].'">';
            header('Location: index.php');
          }else{
            echo "Dosya yüklenemedi...";
          }
        }else{
          echo "En fazla 3MB dosya yükleyebilirsiniz!";
        }
      }else{
        echo "Dosya sadece jpg, jpeg ve png formatında olabilir!";
      }
    }else{
      echo "Dosya yüklenirken bir sorun oluştu!";
    }
    //echo "<pre>";
    //print_r($_FILES);
    //echo "</pre>";    
  }

?>
