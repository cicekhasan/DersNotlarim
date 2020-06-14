## HACK KONTROL (SYSTEMD)

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


Dünyada internet ortamında altyapı, ağ ve sunucu gibi hizmetlerin büyük çoğunluğunda "Linux" işletim sistemi kullanılmaktadır. Bu nedenledir ki linux işletim sistemli sunucular da diğer işletim sistemleri gibi saldırganların hedefi haline gelmiştir. Büyük çoğunluğun linux işletim sistemi kullanmasından dolayı saldırılara en çok maruz kalan ve ele geçirilen işletim sistemi durumuna gelmiştir.

Linux sistemler komut satırından işlem yapıldığından dolayı sistem üzerindeki anormallikler kolaylıkla farkedilememektedir.

Saldırılar sonrası sistemin nasıl incelenir, canlı analiz yöntemi nasıl olur, saldırılar ve anormalliklerden nasıl önceden haberdar oluruz sorularına yanıt bulmaya çalışalım...

***Not: Bu tarz çalışmalar yaparken mutlaka sistemin yedeğini alın ve yedeği aldığınızdan emin olun!***

#### Zaman Kontrolu

Analiz çalışmasına başlamadan önce mutlaka sistemin zamanını kontrol edin. Zaman bilgisinin yanlış olmasının farkında olmazsanız, inceleme sonuçlarını yanlış değerlendirirsiniz.

```bash
date
```

#### İşletim Sistemi ve Çekirdek(Kernel) Bilgisi

Bu bilgi zaman bilgisi kadar önemlidir. Çalıştığınız işletim sistemi, çekirdek ve mimari bilgisi nereye nasıl bakacağınızı bilemezsiniz.

```bash
uname -a 
```

#### Dosyalara Ait Bütünlük Özet(Hash) Değerlerinin Kontrol Edilmesi

***Not: Canlı sistemlerde çalışılacaksa sistemin yedeği ve tüm dosyaların özet bilgilerinin önceden alınmış olması önemlidir!***

Hash bilgileri dosyaların parmak izi gibidir. **Bir dosya değiştiğinde hash bilgileri de değişir.*** Sistemdeki dosyaların hash değerleri, boyut bilgisi ve sahiplik gibi özelliklerin olası bir sızmaya karşı elimiz ayağımız olacaktır. Bu nedenle çok önemli olduğuna bir daha dikkat çekiyim dedim. Şimdi ilk komutumuzu yazalım. Bu komut bize genel bir bilgi verir.

```bash
sudo find /etc -type f -ls
```
Şimdi ise hash özellikleri ile alalım. Bu komutla sadece ana dizinlerin değerlerini verir...

```bash
sudo md5deep -r /etc/ > file-hash.txt
```

Alt dizinler ile beraber aldığımız hash bilgilerini "file-hash.txt" dosyasına kayıt ederek sağlam bir şekilde saklıyalım. 

**Not: Canlı sistem şüpheli olduğu için analiz sırasında komutları kayıt edilemez/yazılamaz bir aygıt aracılığı ile sisteme bağlanılarak yapılmaıdır.**

#### Sızma Yöntemleri ve Giriş Noktalarının Tespiti

Saldırgan gözü ile sisteme bakılarak "Hangi yöntemle bu sisteme sızabilirim?" sorusunun yanıtını bulmak önceliğimiz olması gerekir. Nmap, Nessus ve OpenVAS gibi programlarla bilinen yollar kullanılarak hızlı bir şekilde sisteme girilip girilmediğine bakılabilir.

Sızma yöntemlerini;

1. HTTP, FTP, TELNET ve SSH gibi servislere kaba kuvvet saldırıları, 
2. Web uygulama sunucusunun sahip olduğu zaafiyetlerin kullanılması sonucu yapılan saldırılar,
3. Distcc ve Tomcat gibi sunucular üzerinde bolca bulunan servisler üzerinden yapılan saldırılar,
4. Sunuculara fiziksel erişilerek yapılan saldırılar,
5. DNS, DDOS, Man-in-the-middle ve Sniffing gibi ağ seviyesinde üzerinden yapılan saldırılar,
6. Çekirdek sürümlerinin önceki versiyonlarında tespit edilmiş zafiyetler aracılığı ile yapılan saldırılar olarak sıralıyabiliriz.

Bu sızma yöntemleri içerisinde en olası ve kullanılan sızma yönteminin "Web uygulama sunucusunun sahip olduğu zaafiyetler" olarak görebiliriz.

### Sistem Analizi

Sistem analizine başlamadan önce nereden başlıyacağımıza ve nereye bakacağımıza karar verip, bunu bir liste halinde elimizde bulundurmamız gerekmektedir. Temel olarak incelenmesi gerekenleri;

1. Yerel ve uzak bağlantıların dökümü,
2. Olay anı ve sonrası bellek dökümü,
3. Aktif olan dosyaların incelenmesi,
4. Son bir kaç günde yeni eklenmiş dosyaların incelenmesi,
5. İzinleri 777 olan dosyaların incelenmesi,
6. Başarılı ve başarısız olan giriş denemeleri,
7. Sistemde anlık olarak bulunan kullanıcıların ve ip adreslerinin incelenmesi,
8. Aktif olarak çalışan ağ servisleri ve bunları çalıştıran kullanıcıların incelenmesi,
9. Ssh anahtarlarının incelenmesi,
10. Zamanlanmış görevlerin incelenmesi,
11. Paylaşılan dosyaların olup olmadığının incelenmesi,
12. Aktif kullanıcıların komut geçmişinin incelenmesi,
13. Aktif proses ve alt dallarının incelenmesi,
14. Kurulu olan servislere ait yapılandırma dosyalarının incelenmesi,
15. Kurulu olan servislere ait log dosyalarının incelenmesi,
16. Disklerin incelenmesi,
17. Zararlı yazılımların aranması olarak listeleyebiliriz.

