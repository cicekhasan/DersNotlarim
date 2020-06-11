## VERİ GÜNCELLEME (UPDATE) İŞLEMLERİ

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


1. "id" si 4 olan kullanıcının parolasını değiştirmek...

```sql
UPDATE uyeler SET parola = 512648 WHERE id = '4'
```

2. "id" si 4 olan kullanıcının "uye_adi" ve "uye_eposta" sını değiştirmek...

```sql
UPDATE uyeler SET uye_adi = 'cepdelik', uye_eposta = 'altinkase@gmail.com' WHERE id = '4'
```
