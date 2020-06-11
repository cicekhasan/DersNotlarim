## VERİ EKLEME (INSERT) İŞLEMLERİ

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


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
