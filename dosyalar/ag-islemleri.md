## AĞ İŞLEMLERİ

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


eth0     : Ethernet kartı
enp3s0   : Ethernet kartı
lo       : Localhost
wlp4s0   : Wifi kartı


```bash
# Ağ kartlarını görme...
ifconfig -a 
# Wifi ip değiştirme (192.168.1.50 yapalım)...
ifconfig wlp4s0 192.168.1.50
# Wifi ip, netmask ve broadcast değiştirme...
ifconfig wlp4s0 192.168.1.50 netmask 255.255.255.0 broadcast 192.168.1.255
# Kablosuz kartını açmak...
ifconfig wlp4s0 up
# Kablosuz kartını kapatma...
ifconfig wlp4s0 down
```
#### ```ping``` Komutu

Hedef ile bizim sistemimiz arasında iletişimin sağlanıp sağlanmadığını kontrol ederek hedef sunucunun çalışıp çalışmadığını veya aktarım hızının ne kadar olduğunu öğrenmemizi sağlar. ```CTRL+C``` ile durdurulur.

```bash
ping www.google.com
ping 172.217.17.68 # www.google.com
ping 139.59.138.6  # aysubey.com
# 4 defa ping atma...
ping -c 4 aysubey.com
```

#### ```route``` Komutu

Sistemimizdeki IP yönlendirme tablosunun içeriğini görmemizi sağlar.

```bash
# IP yönlendirme tablosunun içeriğini görmek...
route -n 
```

#### ```traceroute``` Komutu

Bir önceki kısımda route komutu ile gördüğümüz yerel ağda geçerli olan yönlendirme takibini, belirli bir hedef adrese yapabilmemize olanak sağlayan komut traceroute komutudur. Yani komutumuz belirli bir hedefe gönderilen paketin hangi host'lardan geçtiğini bizlere gösterir. Bir nevi izlediği yolu yani adımlarını takip etmemizi sağlar.

```bash
traceroute aysubey.com 
```

#### ```whois``` Komutu

Whois kavramını bilmeyenler için whois, genel olarak domain bilgilerini içeren bir mekanizmadır. Yani whois; domain ne zaman kurulmuş, ne zamana kadar geçerli, kimin üzerine kayıtlı ve bunun gibi diğer tüm bilgileri tutar.

```bash
whois aysubey.com 
```

#### ```host``` Komutu

Hedef adres hakkında bilgi almanızı sağlar. host komutu ile IP adresinden alan adı(domain name) ve alan adından(domain name) IP adresine ulaşabiliriz.

```bash
host aysubey.com 
```

#### ```dig``` Komutu

dig(domain information groper/domain bilgi çukuru) DNS kayıtlarına bakmak için kullanımı oldukça kolay olduğundan yaygın olarak kullanılmaktadır.

```bash
dig aysubey.com 
```

#### ```arp``` Komutu

IP-MAC Adresi eşleştirmelerinin tutulduğu tablolardır.

```bash
arp 
```

#### ```tcpdump``` Komutu

Sistemimizin yaptığı bağlantıları ve sistemimize yapılan bağlantıları anlık olarak görüntülememize olanak sağlar.

```bash
tcpdump 
# Ayrıca adres çözümlemesi yapmadan direk olarak bağlantıları takip etmek...
tcpdump -n
```

#### Ağ Servisini Yeniden Başlatmak

```bash
sudo /etc/init.d/networking restart
```

#### Ağ Yönetimi

**nmap (Nmap Script Engine)**: Güçlü bir ağ yönetim yardımcısıdır. Ağda bulunan cihazların zafiyetlerini keşfetme ve gerekli önlemleri alma imkanı verir. (dangerous) yazan satır varsa dikkat et!

```bash
sudo apt install -y nmap
```

**Kullanımı**

```bash
# Açık ip adreslerini öğrenmek.
nmap -sn -n -v --open 192.168.1.0/24
# Açık portları öğrenmek.
sudo nmap -Pn -sS -n -v --reason --open 192.168.1.41
# Açık servis versiyon taraması yapmak.
sudo nmap -sS -sV -sC -n -v -p 21,53,80,139,445,1001,1900  192.168.1.41
```

**Önemli Parametreleri**

1. -sn          : Port taraması yapma anlamına gelir.
2. -n           : DNS Çözümlemesi yapma anlamına gelir.
3. -v, -vv, -vvv: Ekrana gösterilecek detayları arttırır.
4. -F           : Daha hızlı tarama yapar. Daha az sonuç bulur.
5. -sS          :Syn Taraması Yapar
6. --reason     : Bulduğu bir sonucun sebebini gösterir.
7. --open       : Sadece açık Portları gösterir.
8. -p-          : Bir IP üzerinde bulunması muhteme 65535 portun hepsini tarar.
9. -sV          : Açık portta çalışan servisin ne olduğunu bulmaya çalışır. -sC ile birlikte kullanılırsa işe yarar.
10. -sC         : -sV ile versiyon tespiti yapılırken nmap scriptlerini kullanır.
11. -p          : Sadece bu parametreden sonra belirtilen portları tarar.

#### Network Trafiği Kontrolu

