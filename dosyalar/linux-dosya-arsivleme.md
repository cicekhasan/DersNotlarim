## ARŞİVLEME İŞLEMLERİ

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


1. ```tar``` Komutu


```bash
# Dosya arşivleme...
tar -cf dosya1 dosya2
# Arşivden çıkarma...
tar -xf dosya.tar
# Başka bir klasöre çıkarma...
tar -xf dosya.tar -C hedefKlasor
# Çıkarmadan içerisine bakmak...
tar -tf dosya.tar
```

2. ```gzip ve bzip2``` Komutu


```bash
# Dosya arşivleme...
gzip dosya
bzip dosya
# Çıkarmak...
gzip -d dosya
bzip -d dosya
# Başka bir klasöre çıkarma...
gzip -d dosya -C hedefKlasor
bzip -d dosya -C hedefKlasor
```

3. ```zcat-zgrep-bzcat-bzgrep``` Komutları

Bu komutlar çıkartmadan okumamıza yarar.

```bash
zcat dosya
zgrep dosya
bzcat dosya
bzgrep dosya
```

4. ```zip-unzip``` Komutları

```bash
# Oluşturma
zip dosyaAdi.zip eklenecekDosya
# Çıkarma
unzip dosyaAdi.zip
```
