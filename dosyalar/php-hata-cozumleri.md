## PHP HATA ÇÖZÜMLERİ

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


### Mariadb Meşgul Hatası

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


### LARAVEL HATA ÇÖZÜMLERİ

#### Laravel Uzun Veri Hatası

app\Provides\AppServiceProvider.php dosyasının içerisine;

```php
public function boot()
{
    Schema::defaultStringLength(length:191);
}
```

#### 404|Not Found Hatası

Key oluştur. 

```bash
php artisan key:generate
```

#### Laravel Takılırsa.

```bash
ps -ef | grep php
kill 1453
```

#### Bash Hatası

E: Could not get lock /var/lib/dpkg/lock – open (11: Resource temporarily unavailable)
E: Unable to lock the administration directory (/var/lib/dpkg/), is another process using it?

```bash
ps aux | grep -i apt
```
Eğer satırlarda "apt.systemd.daily" görürseniz, sistem otomatik güncelleme yaptığı için şu an **apt** meşguldür. Eğer görmezseniz takılı kalan sistemi aşağıdaki komutla durdurun.

```bash
sudo kill id
# ya da 
sudo killall apt apt
```

#### Açılışta "Sistem programı sorunu saptandı." Hatası. 

Aşağıdaki kodu çalıştırarak, raporları inceleyip bahsi geçen sorunları takip et.
```bash
ls -l /var/crash/
```

ya da aşağıdaki komut ile raporları silerek uyarıyı engelliyebilirsin.

```bash
sudo rm -f /var/crash/*
```