#### 1. Yerel ve Uzak Bağlantıların Dökümü

Aktif bağlantıları ```netstat``` ve ```lsof``` tespit edebiliriz. Dosya çıktılarını dosyaya kaydedip incelememiz daha verimli ve hızlı olacaktır.

##### Netstat kullanarak ağ bağlantı analizi. Tcp, Udp ve soketlerin durumlarını görmemizi sağlar.

```bash
netstat -s
# Örnek Çıktı
yeniceri@fetih1453:~/Masaüstü$ netstat -s > netstat.txt
Ip:
    Forwarding: 2
    460740 total packets received
    0 forwarded
    0 incoming packets discarded
    442063 incoming packets delivered
    284603 requests sent out
    42 outgoing packets dropped
    101 dropped because of missing route
Icmp:
    236 ICMP messages received
    0 input ICMP message failed
    ICMP input histogram:
        destination unreachable: 227
        echo requests: 9
    137 ICMP messages sent
    0 ICMP messages failed
    ICMP output histogram:
        destination unreachable: 128
        echo replies: 9
IcmpMsg:
        InType3: 227
        InType8: 9
        OutType0: 9
        OutType3: 128
Tcp:
    2069 active connection openings
    0 passive connection openings
    34 failed connection attempts
    12 connection resets received
    9 connections established
    428271 segments received
    277426 segments sent out
    1450 segments retransmitted
    31 bad segments received
    2157 resets sent
Udp:
    8516 packets received
    128 packets to unknown port received
    0 packet receive errors
    6501 packets sent
    0 receive buffer errors
    0 send buffer errors
    IgnoredMulti: 4261
...
```

##### ss kullanarak ağ bağlantı analizi. Bu komutu ile özet çıktı alabiliriz.

```bash
ss -s 
# Örnek çıktı
yeniceri@fetih1453:~/Masaüstü$ ss -s > ss.txt
Total: 941
TCP:   11 (estab 5, closed 1, orphaned 0, timewait 0)

Transport Total     IP        IPv6
RAW	  2         1         1        
UDP	  5         3         2        
TCP	  10        8         2        
INET	  17        12        5        
FRAG	  0         0         0 
```

##### lsof kullanarak ağ bağlantı analizi. Biraz daha detay bilgi verir.

```bash
yeniceri@fetih1453:~/Masaüstü$ lsof > lsof.txt
COMMAND     PID   TID TASKCMD               USER   FD      TYPE             DEVICE  SIZE/OFF       NODE NAME
systemd       1                             root  cwd   unknown                                         /proc/1/cwd (readlink: Permission denied)
systemd       1                             root  rtd   unknown                                         /proc/1/root (readlink: Permission denied)
systemd       1                             root  txt   unknown                                         /proc/1/exe (readlink: Permission denied)
systemd       1                             root NOFD                                                   /proc/1/fd (opendir: Permission denied)
kthreadd      2                             root  cwd   unknown                                         /proc/2/cwd (readlink: Permission denied)
kthreadd      2                             root  rtd   unknown                                         /proc/2/root (readlink: Permission denied)
kthreadd      2                             root  txt   unknown                                         /proc/2/exe (readlink: Permission denied)
kthreadd      2                             root NOFD                                                   /proc/2/fd (opendir: Permission denied)
...
```

##### Anlık takip etmek için;

```bash
# 1. yöntem
watch -d -n1 lsof -i
# 2. yöntem
watch -d -n1 'netstat -anp | grep -i stream'
```

##### Netstat ve Ss Kullanılarak Proseslerin Lullandığı/Açtığı Protların Listelenmesi

```bash
ss -nap > ssPortlar.txt
```

```bash
netstat -tulpn > netstatPortlar.txt
# Örnek çıktı
yeniceri@fetih1453:~/Masaüstü$ netstat -tulpn
(Not all process could be identified, non-owned process info
 will not be shown, you would have to be root to see it all.)
Active Internet connections (only servers)
Proto Recv-Q Send-Q Local Address           Foreign Address         State       PID/Program name    
tcp        0      0 127.0.0.1:5939          0.0.0.0:*               LISTEN      -                   
tcp        0      0 127.0.0.1:25            0.0.0.0:*               LISTEN      -                   
tcp        0      0 127.0.0.1:3306          0.0.0.0:*               LISTEN      -                   
tcp6       0      0 :::80                   :::*                    LISTEN      -                   
tcp6       0      0 ::1:25                  :::*                    LISTEN      -                   
udp        0      0 0.0.0.0:52731           0.0.0.0:*                           -                   
udp        0      0 0.0.0.0:68              0.0.0.0:*                           -                   
udp        0      0 0.0.0.0:5353            0.0.0.0:*                           -                   
udp6       0      0 :::40881                :::*                                -                   
udp6       0      0 :::5353                 :::*                                - 
```

#### 2. Olay Anı ve Sonrası Bellek Dökümü

