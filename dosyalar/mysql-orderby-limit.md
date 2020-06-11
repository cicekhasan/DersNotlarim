## SIRALAMA VE LİMİT KOYMA İŞLEMLERİ (ORDER BY-LIMIT)

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


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
