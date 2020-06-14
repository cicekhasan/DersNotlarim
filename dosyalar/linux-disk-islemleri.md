## DİSK İŞLEMLERİ

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


#### Disk Sorgulama 

```bash
df -lh
# Örnek çıktı
yeniceri@fetih1453:/var/www/html/DersNotlarim$ df
Dosyasistemi     1K-blok     Dolu       Boş Kull% Bağlanılan yer
udev             2950792        0   2950792    0% /dev
tmpfs             596536     9324    587212    2% /run
/dev/sda2       28705700  9671820  17552664   36% /
tmpfs            2982672   139856   2842816    5% /dev/shm
tmpfs               5120        0      5120    0% /run/lock
tmpfs            2982672        0   2982672    0% /sys/fs/cgroup
/dev/sda4      425034208 16498792 386875156    5% /home
/dev/sda1         523248    16656    506592    4% /boot/efi
tmpfs             596532       44    596488    1% /run/user/1000
/dev/sdc1        7818312    16744   7801568    1% /media/yeniceri/sozdizimi
```

#### Disk bölümlerini listeleme

```bash
sudo fdisk -l
# Örnek çıktı
yeniceri@fetih1453:/var/www/html/DersNotlarim$ sudo fdisk -l
Disk /dev/sda: 447,1 GiB, 480103981056 bytes, 937703088 sectors
Disk model: HyperX Fury 3D 4
Units: sectors of 1 * 512 = 512 bytes
Sector size (logical/physical): 512 bytes / 512 bytes
I/O size (minimum/optimal): 512 bytes / 512 bytes
Disklabel type: gpt
Disk identifier: B53FB8BB-8C0B-4E29-AB32-EA26DC9D91FC

Device        Start       End   Sectors   Size Type
/dev/sda1      2048   1050623   1048576   512M EFI System
/dev/sda2   1050624  59643903  58593280    28G Linux filesystem
/dev/sda3  59643904  71946239  12302336   5,9G Linux swap
/dev/sda4  71946240 937701375 865755136 412,8G Linux filesystem


Disk /dev/sdb: 465,8 GiB, 500107862016 bytes, 976773168 sectors
Disk model: WDC WD5000BEVT-5
Units: sectors of 1 * 512 = 512 bytes
Sector size (logical/physical): 512 bytes / 512 bytes
I/O size (minimum/optimal): 512 bytes / 512 bytes
Disklabel type: dos
Disk identifier: 0x080a8a17

Device     Boot     Start       End   Sectors   Size Id Type
/dev/sdb1            2048 292972543 292970496 139,7G  c W95 FAT32 (LBA)
/dev/sdb2       292972544 976773119 683800576 326,1G  c W95 FAT32 (LBA)


Disk /dev/sdc: 7,5 GiB, 8022654976 bytes, 15669248 sectors
Disk model: STORE N GO      
Units: sectors of 1 * 512 = 512 bytes
Sector size (logical/physical): 512 bytes / 512 bytes
I/O size (minimum/optimal): 512 bytes / 512 bytes
Disklabel type: dos
Disk identifier: 0xc48c0586

Device     Boot Start      End  Sectors  Size Id Type
/dev/sdc1        2048 15669247 15667200  7,5G  c W95 FAT32 (LBA)
```

#### Disk Bağlama

```bash
# Bağlıyoruz
sudo mount /dev/sdb1 mediaAdresi
```

#### Disk Ayırma

```bash
sudo umount mediaAdresi
```

#### Usb Bağlama

Aşağıdaki komut sonrası usb belleği sdb2 sabit diskine bağlamış oluruz...

```bash
# İçerisine bağlayacağımz bir dizin oluşturuyoruz
sudo mkdir /media/USB
# Bağlıyoruz
sudo mount -t vfat /dev/sdc1 /media/USB -o uid=1000
```

#### Usb Ayırma

```bash
sudo umount /media/USB
```

## Disk Bölümünü Başlangıçta Otomatik Bağlama

1. Sabit disk bölümlerini  görmek ve uid numaralarını almak,

```bash
sudo blkid
# Örnek çıktı
/dev/sda1: UUID="3010-F0B3" TYPE="vfat" PARTUUID="56f99599-f480-4f80-b310-7e81ecaf5ba4"
/dev/sda2: UUID="da1d2ff8-66cf-43c1-bc2d-e7c98e6629dc" TYPE="ext4" PARTUUID="4b3d0ad6-7442-4680-af2f-0baa5a4cc90b"
/dev/sda3: UUID="450e8cff-8e07-4b87-8147-8fe87d108b69" TYPE="swap" PARTUUID="4749f39f-f78a-44ef-9a89-dccd2a1d3709"
/dev/sda4: UUID="528adf9c-9d83-4c5a-89ad-de700b5c29e0" TYPE="ext4" PARTUUID="2f13b73e-0110-4fab-8d7c-e8caaca37c29"
/dev/sdb1: LABEL_FATBOOT="Yedekler" LABEL="Yedekler" UUID="F816-AA96" TYPE="vfat" PARTUUID="080a8a17-01"
/dev/sdb2: LABEL_FATBOOT="Resimler" LABEL="Resimler" UUID="51E0-F927" TYPE="vfat" PARTUUID="080a8a17-02"
/dev/sdc1: LABEL_FATBOOT="sozdizimi" LABEL="sozdizimi" UUID="AF94-3DA1" TYPE="vfat" PARTUUID="c48c0586-01"
```

2. Başlangıçta bağlanacak bölümlerin olduğu dosyayı açıyoruz. Açılan dosyanın en sonuna kopyaladığım "uuid" numarasını "disk bölümünün yolunu" ve "disk bölümünün tipini"  yazıyorum. ctrl+x e ve enter.

```bash
sudo nano /etc/fstab
# En altına
UUID=8A12441812440C1F /media/Depo ntfs 
```

#### Disk Biçimlendirme

```bash
# Diskin yolunu bulma...
sudo fdisk -l
# Gerekirse diski ayır. Gerekmezse alttaki koddan devam et...
umount /dev/sde1
# Biçimlendirme...
# mkfs yazılıyken iki kere taba basarsak format şekillerini görebiliriz...
# mkfs.fat seçersek fat32 olur :)
# Disk yolundan emin olmanız lazım!
mkfs.fat /dev/sde1 -I
```

