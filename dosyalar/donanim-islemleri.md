## DONANIM İŞLEMLERİ

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


#### Donanım Sorgulama 

```bash
sudo lshw -short
# Detaylı çıktı için;
sudo lshw
# Blok aygıtları görme (hard disk, flash disk/bellek gibi)
lsblk -a
```

#### İşlemci (CPU) Bilgilerini Görme

```bash
cat /proc/cpuinfo
# Çekirdek sayısını görmek için;
cat /proc/cpuinfo | grep cores
```

#### Bellek Bilgilerini Öğrenme

```bash
free -m 
# YA DA
cat /proc/meminfo
```
#### Grafik (Ekran) Kartını Sorgulama 

```bash
lspci | grep VGA
```

#### PCI Cihazlarını Görüntüleme (Ethernet, kablosuz, ses kartları vb.) 

```bash
lspci
```

#### USB cihazlarını Görüntüleme

```bash
lsusb
```
