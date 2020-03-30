# DOSYA YAPISI

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)

### Log dosyaları

- /var/log/boot.log    : System boot logları.
- /var/log/apt.log     : Paket yükleme uygulaması logları. Debian
- /var/log/messages    : Sistem ile ilgili loglar.
- /var/log/syslog      : Sistem mesaj servisinin log dosyası.
- /var/log/kern.log    : Çekirdek Logları. Normal kullanımında, log dosyasını çok dolu olarak görmezsiniz, fakat herhangi bir disk ya da farklı bir donanım sorununda, bu log dosyası bu sorunlarla ilgili önemli bilgileri size sunar.
- /var/log/mysqld.log  : MySQL database server log dosyası.
- /var/log/faillog     : Kullanıcı başarısız giriş logları.
- /var/log/message     : Genel olarak logların yazıldığı dosya, sistem ile ilgili loglar.
- /var/log/cron.log    : Cron işlemi logları (cron job).
- /var/log/utmp        : Login kayıt logları.
- /var/log/auth.log    : Kullanıcı tanıma logları. Kullanıcıların ne zaman giriş yapmaya çalıştığı ile ilgili bilgileri tutar. Önemli giriş bilgilerini /var/log/secure (yetkilendirme logları) dosyası aracılığıyla da kontrol edebilirsiniz.
- /var/log/maillog     : Mail server logları. Herhangi bir spam sorunu var ise; spam yaratanı bu loglardan bulabilirsiniz. Aynı zamanda herhangi bir “brute force” yani; saldırı durumu olup olmadığını da kontrol edebilirsiniz.
- /var/log/secure      : Authentication log.
- /var/log/dpkg.log    : Tüm binary paket logları, yükleme ve diğer bilgileri içerir.
- /var/log/fsck/       : fsck komutunun logları.
- /var/log/apport.log  : Uygulamaların hatalarının işlendiği log dosyası.
- /var/log/daemon.log  : NTPD gibi çalışan servislerin loglarının tutulduğu dosya.
- /var/log/debug       : Hata ayıklama için kullanılan log dosyasıdır.
- /var/log/proftpd     : FTP servisinin log dosyasıdır (Proftp).
- /var/log/yum.log     : Paket yükleme uygulaması logları. Centos
- /var/log/dmesg       : Sisteminiz boot ederken olusan hatalari dmesg programi ile gözlemliyebilirsiniz. Özelikle ag kartiniz yada sürücülerle ilgili sorunlari gözlemlemek icin faydalı olabiliyor.
- /var/log/proftpd.log : Proftp FTP servisinin loglarının tutulduğu dosyadır.
- /var/log/httpd ya da /var/log/apache2 : Apache web sunucuları için; access, error gibi logları barındırır.