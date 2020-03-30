# VERİTABANI İŞLEMLERİ

- [Önsöz](https://github.com/yeniceri1453/Linux)


## MYSQL

### Mysql Giriş

```bash
mysql -u root -p
```

#### MySql Komut Satırında

##### Veritabanlarını listeleme

```bash
show databases;
```

#### Tablo içini görme:
```bash
describe tabloAdi;
```

##### Veritabanı oluşturma

```bash
create database deneme1;
```

##### Örnek Tablo Oluşturma:

```bash 
mysql> create table tabloAdi(
 -> personelNo SMALLINT UNSIGNED PRIMARY KEY NOT NULL,
 -> ad VARCHAR(30) NOT NULL,
 -> soyad VARCHAR(30) NOT NULL,
 -> departman VARCHAR(30) NOT NULL,
 -> maas SMALLINT UNSIGNED NOT NULL);
```