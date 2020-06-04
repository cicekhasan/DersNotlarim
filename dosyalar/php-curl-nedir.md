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
    'submit' => 1
    // Submiti göndermezseniz veri post edilemeyebilir!
    // Genelde kontrol submit üzerinden yapılır!
  ]
]);
// Curl isteği...
$source = curl_exec($ch);
// Curl sonlandır...
curl_close($ch);

echo $source;
?>
```

### Curl ile Dosya Göndermek

Gönderme yapacağınız sitenin mime type ne ise onu yazarsanız, güvenliğini kırıp farklı bir dosya göndermiş olabilirsiniz!

```php
<?php
// Curl oturumunu başlat...
$ch = curl_init('http://localhost/post.php');
// Curl ayarlarını yap...
curl_setopt_array($ch, [
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_POST           => true,
  CURLOPT_POSTFIELDS     => [
    'ad'     => 'Hasan',
    'soyad'  => 'Çiçek',
    'dosya' => new CURLFile('test.txt', 'text/plain')
  ]
]);
// Curl isteği...
$source = curl_exec($ch);
// Curl sonlandır...
curl_close($ch);

echo $source;
?>
```

### Curl ile Üst Bilgileri (Response Headers) Göndermek

Kendi oluşturduğumuz üst bilgileride curl ile gönderebilir ve bunları cevap kısmında görebiliriz.

```php
<?php
// header ile normal gönderme...
header('Token: hasancicek1453');
// Curl oturumunu başlat...
$ch = curl_init('http://localhost/header.php');
// Curl ayarlarını yap...
curl_setopt_array($ch, [
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_HTTPHEADER => [
    'Token : hasancicek145'
  ]
]);
// Curl isteği...
$source = curl_exec($ch);
// Curl sonlandır...
curl_close($ch);

echo $source;
?>
```
Üst bilgi almak için;

```php
<?php
// header.php sayfasının üst bilgilerini görüntülüyoruz...
// Curl oturumunu başlat...
$ch = curl_init('http://localhost/header.php');
// Curl ayarlarını yap...
curl_setopt_array($ch, [
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_HEADER => true,
  CURLOPT_NOBODY => true
]);
// Curl isteği...
$source = curl_exec($ch);
// Curl sonlandır...
curl_close($ch);

echo $source;
?>
```

### Curl ile Dosya İndirmek

php.net'in kaynak kodlarını alıp php.txt isimli dosyaya yazdıralım.

```php
<?php
// php.txt varsa aç ve yaz, yoksa yarat ve yaz...
$file = fopen('php.txt', 'w+');
// Curl oturumunu başlat...
$ch = curl_init('http://php.net');
// Curl ayarlarını yap...
curl_setopt($ch, CURLOPT_FILE, $file);
// Curl isteği...
curl_exec($ch);
// Curl sonlandır...
curl_close($ch);
?>
```

Siteden resim alma/indirme.

```php
<?php
// php.txt varsa aç ve yaz, yoksa yarat ve yaz...
$file = fopen('resimAdi.jpg', 'w+');
// Curl oturumunu başlat...
$ch = curl_init('http://siteAdi/resimAdi.jpg');
// Curl ayarlarını yap...
curl_setopt($ch, CURLOPT_FILE, $file);
// Curl isteği...
curl_exec($ch);
// Curl sonlandır...
curl_close($ch);
?>
```

### Curl'de Hata Yakalamak

```php
// Olmayan bir sayfaya istek atalım...
// Curl oturumunu başlat...
$ch = curl_init('http://ariyorum.var');
// Curl ayarlarını yap...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Curl isteği...
if (curl_exec($ch) == false) {
  echo curl_error($ch);
}
// Curl sonlandır...
curl_close($ch);
```

### Curl ile Cookie İşlemleri

##### Cookie Göndermek

Cookie göndermek için CURLOPT_COOKIE kulanılır (cookieAdi1=cookieDegeri1&cookieAdi2=cookieDegeri2 gb)...

```php
// Curl oturumunu başlat...
$ch = curl_init('http://localhost/cookie.php');
// Curl ayarlarını yap...
curl_setopt_array($ch, [
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_COOKIE => 'cookieAdi1=cookieDegeri1'
]);
// Curl isteği...
$source = curl_exec($ch);
// Curl sonlandır...
curl_close($ch);

