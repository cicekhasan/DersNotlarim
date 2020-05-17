## FAVORİLERİM

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


Açılırken E ve A ya basarsanız güvenilir kipte açar.

#### Bilgisayarı Derin Uykuya Yatırma

```bash
systemctl suspend
```

#### En çok kullanılan kod satırları

```bash
#Sistemi güncellememek ve kullanılmayan sistem dosyalarını temizlemek
sudo apt update && sudo apt upgrade -y && sudo apt autoremove -y && sudo apt autoclean -y
# Html altındaki dosya ve klasörlerin sahibini ve grubunu www-data yapmak
sudo chown www-data:www-data /var/www/html/ -R
sudo chown -R $USER:www-data /var/www/html/
# Şu an ki kullanıcıyı www-data grubuna dahil etmek
sudo adduser $USER www-data
# Proje klasörüne geçmek
cd /var/www/html/proje
# Proje ile github dosyaları arasında fark var mı? Bakmak.
git status
# Fark varsa sanalda eklemek;
git add .
# Farklar ya da son yapılan işlem hakkında açıklayıcı not yazmak
git commit -m "Mesaj"
# Projedeki değişiklikleri github ile eşitlemek. Github'a yeni ya da güncel dosyaları yüklemek
git push -u origin master
# Bellek bilgisini verir
free -h
# Dosya İndirme
axel -a -n8 FILEURL
# BCMATCH paketini kurmak
sudo apt install php7.0-bcmath
```
