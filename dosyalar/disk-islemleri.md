# DİSK İŞLEMLERİ

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)



## Disk Sorgulama 

```bash
df -lh
# Örnek çıktı
yeniceri@fetih1453:/var/www/html/DersNotlarim$ df -lh
Dosyasistemi     Boy  Dolu   Boş Kull% Bağlanılan yer
udev            2,9G     0  2,9G    0% /dev
tmpfs           583M  9,1M  574M    2% /run
/dev/sda2        28G  9,3G   17G   36% /
tmpfs           2,9G   94M  2,8G    4% /dev/shm
tmpfs           5,0M     0  5,0M    0% /run/lock
tmpfs           2,9G     0  2,9G    0% /sys/fs/cgroup
/dev/sda4       406G   16G  369G    5% /home
/dev/sda1       511M   17M  495M    4% /boot/efi
tmpfs           583M   40K  583M    1% /run/user/1000
```

## Disk bölümlerini listeleme

```bash
sudo fdisk -l
# Örnek çıktı
Disk /dev/sdb: 465,8 GiB, 500107862016 bytes, 976773168 sectors
Disk model: WDC WD5000BEVT-5
Units: sectors of 1 * 512 = 512 bytes
Sector size (logical/physical): 512 bytes / 512 bytes
I/O size (minimum/optimal): 512 bytes / 512 bytes
Disklabel type: dos
Disk identifier: 0x080a8a17

Device     Boot     Start       End   Sectors   Size Id Type
/dev/sdb1            2048 292972543 292970496 139,7G  c W95 FAT32 (LBA)
/dev/sdb2       292972544 976773119 683800576 326,1G  c W95 FAT32 (LBA
```

## Disk Ya da Usb Bağlama

```bash
mount /dev/cihazIsmi yolIsmi
```

## Disk Ya da Usb Ayırma

```bash
umount yolIsmi
```