Saldırgan tespit edilmemek için dosya ve loglar gibi izlerini bırakabileceği öğeleri silecektir. Disk üzerinden bunları geri getirmek mümkün olmayabilir. İşte böyle bir durumda bellek(RAM) bize bir çok bilgi verebilir. Yeni proses'ler çalıştırılıp üzerine yazılana kadar sonlandırılan proseslere ait bir çok bilgi verebilir. Ayrıca bellek verileri üzerinde geçici olarak tuttuğu için sistem kapatılmamalıdır. Analiz için çalıştırılan proseslerde bellek üzerine yazsada şansımızı denememiz gerekmektedir. Bu kaybı önlemek için belleğin imajını alıp, imaj üzerinden inceleme yapmak gerekmektedir.

İmaj dosyası ikili sistemde yazılı olacağından string şekilde elde edebileceğimiz verilerden daha çok veri elde edebiliriz. Bellek imajını olay öncesi ve sonrası olmak üzere iki farklı şekilde alarak karşılaştırmalı inceleme yapmalıyız. Aradaki farklar bize daha çok ışık tutacaktır. 

#### 3. Aktif Olan Dosyaların İncelenmesi

Linux sistemlerde her şey dosyalar(portlar, aygıtlar vb.) üzerine kuruludur. Her hangi bir psorsesin eriştiği tüm dosyaları ```lsof```  ile listeleyebiliriz. Açık olan network bağlantıları ve portlarını listelemek için -i parametresinden faydalanırız. Zararlı olarak düşündüğümüz bir prosesin hangi dosyayı kullandığı, hangi port üzerinden nereye bağlandığının bilgisine buradan ulaşabiliriz. Aktif durumdaki ve dinlenen portlar (LISTEN) durumunda görünür.

```bash
lsof -i > lsof.txt
# Örnek çıktı
yeniceri@fetih1453:~/Masaüstü$ lsof -i
COMMAND    PID     USER   FD   TYPE DEVICE SIZE/OFF NODE NAME
firefox-e 2338 yeniceri   77u  IPv4 895859      0t0  TCP 192.168.1.40:52108->whatsapp-cdn-shv-01-frx5.fbcdn.net:https (ESTABLISHED)
firefox-e 2338 yeniceri  304u  IPv4 896495      0t0  TCP 192.168.1.40:37644->sof02s22-in-f206.1e100.net:https (ESTABLISHED)
firefox-e 2338 yeniceri  309u  IPv4 905654      0t0  TCP 192.168.1.40:51758->173.194.160.103:https (ESTABLISHED)
telegram- 6849 yeniceri   18u  IPv4 517378      0t0  TCP 192.168.1.40:48260->149.154.167.92:https (ESTABLISHED)
telegram- 6849 yeniceri   19u  IPv4 913683      0t0  TCP 192.168.1.40:52302->149.154.167.92:http (ESTABLISHED)
telegram- 6849 yeniceri   35u  IPv4 891870      0t0  TCP 192.168.1.40:50010->149.154.167.92:https (ESTABLISHED)
telegram- 6849 yeniceri   51u  IPv4 913670      0t0  TCP 192.168.1.40:52230->149.154.167.92:http (ESTABLISHED)

```

DNS sorgulaması yaptığımız için saldırgan saldırgan uyanabilir. ```-Pni``` kullanılarak "hostname" çözümlemesi yapmadan saldırganın analiz yapıldığından haberi olmaması sağlanabilir.

```bash
lsof -Pni
# Örnek çıktı
firefox-e 2338 yeniceri   77u  IPv4 895859      0t0  TCP 192.168.1.40:52108->185.60.216.53:443 (ESTABLISHED)
firefox-e 2338 yeniceri  112u  IPv4 907214      0t0  TCP 192.168.1.40:52154->173.194.160.103:443 (ESTABLISHED)
firefox-e 2338 yeniceri  304u  IPv4 896495      0t0  TCP 192.168.1.40:37644->172.217.17.206:443 (ESTABLISHED)
firefox-e 2338 yeniceri  309u  IPv4 905654      0t0  TCP 192.168.1.40:51758->173.194.160.103:443 (ESTABLISHED)
telegram- 6849 yeniceri   18u  IPv4 517378      0t0  TCP 192.168.1.40:48260->149.154.167.92:443 (ESTABLISHED)
telegram- 6849 yeniceri   19u  IPv4 913683      0t0  TCP 192.168.1.40:52302->149.154.167.92:80 (ESTABLISHED)
telegram- 6849 yeniceri   35u  IPv4 891870      0t0  TCP 192.168.1.40:50010->149.154.167.92:443 (ESTABLISHED)
telegram- 6849 yeniceri   51u  IPv4 913670      0t0  TCP 192.168.1.40:52230->149.154.167.92:80 (ESTABLISHED)
``` 

Sadece TCP ve UDP bağlantılarını listelemek için -iTCP ve -iUDP parametrelerini kullanabiliriz.

