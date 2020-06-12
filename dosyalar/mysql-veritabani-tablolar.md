## VERİTABANI VE TABLO İŞLEMLERİ

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


*Not: Bu sayfadaki veritabanı ve tablolar CRUD örneklerinde kullanılacaktır.*

#### KOŞULDA KULLANILACAK OPERATÖRLER

| Operatör | Açıklama         |
| ---      | ---              |
| =        | Eşit             |
| !=       | Eşit değil       |
| >        | Büyük            |
| <        | Küçük            |
| >=       | Büyük ya da eşit |
| <=       | Küçük ya da eşit |
| &&       | Ve               |
| \|\|     | Ya da            |


#### VERİTABANI EKLEME

1. "test" adında bir veritabanı oluşturalım...

```sql
CREATE DATABASE test COLLATE 'utf8_turkish_ci'
# Sorgu çıktısı...
Sorgu başarıyla çalıştırıldı, 1 adet kayıt etkilendi. (0.000 s) Düzenle
```


#### TABLO EKLEME

1. "uyeler" tablosu;

| id  | uye_adi    | uye_tam_adi   | uye_eposta                | parola |
| --- | ---        | ---           | ---                       | ---    |
| 1   | hasancicek | Hasan Çiçek   | hasan.cicek@yandex.com.tr | 123456 |
| 2   | zeytin     | Aleyne Çakır  | aleyna38@gmail.com        | 456789 |
| 3   | karabela   | Ahmet Ayraç   | ayracahmet@gmail.com      | 852369 |
| 4   | karbeyaz   | Nalan Firarda | firardanalan@hotmail.com  | 123456 |


```sql
CREATE TABLE test.uyeler (
  id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  uye_adi varchar(100) NOT NULL,
  uye_tam_adi varchar(150) NOT NULL,
  uye_eposta varchar(150) NOT NULL,
  parola varchar(200) NOT NULL
) COLLATE 'utf8_turkish_ci'
# Sorgu çıktısı...
Sorgu başarıyla çalıştırıldı, 0 adet kayıt etkilendi. (0.011 s) Düzenle
```

2. "calisanlar" tablosu;

| id  | ad      | soyad     | meslek    | sehir   | maas    |
| --- | ---     | ---       | ---       | ---     | ---     |
| 0   | Hasan   | Çiçek     | Developer | Ankara  | 6300.00 |
| 1   | Zeynep  | Yorgancı  | Usta      | Çankırı | 3000.00 |
| 2   | Ahmet   | Yoksay    | Usta      | Çankırı | 3250.00 |
| 3   | Metin   | Çelenk    | Developer | Ankara  | 6000.00 |
| 4   | Ramazan | Karadoğan | Designer  | Ankara  | 5250.00 |
| 5   | Çetin   | Bozyel    | Aşçı      | Çankırı | 2500.00 |
| 6   | Meryem  | Uzel      | Asistan   | Ankara  | 2500.00 |
| 7   | Aslı    | Gencer    | Developer | Ankara  | 5700.00 |
| 8   | Sami    | Kalem     | Stajyer   | Çankırı | 2200.00 |
| 9   | Kemal   | Yeşil     | Şöför     | Çankırı | 2700.00 |

```sql
CREATE TABLE test.calisanlar (
  id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  ad varchar(100) NOT NULL,
  soyad varchar(100) NOT NULL,
  meslek varchar(100) NOT NULL,
  sehir varchar(100) NOT NULL,
  maas float(10,2) NOT NULL
) COLLATE 'utf8_turkish_ci'
```

