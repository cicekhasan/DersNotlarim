# LAMP KURULUMU

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)

#### Apache Kurulumu
```bash
# Kurulum
sudo apt install apache2 -y
# Başlangıçta Çalıştırmak
sudo sudo systemctl enable apache2
```

Kontrol (Sayfayı düzgün görüyorsanız çalışıyor demektir!) [Localhost](http://127.0.0.1/index.php)

```
# Masaüstüne kısayal oluştur ve html dizinine geç...
cd ~/Masaüstü
ln -s /var/www/html/
cd /var/www/html/
# Dosyaları görmek için index.php yi sil yada yedekle(kaldır)...
# Silmek
sudo rm index.html
# Yedekleme
sudo mv index.html yedek_index.html
```

#### Php Kurulumu

```bash
# Kurulum
sudo apt install php php-pear php-fpm php-dev php-zip php-curl php-xmlrpc -y
sudo apt install php-gd php-mysql php-mbstring php-xml libapache2-mod-php -y
# Kontrol (Sayfayı düzgün görüyorsanız çalışıyor demektir!)
sudo touch info.php
sudo gedit /var/www/html/info.php
```
info.php içerisine yapıştır ve kaydet. Sonrasında [Php Test](http://127.0.0.1/info.php)
```php
<?php
   phpinfo();
?>
```

#### Mariadb Kurulumu

```bash
# Kurulum...
sudo apt install mariadb-server mariadb-client -y
# Başlangıçta Çalıştırmak...
sudo systemctl enable mariadb
# Sistemi yeniden başlat...
sudo service mariadb restart
# Veritabanı parolasını ayarlamak
sudo mysql -u root
  show databases;
  use mysql;
  update user set plugin='' where User='root';
  flush privileges;
  exit;
sudo mysql_secure_installation
# Enter, y, parola gir, tekrar gir, bitene kadar enter!
```

#### Servisleri Yeniden Başlatma

```bash
sudo service apache2 restart
sudo service mariadb restart
# ya da
sudo systemctl restart apache2
sudo systemctl restart mariadb
```

## YETKİLENDİRME
```bash
# Aktif kullanıcıyı www-data grubuna eklemek...
sudo adduser $USER www-data
# html dizinini www-data grubuna eklemek...
sudo chown -R $USER:www-data /var/www/html/
```

#### Servislerin Kontrolu

###### Durum Kontrolu (Çalışıyorlar mı?)
```bash
# Apache2 kontrol...
sudo systemctl status apache2.service
# Mariadb kontrol...
sudo systemctl status mariadb.service
```

###### Versiyon Kontrolu

```bash
apache2 -v
mariadb --version
php -v
git --version
```

#### GİT Kurulumu (HTML klasöründe yap!)

```bash
sudo apt install git -y
git config --global user.name "Hasan Çiçek"
git config --global user.email hasan.cicek@yandex.com.tr
```

###### SSH Key Üretme ve Github Tanıtma

```bash
# ssh dosyasına geçmek...
cd ~/.ssh
# Dosya yoksa
cd ~/
mkdir .ssh
# ssh oluşturmak...
ssh-keygen
# Ssh Key'in olduğu dosyayı aç ve tamamını kopyala.
cat ~/.ssh/id_rsa.pub
# Tarayıcıdan adresi aç...
https://github.com/settings/ssh/new
# İsmini yaz, sonra kopyaladığın ssh keyi yapıştır ve "ADD SSH KEY" tıkla. Bu kadar...
# Test için bir repostor klonla...
sudo git clone git@github.com:cicekhasan/armada.git
# yes
```

###### Git Komutları

```bash
# Fark varmı bakmak...
git status
# Değişiklik yaptıktan sonra...
# Değişiklikleri eklemek...
git add .
# Değişiklik notu/zamanı oluşturmak...
git commit -m "Değişiklik yapıldı."
# Repostory ve klonu eştlemek...
git push -u origin master
```

#### Adminer Kurulumu (HTML klasöründe yap!)

```bash
mkdir adminer
cd adminer
wget -O index.php https://www.adminer.org/latest.php
```

#### Servisleri Devreye Alma (Çalışmıyorsa!)
```bash
sudo systemctl enable apache2
sudo systemctl enable mariadb
```

#### Lamp Ayarları

```bash
# php.ini yerini bulmak...
sudo find / -name php.ini
php -i | grep php.ini
# Değiştirmek için dosyayı aç...
sudo gedit /etc/php/7.2/apache2/php.ini
# En altına yapıştır, kaydet ve kapat... BURADAN!!!
display_startup_errors = On
display_errors = On
short_open_tag = On
opcache.enable = Off
upload_max_filesize = 128M
post_max_size = 128M
max_input_vars = 5000
date.timezone = "Europe/Istanbul"
error_reporting = E_ALL & ~E_DEPRECATED & ~E_STRICT & ~E_NOTICE & ~E_WARNING
mbstring.language = Turkish
mbstring.internal_encoding = UTF-8
disable_functions = exec, passthru, shell_exec, system, proc_open, popen, curl_exec, curl_multi_exec, parse_ini_file, show_source
# BURAYA KADAR KOPYALA!!!
# my.cnf yerini bulmak...
sudo find / -name my.cnf
# Değiştirmek için dosyayı aç...
sudo gedit /etc/mysql/my.cnf
# En altına yapıştır, kaydet ve kapat... BURADAN!!!
[client]
port = 3306
socket = /var/lib/mysql/mysql.sock
[mysqld-safe]
socket = /var/lib/mysql/mysql.sock
nice = 0
[mysqld]
# Basic
innodb_force_recovery = 1
bind-address = 127.0.0.1
datadir = /var/lib/mysql
lc-messages-dir = /usr/share/mysql
max-allowed-packet = 128M
max-connect-errors = 1000000
pid-file = /var/lib/mysql/mysql.pid
port = 3306
skip-external-locking
skip-name-resolve
socket = /var/lib/mysql/mysql.sock
tmpdir = /dev/shm/mysql/
user = mysql
# MyISAM Query Cache Settings
query-cache-limit = 1M
query-cache-size = 70M
query-cache-type = 1
key-buffer-size = 150M
low-priority-updates = 1
concurrent-insert = 2
# Common
max-connections = 100
back-log = 512
wait-timeout = 90
interactive-timeout = 90
join-buffer-size = 2M
read-buffer-size = 2M
read-rnd-buffer-size = 4M
sort-buffer-size = 4M
thread-cache-size = 16
thread-stack = 192K
max-heap-table-size = 50M
tmp-table-size = 50M
table-definition-cache = 8000
table-open-cache = 1000
open-files-limit = 24000
ft-min-word-len = 3
expire-logs-days = 2
log-error = /var/lib/mysql/mysql_error.log
log-queries-not-using-indexes = 1
long-query-time = 0.1
max-binlog-size = 100M
slow-query-log = 1
slow-query-log-file = /var/lib/mysql/mysql_slow.log
thread-cache-size = 16
thread-stack = 192K
max-heap-table-size = 50M
tmp-table-size = 50M
table-definition-cache = 8000
table-open-cache = 1000
open-files-limit = 24000
ft-min-word-len = 3
expire-logs-days = 2
log-error = /var/lib/mysql/mysql_error.log
log-queries-not-using-indexes = 1
long-query-time = 0.1
max-binlog-size = 100M
slow-query-log = 1
slow-query-log-file = /var/lib/mysql/mysql_slow.log
max_allowed_packet = 32M
open_files_limit = 50000
[mysqldump]
quick
quote-names
max-allowed-packet = 16M
[mysql]
[isamchk]
key-buffer-size = 150M
# BURAYA KADAR KOPYALA!!!
# Servisleri yeniden başlat...
sudo systemctl start apache2 && sudo systemctl start mariadb
```