## ÖN YÜKLEMELİ USB OLUŞTURMA

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


```bash
# Usb flash diske yükleyeceğiniz kalıbın bulunduğu dosyaya geç...
cd isoDosyasininBulunduguDizin
# Süper kullanıcıya geç...
sudo su
# Usb yolunu öğren...
fdisk -l
# Usb yazdırma...
dd if=dosyaAdi.iso of=usbDiskYolu
```