```sql
# calisanlar tablosuna içerik ekleyelim...
INSERT INTO test.calisanlar (ad, soyad, meslek, sehir, maas) VALUES
( 'Hasan',  'Çiçek',  'Developer',  'Ankara', 6300.00 ),
( 'Zeynep', 'Yorgancı', 'Usta', 'Çankırı',  3000.00 ),
( 'Ahmet',  'Yoksay', 'Usta', 'Çankırı',  3250.00 ),
( 'Metin',  'Çelenk', 'Developer',  'Ankara', 6000.00 ),
( 'Ramazan',  'Karadoğan',  'Designer', 'Ankara', 5250.00 ),
( 'Çetin',  'Bozyel', 'Aşçı', 'Çankırı',  2500.00 ),
( 'Meryem', 'Uzel', 'Asistan',  'Ankara', 2500.00 ),
( 'Aslı', 'Gencer', 'Developer',  'Ankara', 5700.00 ),
( 'Sami', 'Kalem',  'Stajyer',  'Çankırı',  2200.00 ),
( 'Kemal',  'Yeşil',  'Şöför',  'Çankırı',  2700.00)
```

3. "meslekler" tablosu;

| id  | ad        |
| --- | ---       |
| 1   | Developer |

```sql
CREATE TABLE test.meslekler (
  id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  meslek varchar(150) NOT NULL
) COLLATE 'utf8_turkish_ci'
```

4. "dersler" tablosu

 | id  | baslik | icerik                            | yazar | kategori |
 | --- | ---    | ---                               | ---   | ---      |
 | 1   | Ders 1 | Aba vakti aba, yaba vakti yaba.   | 1     | 1,2,7    |
 | 2   | Ders 2 | Abanın kadir yağmurda bilinir.    | 3     | 5,2      |
 | 3   | Ders 3 | Acı patlıcanı kırağı çalmaz.      | 3     | 4,8      |
 | 4   | Ders 4 | Ateş düştüğü yeri yakar.          | 1     | 1,7      |
 | 5   | Ders 5 | Ateş olmayan yerden duman çıkmaz. | 1     | 7,5      |
 | 6   | Ders 6 | Ayranım ekşidir diyen olmaz.      | 4     | 7,5      |
 | 7   | Ders 7 | Babadan mal kalır, kemal kalmaz.  | 2     | 5,2      |
 | 8   | Ders 8 | Besle kargayı oysun gözünü.       | 4     | 2,1      |
 | 9   | Ders 9 | Büyük lokma ye büyük söz söyleme. | 1     | 5,2      |


```sql
CREATE TABLE test.dersler (
  id int(11) NOT NULL AUTO_INCREMENT,
  baslik varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  icerik text COLLATE utf8_turkish_ci NOT NULL,
  yazar int(11) NOT NULL,
  kategori varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci
```

```sql
# dersler tablosuna içerik ekleyelim...
INSERT INTO test.dersler (id, baslik, icerik, yazar, kategori) VALUES
(1, 'Ders 1', 'Aba vakti aba, yaba vakti yaba.',  1,  '1,2,7'),
(2, 'Ders 2', 'Abanın kadir yağmurda bilinir.', 3,  '5,2'),
(3, 'Ders 3', 'Acı patlıcanı kırağı çalmaz.', 3,  '4,8'),
(4, 'Ders 4', 'Ateş düştüğü yeri yakar. ',  0,  '1,7'),
(5, 'Ders 5', 'Ateş olmayan yerden duman çıkmaz.',  0,  '7,5'),
(6, 'Ders 6', 'Ayranım ekşidir diyen olmaz. ',  0,  '7,5'),
(7, 'Ders 7', 'Babadan mal kalır, kemal kalmaz.', 0,  '5,2'),
(8, 'Ders 8', 'Besle kargayı oysun gözünü.',  0,  '2,1'),
(9, 'Ders 9', 'Büyük lokma ye büyük söz söyleme.',  0,  '5,2')
```

5. "kategori" tablosu

 | id  | ad       |
 | --- | ---      |
 | 1   | Php      |
 | 2   | Linux    |
 | 4   | Markdown |
 | 5   | Genel    |
 | 7   | Blog     |

```sql
CREATE TABLE test.kategori (
  id int(11) NOT NULL AUTO_INCREMENT,
  ad varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci
```

```sql
# kategori tablosuna içerik ekleyelim...
INSERT INTO test.kategori (id, ad) VALUES
(1, 'Php'),
(2, 'Linux'),
(4, 'Markdown'),
(5, 'Genel'),
(7, 'Blog')
```
