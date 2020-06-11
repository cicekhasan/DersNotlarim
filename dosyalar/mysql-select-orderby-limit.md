## VERİ ÇEKME (SELECT) İŞLEMLERİ İŞLEMLERİ

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


1. Tablodaki bütün sütun ve satırları çekmek...

```sql
SELECT * FROM uyeler
# Sorgu çıktısı...
| id | uye_adi    | uye_tam_adi   | uye_eposta                | parola |
| 1  | hasancicek | Hasan Çiçek   | hasan.cicek@yandex.com.tr | 123456 |
| 2  | zeytin     | Aleyne Çakır  | aleyna38@gmail.com        | 456789 |
| 3  | karabela   | Ahmet Ayraç   | ayracahmet@gmail.com      | 852369 |
| 4  | karbeyaz   | Nalan Firarda | firardanalan@hotmail.com  | 123456 |
```

2. Tabloda, id'si '2' olan üyeye ait bütün sütun ve satırı çekmek...

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
| AD         | POSTA                     |
| hasancicek | hasan.cicek@yandex.com.tr |
```

6. Aşağıda sorgu ile; "uyeler" tablosundan "id" si "1" ya da "id" si "4" olan ve "parola" sı aynı "123456" kullanıcıları çekmeye çalışıyoruz. 

Dikkat: Parantezi kullanmazsak "parola" sı 123456 ve "id" si "1" olan kullanıcı varsa çeker, yoksa "id" si "4" olan kullanıcıyı getirir. Ya da bölümünü parantez içerisine almadan kullanırsak sorgu hata verir.

```sql
SELECT * FROM uyeler WHERE parola = '123456' && ( id='1' || id='4' )
# Sorgu çıktısı...
| id | uye_adi    | uye_tam_adi   | uye_eposta                | parola |
| 1  | hasancicek | Hasan Çiçek   | hasan.cicek@yandex.com.tr | 123456 |
| 4  | karbeyaz   | Nalan Firarda | firardanalan@hotmail.com  | 123456 |
```

7. "id" si 1 ya da 3 ya da 8 olan çalışanları çekmek...

```sql
SELECT * FROM calisanlar WHERE id = 1 || id = 3 || id = 8
# Sorgu çıktısı...
| id | ad    | soyad  | meslek    | sehir   | maas    |
| 1  | Hasan | Çiçek  | Developer | Ankara  | 6300.00 |
| 3  | Ahmet | Yoksay | Usta      | Çankırı | 3250.00 |
| 8  | Aslı  | Gencer | Developer | Ankara  | 5700.00 |
```

8. "id" si 1,3,8 olan çalışanları çekmek...

```sql
SELECT * FROM calisanlar WHERE id IN (1,3,8)
# Sorgu çıktısı. 7. örnekle aynı sonucu verir, yazımına dikkat edin...
| id | ad    | soyad  | meslek    | sehir   | maas    |
| 1  | Hasan | Çiçek  | Developer | Ankara  | 6300.00 |
| 3  | Ahmet | Yoksay | Usta      | Çankırı | 3250.00 |
| 8  | Aslı  | Gencer | Developer | Ankara  | 5700.00 |
```

9. "id" si 1,3,8 hariç olan çalışanları çekmek...

```sql
SELECT * FROM calisanlar WHERE id NOT IN (1,3,8)
# Sorgu çıktısı...
| id | ad      | soyad     | meslek    | sehir   | maas    |
| 2  | Zeynep  | Yorgancı  | Usta      | Çankırı | 3000.00 |
| 4  | Metin   | Çelenk    | Developer | Ankara  | 6000.00 |
| 5  | Ramazan | Karadoğan | Designer  | Ankara  | 5250.00 |
| 6  | Çetin   | Bozyel    | Aşçı      | Çankırı | 2500.00 |
| 7  | Meryem  | Uzel      | Asistan   | Ankara  | 2500.00 |
| 9  | Sami    | Kalem     | Stajyer   | Çankırı | 2200.00 |
| 10 | Kemal   | Yeşil     | Şöför     | Çankırı | 2700.00 |
```

10. "meslek" sütunu "Developer ve Designer" olan çalışanları çekmek...

```sql
SELECT * FROM calisanlar WHERE meslek IN ('Developer', 'Designer')
# Sorgu çıktısı...
| id | ad      | soyad     | meslek    | sehir   | maas    |
| 1  | Hasan   | Çiçek     | Developer | Ankara  | 6300.00 |
| 4  | Metin   | Çelenk    | Developer | Ankara  | 6000.00 |
| 5  | Ramazan | Karadoğan | Designer  | Ankara  | 5250.00 |
| 8  | Aslı    | Gencer    | Developer | Ankara  | 5700.00 |
```

11. Farklı tablo verisine göre veri çekme...

```sql
SELECT * FROM calisanlar WHERE meslek IN ( SELECT meslek FROM meslekler )
# Sorgu çıktısı... "meslekler" tablosundaki verilerin olduğu çalışanları çeker...
# Bu tabloda sadece "Developer" olduğu için o meslek grubuna ait verileri çekecek...
| id | ad      | soyad     | meslek    | sehir   | maas    |
| 1  | Hasan   | Çiçek     | Developer | Ankara  | 6300.00 |
| 4  | Metin   | Çelenk    | Developer | Ankara  | 6000.00 |
| 8  | Aslı    | Gencer    | Developer | Ankara  | 5700.00 |
```

12. 

```sql
SELECT * FROM calisanlar WHERE meslek IN ( SELECT meslek FROM meslekler )
# Sorgu çıktısı... "meslekler" tablosundaki verilerin olduğu çalışanları çeker...
| id | ad      | soyad     | meslek    | sehir   | maas    |
| 1  | Hasan   | Çiçek     | Developer | Ankara  | 6300.00 |
| 4  | Metin   | Çelenk    | Developer | Ankara  | 6000.00 |
| 8  | Aslı    | Gencer    | Developer | Ankara  | 5700.00 |
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
