## PHP HATA ÇÖZÜMLERİ

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


#### Mariadb Meşgul Hatası

Mesela parola değiştirmek için girdiğinde (```sudo mysql -u root```) meşgul hatası alırsan! Tekrar kur...

```bash
sudo apt purge mariadb* -y 
sudo apt purge mysql* -y 
cd /usr/share/
```
Sonrasında ```/usr/share/``` dizini içerisinde mariadb yada mysql görürsen:

```bash
sudo rm -R Mariadb
sudo rm -R Mysql
```
Tekrar kuruluma geç... Veritabanı yedeğin varsa almayı unutma.
