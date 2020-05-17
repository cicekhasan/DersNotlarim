## PAKET İŞLEMLERİ

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


#### Kurulu paketleri listeleme

```bash
dpkg -l
```

#### Kurulu paketlerde arama

```bash
dpkg -l | grep paketAdi
```

#### Paket Kurma

```bash
sudo apt install paketAdi -y
```

#### Paket Kaldırma

```bash
# Ek pakaetleri ile beraber kaldırır
sudo apt --purge remove paketAdi
```

#### Yüklemeden Önce Paket Hakkında Bilgi Alma

```bash
apt show paketAdi
# Ya da
apt-cache show paketAdi
```

### YARARLI PAKETLER

#### Java Paketi

```bash
sudo apt install openjdk-8-jre -y
```

#### Tünellenmiş Ağ (VPN)

**openvpn**: Sanal özel ağ teknolojisi, bilgisayarınızı tünellenmiş ağ üzerinden başka bir ağın parçası haline getiren bir servistir. 

```bash
sudo apt install openvpn
```
