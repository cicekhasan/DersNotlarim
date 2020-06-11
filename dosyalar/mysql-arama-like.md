## VERİLERDE ARAMA (LIKE) İŞLEMLERİ

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


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

