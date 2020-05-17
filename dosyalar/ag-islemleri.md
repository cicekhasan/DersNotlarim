## AĞ İŞLEMLERİ

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


eth0     : Ethernet kartı.
wlp4s0b1 : Wifi kartı.


#### Network Arayüzlerini/Kartlarını (Interface) Öğrenme

```bash
ifconfig -a 
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

#### DNS'leri Girme (Manuel)

```bash
sudo nano /etc/resolv.conf 
# İçerisine;
# Sunucunun aramayapacağı domain
search aysubey.com
# İsim çözümlemede kullanılacak olan dns adresi 1 
nameserver 8.8.8.8
# İsim çözümlemede kullanılacak olan dns adresi 2
nameserver 8.8.4.4
```
