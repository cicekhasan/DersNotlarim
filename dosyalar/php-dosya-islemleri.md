## PHP DOSYA İŞLEMLERİ

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


#### Dosya Yetkilerini Ayarlamak

```php
# Php ile dosyaya izin vermek
chmod('dosyaAdi.php', 0777);
```

1. numara mutlaka 0 ile başlar,
2. numara dosya sahibinin izni,
3. numara kullanıcı gruplarının izni,
4. numara da geri kalan herkesin iznini temsil eder.

1 = execute (işlem) izni,
2 = yazma izni,
4 = okuma izni.

0777 = 0(1+2+4)(1+2+4)(1+2+4)

#### Dosyaları Listelemek

###### ```scandir``` Komutu

```scandir``` komutu ```glob``` komutundan hariç . ve .. gibi kendi oluşturduğu dosyalarıda listeler.

```php
# Çalıştığı dizindeki dizinleri ve dosyaları listelemek...
$dosyalar = scandir(.);
print_r($dosyalar);
# Çalıştığı dizindeki sadece dizinleri listelemek...
$dosyalar = array_filter(scandir(.), 'is_dir');
print_r($dosyalar);
```

Örnek Fonksiyon; Dosyaları ağaç şeklinde listeliyelim.

```php
function dosyaListele($dizinAdi){
  $dosyalar = scandir($dizinAdi);
  echo '<ul>';
  foreach ($dosyalar as $dosya) {
    if (!in_array($dosya, ['.','..'])) {
      echo '<li>'.$dosya;
      if (is_dir($dizinAdi.'/'.$dosya)) {
        dosyaListele($dizinAdi.'/'.$dosya);
      }
      echo '</li>';
    }
  }
  echo '</ul>';
}

dosyaListele('.');
```

###### ```glob``` Komutu

```php
# Çalıştığı dizindeki dizinleri ve dosyaları listelemek...
$dosyalar = glob('*');
print_r($dosyalar);
# Çalıştığı dizindeki sadece dizinleri listelemek 1...
$dosyalar = glob('*/');
print_r($dosyalar);
# Çalıştığı dizindeki sadece dizinleri listelemek 2...
$dosyalar = glob('*', GLOB_ONLYDIR);
print_r($dosyalar);
# Çalıştığı dizindeki dosyaları listelemek...
# Sadece php dosyalarını listeler...
$dosyalar = glob('*.php');
print_r($dosyalar);
# Çalıştığı dizindeki birden fazla dosya cinsini listelemek...
# php ve txt dosyalarını listeler...
$dosyalar = glob('*.{php,txt}', GLOB_BRACE);
print_r($dosyalar);
# Çalıştığı dizindeki hem dizin hem istediğimiz dosya cinsini listelemek...
# Hem dizinleri, hem de php dosyalarını listeler...
$dosyalar = glob('*{/,php}', GLOB_BRACE);
print_r($dosyalar);
```

Örnek Fonksiyon; Dosyaları ağaç şeklinde listeliyelim.

```php
function listele($dizinAdi){
  $dosyalar = scandir($dizinAdi);
  echo '<ul>';
    $dosyalar = glob($dizinAdi);
    foreach ($dosyalar as $dosya) {
      echo '<li>'.$dosya;
      if (is_dir($dosya)) {
        listele($dosya.'/*');
      }
      echo '</li>';
    }
  echo '</ul>';
}

listele('*');
```

#### Dosyaları Yeniden Adlandırmak
 Aynı komut kullanımları dizinler için de geçerlidir!
```php
rename('oncekiYol', 'sonrakiYol');
# setting.php dosyasının adını ayarlar.php yapıyoruz...
rename('setting.php', 'ayarlar.php');
# ayarlar.php dosyasını yonetim dizinine taşıyalım...
rename('ayarlar.php', 'yonetim/ayarlar.php');
```
