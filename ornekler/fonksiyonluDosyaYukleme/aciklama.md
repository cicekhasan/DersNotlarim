## DOSYA YÜKLEME

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


#### Kurallar

1. Dosyanın cinsini kontrol et,
  - [Mime Type](http://svn.apache.org/repos/asf/httpd/httpd/trunk/docs/conf/mime.types)

```php
#mime type öğrenme...
mime_content_type('dosyaAdi.uzantisi');
echo mime_content_type('sonuc.php');
#Ekran çıktısı...
text/x-php
```

2. Dosyanın boyutunu kontrol et,
3. Dosyanın adını oluştur,
4. Dosyanın kayıt edileceği dosyayı oluştur.

#### ```copy()``` Kullanımı

copy() fonksiyonu ile tek satırda yükleme yapabiliriz.

```php
# Kontrolsuz tek satırda dosya yükleme...
copy($_FILES['dosya']['tmp_name'], 'uploads/'.$_FILES['dosya']['name']);
```
