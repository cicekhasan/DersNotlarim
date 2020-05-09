# DERS NOTLARIM

Linux ve PHP genel komutları, çözümleri ve ip uçları için oluşturulmuştur...

- Linux
	- Genel
		- [Ubuntu Kurulum Sonrası Yapılacaklar](dosyalar/kurulum-sonrasi-islemler.md)
		- [Php Çalışma Ortamı Hazırlama](dosyalar/php-calisma-ortami-hazirlama.md)
		- [Lamp Yeniden Kurulum Temizliği](dosyalar/lamp-temizlik.md)
		- [Sık kullanılan Komutlar](dosyalar/kullanilan-komutlar.md)
		- [Log Dosyaları Yapısı](dosyalar/dosya-yapisi.md)
		- [Sistem Hataları ve Çözümleri](dosyalar/sistem-hatalari.md)
		- [Saldırı Takibi](dosyalar/saldiri-takibi.md)
	- Sisyem Yönetimi
		- [Sistem Genel](dosyalar/sistem-islemleri.md)
		- [Donanım İşlemleri](dosyalar/donanim-islemleri.md)
		- [Servis İşlemleri](dosyalar/servis-islemleri.md)
		- [Sorun Tespiti](dosyalar/sorun-tespiti.md)
	- Terminal
		- [Ağ İşlemleri](dosyalar/ag-islemleri.md)
		- [Arama İşlemleri](dosyalar/arama-islemleri.md)
		- [Disk İşlemleri](dosyalar/disk-islemleri.md)
		- [Dosya Yönetimi](dosyalar/dosya-yonetimi.md)
		- [E-Posta İşlemleri](dosyalar/e-posta-islemleri.md)
		- [Favorilerim](dosyalar/favorilerim.md)
		- [Fotograf ve Ses İşlemleri](dosyalar/fotograf-ses.md)
		- [GİT İşlemleri](dosyalar/git-islemleri.md)
		- [Hızlandırma](dosyalar/hizlandirma.md)
		- [İndirme İşlemleri](dosyalar/yetkiler.md)
		- [Lamp Kurulumu](dosyalar/lamp-kurulumu.md)
		- [Log Dosyaları](dosyalar/log-dosyalari.md)
		- [Metin İşleme (Dosyadan veri oluşturma.)](dosyalar/metin-isleme.md)
		- [Paket İşlemleri](dosyalar/paketler.md)
		- [PDF İşlemleri](dosyalar/pdf-islemleri.md)
		- [Terminal Kullanımı](dosyalar/terminal-kullanimi.md)
		- [Veri İşlemleri](dosyalar/veri-islemleri.md)
		- [Veritabanı İşlemleri](dosyalar/veri-tabani.md)
		- [Web Projeleri Yönetimi](dosyalar/web-projeleri.md)
		- [Yetkiler-İzinler](dosyalar/yetkiler.md)
		- [Zamanlanmış Görevler](dosyalar/zamanlanmis-gorevler.md)
- PHP
	- Genel
		- [Editörler (IDM)](dosyalar/editorler.md)
		- [Fonksiyonlar](dosyalar/fonksiyonlar.md)
		- [İp Uçları](dosyalar/ip-uclari.md)
		- [Laravel Notlari](dosyalar/laravel-notlari.md)
		- [MySql](dosyalar/php-mysql.md)
		- [Hata Çözümleri](dosyalar/php-hata-cozumleri.md)
	- Genel Kodlar
		- [CRUD İşlemleri](dosyalar/crud-islemleri.md)
		- [Veritabanı Bağlantısı](dosyalar/veri-tabani-baglantisi.md)
- PDO
	- Genel
		- [PDO Nedir?](dosyalar/pdo-nedir.md)
		- [PDO Metodları Nelerdir?](dosyalar/pdo-metodlari.md)
		- [PDO Kuralları](dosyalar/pdo-kurallar.md)
	- PDO Ders Notları (Nesne Tabanlı Php)
		- [Kütüphane Sayfalarını Oluşturma](dosyalar/pdo-sayfalar.md)
		- [Sınıf Oluşturma](dosyalar/pdo-sinif-olusturma.md)
		- [Değişken Tanımlama](dosyalar/pdo-degisken-tanimlama.md)
- Genel	
	- [İncelenecek Kodlar](dosyalar/incelenecekler.md)
- Laravel
		- [Hata Çözümleri](dosyalar/hata-cozumleri.md)
		- [Sınıf Oluşturma](dosyalar/pdo-sinif-olusturma.md)

## İp Uçları

#### Sık kullanılan dosya yolları

```bash
# Kullanıcı bilgilerinin olduğu dosya;
cat /etc/passwd
# Localhost dosya yolu;
cd /var/www/html/
```

