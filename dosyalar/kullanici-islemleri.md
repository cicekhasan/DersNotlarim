# KULLANICI İŞLEMLERİ

- [Önsöz](https://github.com/yeniceri1453/Linux)


## Kullanıcıları Listeleme

İd'si 800 den aşağıda olanlar sistem yöneticisidir. İlk kullanıcı 1000 id sini alır.

```bash
cat /etc/passwd
```

## Kullanıcı Bilgisi Öğrenme

```bash
finger kullanıcıadı
```

## Kullanıcıya Yönetici Yetkisi Verme

```bash
sudo usermod -a -G sudo [kullanıcıadı]
```

## Grup Oluşturmak

```bash
sudo groupadd grupAdi
```

## Grupları Listeleme

```bash
getent group
# ya da
cat /etc/group
```

## Kullanıcıyı Gruba Atama

```bash
usermod -aG GrupAdı KullanıcıAdı
```

## Kullanıcıyı Gruptan Çıkarma

```bash
deluser kullanıcıAdı grupAdı
```
