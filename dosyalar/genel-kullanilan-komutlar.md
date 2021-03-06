## SIK KULLANILAN KOMUTLAR

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


#### Sistemi Güncelleme

```bash
# Listeleri güncelleme...
sudo apt update
# Paketleri güncelleme...
sudo apt upgrade -y
# Kullanılmayan paketleri kaldırma...
sudo apt autoremove -y
sudo apt autoclean -y
# Bozuk paketleri onarma...
sudo apt -y install -f
```

#### Yetkilendirme
```bash
# Aktif kullanıcıyı www-data grubuna eklemek. Bir kere yapılır...
sudo adduser $USER www-data
# html dizinini www-data grubuna eklemek...
sudo chown -R $USER:www-data /var/www/html/
```

#### Servisleri Yeniden Başlatma

```bash
sudo service apache2 restart
sudo service mariadb restart
# ya da
sudo systemctl restart apache2
sudo systemctl restart mariadb
```

#### Durum Kontrolu

```bash
# Apache2 kontrol...
sudo systemctl status apache2.service
# Mariadb kontrol...
sudo systemctl status mariadb.service
```

#### Git Komutları

```bash
# Repostory ve klon arasında fark varmı bakmak...
git status
# Değişiklikleri ekleme...
git add .
# Değişikliin notunu ve zamanını kaydetmek...
git commit -m "Değişikliğin açıklamasını yaz."
# Repostory ve clonu eşitle
git push -u origin master
```

#### Dosya Arama

```bash
sudo find / -name dosyaAdi.uzantisi
```

#### Bozuk Paket Tespiti

```bash
sudo apt-get install -f
```

#### Paket Kaldırma

```bash
sudo apt-get purge paketAdi
sudo apt-get --purge remove paketAdi
sudo apt-get remove --purge paketAdi
```

#### .rpm Dosyalarını Yükleme

Debian'a uyumlu olması için "alien" programını yüklemek gerekir.

```bash
# Alien yüklemek...
sudo apt-get install alien -y
# rpm dosyasını deb çevirmek...
sudo alien -k .rpm
# Çevrilen paketi yüklemek...
sudo dpkg -i paket.deb
```

#### php.ini Dosyasının Yerini Öğrenme

Dosyayı bulmak için index.php içerisine kopyala ve tarayıcıdan öğren.

```php 
<?php

echo php_ini_loaded_file();

?>
```