**Wireshark**: Network trafiğinin, bir grafik arayüz üzerinden izlenmesini sağlayan, pek çok zaman hayat kurtarancı öneme sahip bir programdır. "tshark" ise bunun konsoldan kullanılan paketidir.

```bash
sudo apt install -y wireshark
```

#### TCP Paket Kontrolu

**Tcpdump**: Komut satırında çalışan bir paket analizcisi programıdır. Kullanıcıya bağlı bulunduğu bir ağ üzerinden iletilen veya alınan TCP/IP paketlerini veya diğer paketleri yakalama ve gözlemleme olanağı sunar.

```bash
sudo apt install -y tcpdump
```

#### Ağ Dinleme ve İzleme

**Dsniff**: Ağ güvenliği ve trafik dinleme amacıyla yazılmış açık kaynak kodlu bir program, küçük olmasına karşın işlevi fazlasıyla büyüktür.

İçinde bulundurduğu arpsoof, macof, dnsspoof, tcpkill, tcpnice, sshmith gibi ileri düzey araçları kullanarak bir LAN içinde SSL, SSH ve DNS trafiklerini yanıltabilir. Öte yandan mailsnarf, urlsnarf, filesnarf, msgsnarf, webspy gibi araçlar ile de ağda gezinen korumasız **parolalar**, dosylar ve bilgiler okunabilir formata dönüştürür. Urlsnarf 80 protundaki trafiği tarayarak URL’leri dinler, msgsnarf ise ağdaki gidip gelen IM Chat mesajlarını okur. Dsniff’in kendisi ise şifre dinleyicidir ve FTP, Telnet, SMTP, HTTP, POP, poppas, NNTP, IMAP, SNMP, LDAP, Rlogin, RIP, OSPF, PPTP , MS-CHAP, NFS, VRRP, YP/NIS, SOCKS, X11, CVS, IRC, AIM, ICQ, Napster, PostgreSQL, Meeting Maker, Citrix, ICA, NAI Sniffer, Microsoft SMB, Oracle SQL \*Net, Sybase, Microsoft SQL protokolleri arasında gidip gelen şifreleri okunabilirleştirir. Yani anlayacağınız tam bir ağ dinleme ve izleme yazılımı. 

```bash
sudo apt install -y dsniff
# Kullanımı
sudo dsniff -i wlp4s0
```

#### Dış (External) IP Öğrenme

```bash
# 1. Yol
curl ifconfig.me
# 2. Yol
dig +short myip.opendns.com @resolver1.opendns.com
```

#### Bir Domain Hakkında Bilgi Edinmek

```bash
whois aysubey.com 
```

#### Router ları Bulmak (Yol Takibi)

```bash
traceroute ipAdresi
```

#### Sunucumuzun 80 portuna (apache) bağlantı yapan ip leri bağlantı sayısına göre küçükten büyüğe tespit etmek.

```bash
# 1.
netstat -pant | grep :80 | awk '{ print $5}' | cut -d: -f1 | sort | uniq -c | sort -n 
# 2.
netstat -ntu grep :80 | grep SYN  | awk '{print $4}' | cut -d: -f1 | sort | uniq -c | sort -n 
# İp banlama
iptables -A INPUT -s banlanacakipadresi -j DROP
# İp ban kaldırma
iptables -D INPUT -s banlanacakipadresi -j DROP
```

### NETWORK AYARLARI

#### Alt Ağ Maskesi ve İp Tanımlama

```bash
ifconfig eth0 192.168.1.10 netmask 255.255.255.0
```

#### Default Gateway Tanımlamak

```bash
route add default gw 192.168.1.1 eth0
```

### DNS Ayarları

Komut satırından DNS ayarlarımızı değiştirmek istersek DNS bilgilerinin tutulduğu /etc/resolv.conf/ dosyasında değişiklik yapmamız gerekiyor. İşlemeleri adım adım açıklayarak ilerleyelim.

İlk olarak DNS ayarlarının bulunduğu dosya içeriğine göz atıyorum. Çünkü daha sonra değişiklik yaptığımızda ilk hali ile kıyaslamamız gerekecek. Bu işlemi cat komutu yardımı ile gerçekleştireceğiz.

```bash
cat /etc/resolv.conf
# Örnek ekran çıktısı...
nameserver 127.0.0.53
options edns0
# Yeni dns leri girme...
echo "nameserver 8.8.8.8" > /etc/resolv.conf
echo "nameserver 8.8.8.8" >> /etc/resolv.conf
# Eski ayarların saklı kalmasını istersek...
sudo gedit /etc/resolv.conf
# ile dosyayı açıp aşağıdaki gibi düzeitiriz. Eskilerinin başına # koyarız...
# BURADAN
# nameserver 127.0.0.53
#options edns0
nameserver 8.8.8.8
nameserver 8.8.4.4
# BURAYA kadar olanı yapıştır...
```

### Host Dosyası

Yerel bir alan adı sunucusu işlevindedir. Sistemde alan adı çözümlemesi yapılırken bu dosyaya bakılır. Dosyanın konumu /etc/hosts şeklindedir.

```bash
cat /etc/hosts
```
