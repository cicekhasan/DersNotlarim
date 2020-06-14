## LİNUX LOG DOSYALARI

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


Linux tek satırlık log girdileri tutar ve böylece okumayı kolaylaştırır. Log dosyalarının nerede tutulduğunu bilmek ve logları okuyabilmek / anlamlandırabilmek sorun çözme sırasında yardımcı olur ve zamandan tasarruf sağlar!

Sistemde meydana gelen hatalar, sorunlar, işlemler, değişiklikler ve neredeyse her şey kayıt altına alınarak saklanır. Bu kayıt altına alınan bilgilere log deniyor. Neden log(kayıt) tutulmak zorunda diye soracak olursanız; kısaca sistemin olumsuz bir durumla karşılaşması halinde sorunun yaşanma nedeninin belirlenmesi, sistem güvenliğini sağlama, gerektiğinde veri kurtarma ve adli bilişim gibi alanlarda başvurmamız gereken yegane kaynaklardır log dosyaları. Anlayacağınız log(kayıt) dosyaları sistem bütünü için çok önemli yer tutmaktadır.

#### Sistemdeki log dosyalarını görmek için;

```bash
ls -l /var/log 
```

| Dosya Adı                          | Tuttuğu Log                                                                                                                                                                                                           |
| ---                                | ---                                                                                                                                                                                                                   |
| alternatives.log                   | Güncelleştirme logları.                                                                                                                                                                                               |
| /var/log/httpd -- /var/log/apache2 | Apache web sunucuları için; access, error gibi logları barındırır.                                                                                                                                                    |
| /var/log/apt.log                   | Debian aket yükleme uygulaması logları. (apt)                                                                                                                                                                         |
| /var/log/auth.log                  | Kullanıcı tanıma logları. Kullanıcıların ne zaman giriş yapmaya çalıştığı ile ilgili bilgileri tutar. Önemli giriş bilgilerini /var/log/secure (yetkilendirme logları) dosyası aracılığıyla da kontrol edebilirsiniz. |
| bootstrap.log                      | Sistem boot logları.                                                                                                                                                                                                  |
| /var/log/daemon.log                | NTPD gibi çalışan servislerin loglarının tutulduğu dosya.                                                                                                                                                             |
| /var/log/debug                     | Hata ayıklama için kullanılan kullanılan log dosyasıdır.                                                                                                                                                              |
| dmsg                               | Çerirdek halka tampunun bilgi loglarını barındırır.                                                                                                                                                                   |
| /var/log/dpkg.log                  | Tüm binary paket logları, yükleme ve diğer bilgileri içerir.                                                                                                                                                          |
| /var/log/faillog                   | Kullanıcı başarısız giriş logları.                                                                                                                                                                                    |
| lastlog                            | Oturum bilgilerinin bulunduğu loglardır.                                                                                                                                                                              |
| /var/log/kern.log                  | Çekirdek Logları. Normal kullanımında, log dosyasını çok dolu olarak görmezsiniz, fakat herhangi bir disk ya da farklı bir donanım sorununda, bu log dosyası bu sorunlarla ilgili önemli bilgileri size sunar.        |
| macchanger.log                     | Mac seçme logları.                                                                                                                                                                                                    |
| /var/log/messages                  | Genel olarak logların yazıldığı dosya, sistem ile ilgili loglardır.                                                                                                                                                   |
| mysql.log                          | Mysql sunucu logları.                                                                                                                                                                                                 |
| postgresql                         | postgresql logları.                                                                                                                                                                                                   |
| /var/log/syslog                    | Sistem mesaj servislerinin log dosyası.                                                                                                                                                                               |
| user.log                           | Sistemdeki kullanıcıların log dosyasıdır.                                                                                                                                                                             |
| wtmp                               | login kayıt logları.                                                                                                                                                                                                  |
| /var/log/secure                    | Kimlik logları. Authentication log.                                                                                                                                                                                   |
| /var/log/maillog                   | Mail server logları. Herhangi bir spam sorunu var ise; spam yaratanı bu loglardan bulabilirsiniz. Aynı zamanda herhangi bir “brute force” yani; saldırı durumu olup olmadığını da kontrol edebilirsiniz.              |
| /var/log/proftpd.log               | Proftp FTP servisinin loglarının tutulduğu dosyadır.                                                                                                                                                                  |
| /var/log/yum.log                   | Centos için paket yükleme uygulama logları.                                                                                                                                                                           |
| /var/log/boot.log                  | System boot logları.                                                                                                                                                                                                  |
| /var/log/mysqld.log                | MySQL database server log dosyası.                                                                                                                                                                                    |
| /var/log/cron.log                  | Cron işlemi logları (cron job).                                                                                                                                                                                       |
| /var/log/utmp                      | Login kayıt logları.                                                                                                                                                                                                  |
| /var/log/fsck/                     | fsck komutunun logları.                                                                                                                                                                                               |
| /var/log/apport.log                | Uygulamaların hatalarının işlendiği log dosyası.                                                                                                                                                                      |
| /var/log/dmesg                     | Sisteminiz boot ederken olusan hatalari dmesg programi ile gözlemliyebilirsiniz. Özelikle ag kartiniz yada sürücülerle ilgili sorunlari gözlemlemek icin faydalı olabiliyor.                                          |



- 

```bash
# İlk 5 satırı görmek için;
head -5 auth.log 
# Son 5 satırı görmek için;
tail -5 auth.log 
# Dosya içeriğine bakma
less auth.log
# Dosya içeriğine bakma (Yüzdeli)
more auth.log
```

#### ```dmesg``` Komutu

Sistem açılışından itibaren çekirdek tarafından üretilen tüm iletiler ve kernel hakkındaki kayıtlar /proc/kmsg dizininde tutuluyor. Ancak biz bütün kernel kayıtları yerine, sistem açılışında yazan açılış notlarını ```dmesg``` komutu ile görüntüleyebiliriz. Yani ```dmesg``` komutu sadece tampondaki son iletileri gösterir. Bu komutun kullanımına genelde sistem açılışında bildirilen problemlerin tespiti ve diğer sistem uyarılarını saptamak için başvurulur.

Elbetteki çıktı çok daha uzun ancak ben örnek olması açısından çıktıları kısaca verdim. Eğer siz bu çıktıları filtrelemek isterseniz ```grep``` komutunu kullanarak ilgili çıktılara rahatlıkla ulaşabileceğinizi biliyorsunuz. Örneğin yalnızca hataları görüntülemek istersek konsola ```dmesg | grep "fail"``` şeklinde yazdığımızda, konsol bize yalnızca sistem açılışında belirtilen hataları basacaktır.

#### ```last``` Komutu

Komutumuzun isminden de az çok anlaşılacağı gibi; en son oturum açan kullanıcıları listelemek için ```last``` komutunu kullanabiliriz.
