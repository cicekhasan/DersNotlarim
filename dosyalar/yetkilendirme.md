# YETKİLENDİRME (CHMOD)

- [Önsöz](https://github.com/yeniceri1453/Linux)

```bash
man passwd

```

Şifreli sayılarla yetki verme; ```chmod 660 dosya```

BUNUN YERİNE AŞAĞIDAKİ ŞEKİLDE YETKİ VERMEK DAHA BİLİNÇLİ OLUR!

Anlaşılır steno ile yetki verme; ```chmod g=rw file```

u = Kullanıcılar
g = Gruplar
o = Diğerleri (Misafirler)
a = Hepsi

Yetkiler:
  = Yetkisisiz
x = Çalıştırabilir
w = Sadece yazabilir
r = Sadece Okuyabilir(Görebilir)
rwx = Bütün yetkilere sahiptir.

Yetki Operatörleri:
+ Yetkiyi ekler
- Yetkiyi siler
= Yetkiyi ya da yetkisizliği verir.

Kullanım Örnekleri
u=r    // Kullanıcılara okuma yetkisi ver
g=rw   // Gruplara okuma yazma yetkisi verir
o=     // Kullanıcılar ve gruplar harici (Misafirlere) ait yetkisizlik verir. Tanımlıları siler.

u+x    // Kullanıcılara çalıştırma yetkisi ver
g-w    // Gruplardan yazma yetkisini alır
o+r    // Misafirlere okuma yetkisi verir.

Çalışır Örnekler:

```bash
# Kullanıcılara bütün yetkileri tanımlamak;
chmod u=rwx
# Grupların okuma yetkisini kaldırmak;
chmod g-r
# Kullanıcılara okuma ve yazma yetkisi ver, gruplara yazma yetkisi ver ve misafirlerin yetkilerini sil.
chmod u=rw,g+w,o= 
# Dosya sahibini root yapmak;
chown root a.txt 
# Dosya sahibini ve grubunuroot yapmak;
chown root:root a.txt 
# Dosyanın çalıştırma yetkisini herkesten kaldırmak;
chmod -x a.txt
# Dosyayı root dahil kimse silmesin;
chattr -i dosyaAdi 
```