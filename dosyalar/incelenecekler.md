# İNCELENECEK KOMUTLAR

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


BU KODLAR DENENMEDİĞİ İÇİN İLGİLİ SAYFALARA EKLENMEDİ. DENENDİĞİNDE EKLENECEK!!!

### IP Adresi Yasaklama

```bash
iptables -A INPUT -s 85.159.54.48 -j DROP
```

### IP Adresi Yasak Kaldırma

```bash
iptables -X INPUT -s 85.159.54.48 -j DROP
```

### Sunucuya Dosya Çekme

```bash
wget http://www.orneksite.com/ornek-dosya.rar
```

### ZIP dosyasını çıkartma/açma

```bash
unzip dosya.zip
```

### TAR.GZ dosyasını çıkartma/açma

```bash
tar -zxvf dosya.tar.gz
```

### GZIP dosyasını çıkartma/açma

```bash
gunzip dosya.tar.gz
```

### Dosya Sıkıştırmak

```bash
tar cvzf dosyam.tar.gz sıkıştırılacak-dosya
```

### SQL Yükleme

```bash
mysql -h dbname -u dbuser -p dbpasword < dbname.sql
```




## VERİTABANI İŞLEMLERİ

- ***mysql_fetch_array():*** Çekilen verilerin sütun isimlerini vererek veri çekeriz. Yani $sonuc["sutun_ismi"] gibi bir değişken ile belirtmeliyiz.
- ***mysql_fetch_assoc():*** Çekilen verilerin sütun isimlerini veya numaralarını vererek veri çekeriz. Yani $sonuc["sutun_ismi"] ya da $sonuc[1] gibi bir değişken ile belirtmeliyiz.
- ***mysql_fetch_row():*** mysql_fetch_assoc() komutunun aksine sadece çektiğimiz verileri sütun numaralarını vererek görüntüleyebiliriz. Örneğin $sonuc[1]; şeklinde verileri çekeriz.
- ***mysql_free_result():*** Sorguları bellekten siler. Eğer sorgular bellekte birikirsi bu sunucumuza fazla yüklenmemize neden olur. Buda yapacağınız yeni sorguların yavaşlaması dolayısıyla sitenizin yavaşlamasına neden olur.

VERİTABANI OLUŞTURMAK

Veritabanı oluştururken mutlaka dilini "UTF8_turkish_ci" olarak seçmeliyiz. Bunu seçersek tablo oluştururken her seferinde dil seçmek zorunda kalmayız.




PHP'de Hali Hazırda Bulunup En Çok Kullanılan Fonksiyonlar

print()

İstemcinin görebileceği şekilde çıktı yapar.

exit()

Betiğin işleyişini tamamen durdurur.

isset()

Bir değişkenin var olup olmadığını kontrol eder.

unset()

Bir değişkeni yok eder, bellekten siler.

empty()

Bir değerin boş olup olmadığını kontrol eder.

header()

İstemciye HTTP durum bilgisi verir.

trim()

Verideki sağ ve sol boşlukları temizler.

md5()

Veriyi md5 ile şifreler.

sha1()

Veriyi sha1 algoritması ile şifreler.

is_int()

Verinin sayı olup olmadığını kontrol eder.

is_string()

Verinin metin (string) türünde olup olmadığını kontrol eder.

var_dump()

Değişkenle ilgili bilgi verir.

is_bool()

Değişkenin boolean (true ya da false) olup olmadığına bakar.

Zaman Fonksiyonları
PHP' de tarih ve zaman bilgisini çok esnek bir biçimde kullanabilmemize izin veren önemli fonksiyonlar vardır. 

getdate()
Bu fonksiyon çalıştırıldığında geriye bir dizi döndürür. Bu dizinin elemanlarını kullanarak o anki tarih ve zaman bilgisini programımıza rahatlıkla aktarabiliriz. Fonksiyon o anki zaman bilgisi ile ilgileniliyorsa parametresiz kullanılabilir.

date()
Bu fonksiyon parametre olarak özel biçimlendirme ifadeleri alır.

time()
Bu fonksiyon parametresiz çalışır ve Unix Epoch biçiminde o anki zaman bilgisini içeren bir tamsayı değer döndürür.

mktime()
Bu fonksiyon parametre olarak aldığı zaman bilgilerine (saat, dakika, saniye, ay, gün, yıl) göre Unix Epoch biçiminde bir değer üretir. Parametresiz kullanıldığında o anki zaman için değer döndürür.


***************************************************

VERİTABANINI BOŞALTMA

$ php artisan migrate:reset
$ php artisan voyager:install --with-dummy


