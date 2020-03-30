# SİSTEM YÖNETİMİ

- [Önsöz](https://github.com/cicekhasan/Linux)


## Sistem Hakkında Genel Bilgi Edinme 

```bash
cat /proc/version
```

## Ayağa kalkma süreciyle ilgili genel bilgi almak

```bash
systemd-analyze
```

## Linux yüksek kaynak tüketen hesapları öğrenme

```bash
ps axo pcpu,comm,pid,user | sort -nr | head -n 10
# Daha detaylı bilgi öğrenmek için;
ps -eo pcpu,pid,user,args,pmem | sort -k 1 -r | head -10
#En fazla ram kullanan hesapları bulmak için;
ps axo %mem,comm,pid,euser | sort -nr | head -n 10
```

## Bilgisayarım ne kadar açık

```bash
uptime
```

## DONANIM SORGULAMA

### Genel Sorgulama 

```bash
sudo lshw -short
# Detaylı çıktı için;
sudo lshw
# Blok aygıtları görme (hard disk, flash disk/bellek gibi)
lsblk -a
```

### İşlemci (CPU) Bilgilerini Görme

```bash
cat /proc/cpuinfo
# Çekirdek sayısını görmek için;
cat /proc/cpuinfo | grep cores
```

### Bellek Bilgilerini Öğrenme

```bash
free -m 
# YA DA
cat /proc/meminfo
```
### Grafik (Ekran) Kartını Sorgulama 

```bash
lspci | grep VGA
```

### PCI Cihazlarını Görüntüleme (Ethernet, kablosuz, ses kartları vb.) 

```bash
lspci
```

### USB cihazlarını Görüntüleme

```bash
lsusb
```

## Sistemin Güncellenmesi

```bash
sudo apt update
sudo apt upgrade -y
# ya da
sudo apt dist-upgrade -y
```

## Sistemin Temizlenmesi

```bash
# ilk komut çözümlenemeyen listeleride kaldırır.
sudo apt autoremove -y
sudo apt autoclean -y
sudo apt -y install -f
```

## Tüm geçmiş komutların temizlenmesi

```clear``` ya da ```CTRL+l``` sadece ekranda görülen komutları temizler. ```history -c``` ise dosyaya kaydedilen komutları da temizlediği için ```history``` komutu boş gelir. Bu komut birilerinin sizin kullandığınız komutları görmemesi kullanmaması(güvenlik) amacı ile kullanılır.

```bash
# Önce ekranı boşalt.
clear
# Geçmişte kullanmış olduğumuz tüm komutları silme.
history -c 
# Kayıt numarası ile istediğin komutu geçmişten silme.
history -d kayitNumarasi
```