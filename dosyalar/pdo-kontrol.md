# PDO KURULUMU?

Aşağıdaki dosyayı index.php içerisine yapıştırın ve tarayıcıda "PDO kurulu." yazarsa sorun yok demektir...

```php
<?php

if (extension_loaded("PDO")) {
    echo "PDO kurulu.";
} else {
    echo "PDO kurulu değil.";
}

?>
```
