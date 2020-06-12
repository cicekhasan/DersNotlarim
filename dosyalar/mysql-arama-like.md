## VERİLERDE ARAMA (LIKE-FIND_IN_SET) İŞLEMLERİ

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


#### LIKE İLE ARAMA

1. Baş harfe göre arama ...

```sql
SELECT * FROM calisanlar WHERE ad LIKE 'a%'
# Baş harfi "a" olan çalışanları listeliyelim...
| id  | ad      | soyad     | meslek    | sehir   | maas    |
| 3   | Ahmet   | Yoksay    | Usta      | Çankırı | 3250.00 |
| 8   | Aslı    | Gencer    | Developer | Ankara  | 5700.00 |
```

2. Son harfe göre arama ...

```sql
SELECT * FROM calisanlar WHERE ad LIKE '%n'
# İsmi "n" ile biten çalışanları listeliyelim...
| id  | ad      | soyad     | meslek    | sehir   | maas    |
| 1   | Hasan   | Çiçek     | Developer | Ankara  | 6300.00 |
| 4   | Metin   | Çelenk    | Developer | Ankara  | 6000.00 |
| 5   | Ramazan | Karadoğan | Designer  | Ankara  | 5250.00 |
| 6   | Çetin   | Bozyel    | Aşçı      | Çankırı | 2500.00 |
```

3. Başlangıç ve bitiş karakterlerine göre arama ...

```sql
SELECT * FROM calisanlar WHERE ad LIKE 'z%p'
# İsimlerde, baş harfi "z", son harfi ise "p" olan çalışanları listeliyelim...
| id  | ad     | soyad   | meslek | sehir  | maas    |
| 2   | Zeynep |Yorgancı | Usta   |Çankırı | 3000.00 |
```

4. Başlangıç ve bitiş karakterlerine göre arama ...

```sql
SELECT * FROM calisanlar WHERE ad LIKE '%et%'
# İsimlerin her hangi bir yerinde "et" hecesi geçen çalışanları listeliyelim...
| id  | ad     | soyad   | meslek    | sehir   | maas    |
| 3   | Ahmet  | Yoksay  | Usta      | Çankırı | 3250.00 |
| 4   | Metin  | Çelenk  | Developer | Ankara  | 6000.00 |
| 6   | Çetin  | Bozyel  | Aşçı      | Çankırı | 2500.00 |
```

5. İkinci karakterlere göre arama ...

```sql
SELECT * FROM calisanlar WHERE ad LIKE '_a%'
# Her hangi bir karakterle başlayıp, ikinci karakteri "a" olan çalışanları listeliyelim...
| id  | ad      | soyad     | meslek    | sehir   | maas    |
| 1   | Hasan   | Çiçek     | Developer | Ankara  | 6300.00 |
| 5   | Ramazan | Karadoğan | Designer  | Ankara  | 5250.00 |
| 9   | Sami    | Kalem     | Stajyer   | Çankırı | 2200.00 |
```

6. İki sütuna göre arama ...

```sql
SELECT * FROM calisanlar WHERE ad LIKE '_a%' || soyad LIKE '%en%'
# İsminin ikinci karakteri "a" olan ve soyadında "en" geçen çalışanları listeliyelim...
| id  | ad      | soyad     | meslek    | sehir   | maas    |
| 1   | Hasan   | Çiçek     | Developer | Ankara  | 6300.00 |
| 4   | Metin   | Çelenk    | Developer | Ankara  | 6000.00 |
| 5   | Ramazan | Karadoğan | Designer  | Ankara  | 5250.00 |
| 8   | Aslı    | Gencer    | Developer | Ankara  | 5700.00 |
| 9   | Sami    | Kalem     | Stajyer   | Çankırı | 2200.00 |
```

7. İki sütuna göre arama ...

```sql
SELECT * FROM calisanlar WHERE ad LIKE '_a%' AND soyad LIKE '%e%'
# İsminin ikinci karakteri "a" olan ve aynı anda soyadında da "e" harfi geçen çalışanları listeliyelim...
| id  | ad      | soyad     | meslek    | sehir   | maas    |
1 Hasan Çiçek Developer Ankara  6300.00
9 Sami  Kalem Stajyer Çankırı 2200.00
```
#### FIND_IN_SET İLE ARAMA

1. "dersler" tablosunda dersler birden fazla kategoriye eklenmiş. 

```sql
# "kategori" tablosunda "id" si 2 olan kategoriye ait dersleri listeliyelim...
# Linux kategorisine ait dersler...
SELECT * FROM dersler WHERE FIND_IN_SET(2, kategori)
# Sorgu çıktısı...
| id  | baslik | icerik                            | kategori |
| --- |---     | ---                               | ---      |
| 1   | Ders 1 | Aba vakti aba, yaba vakti yaba.   | 1,2,7    |
| 2   | Ders 2 | Abanın kadir yağmurda bilinir.    | 5,2      |
| 7   | Ders 7 | Babadan mal kalır, kemal kalmaz.  | 5,2      |
| 8   | Ders 8 | Besle kargayı oysun gözünü.       | 2,1      |
| 9   | Ders 9 | Büyük lokma ye büyük söz söyleme. | 5,2      |
```

2. "dersler" tablosunda iki kategoriye birden dahil olan dersleri bulalım. 

```sql
# "kategori" tablosunda "id" si 1 ve 7 olan kategorilere ait dersleri listeliyelim...
# Php ve Blog kategorilerine ait dersler...
SELECT * FROM dersler WHERE FIND_IN_SET(1, kategori) && FIND_IN_SET(7, kategori)
# Sorgu çıktısı...
| id  | baslik | icerik                          | kategori |
| --- |---     | ---                             | ---      |
| 1   | Ders 1 | Aba vakti aba, yaba vakti yaba. | 1,2,7    |
| 4   | Ders 4 | Ateş düştüğü yeri yakar.        | 1,7      |
```
