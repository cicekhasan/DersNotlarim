## YENİ KURULUM TEMİZLİĞİ

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


1. Sadece Mysql çalışmazsa, mysqli kaldırıp tekrar kurun ve deneyin.

```bash
# Mysql kaldırmak...
sudo apt --purge remove mysql* -y
# Kalan ve kullanılmayan paketleri temizlemek...
sudo apt-get autoremove -y
sudo apt-get autoclean -y
```

2. Her hangi bir şekilde "LAMP" çalışmazsa temizleyip tekrar kurmak için gerekli komutlar aşağıdadır. 


```bash
# Apache kaldırmak...
sudo apt --purge remove apache* -y
# Dosyaları kaldıramazsa silmek...
sudo rm -R /var/lib/apache2
sudo rm -R /var/www/html
# Mysql kaldırmak...
sudo apt --purge remove mysql* -y
# Php kaldırmak...
sudo apt --purge remove php* -y
# Php dosyasını kaldıramazsa silmek...
sudo rm -R /etc/php
# Kalan ve kullanılmayan paketleri temizlemek...
sudo apt-get autoremove -y
sudo apt-get autoclean -y
```