```bash
lsof -iTCP
# Örnek çıktı
yeniceri@fetih1453:~/Masaüstü$ lsof -iTCP
COMMAND    PID     USER   FD   TYPE DEVICE SIZE/OFF NODE NAME
firefox-e 2338 yeniceri   77u  IPv4 895859      0t0  TCP 192.168.1.40:52108->whatsapp-cdn-shv-01-frx5.fbcdn.net:https (ESTABLISHED)
firefox-e 2338 yeniceri  112u  IPv4 920026      0t0  TCP 192.168.1.40:59326->a184-51-72-47.deploy.static.akamaitechnologies.com:https (ESTABLISHED)
telegram- 6849 yeniceri   18u  IPv4 517378      0t0  TCP 192.168.1.40:48260->149.154.167.92:https (ESTABLISHED)
telegram- 6849 yeniceri   19u  IPv4 917133      0t0  TCP 192.168.1.40:50752->149.154.167.92:https (ESTABLISHED)
telegram- 6849 yeniceri   35u  IPv4 891870      0t0  TCP 192.168.1.40:50010->149.154.167.92:https (ESTABLISHED)
```

#### 4. Son Bir Kaç Günde Yeni Eklenmiş Dosyaların İncelenmesi

Saldırı, önemsiz bir dosya içerisine yüklenip buradan kendini her hangi bir prosese eklemis olabilir ya da kullanılan bir sistem dosyasını değiştirip ekleme yapmış olabilir. Bu durumda orjinal dosyayı bulmamız işimize yarıyabilir. Linux sistemlerde son günlerde eklenmiş dosyaları bulmak oldukça kolaydır.

Aşağıdaki komut yıl.ay.gün:saat şeklinde /etc ve alt dizinlerinde son zamanlarda eklenmiş ya da değiştirilmiş dosyaları kolayca bulmamıza yarar. Sonundaki yılı sistemi kurduğunuz yılı yazarsanız orjinal oluşturulma tarihindeki dosyaları boşu boşuna görmemiş olursunuz.

```bash
sudo find /etc -type  f -printf '%TY-%Tm-%Td %TT %p\n' | sort -r | grep 2020
```

```-type f``` : Sadece dosyaları listeler, dizinleride görmek isterseniz koddan çıkartmanız yeterli.
```sort -r``` : Yeni değişenleri en üste getirir. Yani tersten sıralama yapar.

Bu komutu zamanlanmış dosya yapıp belirli aralıklarla güncellenmesini sağlarsanız dosyaların değiştirilmesini ya da eklenmesini kolaylıkla takip edebilirsiniz. Hatta kendinize eposta attırırsanız o zaman deme keyfinize, değişiklik olduğu anda eposta gelmesi süresi le sınırlı haberiniz olur. Uyandırayım dedim...

**Peki son bir saat (60dk) içerisinde değiştirilen dosyaları nasıl listelerim...**

```bash
sudo find /etc -type f -mmin -60
```

**Son iki gün içerisinde değiştirilen dosyaları nasıl listelerim...** Buradaki -2 ile istediğiniz gün sayısı verebilirsiniz.

```bash
sudo find /etc -type f -mtime -2
```

**Son bir haftanın 3 güni içerisinde değiştirilen dosyaları nasıl listelerim...**

```bash
sudo find /etc -type f -mtime -7 ! -mtime -3
```

**Dosyaların izinleri ve sahipleri bilgileride içerecek şekilde detaylıbakmak için**

```bash
sudo find /etc -type f -mtime -60 -exec ls -al {} \;
```

Dosya işlemleri için alternatif olarak ```xargs``` paketini de kullanabilirsiniz.

#### 5. İzinleri 777 Olan Dosyaların İncelenmesi

Linux sistemlerde kullanıcı izinleri için ```chmod```(Change Mod) komutu kullanılır. ```sudo chmod ugo+777 dosyaAdi``` komutu ile belirttiğimiz dosyaya herkes tarafından okunabilir, yazılabilir ve çalışma iznini vermiş oluruz. Yani o dosyada herkes her şeyi yapabilir. Aman dikkat sakıncalı. *"Herkesin her şeyi yaptığı bir yerde kimin ne yaptığını kimse bilemez. Bilir de kontrol edemez!"* Saldırgan her hangi bir kullanıcının hesabı ile dosyayı istediği gibi düzenleyip, çalıştırabilir.

Şimdi burada bizim yapmamız gereken 777 yetkisine sahip dosyaları bulup, 777'li bu dosyalardan haberimiz var mı? düşünmek. Yalnız burada sistem geneline bakmamız gerekiyor!

```bash
sudo find / -type f -perm 0777
```

#### 6. Başarılı ve Başarısız Olan Giriş Denemeleri

Olası bir saldırıda herkesin aklına gelen ilk soru **"En son kim girdi/giremedi."** Giremedi deyince şaşırmayın. Kullanıcı olarak giremediyse farklı bir yol bulmuştur olarak düşünün. Bunu tespit etmenin linux sistemlerde bir kaç yolu vardır.

##### "Last" komutu ile tespit etmek...

Bu komut sisteme giriş yapmış kullanıcıların listesini /var/log/wtmp dizinindeki dosyadan bize gösterir.

```bash
last -f /var/log/wtmp
```

#### Kullanıcının ismi ile kontrol etmek

```bash
last kullaniciAdi
```

#### Herhangi bir TTY için kontrol etmek

```bash
last TTYAdi
```

#### Sisteminyeniden başlama zamanlarını kontrol etmek

```bash
last reboot
```

#### Sistemde şu an aktif kullanıcıları listelemek

```bash
who -aH 
```

#### Journalctl ile sisteme girişleri tespit etmek

Eğer kullanılan dağısımda "systemd" kullanıyorsa /var/log/ dizinini boşuna kurcalamaya gerek yok, çünkü zaten günlük(journal) tutuluyordur. 

