# MYSQL

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


## MYSQL

- Veritabanı oluştururken dilini utf8_turkish_ci olarak ayarlamayı unutma.
- Site bilgileri tablosu örneği.

	- Tablo Adı: "sitebilgileri"
	- Sütunlar ve Özellikleri;
		- id 		(int, 11, A_I, Primary)
		- anahtar 	(varchar, 100)
		- deger		(varchar, 1000)
		- tarih 	(timestamp, currents_times)

### VERİTABANI SORGU ÖRNEKLERİ

#### Tablonun Tamamını Çekmek

Üyeler tablosundaki bütün verileri çeker...

```sql
SELECT * FROM uyeler
```

Örnek Çıktı:

| u_id | u_adSoy | u_tipi |
| --- | --- | --- |
| 1 | Hasan Çiçek | Yönetici |
| 2	| Kamuran Akkor | Üye |
| 3 | Aynur Akkaş | Üye |

#### Tablonun Tamamını Sıralı Çekmek

Üyeler tablosundaki bütün verileri u_adSoy sütununa göre A-Z ye sıralı çeker. DESC ile de Z-A ya göre sıralı çeker...

```sql
SELECT * FROM uyeler ORDER BY u_adSoy ASC
```

Örnek Çıktı:

| u_id | u_adSoy | u_tipi |
| --- | --- | --- |
| 3 | Aynur Akkaş | Üye |
| 1 | Hasan Çiçek | Yönetici |
| 2	| Kamuran Akkor | Üye |

#### Tablonun Sadece Bir Sütununu Sıralı Çekmek

Üyeler tablosundaki sadece u_adSoy sütununu A-Z ye sıralı çeker...

```sql
SELECT u_adSoy FROM uyeler ORDER BY u_adSoy ASC
```

Örnek Çıktı:

| u_adSoy |
| --- |
| Aynur Akkaş |
| Hasan Çiçek |
| Kamuran Akkor |

#### Eşleştirme Çekimi

Üye Tipi tablosunun t_tipi sütunu ile Üyeler tablosundaki u_tipi sütununda aynı olan satırları çeker...

```sql
SELECT * FROM uyeTipi INNER JOIN uyeler ON t_adi=u_tipi
```

#### Aynı Değerden Kaç Adet Var?

Üyeler tablosunun u_tipi sütunundaki değerleri tekil olarak adetleri ile beraber çeker ve adetleri sayı sütununda tutar...

```sql
SELECT u_tipi, COUNT(*) AS sayı FROM uyeler GROUP BY u_tipi
```

Örnek Çıktı:

| u_tipi | sayı |
| --- | --- |
| Yönetici | 1 |
| Başkan | 1 |
| Başkan Yardımcısı | 1 |
| Üye | 3 |

```sql
SELECT uyeler.u_tipi,COUNT(*)
	FROM uyeTipi,uyeler
	WHERE uyeler.u_tipi=uyeTipi.t_adi
	GROUP BY u_tipi;
```

```sql
SELECT uyeTipi.t_adi,COUNT(*)
	FROM uyeler,uyeTipi
	WHERE uyeTipi.t_adi=uyeler.u_tipi
	GROUP BY t_adi;
```

```sql
SELECT uyeTipi.t_adi,COUNT(*) as Adet
	FROM uyeler,uyeTipi
	WHERE uyeTipi.t_adi=uyeler.u_tipi
	GROUP BY t_adi;
```

|t_adi | Adet |
| --- | --- |
|Başkan Yardımcısı | 1 |
|Üye | 3 |
