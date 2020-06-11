## BİLGİ ALMA KOMUTLARI VE ÖRNEK KULLANIM ŞEKİLLERİ

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)



Aşağıdaki örneklerde "uyeler" isimli tablo örnek olarak verilmiştir...

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


#### VERİTABANI OLUŞTURMA

```sql
CREATE DATABASE `test` COLLATE 'utf8_turkish_ci';
```

#### ÖRNEK TABLOLAR

1. "uyeler" tablosu;

| id  | uye_adi    | uye_tam_adi   | uye_eposta                | parola |
| --- | ---        | ---           | ---                       | ---    |
| 1   | hasancicek | Hasan Çiçek   | hasan.cicek@yandex.com.tr | 123456 |
| 2   | zeytin     | Aleyne Çakır  | aleyna38@gmail.com        | 456789 |
| 3   | karabela   | Ahmet Ayraç   | ayracahmet@gmail.com      | 852369 |
| 4   | karbeyaz   | Nalan Firarda | firardanalan@hotmail.com  | 123456 |

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

#### TABLO EKLEME

1. "uyeler" tablosu

```sql
CREATE TABLE `uyeler` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `uye_adi` varchar(100) NOT NULL,
  `uye_tam_adi` varchar(150) NOT NULL,
  `uye_eposta` varchar(150) NOT NULL,
  `parola` varchar(200) NOT NULL
) COLLATE 'utf8_turkish_ci';
```

2. "calisanlar" tablosu

```sql
CREATE TABLE `calisanlar` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `ad` varchar(100) NOT NULL,
  `soyad` varchar(100) NOT NULL,
  `meslek` varchar(100) NOT NULL,
  `sehir` varchar(100) NOT NULL,
  `maas` float(10,2) NOT NULL
) COLLATE 'utf8_turkish_ci';
# calisanlar tablo içeriği
INSERT INTO calisanlar (ad, soyad, meslek, sehir, maas) VALUES
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

#### VERİ EKLEME (INSERT)

1. Tekli veri 1. yöntem. Bir satır ekler...

```sql
INSERT INTO uyeler SET uye_adi = 'hasancicek', parola = '123456', uye_eposta = 'hasan.cicek@yandex.com.tr'
INSERT INTO uyeler SET uye_adi = 'zeytin', parola = '456789', uye_eposta = 'aleyna38@gmail.com'
```

2. Tekli veri 2. yöntem. Bir satır ekler...

```sql
INSERT INTO uyeler ( uye_adi, parola, uye_eposta ) VALUES ( 'karabela', '852369', 'ayracahmet@gmail.com' )
INSERT INTO uyeler ( uye_adi, parola, uye_eposta ) VALUES ( 'karbeyaz', '123456', 'firardanalan@hotmail.com' )
```

3. Çoklu veri ekleme. "uyeler" ından sonra parantez içerisine, değer eklenecek sütun adları yazılır. Örneğer göre üç satır ekler...

```sql
INSERT INTO uyeler ( uye_adi, uye_tam_adi, uye_eposta, parola ) VALUES 
  ( 'hasancicek', 'Hasan Çiçek', 'hasan.cicek@yandex.com.tr', '123456' ), 
  ( 'zeytin', 'Aleyne Çakır', 'aleyna38@gmail.com', '456789' ), 
  ( 'karabela', 'Ahmet Ayraç', 'ayracahmet@gmail.com', '852369' ),
  ( 'karbeyaz', 'Nalan Firarda', 'firardanalan@hotmail.com', '123456' )
