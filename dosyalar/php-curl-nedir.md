## CURL NEDİR?

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


Curl(Client Url) veri iletimi ve alımını sağlayan bir kütüphanedir. Bir çok dilde kullanılmakla beraber, kullanımında temel prensip aynıdır.

##### Neler yapabiliriz?

- Bir web sitesini kullanıcı gibi açıp gezebiliriz,
- Formlarla veri gönderip dönen değerleri alabiliriz,
- Header ile üstbilgi gönderip alabiliriz,
- Cookie ve proxy işlemlerini yapabiliriz,
- Karşı sunucuya dosya yükleme ve karşı sunucudan dosya indirme işlemlerini yapabiliriz. Bunların hepsi ile hedef sitelere bot yazarak kendi sitemize içerik çekebiliriz.

##### Curl Çalışma Prensibi

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
curl_setopt_array($ch, [
  CURLOPT_URL            => 'http://aysubey.com/', 
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

### Curl ile Referer Bilgisi Göndermek

Referer bigisi gitmezse bazı siteler bot diye girişi engelleyebilmekte.

Karşı sunucunun bot kodu;

```php
<?php
if (!isset($_SERVER['HTTP_REFERER'])) {
  die('Bot girişimi engellendi!');
}
?>
```

```php
<?php
// Curl oturumunu başlat...
$ch = curl_init();
// Curl ayarlarını yap...
// aysubey.com'un kaynak kodundan title'ı sanki wikipedia'dan gitmiş gibi alalım...
curl_setopt_array($ch, [
  CURLOPT_URL            => 'http://aysubey.com/', 
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_REFERER        => 'https://wikipedia.org'
]);
// Curl isteği...
$source = curl_exec($ch);
// Curl sonlandır...
curl_close($ch);
?>
```

### Curl ile Tarayıcı Bilgisi Göndermek

Tarayıcı bilgisini ```echo $_SERVER['HTTP_USER_AGENT'];``` şeklinde alabiliyoruz.

Karşı sunucunun bot kodu;

```php
<?php
if (!isset($_SERVER['HTTP_USER_AGENT'])) {
  die('Bot girişimi engellendi!');
}
?>
```

```php
<?php
// Curl oturumunu başlat...
$ch = curl_init();
// Curl ayarlarını yap...
// aysubey.com'un kaynak kodundan title'ı sanki wikipedia'dan gitmiş gibi alalım...
curl_setopt_array($ch, [
  CURLOPT_URL            => 'http://aysubey.com/', 
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_REFERER        => 'https://wikipedia.org',
  CURLOPT_USERAGENT      => $_SERVER['HTTP_USER_AGENT']
]);
// Curl isteği...
$source = curl_exec($ch);
// Curl sonlandır...
curl_close($ch);

echo $source;
?>
```

### Curl ile Post İşlemleri

```php
<?php
// Curl oturumunu başlat...
$ch = curl_init();
// Curl ayarlarını yap...
curl_setopt_array($ch, [
  CURLOPT_URL            => 'http://localhost/post.php', 
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_REFERER        => 'https://wikipedia.org',
  CURLOPT_USERAGENT      => $_SERVER['HTTP_USER_AGENT'],
  CURLOPT_POST           => true,
  CURLOPT_POSTFIELDS     => [
    'ad'     => 'Hasan',
    'soyad'  => 'Çiçek',
    'ePosta' => 'hasan.cicek@yamdex.com.tr',
    'submit' => 1 // Submiti göndermezseniz veri curl tarafından post edilmez!
  ]
]);
// Curl isteği...
$source = curl_exec($ch);
// Curl sonlandır...
curl_close($ch);

echo $source;
?>
```