echo $source;
```

### Curl ile Örnek Döviz Kuru Botu

**Akbank sitesinden döviz ve altın kuru botu:**

```php
<?php
function kurAlma($url, $key=''){
  global $sonuclar;
  // Curl oturumunu başlat...
  $ch = curl_init();
// Curl ayarlarını yap...
  curl_setopt_array($ch, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true
  ]);
// Curl isteği...
  $gelenler = curl_exec($ch);
// Curl sonlandır...
  curl_close($ch);

  $gelenler = json_decode($gelenler, true);
  $sonuclar = json_decode($gelenler['GetExchangeDataResult'], true);

  if (!isset($key)) {
    return $sonuclar;
  }else{
    return $sonuclar['Currencies'][$key];
  }
}

$url = 'https://www.akbank.com/_vti_bin/AkbankServicesSecure/FrontEndServiceSecure.svc/GetExchangeData?_='.time();

$altin = kurAlma($url, 17);
$dolar = kurAlma($url, 16);
$euro  = kurAlma($url, 6);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Döviz Kuru</title>
</head>
<body>
  <div style="float:left; margin-left: 20px;">
  <table border="1">
    <tbody>
      <tr>
        <th>ALTIN</th>
        <th>%</th>
        <th>Alış</th>
        <th>Satış</th>
      </tr>
        <tr>
          <td><?php echo $altin['Name']; ?></td>
          <td><?php echo sprintf('%.2f', $altin['Rate']); ?></td>
          <td><?php echo $altin['Buy']; ?></td>
          <td><?php echo $altin['Sell']; ?></td>
        </tr>
    </tbody>
  </table>
  </div>
  <div style="float:left; margin-left: 20px;">
  <table border="1">
    <tbody>
      <tr>
        <th>Para Birimi</th>
        <th>%</th>
        <th>Alış</th>
        <th>Satış</th>
      </tr>
        <tr>
          <td><?php echo $dolar['Name']; ?></td>
          <td><?php echo sprintf('%.2f', $dolar['Rate']); ?></td>
          <td><?php echo $dolar['Buy']; ?></td>
          <td><?php echo $dolar['Sell']; ?></td>
        </tr>
    </tbody>
  </table>
  </div>
  <div style="float:left; margin-left: 20px;">
  <table border="1">
    <tbody>
      <tr>
        <th>Para Birimi</th>
        <th>%</th>
        <th>Alış</th>
        <th>Satış</th>
      </tr>
        <tr>
          <td><?php echo $euro['Name']; ?></td>
          <td><?php echo sprintf('%.2f', $euro['Rate']); ?></td>
          <td><?php echo $euro['Buy']; ?></td>
          <td><?php echo $euro['Sell']; ?></td>
        </tr>
    </tbody>
  </table>
  </div>
</body>
</html>
```

**İş Bankası sitesinden döviz ve altın kuru botu:**

```php
<?php
function isBankasiKur(){
  // Curl oturumunu başlat...
  $ch = curl_init();
  // Curl ayarlarını yap...
  curl_setopt_array($ch, [
    CURLOPT_URL => 'https://www.isbank.com.tr/_vti_bin/DV.Isbank/PriceAndRate/PriceAndRateService.svc/GetFxRates?Lang=tr&fxRateType=INTERACTIVE&date=2020-6-4&time='.time(), 
    CURLOPT_RETURNTRANSFER => true
  ]);
  // Curl isteği...
  $output = curl_exec($ch);
  // Curl sonlandır...
  curl_close($ch);
  //echo $output;
  $output = json_decode($output, true);

  $dolar = $output['Data'][0];
  $euro  = $output['Data'][1];

  return [
    'DOLAR'=> [
      'adi'        => $dolar['code'],
      'acikAdi'    => $dolar['description'],
      'alis'       => $dolar['fxRateBuy'],
      'satis'      => $dolar['fxRateSell']
    ],
    'EURO' => [
      'adi'        => $euro['code'],
      'acikAdi'    => $euro['description'],
      'alis'       => $euro['fxRateBuy'],
      'satis'      => $euro['fxRateSell']
    ]
  ];
}

$kurlar = isBankasiKur();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Döviz Kuru</title>
</head>
<body>
  <table border="1">
    <tbody>
      <tr>
        <th colspan="2"></th>
        <th>Alış</th>
        <th>Satış</th>
      </tr>
      <?php foreach ($kurlar as $key => $kur): ?>
      <tr>
        <td colspan="2"><?php echo $kur['acikAdi'].' ('.$kur['adi'].')'; ?></td>
        <td><?php echo $kur['alis']; ?></td>
        <td><?php echo $kur['satis']; ?></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</body>
</html>
```
