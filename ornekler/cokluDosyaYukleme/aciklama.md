## DOSYA YÜKLEME

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


Birden fazla resim yükleme fonksiyonu yapılmıştır. Her şekilde kullanabilirsiniz...

#### Kurallar

1. Dosyaların cinsini kontrol et,
  - [Mime Type](http://svn.apache.org/repos/asf/httpd/httpd/trunk/docs/conf/mime.types)

```php
#mime type öğrenme...
mime_content_type('dosyaAdi.uzantisi');
echo mime_content_type('sonuc.php');
#Ekran çıktısı...
text/x-php
```

2. Dosyaların boyutunu kontrol et,
3. Dosyaların adını oluştur,
4. Dosyaların kayıt edileceği dosyayı oluştur.

#### ```copy()``` Kullanımı

copy() fonksiyonu ile tek satırda yükleme yapabiliriz.

```php
# Kontrolsuz tek satırda dosya yükleme...
copy($_FILES['dosya']['tmp_name'], 'uploads/'.$_FILES['dosya']['name']);
```

```php
# Kullanım....
$sonuc = cokluDosyaYukle($_FILES['dosya']);

# Ekrana hataları bastırmak için...
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
```
