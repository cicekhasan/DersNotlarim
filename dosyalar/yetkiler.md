# YETKİLENDİRME

- [Önsöz](https://github.com/yeniceri1453/Linux)

## KULLANICI İŞLEMLERİ
### Kullanıcıları Listeleme

İd'si 800 den aşağıda olanlar sistem yöneticisidir. İlk kullanıcı 1000 id sini alır.

```bash
cat /etc/passwd
```

### Kullanıcı Bilgisi Öğrenme

```bash
finger kullanıcıadı
```

### Kullanıcıya Yönetici Yetkisi Verme

```bash
sudo usermod -a -G sudo [kullanıcıadı]
```

## GRUP İŞLEMLERİ
### Grup Oluşturmak

```bash
sudo groupadd grupAdi
```

### Grupları Listeleme

```bash
getent group
# ya da
cat /etc/group
```

### Kullanıcıyı Gruba Atama

```bash
usermod -aG GrupAdı KullanıcıAdı
```

### Kullanıcıyı Gruptan Çıkarma

```bash
deluser kullanıcıAdı grupAdı
```

## YETKİLER

- u = Dosyanın sahibi kullanıcı
- g = Dosyanın sahibi grup
- o = Diğerleri (Ziyaretçiler)
- a = Hepsi (Kullanıcı,grup ve ziyaretçiler)

- r = Okuma yetkisi
- w = Yazma yetkisi
- x = Çalıştırma yetkisi

#### Yetki verme ve kaldırma örnekleri

```bash
# Alt dizinler (-R) dahil, herkese tüm yetkileri verir
sudo chmod -R a+rwx dosyaAdi
# Alt dizinler (-R) dahil, herkesden tüm yetkileri kaldırır
sudo chmod -R a-rwx dosyaAdi
# Herkesden sadece yazma yetkisini kaldırır
chmod a-w dosyaAdi
# Diğerlerine (ziyaretçilere) çalıştırma yetkisi verir
chmod o+x dosyaAdi
# Grup ve diğelerinden tüm yetkileri kaldırır
chmod go-rwx dosyaAdi
# Gruba yazma yetkisi verir
chmod g+w dosyaAdi
# İki dosyaya birden herkese çalıştıma yetkisi verir
chmod a+x dosyaAdi1 dosyaAdi2
# Gruba okuma ve çalıştırma, diğerlerine ise çalıştırma yetkisi verir
chmod g+rx,o+x dosyaAdi
# Dosya sahibine okuma ve çalıştırma yetkisi verir
chmod u=rx dosyaAdi
```
