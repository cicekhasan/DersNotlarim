## İNDİRME İŞLEMLERİ

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


İndirmek istediğimiz dosyanın direk indirme linkini biliyorsak bu dosyamızı herhangi bir ekstra program kullanmadan veya tarayıcıya ihtiyaç duymadan konsol üzerinden indirebiliriz.

#### WGET

```bash
# Tek dosya indirme...
wget dosyaIndirmeLinki
# İndirirken kesilirse devam etsin...
wget -c dosyaIndirmeLinki
# İndirme hızını belirlemek...
wget --limit-rate=300KB/s dosyaIndirmeLinki
# Arkaplanda indirmek...
wget -b dosyaIndirmeLinki
# Çoklu dosya indirme...
wget -i dosyaIndirmeLinki/*.jpg
# İndirilecek yeri belirterek dosya indirme...
wget -P /home/kaptan/Masaüstü dosyaIndirmeLinki
# Özel konum ve isim belirterek indirmek...
wget -P /home/kaptan/Masaüstü/yeniDosyaAdi dosyaIndirmeLinki
```
#### CURL

```bash
curl -O dosyaIndirmeLinki
```
#### AXEL

```bash

```
