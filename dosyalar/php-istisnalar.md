## PHP'DE İSTİSNALAR

Kullanılan metodlar;

    - Try-catch
    - Throw new exception
    - Exception extens

Örnek olarak GET'den gelen "id" kontrolu yapalım;

```php
<?php
  class Hata extends Exception {}
  try {
    if (!isset($_GET['id'])) {
      throw new Hata ('id parametresi yok!');
    } elseif (empty($_GET['id'])) {
      throw new Hata ('id parametresi boş olamaz!');
    } elseif (!is_numeric($_GET['id'])) {
      throw new Hata ('id parametresi sadece sayı olmalıdır!');
    } elseif ($_GET['id'] <= 0) {
      throw new Hata ('id parametresi 0\'dan büyük olmalıdır!');
    } else {
      echo $_GET['id'];
    }
  } catch (Hata $e) {
    echo 'Hata: "'.$e->getMessage().'"';
  }
?>
```

Örnekte olduğu gibi kendi hatalarımızı ekleyebiliriz. Gerisi hayal gücünüze kalmış...