```bash
sudo journalctl -u 'systemd-logind' --since "today" --until "tomorrow"
```

#### /var/log/auth.log dosyası ile girişleri tespit etmek

```bash
less /var/log/auth.log
```

### 7. Sistemde Anlık Olarak Bulunan Kullanıcıların ve İp Adreslerinin İncelenmesi

Linux sistemlerde prosesleri ait bilgierin olduğu ve sistem başlangıcında(boot) /proc olarak sisteme bağlanan(mount) "ProcFs" adı verilen bir dosya sistemi vardır.

"Kim sisteme bağlı ve şu an ne yapıyor." işlemini yapan ```w``` komutu bu sistemin bir parçası olarak çalışır.

```bash
w 
# Örne çıktı
yeniceri@fetih1453:~$ w
 12:12:21 up 12 min,  1 user,  load average: 0,91, 0,94, 0,62
USER     TTY      FROM             LOGIN@   IDLE   JCPU   PCPU WHAT
yeniceri :0       :0               11:59   ?xdm?   1:18   0.04s /usr/lib/gdm3/gdm-x-session --run-script /usr/bin/gnome-session
```

-USER   : Kullanıcı adı,
-TTY    : Kullanıcının sisteme hangi konsolda bağlı olduğu,
-FROM   : Kullanıcı eğer sisteme arayüzden bağlı ise :0 ile , remote konsoldan bağlı ise IP si verilerek gösterilir,
-LOGIN@ : Giriş zamanı,
-IDLE   : Hiçbir iş yapılmadan geçirilmiş süre,eğer konsolda bir iş yapmıyorsanız idle süresi giderek artar.Fakat aktif bir kullanıcı var ise idle süresi düşüktür,
-JCPU   : Bağlı olunan konsalda çalışan programların CPU çalıştırma süreleri,
-PCPU   : What alanında gözüken/çalışan programın CPU çalıştırma süresi,
-WHAT   : Şu an kullanıcı ne yapıyor,ne çalıştırıyor.Eğer bir program çalıştırıyorsa o programın Path’i gözükür,sadece bağlı ise bağlı olduğu shell bilgisi gözükür.

### 8. Aktif Olarak Çalışan Ağ Servisleri ve Bunları Çalıştıran Kullanıcıların İncelenmesi

Nstat, ss ve lsof ile de bağlı olan kullanıcılar denetlenebilir...

### 9. Ssh anahtarlarının incelenmesi

Uzak sunucuya bağlanmak için parola ile girmek yerine bir açık anahtar(Ssh) ile bağlanmak tercih edilmiş olabilir. Anahtarla bağlanıldığında sunucu bağlananı tanır ve hiç bir şey sormadan isteklerini gerçekleştirir. Kullanıcı ssh anahtarını çaldırırsa saldırgan sunucuda istediğini yapar. Saldırı olduğundan şüpheleniliyorsa ya da varsa ssh anahtarını ve ssh loglarını kontrol etmek büyük önem taşımaktadır. 

##### Anahtarın kontrolu

Linux sistemlerde ssh anahtarları "/home/username/.ssh/authorized_keys" dosyasında saklanmaktadır. Bu dosya incelenerek tanımadığınız bir kullanıcı anahtar bırakmışmı bakılır. Bu dosyayı kendi makinenizdeki ```~/.ssh/id_rsa.pub``` ile karıştırmayın. Bu dosyadaki anahtar sizin makinenizin anahtarıdır. Bu anahtarı sunucuya verip el şıkışıyorsunuz. O da siz giriş yaptığınızda sizi direkt olarak kabul ediyor. İşte sunucunun sizin anahtarı sakladığı dosyayı incelemeniz gerekiyor. Başka anahtar var mı diye!


##### Ssh loglarının ve bağlı kullanıcıların incelenmesi

Sistemde Rsyslog/Syslog kurulu ise ```/var/log/auth.log``` dosyasını inceleyebiliriz.

Yanlış parola girilen giriş denemeleri için;

```bash
sudo grep sshd.\*Failed /var/log/auth.log |less
# ya da
sudo cat /var/log/auth.log | grep Failed
```

Başarısız bağlantılar için;

```bash
sudo grep sshd.\*Did /var/log/auth.log |less
```

Journalctl kullanarak ssh loglarına erişmek;

```bash
sudo journalctl -u sshd | tail -100
```

### 10. Zamanlanmış Görevlerin İncelenmesi

Linux sistemlerde zamana bağlı görev/iş yöneticisi olarak "crontab" kullanılmaktadır. Crontab ile bir işi belirli zamanda ve ya sürekli belirlediğimiz zaman aralıklarında gerçekleştirilmesini sağlayabiliriz. Planlanmış görevler "/etc/crontab" dosyasında bulunmaktadır.

Sızılmış bir sistemde normal görevler değiştirilmiş ve ya yeni görevler eklenmiş olabilir. Mesela bizm yattığımız saatlerde bilgileri dışarı aktaran bir görev eklenmiş olabilir. Bunları da kontrol etmek lazım. Konrolu dosyasından ya da aşağıdaki komut ile yapabiliriz.

```bash
crontab -l
```

### 11. Paylaşılan Dosyaların Olup Olmadığının İncelenmesi

