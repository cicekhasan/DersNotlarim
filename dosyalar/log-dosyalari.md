# LİNUX LOG DOSYALARI

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)

Linux tek satırlık log girdileri tutar ve böylece okumayı kolaylaştırır. Log dosyalarının nerede tutulduğunu bilmek ve logları okuyabilmek / anlamlandırabilmek sorun çözme sırasında yardımcı olur ve zamandan tasarruf sağlar!

## Sistemdeki log dosyalarını görmek için;

```bash
ls –l /var/log 
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