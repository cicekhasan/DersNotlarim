## PHP OTURUM İŞLEMLERİ

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


Oturum başlatmak istiyorsak mutlaka sayfanın en üstünde ```session_start()``` ile başlatılması gerekmektedir!
```php
# Oturum başlatmak...
session_start();
# Oluşturma...
$_SESSION['kullaniciAdi'] = "Hasan Çiçek";
# Ekrana yazdırma...
echo $_SESSION['kullaniciAdi'];
# Sonlandırma...
session_destroy();
# Bir tane oturum kaldırmak...
unset($_SESSION['kullaniciAdi']);
```


