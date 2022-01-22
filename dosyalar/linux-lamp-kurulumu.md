## LAMP KURULUMU

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


```bash
# Ekranları araç çubuğundan tek tıkla aç-kapat özelliğini ver.
# Kolay kullanım için bu önemli.
gsettings set org.gnome.shell.extensions.dash-to-dock click-action 'minimize'
# Depo listelerinden versiyon kontrolünü yap.
sudo apt update
# Paketlerin yeni sürümleri varsa yükselt.
sudo apt upgrade -y
# Apache'yi kur.
sudo apt install apache2 -y
# Apache2'yi açılışta otomatik başlaması için ayarla.
sudo sudo systemctl enable apache2     
# Html dizini ve alt elemanlarının sahibini ve grubunu www-data yap.
sudo chown www-data:www-data /var/www/html/ -R
# Mariadb'yi kur.
sudo apt install mariadb-server mariadb-client -y
# Mariadb'yi açılışta otomatik başlaması için ayarla.
sudo sudo systemctl enable mariadb
# Php'yi belirtilen paketlerle beraber kur.    
sudo apt install php-pear php-fpm php-dev php-zip php-curl php-xmlrpc -y
sudo apt install php-gd php-mysql php-mbstring php-xml libapache2-mod-php -y
# Apache Web sunucusunu yeniden başlat.
sudo systemctl restart apache2
# Html dizini için kullanıcıyı yetkilendir.
sudo adduser $USER www-data
# Html dizini için grubu yetkilendir.
sudo chown -R $USER:www-data /var/www/html/
# Masaüstü dizinine geç.
cd ~/Masaüstü
# Masaüstü'ne kısayol oluştur.
ln -s /var/www/html/
# html dizinine geç.
cd /var/www/html/
# Apache ve Mariadb'yi yeniden başlat.
sudo systemctl restart apache2
sudo systemctl restart mariadb
# Git kurulumunu yap "html" dizinide içinde yap.
# Bu şekilde bütün projelerde kullanabilirsin.
sudo apt install git -y
# Git'e "kullaniciadi" kullanıcısını tanıtmak. Adını ve Soyadını gir.
git config --global user.name "Adın Soyadın"
# Git'e eposta'yı tanıtmak. E-Posta'nı gir.
git config --global user.email epostan
# /var/www/html/ dizini içerisinde Git init çalıştır.
# Git'i bu dizin için konuşlandır.
git init
# /var/www/html/ dizin içinde "Adminer"i kur.
# Burada "adminer" adında bir dizin oluştur.
mkdir adminer
# adminer dizinine geç.
cd adminer
# Adminer'in index.php dosyasını buraya indir.
wget -O index.php https://www.adminer.org/latest.php

Bu satırı tek çalıştır.
```

#### Root kullanıcısı için parola belirlemek. Mariadb konsoluna geçer.

```bash
sudo mysql -u root
```

Buradaki komutları tek tek mariadb ekranından gönderin!

```bash
show databases;
use mysql;
update user set plugin='' where User='root';
YADA
ALTER USER 'root'@'localhost' IDENTIFIED BY 'hasancicek';
flush privileges;
exit;
```

#### Mysql parolası belirlemek.

```bash
sudo mysql_secure_installation
```
#### Root parolası değiştirme

```bash
# Parola dosyasına göz atma
sudo cat /etc/shadow
# Parola değiştirme;
sudo su 
passwd root

# yeni parola : gir 
# yeni parola tekrar: gir 
# işlem tamam. 

exit 
```
