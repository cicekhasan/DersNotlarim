## PHP OTURUM İŞLEMLERİ

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


Oturumlar sunucu tarafında oluşturulurlar, çalışılan bilgisayarda oluşturulmazlar!
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
Oturumları Dizi Şeklinde Oluşturma:

```php
$_SESSION['uye'] = [
  'kullaniciAdi' => 'hasan',
  'parola'       => '123',
  'tamAdi'       => 'Hasan Çiçek',
  'ePosta'       => 'hasan.cicek@yandex.com.tr',
  'yetki'        => 1
];
```

- Oturuma örnek; [Giriş Örneği](dosyalar/php-giris-ornegi.md) dosyasında verilmiştir...
- Oturumda zaman yönetimine örnek; [Session Zaman Yönetimi](dosyalar/php-oturumda-zaman-ornegi.md) dosyasında verilmiştir...


