## BİLGİ ALMA KOMUTLARI

1. ```uname``` Komutu

Sistemde kullanılan çekirdek hakkında bilgiler verir.

```bash
# Çekirdek ismini görme...
uname
# Bütün bilgileri görme...
uname -a 
# Host adını (Makine Adı) görme...
uname -n 
# Çekirdeğin derleniş sürümünü görme...
uname -r
# Çekirdeğin sürümünü görme...
uname -v
# Makine donanım ismini görme...
uname -m
# İşlemci türünü görme...
uname -p
# Donanım platformunu görme...
uname -i
# İşletim sistemini görme...
uname -o
```

2. ```hostname``` Komutu

Bilgisayarımızın adını, diğer bir deyişle bilgisayarımızın ağ üzerindeki adını verir.

```bash
# Makine adını değiştirme...
# Yalnız kalıcı değildir, yeniden başlatınca eski haline döner...
hostname yeniAd
# Kalıcı olarak değiştirmek için; "Ayarlar >Sistem >Ayrıntılar >Genel" aygıt adını değiştirin...
# Terminalden kalıcı olarak değiştirme. Dosyadaki ismi değiştirin, tamamdır..
sudo gedit -w /etc/hostname
```

3. ```lsb_release``` Komutu

Dağıtım hakkında farklı bilgiler sunan parametrelere sahiptir.

```bash
lsb_release -a 
# Örnek çıktı;
No LSB modules are available.
Distributor ID: Ubuntu
Description:    Ubuntu 18.04.4 LTS
Release:    18.04
Codename:   bionic
```

4. ```whoami``` Komutu

Mevcut kullanıcının hangi kimlikle çalıştığını gösteriyor.

```bash
whoami
# Sistemde hangi kullanıcının çalıştığını gösteriyor.
who
# Hangi kullanıcı hangi uygulamayı çalıştırıyor bunun bilgisini gösteriyor.
w
```

5. ```uptime``` Komutu

Sistemimizin ne kadar zamandır açık olduğu bilgisini verir.

```bash
uptime
# Örnek çıktı;
00:49:54 up  4:15,  1 user,  load average: 0,18, 0,42, 0,40
```

5. ```date``` Komutu

Sistemin o anki tarih ve saat bilgisini verir.

```bash
date
# Örnek çıktı;
Cts May 16 00:50:15 +03 2020
```

6. ```cal``` Komutu

Bulunduğumuz tarihin takvim bilgisini verir.

```bash
cal
# Örnek çıktı;
     Mayıs 2020       
Pa Pz Sa Çr Pr Cu Ct  
                1  2  
 3  4  5  6  7  8  9  
10 11 12 13 14 15 16  
17 18 19 20 21 22 23  
24 25 26 27 28 29 30  
31   
# İstediğimiz ay ve yıl getirme...
cal 7 1969
# Örnek çıktı;
    Temmuz 1969       
Pa Pz Sa Çr Pr Cu Ct  
       1  2  3  4  5  
 6  7  8  9 10 11 12  
13 14 15 16 17 18 19  
20 21 22 23 24 25 26  
27 28 29 30 31 
```

7. ```which``` Komutu

Herhangi bir komutun tam yol bilgisini verir.

```bash
# date komutunun yolunu alalım...
which date
# Örnek çıktı;
/bin/date
```

8. ```whereis``` Komutu

İlgili komutun man sayfası konumunun tam dizin adresini belirtir.

```bash
# date komutunun yolunu alalım...
whereis date
# Örnek çıktı;
date: /bin/date /usr/share/man/man1/date.1.gz
```

9. ```locate``` Komutu

Aradığımız bir dosyanın nerede olduğunu verir.

```bash
# date komutunun yolunu alalım...
locate date.1.gz
# Örnek çıktı;
/usr/share/man/man1/date.1.gz
```

10. ```dmidecode``` Komutu

Bu komutun işlevi sistemin donanım ve BIOS bilgilerini göstermektir.

```bash
sudo dmidecode
```

Tablo çıktı sırası aşağıdaki gibidir:

| Sıra | Açıklama |
| --- | --- |
| 1 | Bios | 21 | Bellek Cihazı Haritalı Adres |
| 2 | Sistem | 22 | Dahili İşaret Aygıtı |
| 3 | Baz Kurulu | 23 | Taşınabilir Pil |
| 4 | Şasi | 24 | Sistem Sıfırlama |
| 5 | İşlemci | 25 | Donanım Güvenlik |
| 6 | Bellek Denetleyicisi | 26 | Sistem Güç Denetimleri |
| 7 | Bellek Modülü | 27 | Gerilim Probu |
| 8 | Önbellek | 28 | Soğutma Cihazı |
| 9 | Port Bağlantıları | 29 | Sıcaklık Probu |
| 10 | Sistem Uyarısı | 30 | Elektrik Akımı Probu |
| 11 | On Board Cihazları | 31 | Uzaktan Erişim |
| 12 | OEM Dizeleri | 32 | Boot Bütünlüğü Hizmetleri |
| 13 | Sistem Yapılandırma Seçenekleri | 33 | Sistem Önyükleme |
| 14 | Bios Dili | 34 | 64 Bit Bellek Hatası |
| 15 | Grup Dernekler | 35 | Yönetim Cihazı |
| 16 | Sistem Event Log | 36 | Yönetim Cihaz Bileşeni |
| 17 | Fiziksel Bellek Array | 37 | Yönetim Cihaz Eşik Verileri |
| 18 | Bellek Cihazı | 38 | Bellek Kanal |
| 19 | 32 Bit Bellek Hatası | 39 | IPMI Cihazı |
| 20 | Bellek Dizisi Haritalı Adres | 40 | Güç Kaynağı |
