## FONKSİYONLAR (COUNT-MIN-SUM-MAX)

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


1. "calisanlar" tablosunda en düşük ve en yüksek maaşı bulalım...

```sql
SELECT MIN(maas), MAX(maas) FROM calisanlar
# Sorgu çıktısı...
|MIN(maas) | MAX(maas) |
|2200.00   | 6300.00   |
```

2. "calisanlar" tablosunda maaşların toplamını bulalım...

```sql
SELECT SUM(maas) FROM calisanlar
# Sorgu çıktısı...
# Sütunu toplar...
| SUM(maas) |
| 39400.00  |
```

3. "calisanlar" tablosunda kaç tane çalışan var bulalım...

```sql
SELECT COUNT(id) FROM calisanlar
# Sorgu çıktısı...
# Satırları sayar...
| COUNT(id) |  
| 10        |    
```
