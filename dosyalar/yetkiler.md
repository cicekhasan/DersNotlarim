# YETKİLENDİRME

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)

**Yetkiler üzerinde işlem yapabilmek için önce kullanıcıları ve yetkilerini biliyor olmamız gerekmektedir.**

## KULLANICI İŞLEMLERİ
### Kullanıcıları Listeleme

*Not: İd'si 800 den aşağıda olanlar sistem yöneticisidir. İlk kullanıcı 1000 id sini alır.*

```bash
cat /etc/passwd
```

### Kullanıcı Bilgisi Öğrenme

```bash
finger kullanıcıadı
```

### Kullanıcıya Yönetici Yetkisi Verme

```bash
sudo usermod -a -G sudo kullaniciAdi
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

Şifreli sayılar (777) yerine anlaşılır steno (ugo+rwx) ile yetki vermek daha bilinçli olur. Ayrıca öğrenmesi de kolaydır.

| Bireyler | Açıklama |
| ---- | ---- |
| u | Dosyanın sahibi kullanıcı |
| g | Dosyanın sahibi grup |
| o | Diğerleri (Misafirler) |
| a | Hepsi (Kullanıcı,grup ve misafirler) |

| Yetkiler | Açıklama |
| ---- | ---- |
| 	  | Yetkisiz |
| r   | Okuyabilir |
| w   | Yazabilir |
| x   | Çalıştırabilir |
| rwx | Bütün yetkilere sahiptir |

| Yetki Operatörleri | Açıklama |
| ---- | ---- |
| + | Yetkiyi ekler |
| - | Yetkiyi siler |
| = | Yetkiyi ya da yetkisizliği verir |

| Kullanım Şekilleri | Açıklama |
| ---- | ---- |
| u=r  | Kullanıcılara okuma yetkisi verir |
| g=rw | Gruplara okuma yazma yetkisi verir |
| o=   | Diğerlerine (misafirlere) ait yetkileri kaldırır |
| u+x  | Kullanıcılara çalıştırma yetkisi verir |
| g-w  | Gruplardan yazma yetkisini kaldırır |
| o+r  | Misafirlere okuma yetkisi verir |

#### Yetki verme ve kaldırma örnekleri

```bash
# Alt dizinler (-R) dahil, herkese tüm yetkileri verir
sudo chmod -R a+rwx dosyaAdi
# Diğerlerine (misafirlerlere) çalıştırma yetkisi verir
sudo chmod o+x dosyaAdi
# Gruba yazma yetkisi verir
sudo chmod g+w dosyaAdi
# İki dosyaya birden herkese çalıştıma yetkisi verir
sudo chmod a+x dosyaAdi1 dosyaAdi2
# Gruba okuma ve çalıştırma, diğerlerine ise çalıştırma yetkisi verir
sudo chmod g+rx,o+x dosyaAdi
# Kullanıcılara okuma ve yazma yetkisini verir, gruplara yazma yetkisi verir ve misafirlerin yetkilerini siler
chmod u=rw,g+w,o= 
# Dosya sahibine okuma ve çalıştırma yetkisi verir
sudo chmod u=rx dosyaAdi
# Kullanıcılara bütün yetkileri verir
sudo chmod u=rwx
# Alt dizinler (-R) dahil, herkesden tüm yetkileri kaldırır
sudo chmod -R a-rwx dosyaAdi
# Herkesden sadece yazma yetkisini kaldırır
sudo chmod a-w dosyaAdi
# Grupların okuma yetkisini kaldırır
chmod g-r
# Grup ve diğelerinden tüm yetkileri kaldırır
sudo chmod go-rwx dosyaAdi
# Dosya sahibini root yapar
chown root dosyaAdi
# Dosya sahibini ve grubunu root yapar
chown root:root dosyaAdi
# Dosyanın çalıştırma yetkisini herkesten kaldırır
chmod -x dosyaAdi
# Dosyayı root dahil kimse silemesin
chattr -i dosyaAdi 
```
