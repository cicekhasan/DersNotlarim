# Web Projeleri İşlemleri

- [Önsöz](https://github.com/cicekhasan/Linux)

## Proje Yetkilendirilmeleri
```bash
# Aktif kullanıcıyı www-data grubuna dahil et (O grubun yetkilerine sahip olur.)!
sudo adduser $USER www-data
# Alt elemanları ile beraber html dizininin sahibini aktif kullanıcı ve grubunu www-data yap!
sudo  chown -R $USER:www-data /var/www/html/
```
## Proje URL Ayarlarını Yapma
```bash
sudo gedit /etc/apache2/sites-available/000-default.conf
sudo /etc/init.d/apache2 restart
```

## Servisleri yeniden başlat.

```bash
sudo service apache2 restart
sudo service mariadb restart
```


