## VERİLERDE GRUPLAMA (GROUP BY ve HAVING)

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


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