Saldırgan paylaşılmış dosyalar üzerinden diğer sunucu ve cihazlara erişebilir! Linux sistemlerinde dosya paylaşım sistemi olarak NFS(Network File System) kullanılmaktadır. Paylaşılan dosyaları bulmak için, bağlanmış aygıtları görmek için kullandığımız "df" komutunu kullanırız. Yani bu komut NFS aygıt varsa onuda gösterir.

```bash
df -h 
```

### 12. Aktif Kullanıcıların Komut Geçmişinin İncelenmesi

Linux sistemlerde komut(bash) geçmişi de kullanıcının kendi dizininde "bash_history" dosyasında tutulmaktadır. Root kullanıcısı da buna dahildir. Sistemde birden fazla kullanıcı varsa "find" komutu ile bu dosyaları bulup sonrasonda komutları incelemeliyiz.

```bash
sudo find /home -name '*_history*' 
# Örnek çıktı
yeniceri@fetih1453:~$ sudo find /home -name '*_history*'
/home/yeniceri/.bash_history
/home/yeniceri/.php_history
```

### 13. Aktif Proses ve Alt Dallarının İncelenmesi

Tüm prosesleri listelemek;

```bash
ps aux
# Ağaç şeklinde görüntülemek için
ps auxf
```

Strace kullanarak binary'nin başlangıcından sonuna kadar çalışma süreciyle ilgigi bilgi alabiliriz...

```bash
strace cp
# Sistem çağrısını takip etmek
strace -e sistemAdi cp
# Sistem çağrısı takibi dosyaya yazdırmak
strace -e trace=open, read cp -o dosyaAdi.txt
```

Strace ile proses takip etmek

```bash
# Prosesin PID'ini öğrenme
ps -C firefox-bin
# Takip
strace -p 2296 -o firefox_trace.txt
```

### 15. Kurulu Olan Servislere Ait Log Dosyalarının İncelenmesi

Sisteme ait loglar "/var/log" dizini altında detaylı bir şeilde tutulmaktadır. Bu logların incelenmesi günü kurtarabilir. Peki bu log dosyaları ne işe yarar;

- /var/log/message : Main, cron, kernel ve auth gibi benzeri loglarıda barındırarak **sistemin başlangıcı** ile ilgili logları tutar.
- /var/log/dmesg : Bu dosyaya "dmesg" komutu ile erişilir. Çekirdek üzerinden gelen mesajlar doğrudan okunabilir. Sistem başlatıldığı andan itibaren **aygıtlar** ile alakalı tüm mesajları içerir.
- /var/log/auth.log : Kimlik doğrulama(**giriş/giriş** denemeleri) loglarını tutar. Brute-force saldırıları buradan tespit edilebilir.
- /var/log/boot.log : Sistem **açılışana** ait tüm loglar burada tutulur.
- /var/log/daemon.log : Aktif, durmuş ve başarısız **daemon** loglarını tutar.
- /var/log/dpkg.log : Yüklenen, güncellenen ve silinen tüm **paketlerin** bilgilerini tutar.
- /var/log/kern.log : **Çekirdek** loglarını tutar.
- /var/log/lastlog : **Son kullanıcı ve zaman bilgilerini** içerir. Bu loglar için "lastlog" komutu kullanılır.
- /var/log/mail.log ve /var/log/maillog : Sistem üzerinde çalışan **eposta sunucusu** loglarını tutar.
- /var/log/user.log : **Kullanıcı seviyesi**ne ait loglar tutulur.
- /var/log/Xorg.x.log : X ile alakalı logları tutar.
- /var/log/cups : Yazıcı ve yazıcıdan alınmış çıktıların logları tutulur.
- /var/log/cron : Zamanlanmış görevlerin logları tutulur.
- /var/log/secure : Kimlik doğrulama, yetkiler ve güvenlikle alakalı tüm loglar burada tutulur. OSSEC ve benzeri yazılımlarla incelenebilir.
- /var/log/httpd veya /var/log/apache2 : HttpD ve Apache2 sunucuları hakkındaki loglar tutulur.
- /var/log/audit/ : Audit daemon tarafından oluşturulan loglar tutulacak.
- /var/log/setroubleshoot/ : Selinux loglarını tutar.
- /var/log/sa/ : Sysstat paketi ile birlikte gelen "sar" yazılımına ait loglar tutulur. Sar komutu ile sisteme ait bir çok istatiksel bilgiler kontrol edilebilir.
- /var/log/samba : SMB protokolunun linux implementasyonuna ait loglar tutulur.

Linux sistemlerde aktif saldırı belirleme ve engelleme genellikle ağ/host tabanlı çalışır. NIPS/HIPS(Network/Host Intrusion Prevention System) olarak adlandırılır. Anlık ağ trafiği ya da sistem fonksiyonları kullanılarak engellenmeye çalışılır.

Pasif olarak belirleme işlemlerinden biri de, sistem loglarını inceleyerek gerçekleşmiş saldırıları belirlemektir. Loglama yapısı sağlıklı olarak çalışıyorsa sıradansaldırılar kolaylıkla belirlenebilir. Web sunucularının alt yapı eksikliği nedeni ile karmaşık saldırılar sadece web loglarının analizleriyle bulunamaz. Ortamda paketleri olduğu gibi gören ve kaydeden IDSL gibi bileşenlere ihtiyaç vardır.

