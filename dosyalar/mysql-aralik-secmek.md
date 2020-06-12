## İKİ DEĞER ARASINDAKİLERİ SEÇMEK (BETWEEN)

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


1. "calisanlar" tablosunda "maas" 2000 ile 3000(dahil) arasında olanları bulalım...

```sql
# Normal yoldan...
SELECT * FROM calisanlar WHERE maas > 2000 && maas <= 3000
# Normal yoldan...
SELECT * FROM calisanlar WHERE maas BETWEEN 2000 AND 3000
# Sorgu çıktısı...
# 2000 ve 3000' de dahil eder...
| id | ad      | soyad     | meslek    | sehir   | maas    |
| 2  | Zeynep  | Yorgancı  | Usta      | Çankırı | 3000.00 |
| 6  | Çetin   | Bozyel    | Aşçı      | Çankırı | 2500.00 |
| 7  | Meryem  | Uzel      | Asistan   | Ankara  | 2500.00 |
| 9  | Sami    | Kalem     | Stajyer   | Çankırı | 2200.00 |
| 10 | Kemal   | Yeşil     | Şöför     | Çankırı | 2700.00 |
```

2. "calisanlar" tablosunda "maas" 2500 ile 6000 arasında olmayanları bulalım...

```sql
SELECT * FROM calisanlar WHERE maas NOT BETWEEN 2500 AND 6000
# Sorgu çıktısı...
# 2500 ve 6000' de dahil eder...
| id | ad      | soyad     | meslek    | sehir   | maas    |
| 1  | Hasan   | Çiçek     | Developer | Ankara  | 6300.00 |
| 9  | Sami    | Kalem     | Stajyer   | Çankırı | 2200.00 |
```
