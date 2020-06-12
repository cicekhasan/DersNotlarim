## İLİŞKİLİ TABLOLAR (JOIN)

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


1. Sadece eşleşme olanları getirir!

```sql
SELECT * FROM dersler INNER JOIN uyeler ON uyeler.id = dersler.yazar
# Sorgu çıktısı...
# "dersler" tablosundaki "yazar" ile "uyeler" tablosundaki "id" sütunlarını eşleştirelim...
| id | baslik | icerik                            | yazar | kategori | id | uye_adi    | uye_tam_adi   | uye_eposta                | parola |
| 1  | Ders 1 | Aba vakti aba, yaba vakti yaba.   | 1     | 1,2,7    | 1  | hasancicek | Hasan Çiçek   | hasan.cicek@yandex.com.tr | 123456 |
| 2  | Ders 2 | Abanın kadir yağmurda bilinir.    | 3     | 5,2      | 3  | karabela   | Ahmet Ayraç   | ayracahmet@gmail.com      | 852369 |
| 3  | Ders 3 | Acı patlıcanı kırağı çalmaz.      | 3     | 4,8      | 3  | karabela   | Ahmet Ayraç   | ayracahmet@gmail.com      | 852369 |
```

2. Sol tarafdaki "dersler" tablosunun tamamını, sağ tarafdaki "uyeler" tablosundaki sadece eşleşme olanları getirir diğerleri "NULL" geçer!

```sql
# sol taraf LEFT JOIN sağ taraf
SELECT * FROM dersler LEFT JOIN uyeler ON uyeler.id = dersler.yazar
# Sorgu çıktısı...
# "dersler" tablosundaki "yazar" ile "uyeler" tablosundaki "id" sütunlarını eşleştirelim...
| id | baslik | icerik                            | yazar | kategori | id   | uye_adi    | uye_tam_adi   | uye_eposta                | parola |
| 1  | Ders 1 | Aba vakti aba, yaba vakti yaba.   | 1     | 1,2,7    | 1    | hasancicek | Hasan Çiçek   | hasan.cicek@yandex.com.tr | 123456 |
| 2  | Ders 2 | Abanın kadir yağmurda bilinir.    | 3     | 5,2      | 3    | karabela   | Ahmet Ayraç   | ayracahmet@gmail.com      | 852369 |
| 3  | Ders 3 | Acı patlıcanı kırağı çalmaz.      | 3     | 4,8      | 3    | karabela   | Ahmet Ayraç   | ayracahmet@gmail.com      | 852369 |
| 4  | Ders 4 | Ateş düştüğü yeri yakar.          | 5     | 1,7      | NULL | NULL       | NULL          | NULL                      | NULL   |
| 5  | Ders 5 | Ateş olmayan yerden duman çıkmaz. | 5     | 7,5      | NULL | NULL       | NULL          | NULL                      | NULL   |
| 6  | Ders 6 | Ayranım ekşidir diyen olmaz.      | 4     | 7,5      | NULL | NULL       | NULL          | NULL                      | NULL   |
| 7  | Ders 7 | Babadan mal kalır, kemal kalmaz.  | 5     | 5,2      | NULL | NULL       | NULL          | NULL                      | NULL   |
| 8  | Ders 8 | Besle kargayı oysun gözünü.       | 4     | 2,1      | NULL | NULL       | NULL          | NULL                      | NULL   |
| 9  | Ders 9 | Büyük lokma ye büyük söz söyleme. | 1     | 5,2      | NULL | NULL       | NULL          | NULL                      | NULL   |
```

3. Sağ tarafdaki "uyeler" tablosunun tamamını, sol tarafdaki "dersler" tablosundaki sadece eşleşme olanları getirir diğerleri "NULL" geçer!

```sql
# sol taraf LEFT JOIN sağ taraf
SELECT * FROM dersler RIGHT JOIN uyeler ON uyeler.id = dersler.yazar
# Sorgu çıktısı...
# "dersler" tablosundaki "yazar" ile "uyeler" tablosundaki "id" sütunlarını eşleştirelim...
| id   | baslik | icerik                          | yazar | kategori | id   | uye_adi    | uye_tam_adi   | uye_eposta                | parola |
| 1    | Ders 1 | Aba vakti aba, yaba vakti yaba. | 1     | 1,2,7    | 1    | hasancicek | Hasan Çiçek   | hasan.cicek@yandex.com.tr | 123456 |
| 2    | Ders 2 | Abanın kadir yağmurda bilinir.  | 3     | 5,2      | 3    | karabela   | Ahmet Ayraç   | ayracahmet@gmail.com      | 852369 |
| 3    | Ders 3 | Acı patlıcanı kırağı çalmaz.    | 3     | 4,8      | 3    | karabela   | Ahmet Ayraç   | ayracahmet@gmail.com      | 852369 |
| NULL | NULL   | NULL                            | NULL  | NULL     | 2    | zeytin     | Aleyne Çakır  | aleyna38@gmail.com        | 456789 |
| NULL | NULL   | NULL                            | NULL  | NULL     | 4    | cepdelik   | Nalan Firarda | altinkase@gmail.com       | 512648 |
| NULL | NULL   | NULL                            | NULL  | NULL     | 5    | berdus     | Zeytin Kural  | zeytin18@gmail.com        | 485926 |
```

