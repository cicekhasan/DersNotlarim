
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
