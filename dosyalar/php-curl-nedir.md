## CURL NEDİR?

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


Curl(Client Url) veri iletimi ve alımını sağlayan bir kütüphanedir. Bir çok dilde kullanılmakla beraber, kullanımında temel prensip aynıdır.

####Neler yapabiliriz?

- Bir web sitesini kullanıcı gibi açıp gezebiliriz,
- Formlarla veri gönderip dönen değerleri alabiliriz,
- Header ile üstbilgi gönderip alabiliriz,
- Cookie ve proxy işlemlerini yapabiliriz,
- Karşı sunucuya dosya yükleme ve karşı sunucudan dosya indirme işlemlerini yapabiliriz. Bunların hepsi ile hedef sitelere boot yazarak kendi sitemize içerik çekebiliriz.

#### Curl Çalışma Prensibi

- İlk önce curl oturumu başlat,
- Curl'un ayarlarını yap,
- Curl isteğini çalıştır,
- Curl oturumunu kapat.

```php
<?php
// Curl oturumunu başlat...
$ch = curl_init();
// Curl ayarlarını yap...
// 3 parametre alır
// 1. Oturum, 2. Seçeneklerimiz, 3. Değer
// aysubey.com'un kaynak kodunu çekelim...
curl_setopt($ch, CURLOPT_URL, 'http://aysubey.com/');
// Curl isteği...
curl_exec($ch);
// Curl sonlandır...
curl_close($ch);
?>
```

Ayarları satır satır ya da dizi şeklinde birdenfazla verebiliriz.

```php
<?php
// Curl oturumunu başlat...
$ch = curl_init();
// Curl ayarlarını yap...
// aysubey.com'un kaynak kodundan title'ı alalım...
curl_setopt($ch, [
  CURLOPT_URL => 'http://aysubey.com/', 
  CURLOPT_RETURNTRANSFER => true
]);
// Curl isteği...
$source = curl_exec($ch);
// Curl sonlandır...
curl_close($ch);
// echo $source;
// Başlığı $title değişkenine alalım...
preg_match('/<title>(.*?)<\/title>/', $source, $title);
print_r($title);
?>
```

curl ile düzgün veriler alabilmek istiyorsak ```preg_match();``` fonksiyonu ve regex kodlarını kullanmamız gerekir!