#### Yardım dosyalarını türkçe yapmak.
```bash
sudo apt install manpages-tr
# Yardım dosyalarında "move" kelimesini aramak
apropos move
```
#### Batarya Kullanımı Bilgisi Öğrenme

```bash
upower -i $(upower -e | grep BAT) | grep --color=never -E percentage|xargs|cut -d' ' -f2|sed s/%//
```

## Genel komutlar

#### Listeleme

```bash
ls -l  # Dosyaları özellikleri ile listeler.
ls -al # Gizli dosyalarıda gösterir.
ls -lt # Zamana göre listeler.
ls -lS # Boyutuna göre listeler.
ls -lr # Tersten listeler.
ls -F  # Dosya sınıflarını göstererek listeler.
ls -al | less
ls -al | more
ls -al | grep files
```

## Faydalı Siteler

- [Ücretsiz Tema 1](https://w3layouts.com/) 
- [Alan Siteleri 1](https://digitalocean.com/)
- [Alan Siteleri 2](https://www.vultr.com/)
- [JS Kütüphane 1](http://trentrichardson.com/Impromptu/)
- [JS Kütüphane 2](http://textillate.js.org/)
- [JS Kütüphane 3](http://www.justinaguilar.com/animations/index.html)
- [JS Kütüphane 4](https://daneden.github.io/animate.css/)
- [Basit Blog 1](http://beltslib.net/basit-blog.html) 
- [Basit Blog 2](https://github.com/hozakar/basitblog/releases)
- [flat-file-cms ve Grav 1](http://blog.dynamicdrive.com/best-flat-file-cms-reviewed-and-compared/)
- [Admin Template](https://github.com/coreui/coreui-free-bootstrap-admin-template)
- [ISO dosyasını USB'ye yazdırmak için (Etcher)](https://etcher.io/)
- [CSS Framework](https://turkuazcss.com/)

## Videolar

- [Bob Rose (Ressam) video 1](https://www.youtube.com/channel/UCxcnsr1R5Ge_fbTu5ajt8DQ)
- [Bob Rose (Ressam) video 2](https://yandex.com.tr/video/preview/?filmId=6948454151854644335&text=bob+ross+resim+sevinci)
- [ESP8266 kullanarak kablosuz data aktarımı.](https://www.youtube.com/watch?v=3mhEp4yjI20)
- [Genclere ve kendini gelistirmek isteyenlere tavsiyeler.](https://www.youtube.com/watch?v=Ca35wp7W_jA&feature=em-uploademail)
- [DNS eğitimi](https://www.youtube.com/watch?v=mpQZVYPuDGU)
- [Scratch eğitimleri oynatma listesi](https://www.youtube.com/playlist?list=PLh9ECzBB8tJOUsrd6J-ifCB1LQeMCHD-x)
- [Linux giriş eğitimi serisi](https://www.youtube.com/playlist?list=PLh9ECzBB8tJOnxXrUTOqXfurKOZkN4mEY)
- [Get started with Node-Red](https://www.youtube.com/watch?v=O-FDqkhCryA&feature=share)
- [CRUD - Part1 (Nuri Akman)](https://www.youtube.com/watch?v=8fBLT-Ouvr0)

## Okumalar

- [HTTP İşleyişi ve Güvenliği Açısından Cookie ve Session Yönetimi](https://www.netsparker.com.tr/blog/web-guvenligi/http-isleyisi-ve-guvenligi-acisindan-cookie-ve-session-yonetimi/)
- [Veri Tabanlarında Normalizasyon](http://beltslib.net/veri-tabanlarinda-normalizasyon.html)
- [Raspberry Pi 2](http://www.raspi.gen.tr/2015/02/02/raspberry-pi-2-duyuruldu-ilk-inceleme-ve-on-izlenimler/)
- [Online pdf küçültme](https://smallpdf.com/tr/compress-pdf)


## BAKIP ARAŞTIR!

- [ ] Linux ekran kartı tanımlaması öğreniecek, sorunlar çözülecek.
- [ ] Digitalocean kullanımı pekiştirilecek!
- [ ] Linux log dosyaları konusu araştırılacak, logları okuma öğrenilecek.
- [ ] Http ve https nedir derin araştırılacak.
- [ ] Ultrasonik ses dalgaları nerelerde kullanılır? Araştırılacak!
- [ ] Proje Yönetim, lokalde bağımsız çalışan uygulama varsa bakılacak ya da tasarlanacak.
- [ ] Nginx öğrenilecek.
- [ ] Command Injection araştırılacak ve DVWA nedir?
- [ ] Saç bakımı [Nano Hair].