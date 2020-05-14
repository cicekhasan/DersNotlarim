# DNS DEĞİŞTİRME

Google dns lerini ayarlıyalım. Bunun için "etc/resolv.conf" dosyasında değişiklik yapacağız!

```bash
# Dosyayı aç...
sudo gedit resolv.conf
# Şu satırların başına # koy
nameserver 127.0.0.53
options edns0
# Altına bunları ekle
nameserver 8.8.8.8
nameserver 8.8.4.4
```