```

#### VERİ ÇEKME (SELECT)

1. Tablodaki bütün sütun ve satırları getirir...

```sql
SELECT * FROM uyeler
# Sorgu çıktısı...
| id | uye_adi    | uye_tam_adi   | uye_eposta                | parola |
| 1  | hasancicek | Hasan Çiçek   | hasan.cicek@yandex.com.tr | 123456 |
| 2  | zeytin     | Aleyne Çakır  | aleyna38@gmail.com        | 456789 |
| 3  | karabela   | Ahmet Ayraç   | ayracahmet@gmail.com      | 852369 |
| 4  | karbeyaz   | Nalan Firarda | firardanalan@hotmail.com  | 123456 |
```

2. Tabloda, id'si '2' olan üyeye ait bütün sütun ve satırı getirir...

```sql
SELECT * FROM uyeler WHERE id = '2'
# Sorgu çıktısı...
| id | uye_adi | uye_tam_adi  | uye_eposta         | parola |
| 2  | zeytin  | Aleyne Çakır | aleyna38@gmail.com | 456789 |
```

3. Belirtilen sütunlara ait verileri çekmek...

```sql
SELECT uye_adi, parola FROM uyeler
# Sorgu çıktısı...
| uye_adi    | parola |
| hasancicek | 123456 |
| zeytin     | 456789 |
| karabela   | 852369 |
| karbeyaz   | 123456 |
```

4. id'si '4' olan üyeye ait belirtilen sütunlara ait verileri çekmek. "id" belirttiğimiz ve "id" tek olacağı için bir satır veri gelir. Eğer koşul başka bir şey olursa ve o koşulu karşılayan birden fazla sonuç varsa o kadar satır veri çekilir.

```sql
SELECT uye_adi, parola FROM uyeler WHERE id = '4'
# Sorgu çıktısı...
| uye_adi  | parola |
| karbeyaz | 123456 |
```

5. Verileri çekerken kolon adını değiştirmek. Aşağıdaki örnekte id'si '1' olan kullanıcının verilerini çekerken "uye_adi" kolon adını "ad", "eposta" kolon adını da "posta" olarak değiştidik. Birden fazla tablodan aynı anda veri alıken ve sütun isimleri birse karışmaması için sutun adlarını değiştirmemiz gerekebilir.

```sql
SELECT uye_adi as AD, uye_eposta as POSTA FROM uyeler WHERE id = '1'
# Sorgu çıktısı...
| AD          | POSTA                    |
| hasancicek  | hasan.cicek@yandex.com.tr|
```

6. Aşağıda sorgu ile; "uyeler" tablosundan "id" si "1" ya da "id" si "4" olan ve "parola" sı aynı "123456" kullanıcıları çekmeye çalışıyoruz. 

Dikkat: Parantezi kullanmazsak "parola" sı 123456 ve "id" si "1" olan kullanıcı varsa çeker, yoksa "id" si "4" olan kullanıcıyı getirir. Ya da bölümünü parantez içerisine almadan kullanırsak sorgu hata verir.

```sql
SELECT * FROM uyeler WHERE parola = '123456' && ( id='1' || id='4' )
# Sorgu çıktısı...
| id  | uye_adi    | uye_tam_adi   | uye_eposta                | parola |
| 1   | hasancicek | Hasan Çiçek   | hasan.cicek@yandex.com.tr | 123456 |
| 4   | karbeyaz   | Nalan Firarda | firardanalan@hotmail.com  | 123456 |
```

#### VERİ GÜNCELLEME (UPDATE)

1. "id" si 4 olan kullanıcının parolasını değiştirmek...

```sql
UPDATE uyeler SET parola = 512648 WHERE id = '4'
```

2. "id" si 4 olan kullanıcının "uye_adi" ve "uye_eposta" sını değiştirmek...

```sql
UPDATE uyeler SET uye_adi = 'cepdelik', uye_eposta = 'altinkase@gmail.com' WHERE id = '4'
```

#### VERİ SİLME (DELETE)

1. "id" si 4 olan kullanıcıyı silelim...

```sql
DELETE FROM uyeler WHERE id = '4'
```

#### SIRALI VERİ ÇEKME (ORDER BY)

1. A-z ye sıralı veri çekme. Sonuna ASC yazmasakta varsayılan sıralaması a-z dir...

```sql
SELECT * FROM uyeler ORDER BY uye_adi
# Sorgu çıktısı. uye_adi'na göre sıralı listeler...
| id | uye_adi    | uye_tam_adi   | uye_eposta                | parola |
| 4  | cepdelik   | Nalan Firarda | altinkase@gmail.com       | 512648 |
| 1  | hasancicek | Hasan Çiçek   | hasan.cicek@yandex.com.tr | 123456 |
| 3  | karabela   | Ahmet Ayraç   | ayracahmet@gmail.com      | 852369 |
| 2  | zeytin     | Aleyne Çakır  | aleyna38@gmail.com        | 456789 |
```

2. Z-a ye sıralı veri çekme...

```sql
SELECT * FROM uyeler ORDER BY uye_adi DESC
# Sorgu çıktısı. uye_adi'na göre sıralı listeler...
| id | uye_adi    | uye_tam_adi   | uye_eposta                | parola |
| 2  | zeytin     | Aleyne Çakır  | aleyna38@gmail.com        | 456789 |
| 3  | karabela   | Ahmet Ayraç   | ayracahmet@gmail.com      | 852369 |
| 1  | hasancicek | Hasan Çiçek   | hasan.cicek@yandex.com.tr | 123456 |
| 4  | cepdelik   | Nalan Firarda | altinkase@gmail.com       | 512648 |
```

3. A-z ye iki sütuna göre sıralı veri çekme. Önce "id" ye sonra "uye_adi" na göre sıralar...

```sql
SELECT * FROM uyeler ORDER BY id, uye_adi ASC
# Sorgu çıktısı. Önce id sonra uye_adi'na göre sıralı listeler...
| id | uye_adi    | uye_tam_adi   | uye_eposta                | parola |
| 1  | hasancicek | Hasan Çiçek   | hasan.cicek@yandex.com.tr | 123456 |
| 2  | zeytin     | Aleyne Çakır  | aleyna38@gmail.com        | 456789 |
| 3  | karabela   | Ahmet Ayraç   | ayracahmet@gmail.com      | 852369 |
| 4  | cepdelik   | Nalan Firarda | altinkase@gmail.com       | 512648 |
```

4. Önce "uye_adi" na göre A-Z sıralar, sonrasında "id" ye göre Z-A ...

```sql
SELECT * FROM uyeler ORDER BY uye_adi, id DESC
# Sorgu çıktısı. Önce uye_adi sonra id'ye göre sıralı listeler...
| id | uye_adi    | uye_tam_adi   | uye_eposta                | parola |
| 4  | cepdelik   | Nalan Firarda | altinkase@gmail.com       | 512648 |
| 1  | hasancicek | Hasan Çiçek   | hasan.cicek@yandex.com.tr | 123456 |
| 3  | karabela   | Ahmet Ayraç   | ayracahmet@gmail.com      | 852369 |
| 2  | zeytin     | Aleyne Çakır  | aleyna38@gmail.com        | 456789 |
```

#### LİMİTLİ VERİ ÇEKME (LIMIT)

1. "uyeler" tablosundan iki satır çeker...

```sql
SELECT * FROM uyeler LIMIT 2
# Sorgu çıktısı. İlk iki satırı listeler...
| id | uye_adi    | uye_tam_adi   | uye_eposta                | parola |
| 1  | hasancicek | Hasan Çiçek   | hasan.cicek@yandex.com.tr | 123456 |
| 2  | zeytin     | Aleyne Çakır  | aleyna38@gmail.com        | 456789 |
```

2. "uyeler" tablosundan son eklenen 3 satırı çeker...

```sql
SELECT * FROM uyeler ORDER BY id DESC LIMIT 3
# Sorgu çıktısı. id'ye göre son 3 satırı listeler...
| id | uye_adi    | uye_tam_adi   | uye_eposta                | parola |
| 4  | cepdelik   | Nalan Firarda | altinkase@gmail.com       | 512648 |
| 3  | karabela   | Ahmet Ayraç   | ayracahmet@gmail.com      | 852369 |
| 2  | zeytin     | Aleyne Çakır  | aleyna38@gmail.com        | 456789 |
```

3. "uyeler" tablosundan son eklenen 1. satırı atla, sonraki 2 satırı göster...

```sql
SELECT * FROM uyeler ORDER BY id DESC LIMIT 1,2
# Sorgu çıktısı...
| id | uye_adi    | uye_tam_adi   | uye_eposta                | parola |
| 3  | karabela   | Ahmet Ayraç   | ayracahmet@gmail.com      | 852369 |
| 2  | zeytin     | Aleyne Çakır  | aleyna38@gmail.com        | 456789 |
```

#### VERİLERDE GRUPLAMA (GROUP BY ve HAVING)

1. Dikkat! Anlaşılır olması açısından sütun isimlerini değiştirdik...

```sql
SELECT sehir, MIN(maas) as minimum_maas FROM calisanlar GROUP BY sehir
# Sorgu çıktısı. Şehirlerde minimum maaşları listeliyelim...
| sehir   | minimum_maas |
| Ankara  | 2500.00 |
| Çankırı | 2200.00 |
```

2. Dikkat! Anlaşılır olması açısından sütun isimlerini değiştirdik...

```sql
SELECT sehir, MIN(maas) as minimum_maas, MAX(maas) as maximum_maas FROM calisanlar GROUP BY sehir
# Sorgu çıktısı. Şehirlerde minimum ve maximum maaşları listeliyelim...
| sehir   | minimum_maas | maximum_maas |
| Ankara  | 2500.00      | 6300.00      |
| Çankırı | 2200.00      | 3250.00      |
```

3. Dikkat! Anlaşılır olması açısından sütun isimlerini değiştirdik...

```sql
SELECT sehir, MIN(maas) as minimum_maas, MAX(maas) as maximum_maas, COUNT(id) as personel FROM calisanlar GROUP BY sehir
# Sorgu çıktısı. Şehirlerde minimum, maximum maaşları ve personel sayılarını listeliyelim...
| sehir   | minimum_maas  | maximum_maas  | personel |
| Ankara  | 2500.00       | 6300.00       | 5        |
| Çankırı | 2200.00       | 3250.00       | 5        |
```

4. Dikkat! Değiştirmiş olduğumuz sütun isimleri koşulda kullanalım. WHERE koşulu ile bu isimler çalışmaz! Bunun yerine HAVING kullanıyoruz...

```sql
SELECT sehir, MIN(maas) as minimum_maas, MAX(maas) as maximum_maas, COUNT(id) as personel FROM calisanlar GROUP BY sehir HAVING minimum_maas > 2300
# Sorgu çıktısı. Minumum maaş 2000.00'dan yüksek olan şehirleri listeliyelim...
| sehir   | minimum_maas  | maximum_maas  | personel |
| Ankara  | 2500.00       | 6300.00       | 5        |
```

5. Dikkat! Değiştirmiş olduğumuz sütun isimleri koşulda kullanalım. WHERE koşulu ile bu isimler çalışmaz! Bunun yerine HAVING kullanıyoruz...

```sql
SELECT sehir, meslek, MIN(maas) as minimum_maas, MAX(maas) as maximum_maas, COUNT(id) as personel FROM calisanlar GROUP BY sehir, meslek
# Sorgu çıktısı. Şehirlerde minimum, maximum maaşları, personel sayılarını ve meslek, şehir gruplarına göre listeliyelim...
| sehir   | meslek    | minimum_maas | maximum_maas | personel |
| Ankara  | Asistan   | 2500.00      | 2500.00      | 1        |
| Ankara  | Designer  | 5250.00      | 5250.00      | 1        |
| Ankara  | Developer | 5700.00      | 6300.00      | 3        |
| Çankırı | Aşçı      | 2500.00      | 2500.00      | 1        |
| Çankırı | Stajyer   | 2200.00      | 2200.00      | 1        |
| Çankırı | Şöför     | 2700.00      | 2700.00      | 1        |
| Çankırı | Usta      | 3000.00      | 3250.00      | 2        |
```

6. Sadece meslekleri gruplayalım...

```sql
SELECT meslek, MIN(maas) as minimum_maas, MAX(maas) as maximum_maas, COUNT(id) as personel FROM calisanlar GROUP BY meslek
# Sorgu çıktısı. Şehirlerde minimum, maximum maaşları, personel sayılarının meslek göre listeliyelim...
| meslek    | minimum_maas | maximum_maas | personel |
| Asistan   | 2500.00      | 2500.00      | 1        |
| Aşçı      | 2500.00      | 2500.00      | 1        |
| Designer  | 5250.00      | 5250.00      | 1        |
| Developer | 5700.00      | 6300.00      | 3        |
| Stajyer   | 2200.00      | 2200.00      | 1        |
| Şöför     | 2700.00      | 2700.00      | 1        |
| Usta      | 3000.00      | 3250.00      | 2        |
```

7. Hangi meslekten kaç personel var?

```sql
SELECT meslek, count(id) as toplam FROM calisanlar as toplam GROUP BY meslek
# Sorgu çıktısı...
| meslek    | toplam | 
| Asistan   | 1      | 
| Aşçı      | 1      | 
| Designer  | 1      | 
| Developer | 3      | 
| Stajyer   | 1      | 
| Şöför     | 1      | 
| Usta      | 2      | 
```

#### VERİLERDE ARAMA (LIKE)

1. Baş harfe göre listeleme ...

```sql
SELECT * FROM calisanlar WHERE ad LIKE 'a%'
# Baş harfi "a" olan çalışanları listeliyelim...
| id  | ad      | soyad     | meslek    | sehir   | maas    |
| 3   | Ahmet   | Yoksay    | Usta      | Çankırı | 3250.00 |
| 8   | Aslı    | Gencer    | Developer | Ankara  | 5700.00 |
```

2. Son harfe göre listeleme ...

```sql
SELECT * FROM calisanlar WHERE ad LIKE '%n'
# İsmi "n" ile biten çalışanları listeliyelim...
| id  | ad      | soyad     | meslek    | sehir   | maas    |
| 1   | Hasan   | Çiçek     | Developer | Ankara  | 6300.00 |
| 4   | Metin   | Çelenk    | Developer | Ankara  | 6000.00 |
| 5   | Ramazan | Karadoğan | Designer  | Ankara  | 5250.00 |
| 6   | Çetin   | Bozyel    | Aşçı      | Çankırı | 2500.00 |
```

3. Başlangıç ve bitiş karakterlerine göre listeleme ...

```sql
SELECT * FROM calisanlar WHERE ad LIKE 'z%p'
# İsimlerde, baş harfi "z", son harfi ise "p" olan çalışanları listeliyelim...
| id  | ad     | soyad   | meslek | sehir  | maas    |
| 2   | Zeynep |Yorgancı | Usta   |Çankırı | 3000.00 |
```

4. Başlangıç ve bitiş karakterlerine göre listeleme ...

```sql
SELECT * FROM calisanlar WHERE ad LIKE '%et%'
# İsimlerin her hangi bir yerinde "et" hecesi geçen çalışanları listeliyelim...
| id  | ad     | soyad   | meslek    | sehir   | maas    |
| 3   | Ahmet  | Yoksay  | Usta      | Çankırı | 3250.00 |
| 4   | Metin  | Çelenk  | Developer | Ankara  | 6000.00 |
| 6   | Çetin  | Bozyel  | Aşçı      | Çankırı | 2500.00 |
```
