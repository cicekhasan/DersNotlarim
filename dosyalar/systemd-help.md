
iostat                           // Disk okuma yazma hızını kontrol eder.
cat /etc/fstab                   // Disk bilgilerini verir.



sudo systemctl status SERVİSADI



systemd-analyze critical-chain
systemctl --state=failed		// Ayağa kalkmayan servis var mı? Bakarsın...



## İşletim sistemini görme

```bash
lsb_release -a
# Çıktı
No LSB modules are available.
Distributor ID:	Pardus
Description:	Pardus GNU/Linux Ondokuz
Release:	19.2
Codename:	ondokuz
```

```bash
yeniceri@fetih1453:~$ ls -lrt /sbin/init
lrwxrwxrwx 1 root root 20 Oca 29 21:07 /sbin/init -> /lib/systemd/systemd
```

```bash
yeniceri@fetih1453:~$ sudo stat /proc/1/exe
  File: /proc/1/exe -> /usr/lib/systemd/systemd
  Size: 0         	Blocks: 0          IO Block: 1024   sembolik bağ
Device: 4h/4d	Inode: 18078       Links: 1
Access: (0777/lrwxrwxrwx)  Uid: (    0/    root)   Gid: (    0/    root)
Access: 2020-04-02 22:57:00.047998404 +0300
Modify: 2020-04-02 22:57:00.031998403 +0300
Change: 2020-04-02 22:57:00.031998403 +0300
 Birth: -
```

```bash
yeniceri@fetih1453:~$ systemctl list-units --type service --state running
UNIT                       LOAD   ACTIVE SUB     DESCRIPTION                                 
accounts-daemon.service    loaded active running Accounts Service                            
apache2.service            loaded active running The Apache HTTP Server                      
atop.service               loaded active running Atop advanced performance monitor           
atopacct.service           loaded active running Atop process accounting daemon              
avahi-daemon.service       loaded active running Avahi mDNS/DNS-SD Stack                     
cron.service               loaded active running Regular background program processing daemon
dbus.service               loaded active running D-Bus System Message Bus                    
exim4.service              loaded active running LSB: exim Mail Transport Agent              
gdm.service                loaded active running GNOME Display Manager                       
geoclue.service            loaded active running Location Lookup Service                     
mariadb.service            loaded active running MariaDB 10.3.22 database server             
ModemManager.service       loaded active running Modem Manager                               
NetworkManager.service     loaded active running Network Manager                             
php7.3-fpm.service         loaded active running The PHP 7.3 FastCGI Process Manager         
polkit.service             loaded active running Authorization Manager                       
rsyslog.service            loaded active running System Logging Service                      
rtkit-daemon.service       loaded active running RealtimeKit Scheduling Policy Service       
switcheroo-control.service loaded active running Switcheroo Control Proxy service            
systemd-journald.service   loaded active running Journal Service                             
systemd-logind.service     loaded active running Login Service                               
systemd-timesyncd.service  loaded active running Network Time Synchronization                
systemd-udevd.service      loaded active running udev Kernel Device Manager                  
teamviewerd.service        loaded active running TeamViewer remote control daemon            
udisks2.service            loaded active running Disk Manager                                
upower.service             loaded active running Daemon for power management                 
user@1000.service          loaded active running User Manager for UID 1000                   
wpa_supplicant.service     loaded active running WPA supplicant                              

LOAD   = Reflects whether the unit definition was properly loaded.
ACTIVE = The high-level unit activation state, i.e. generalization of SUB.
SUB    = The low-level unit activation state, values depend on unit type.

27 loaded units listed. Pass --all to see loaded but inactive units, too.
To show all installed unit files use 'systemctl list-unit-files'.
```

## SORUN TESPİTİ

1. Ana servislerin başlama süresini görme

Başlangıçta çekirdek, initrd ve kullanıcı alanı tarafından harcanan süre dahil olmak üzere her bir hizmeti başlatmak için harcanan toplam süre hakkındaki bilgileri listeler.

```bash
systemd-analyze
```

2. Tüm servislerin başlama süresini görme

```bash
systemd-analyze blame
```

3. Kritik servislerin zaman ağacını görme

```bash
systemd-analyze critical-chain
```

4. Kritik servisin zaman ağacını görme

```bash
systemd-analyze critical-chain servisAdi
```

5. Başlama sürelerinin grafiksel incelenmesi

```bash
# Başlama sürelerini svg olarak kaydet
systemd-analyze plot > boot_analizi.svg
# Grafiği göster
xdg-open boot_analizi.svg
```

## Uzak sunucu işlemleri

```bash
systemd-analyze time -H root@192.168.56.5
systemd-analyze blame -H root@192.168.56.5
systemd-analyze critical-chain -H root@192.168.56.5
```

## Servis log dosyalarını görmek

```bash
sudo journalctl -u NetworkManager.service
```

## runlevel

Sistem açılışında runlevel dediğimiz sistemin sunacağı hizmetlere göre yapılandırıldığı çalışma seviyeleri mevcuttur.

1. Run Level 0 : (Halt) — Sistemin kapalı olduğu durumdur.
2. Run Level 1 : (Single user mode) — Sistemi kurtarmak için kullanılan network ayarlarının aktif olmadığı tek kullanıcılı mod.
3. Run Level 2 : (Multiuser, without NFS) — Bu düzeyde ağ servisleri çalışmaz.
4. Run Level 3 : (Full Multiuser Mode) — Tüm ağ servisleri çalışır, CLI ( Komut Arayüzü ) olarak sisteme erişilir.
5. Run Level 4 : Kullanılmamaktadır.
6. Run Level 5 : KDE, Gnome, X Window System gibi grafiksel arayüzler kullanılabilir. Grafik arabirimi de inşa eden çalışma seviyesidir.
7. Run Level 6 : (Reboot) — Açık olan sistemi yeniden başlatır.

```bash
sudo runlevel
# Çıktı
N 5 // Benim ki...
# Değiştirmek için
telinit 6
```

## Servisi başlatma durdurma

```bash
# Başlatma
systemctl start servisAdi
# Durdurma
systemctl stop servisAdi
```

## Servis Restart Etmek

```bash
systemctl restart servisAdi
# Ya da
systemctl reload servisAdi
```

## Servislerin sistem açılışlarında otomatik olarak start edilmesi

```bash
systemctl enable servisAdi
```

## Servislerin sistem açılışlarında kaldırmak. Servis devredışı kalır.

```bash
systemctl disable servisAdi
```

## Servisin çalıştırılmasını engellemek/engeli kaldırmak

```bash
# Engellemek
systemctl mask servisAdi
# Engeli kaldırmak
systemctl unmask servisAdi
```

## İncelenecek komutlar

```bash
systemd-analyze plot
systemd-analyze dot
systemd-analyze dump
systemd-analyze set-log-level
systemd-analyze set-log-target
systemd-analyze syscall-filter [SET...]
systemd-analyze verify
```



systemd-analyze --user dump NE İŞE YARAR!

systemd-analyze plot >bootup.svg : Bu komut, hangi sistem hizmetlerinin hangi zamanda başlatıldığını ayrıntılı olarak belirterek başlatma sırasında harcadıkları zamanı vurgulayan bir SVG grafiği yazdırır. Bu da kaldırması heralde ```eog bootup.svg&```