Mesela sunucular POST isteklerinin detaylarını loglamaz. Eğer saldırı POST ile geldiyse sunucu logunda göremez ve bulamazsınız. Bir de saldırgan log kayıt sırasında encoding yaparsa bulunması daha zor ve analizcininde işinin uzmanı olması gerekir. Ayrıca POST istelkerinin loglarının tutulması için mod_forensic ve mod_security ek bileşenleri kullanılması ya da WAF, Load Balancer ve IPS gibi ürünlerin loglarına bakmak gerekir.

Şimdi gelelim unix araçlarla log analizi nasıl yapacağımıza...

Loglarda nelere bakmamız gerektiğine karar vermemiz lazım. Mesela; bağlantı kuran ip adresleri, normalin üzerinde bağlantı sayıları ve bağlı kalma süreleri gb.

Hangi ip kaç adet bağlantı sağlamış...

```bash
sudo cat /var/log/apache2/access.log.1 | awk -F " " '{print $1}' | sort -n | uniq -c | sort -nr | head
# Örnek çıktı
81 127.0.0.1
48 ::1
```

GET den gelenleri inceleme

```bash
# Sql injection da kullanılan düzenli ifadeleri aratma yapılabilir...
sudo cat /var/log/apache2/access.log.1 | grep ../.. | grep mysqli
```

##### Log analizi

Log analizini hazır araçlar kullanarak ve ya linux sistemlerdeki cat, awk, grep ve cut gibi paketler ile yapabiliriz. Hazır araçlar hızlı olsada detaylı analiz sağlıyamaz. Hazır yazılımlar daha önceden girilmiş kelime ve kelime gruplarını arar ve bunlara göre uyarı verir.

Log tabanlı her saldırı mutlaka arkasında bir iz bırakır. 

### 16. Disklerin İncelenmesi

Iostat ile diskin okuma/yazma sayıları sürekli olarak takip edilebilir...

```bash
# Her 5 sn de bir güncelle
iostat -y 5
# Örnek çıktı
yeniceri@fetih1453:~$ iostat -y 5
Linux 4.19.0-8-amd64 (fetih1453) 	04-04-2020 	_x86_64_	(8 CPU)

avg-cpu:  %user   %nice %system %iowait  %steal   %idle
           0,00    0,00    0,00    0,00    0,00    0,06

Device             tps    kB_read/s    kB_wrtn/s    kB_read    kB_wrtn
sdb               0,00         0,00         0,00          0          0
sda               0,40         2,40         0,00         12          0

avg-cpu:  %user   %nice %system %iowait  %steal   %idle
           4,00    0,00    1,93    0,03    0,00   94,04

Device             tps    kB_read/s    kB_wrtn/s    kB_read    kB_wrtn
sdb               0,00         0,00         0,00          0          0
sda               1,20         0,00       112,00          0        560
...
```

## 17. Zararlı Yazılımların Aranması

#### Chkrootkit

Rootkit belirtilerini tespit eden ücretsiz tarayıcıdır.

Kurulum:

```bash
sudo apt install chkrootkit
```

Kullanımı:

```bash
sudo chkrootkit
# Örnek çıktı
yeniceri@fetih1453:~/Masaüstü$ sudo chkrootkit
ROOTDIR is `/'
Checking `amd'...                                           not found
Checking `basename'...                                      not infected
Checking `biff'...                                          not found
Checking `chfn'...                                          not infected
Checking `chsh'...                                          not infected
Checking `cron'...                                          not infected
Checking `crontab'...                                       not infected
Checking `date'...                                          not infected
Checking `du'...                                            not infected
Checking `dirname'...                                       not infected
...
```

#### Lynis

Popüler bir güvenlik denetim ve tarama aracıdır. Malware ve virüs taraması yapar ve temizler. Ayrıca güvenlik denetimi yaparak, sunucunuzda güvenliğinizi sağlamak için yapmanız gerekenler konusunda öneriler sunar.

Kurulum:

```bash
cd /opt/
wget https://downloads.cisofy.com/lynis/lynis-2.7.5.tar.gz
tar xvzf lynis-2.7.5.tar.gz
mv lynis /usr/local/
ln -s /usr/local/lynis/lynis /usr/local/bin/lynis
```

Kullanımı:

```bash
sudo lynis audit system
# Örnek çıktı
yeniceri@fetih1453:~/Masaüstü$ sudo lynis audit system
[+] Initializing program
------------------------------------
  - Detecting OS...                                           [ DONE ]
  - Checking profiles...                                      [ DONE ]
  - Detecting language and localization                       [ tr ]

  ---------------------------------------------------
  Program version:           2.7.5
  Operating system:          Linux
  Operating system name:     Debian
  Operating system version:  10.3
  Kernel version:            4.19.0
  Hardware platform:         x86_64
  Hostname:                  fetih1453
  ---------------------------------------------------
  Profiles:                  /usr/local/lynis/default.prf
  Log file:                  /var/log/lynis.log
  Report file:               /var/log/lynis-report.dat
  Report version:            1.0
  Plugin directory:          /usr/local/lynis/plugins
  ---------------------------------------------------
  Auditor:                   [Not Specified]
  Language:                  tr
  Test category:             all
  Test group:                all
  ---------------------------------------------------
  - Program update status...                                  [ NO UPDATE ]
