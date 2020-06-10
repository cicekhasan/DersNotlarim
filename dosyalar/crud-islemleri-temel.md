## BİLGİ ALMA KOMUTLARI VE ÖRNEK KULLANIM ŞEKİLLERİ

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)



Aşağıdaki örneklerde "uyeler" isimli tablo örnek olarak verilmiştir...

#### KOŞULDA KULLANILACAK OPERATÖRLER

| Operatör | Açıklama |
| --- | --- |
| = | Eşit |
| != | Eşit değil |
| > | Büyük |
| < | Küçük |
| >= | Büyük ya da eşit |
| <= | Küçük ya da eşit |
| && | Ve |
| \|\| | Ya da |

1. Aşağıda sorgu ile; "uyeler" tablosundan "id" si "1" ya da "id" si "2" olan ve "parola" sı aynı "123456" kullanıcıları çekmeye çalışıyoruz. 

Dikkat: Parantezi kullanmazsak "parola" sı 123456 ve "id" si "1" olan kullanıcı varsa çeker, yoksa "id" si "2" olan kullanıcıyı getirir. Ya da bölümünü parantez içerisine almadan kullanırsak sorgu hata verir.

```sql
SELECT * FROM uyeler WHERE parola = '123456' && ( id = '1' || id = '2' )
```


#### VERİ EKLEME (INSERT)

1. Tekli veri 1. yöntem. Bir satır ekler...

```sql
INSERT INTO uyeler SET uye_adi = 'hasancicek', parola = '123456', eposta = 'hasan.cicek@yandex.com.tr'
```

2. Tekli veri 2. yöntem. Bir satır ekler...

```sql
INSERT INTO uyeler ( uye_adi, parola, eposta ) VALUES ( 'hasancicek', '123456', 'hasan.cicek@yandex.com.tr' )
```

3. Çoklu veri ekleme. "uyeler" ından sonra parantez içerisine, değer eklenecek sütun adları yazılır. Örneğer göre üç satır ekler...

```sql
INSERT INTO uyeler ( uye_adi, parola, eposta ) VALUES 
  ( 'hasancicek', '123456', 'hasan.cicek@yandex.com.tr' ), 
  ( 'test1', '123456', 'test1@gmail.com' ), 
  ( 'test2', '456987', 'test2@hotmailcom' )
```

#### VERİ ÇEKME (SELECT)

1. Tablodaki bütün sütun ve satırları getirir...

```sql
SELECT * FROM uyeler
```

2. Tabloda, id'si '1' olan üyeye ait bütün sütun ve satırı getirir...

```sql
SELECT * FROM uyeler WHERE id = '1'
```

3. Belirtilen sütunlara ait verileri çekmek...

```sql
SELECT uye_adi, parola FROM uyeler
```

4. id'si '1' olan üyeye ait belirtilen sütunlara ait verileri çekmek. "id" belirttiğimiz ve "id" tek olacağı için bir satır veri gelir. Eğer koşul başka bir şey olursa ve o koşulu karşılayan birden fazla sonuç varsa o kadar satır veri çekilir.

```sql
SELECT uye_adi, parola FROM uyeler WHERE id = '1'
```

5. Verileri çekerken kolon adını değiştirmek. Aşağıdaki örnekte id'si '1' olan kullanıcının verilerini çekerken "uye_adi" kolon adını "ad", "eposta" kolon adını da "posta" olarak değiştidik.

```sql
SELECT uye_adi as ad, eposta as posta FROM uyeler WHERE id = '1'
```

#### VERİ GÜNCELLEME (UPDATE)

1. "id" si 1 olan kullanıcının adını değiştirmek...

```sql
UPDATE uyeler SET uye_adi = 'Yeni Ad' WHERE id = '1'
```

2. "id" si 1 olan kullanıcının "uye_adi" ve "eposta" sını değiştirmek...

```sql
UPDATE uyeler SET uye_adi = 'Yeni Ad', eposta = 'yenieposta@gmailcom' WHERE id = '1'
```

#### VERİ SİLME (DELETE)

1. "id" si 1 olan kullanıcıyı silelim...

```sql
DELETE FROM uyeler WHERE id = '1'
```

#### SIRALI VERİ ÇEKME (ORDER BY)

1. A-z ye sıralı veri çekme. Sonuna ASC yazmasakta varsayılan sıralaması a-z dir...

```sql
SELECT * FROM uyeler ORDER BY uye_adi
```

2. Z-a ye sıralı veri çekme...

```sql
SELECT * FROM uyeler ORDER BY uye_adi DESC
```

3. A-z ye iki sütuna göre sıralı veri çekme. Önce "id" ye sonra "uye_adi" na göre sıralar...

```sql
SELECT * FROM uyeler ORDER BY id, uye_adi ASC
```

4. Önce "uye_adi" na göre A-Z sıralar, sonrasında "id" ye göre Z-A ...

```sql
SELECT * FROM uyeler ORDER BY uye_adi, id DESC
```

#### LİMİTLİ VERİ ÇEKME (LIMIT)

1. "uyeler" tablosundan iki satır çeker...

```sql
SELECT * FROM uyeler LIMIT 2
```

2. "uyeler" tablosundan son eklenen 10 satırı çeker...

```sql
SELECT * FROM uyeler ORDER BY id DESC LIMIT 10
```

3. "uyeler" tablosundan son eklenen 2. satırı atla, sonraki 10 satırı göster...

```sql
SELECT * FROM uyeler ORDER BY id DESC LIMIT 2,10
```

#### VERİLERDE GRUPLAMA (GROUP BY ve HAVING)

1. Tablo adı: calisanlar

| id  | ad      | soyad     | meslek    | sehir   | maas |
| --- | ---     | ---       | ---       | ---     | ---  |
| 1   | Hasan   | Çiçek     | Developer | Ankara  | 6300 |
| 2   | Zeynep  | Yorgancı  | Usta      | Çankırı | 3000 |
| 3   | Ahmet   | Yoksay    | Usta      | Çankırı | 3250 |
| 4   | Metin   | Çelenk    | Developer | Ankara  | 6300 |
| 5   | Ramazan | Karadoğan | Designer  | Ankara  | 5250 |
| 6   | Çetin   | Bozyel    | Aşçı |      Çankırı | 2500 |
| 7   | Meryem  | Uzel      | Asistan   | Ankara  | 2000 |
| 8   | Aslı    | Gencer    | Developer | Ankara  | 6300 |
| 9   | Sami    | Kalem     | Stajjer   | Çankırı | 2000 |
| 10  | Kemal   | Cabbar    | Şoför     | Çankırı | 2700 |

```sql
SELECT sehir, MIN(maas) as Minimum FROM calisanlar GROUP BY sehir
```
