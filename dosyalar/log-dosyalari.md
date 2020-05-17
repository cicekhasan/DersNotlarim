## LİNUX LOG DOSYALARI

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


Linux tek satırlık log girdileri tutar ve böylece okumayı kolaylaştırır. Log dosyalarının nerede tutulduğunu bilmek ve logları okuyabilmek / anlamlandırabilmek sorun çözme sırasında yardımcı olur ve zamandan tasarruf sağlar!

Sistemde meydana gelen hatalar, sorunlar, işlemler, değişiklikler ve neredeyse her şey kayıt altına alınarak saklanır. Bu kayıt altına alınan bilgilere log deniyor. Neden log(kayıt) tutulmak zorunda diye soracak olursanız; kısaca sistemin olumsuz bir durumla karşılaşması halinde sorunun yaşanma nedeninin belirlenmesi, sistem güvenliğini sağlama, gerektiğinde veri kurtarma ve adli bilişim gibi alanlarda başvurmamız gereken yegane kaynaklardır log dosyaları. Anlayacağınız log(kayıt) dosyaları sistem bütünü için çok önemli yer tutmaktadır.

#### Sistemdeki log dosyalarını görmek için;

```bash
ls -l /var/log 
```

| Dosya Adı | Tuttuğu Log |
| --- | --- |
| alternatives.log | Güncelleştirme logları. |
| apache2.log | Apache server logları. |
| apt.log | Debian tabanlıda apt kullanım logları. |
| auth.log | Kullanıcı login işlem kayıtları. |
| bootstrap.log | Sistem boot logları. |
| daemon.log | Sistemde çalışan servislerin logları. |
| debug | Hata ayıklama için kullanılan kullanılan log dosyasıdır. |
| dmsg | Çerirdek halka tampunun bilgi loglarını barındırır. |
| dpkg.log | dpkg ile paket yükleme kaldırma vs. loglarının bulunduğu kısımdır. |
| faillog | Başarısız kullanıcılarının giriş logları. |
| lastlog | Oturum bilgilerinin bulunduğu loglardır. |
| kern.log | Çekirdek logları. |
| macchanger.log | Mac seçme logları. |
| messages | Genel olarak logların yazıldığı dosya, sistem ile ilgili loglardır. |
| mysql.log | Mysql sunucu logları. |
| postgresql | postgresql logları. |
| syslog | Sistem mesaj servislerinin log dosyasınır. |
| user.log | Sistemdeki kullanıcıların log dosyasıdır. |
| wtmp | login kayıt logları. |
| secure | Kimlik logları. |
| maillog | Mail server logları. |
| proftpd | Ftp servisinin log dosyalarıdır. |
| yum.log | Centos için paket yükleme uygulama logları. |


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
