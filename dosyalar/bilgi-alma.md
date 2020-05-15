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
# İstediğimiz veriye kısayoldan ulaşmak...
# Örneğin bios verilerine...
sudo dmidecode -t bios
# Ayrıca bios yerine sıra numarası ile veri getirebiliriz...
sudo dmidecode -t 0
```

Tablo sıra numaraları aşağıdaki gibidir:

| Sıra | Açıklama |
| --- | --- |
| 0 | Bios                             | 20 | Bellek Cihazı Haritalı Adres |
| 1 | Sistem                           | 21 | Dahili İşaret Aygıtı |
| 2 | Baz Kurulu                       | 22 | Taşınabilir Pil |
| 3 | Şasi                             | 23 | Sistem Sıfırlama |
| 4 | İşlemci                          | 24 | Donanım Güvenlik |
| 5 | Bellek Denetleyicisi             | 25 | Sistem Güç Denetimleri |
| 6 | Bellek Modülü                    | 26 | Gerilim Probu |
| 7 | Önbellek                         | 27 | Soğutma Cihazı |
| 8 | Port Bağlantıları                | 28 | Sıcaklık Probu |
| 9 | Sistem Uyarısı                   | 29 | Elektrik Akımı Probu |
| 10 | On Board Cihazları              | 30 | Uzaktan Erişim |
| 11 | OEM Dizeleri                    | 31 | Boot Bütünlüğü Hizmetleri |
| 12 | Sistem Yapılandırma Seçenekleri | 32 | Sistem Önyükleme |
| 13 | Bios Dili                       | 33 | 64 Bit Bellek Hatası |
| 14 | Grup Dernekler                  | 34 | Yönetim Cihazı |
| 15 | Sistem Event Log                | 35 | Yönetim Cihaz Bileşeni |
| 16 | Fiziksel Bellek Array           | 36 | Yönetim Cihaz Eşik Verileri |
| 17 | Bellek Cihazı                   | 37 | Bellek Kanal |
| 18 | 32 Bit Bellek Hatası            | 38 | IPMI Cihazı |
| 19 | Bellek Dizisi Haritalı Adres    | 39 | Güç Kaynağı |


11. ```fdisk -l``` Komutu

Sistem hakkında bilgi verirken, diski de dahil eder. Sistemimizdeki disk bölümleri sıralı ve düzenli şekilde listelenir.

```bash
sudo fdisk -l
```

12. ```df``` Komutu

Disk kullanımı hakkında ayrıntılı bilgir.

```bash
sudo df
```

13. ```du``` Komutu

Bir dizinin, içerdiği tüm dosyalar ile birlikte diskte kapladığı toplam alanı verir.

```bash
sudo du -h
```

14. ```free``` Komutu

Kullanılan bellek miktarını KB cinsinden öğrenebiliriz. Ancak çıktımızın MB cinsinden olmasını istersek -m parametresini kullanabiliriz.

```bash
sudo free -m
```

15. ```modinfo``` Komutu

Linux Kernel(çekirdek) modüllerinin bilgisi verir. Bu modülleri ekran bastırmak isterseniz komut satırına ```lsmod``` yazarak modülleri listeleyebilirsiniz.

```bash
sudo lsmod
sudo modulAdi
```

16. ```stat``` Komutu

Dosyalar veya dizinler hakkındaki bilgi verir. 

```bash
sudo stat dizinAdi
```

17. ```vmstat``` Komutu

Sistemimizin o anlık genel durumunu görebiliriz. Ancak komutu verdikten sonra sistem durumu listelenip sonlanacaktır. Eğer sistemin durumunu bir süre izlemek istersek vmstat gecikme_hızı yenilenme_sayısı şeklinde komut vermeliyiz.

```bash
# 2 saniyede bir 10 defa sistemi izleme...
sudo vmstat 2 10
```

18. ```history``` Komutu

.bash_history dosyasında tutulan kullanmış olduğumuz komutları listeler. Dosyaya konsolu kapattıktan sonra en son kullandılarımızı kayıt eder. Konsolu kapatmadan dosyaya bakarsak son kullandığımız komutları göremeyiz.

```bash
sudo history
# Geçmişi temizlemek...
sodu hiztory -c
```