...
```

#### Maldet

Malware detektör aracıdır. Shell kodlarını da tarar. Kötü amaçlı yazılımları sadece tarar ve tespit eder. /usr/local/maldetect/ dizinine kurulur. Burada conf.maldet dosyasında konfigürasyonu yaparak, email yapılandırması ve karantinaya alma gibi işlemleri yapılandırabiliriz.

Kurulum:

```bash
wget http://www.rfxn.com/downloads/maldetect-current.tar.gz
tar -xvf maldetect-current.tar.gz
cd maldetect-1.6.4/
sudo su
./install.sh
```


Ayarları:

Malware Detect'in tüm yapılandırma ayarları /usr/local/maldetect/conf.maldet dosyasında saklanır. 

- email_alert=1: Eposta yoluyla bidirim almak.
- email_addr=sizin@postaadresiniz.com : kullanmış olduğunuz eposta adresi.
- email_subj = "$ HOSTNAME - $ (date +% Y-% m-% d) : Kötü Amaçlı Yazılım uyarıları eposta konusu.
- quarantine_hits = 1: Karantinaya taşıyın.
- quarantine_clean = 1: Sil.
- scan_clamscan = 1: Taramak için ClamAV'in kötü amaçlı yazılım kütüphanesini kullan.
- inotify_docroot="/home/www" Kullanıcının web dizinin izlemek için bu seçenek ayarlanabilir.

```bash
sudo gedit /usr/local/maldetect/conf.maldet
# En altına aşağıdakileri ekleyebilirsiniz...
email_alert="1"
email_addr="sizin@mailadresiniz.com"
email_subj="Malte uyarisi $HOSTNAME icin - $(date +%Y-%m-%d)"
quarantine_hits="1"
quarantine_clean="1"
scan_clamscan="1"
```

- maldet -a : Taramayı başlatır,
- maldet -b : Uzun sürecek tarama işlemlerini background da gerçekleştirir. Böylece tarama başlatıp SSH bağlantısını kapatabilirsiniz,
- maldet -u : Maldet virüs veri tabanını günceller,
- maldet -r : Sadece belirli bir gündeki eklenen değişen dosyaları taramaktadır,
- maldet --restore : Temizlenen veya karantinaya alınan dosyaları geri yükler. Virüs temizlerken yazılımlarınıza zarar vermesi durumunda tarama numarası ile restore yapılır.
- maldet -p : Tüm karantinaya alınan dosyaları, logları ve açık oturumları siler.

Örnek kodlar:

```bash
# Veri tabanını günceller
maldet -u
# Taramayı başlatır
maldet -a
# Backgroud da çalıştır
maldet -b -a /home/
# 2 günlük dosyaları tarar
maldet -r /home/?/public_html 2
# Dosyayı onarır
maldet --restore 081513-2051.9709
# tüm karantinadaki dosyaları ve logları siler
maldet -p
```

Kullanımı: Aşağıdaki kodun çıktısını incelediğimizde; alttan 3. satırda bize 2 adet malware bulduğunu, 2. satırda ```maldet --report 200404-2345.1523``` çalıştırarak görebileceğimizi ve alt satırda ise karantina ayarlarının kapalı olduğunu ve bulduğu dosyayı ```maldet -q 200404-2345.1523``` bu komutla silebileceğimi söylüyor.

```bash
sudo maldet -a
# Örnek çıktı
yeniceri@fetih1453:~$ sudo maldet -a
Linux Malware Detect v1.6.4
            (C) 2002-2019, R-fx Networks <proj@rfxn.com>
            (C) 2019, Ryan MacDonald <ryan@rfxn.com>
This program may be freely redistributed under the terms of the GNU GPL v2

maldet(1523): {scan} signatures loaded: 17029 (14209 MD5 | 2035 HEX | 785 YARA | 0 USER)
maldet(1523): {scan} building file list for , this might take awhile...
maldet(1523): {scan} setting nice scheduler priorities for all operations: cpunice 19 , ionice 6
maldet(1523): {scan} file list completed in 3s, found 78871 files...
maldet(1523): {scan} scan of  (78871 files) in progress...
maldet(1523): {scan} 78871/78871 files scanned: 2 hits 0 cleaned

maldet(1523): {scan} scan completed on : files 78871, malware hits 2, cleaned hits 0, time 9400s
maldet(1523): {scan} scan report saved, to view run: maldet --report 200404-2345.1523
maldet(1523): {scan} quarantine is disabled! set quarantine_hits=1 in conf.maldet or to quarantine results run: maldet -q 200404-2345.1523
...
```

Haa "hocam sendeki bu virüs ne?" derseniz! Maldet'i kurarken indirdiğim dosyaları görmüş...

```bash
maldet --report 200404-2345.1523
# Tüm karantinadaki dosyaları ve loglarını silme
sudo maldet -q 200404-2345.1523
# Örnek çıktı
yeniceri@fetih1453:~$ sudo maldet -q 200404-2345.1523
Linux Malware Detect v1.6.4
            (C) 2002-2019, R-fx Networks <proj@rfxn.com>
            (C) 2019, Ryan MacDonald <ryan@rfxn.com>
This program may be freely redistributed under the terms of the GNU GPL v2

maldet(15304): {quar} malware quarantined from '/home/yeniceri/Masaüstü/maldetect-1.6.4/files/clean/gzbase64.inject.unclassed' to '/usr/local/maldetect/quarantine/gzbase64.inject.unclassed.32873411'
maldet(15304): {quar} malware quarantined from '/home/yeniceri/Masaüstü/maldetect-1.6.4/files/sigs/rfxn.yara' to '/usr/local/maldetect/quarantine/rfxn.yara.2563054'
```