4. Sadece eşleşme olanları getirir! Üç tablo eşleştirme...

```sql
SELECT * FROM dersler INNER JOIN uyeler ON uyeler.id = dersler.yazar INNER JOIN kategori ON kategori.id = dersler.kategori
# Sorgu çıktısı...
# "dersler" tablosundaki "yazar" ile "uyeler" tablosundaki "id" ve kategoriler tablosundaki "id" si eşleşen sütunlarını eşleştirelim...
| id | baslik | icerik                            | yazar | kategori | id | uye_adi    | uye_tam_adi   | uye_eposta                | parola | id | kategori |
| 1  | Ders 1 | Aba vakti aba, yaba vakti yaba.   | 1     | 1,2,7    | 1  | hasancicek | Hasan Çiçek   | hasan.cicek@yandex.com.tr | 123456 | 1  | Php      |
| 2  | Ders 2 | Abanın kadir yağmurda bilinir.    | 3     | 5,2      | 3  | karabela   | Ahmet Ayraç   | ayracahmet@gmail.com      | 852369 | 4  | Markdown |
| 3  | Ders 3 | Acı patlıcanı kırağı çalmaz.      | 3     | 4,8      | 3  | karabela   | Ahmet Ayraç   | ayracahmet@gmail.com      | 852369 | 5  | Genel    |
```

5. Sadece eşleşme olanları getirir! Üç tablodan istediğimiz sütunları çekelim...

```sql
SELECT dersler.id, baslik, icerik, uyeler.uye_tam_adi as yazar, uyeler.uye_eposta as eposta, kategori.ad as kategori_adi FROM dersler
 INNER JOIN uyeler ON uyeler.id = dersler.yazar 
 INNER JOIN kategori ON kategori.id = dersler.kategori
# Sorgu çıktısı...
# "dersler" tablosundaki "yazar" ile "uyeler" tablosundaki "id" ve kategoriler tablosundaki "id" si eşleşen sütunlarını eşleştirelim...
| id | baslik | icerik                          | yazar       | eposta                    | kategori_adi |
| 1  | Ders 1 | Aba vakti aba, yaba vakti yaba. | Hasan Çiçek | hasan.cicek@yandex.com.tr | Php          |
| 3  | Ders 2 | Acı patlıcanı kırağı çalmaz.    | Ahmet Ayraç | ayracahmet@gmail.com      | Markdown     |
| 2  | Ders 3 | Abanın kadir yağmurda bilinir.  | Ahmet Ayraç | ayracahmet@gmail.com      | Genel        |
```

6. Sadece eşleşme olanları getirir! Kategorisi "Php" olanları çekelim...

```sql
SELECT dersler.id, baslik, icerik, uyeler.uye_tam_adi as yazar, uyeler.uye_eposta as eposta, kategori.ad as kategori_adi FROM dersler
 INNER JOIN uyeler ON uyeler.id = dersler.yazar  
 INNER JOIN kategori ON kategori.id =1
# Sorgu çıktısı...
# "dersler" tablosundaki "yazar" ile "uyeler" tablosundaki "id" ve kategoriler tablosundaki "id" si eşleşen sütunlarını eşleştirelim...
| id | baslik | icerik                          | yazar       | eposta                    | kategori_adi |
| 1  | Ders 1 | Aba vakti aba, yaba vakti yaba. | Hasan Çiçek | hasan.cicek@yandex.com.tr | Php          |
| 3  | Ders 2 | Acı patlıcanı kırağı çalmaz.    | Ahmet Ayraç | ayracahmet@gmail.com      | Php          |
| 2  | Ders 3 | Abanın kadir yağmurda bilinir.  | Ahmet Ayraç | ayracahmet@gmail.com      | Php          |
```

7. İçeriği olmayan yazarları bulalım...

```sql
# sol taraf LEFT JOIN sağ taraf
SELECT uyeler.id, uyeler.uye_tam_adi as ad_soyad FROM dersler RIGHT JOIN uyeler ON uyeler.id = dersler.yazar WHERE dersler.yazar IS NULL
# Sorgu çıktısı...
| id | ad_soyad      |
| 2  | Aleyne Çakır  |
| 4  | Nalan Firarda |
| 5  | Zeytin Kural  |
```
