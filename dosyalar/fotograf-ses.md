# FOTOĞRAF, VİDEO SES KOMUTLARI

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


## Konsoldan Fotoğraf Çekmek

Bilgisayardaki Web Kamerayı Bulma

```bash
ls -ltrh /dev/video*
# ya da
ls -al /sys/class/video4linux 

# USB'ye bağlı tüm aygıtları listelemek için.
ls -lsusb /dev/video*
# PCI kullanımına bağlı tüm aygıtları listelemek için.
ls -lspci /dev/video*
```

Fotoğraf çekmek.

```bash
uvccapture -d/dev/video0 -oscreenURC.jpg -m 
```

Bilgisayarı açanı çek ve fotografını postala.

```bash
sudo uvccapture -d/dev/video0 -oscreenxxx.jpg -m | mail -s "Uyarı Mesajı! Bilgisayar açıldı" aysubey@gmail.com < screenxxx.jpg
sudo uvccapture -d/dev/video0 -oscreenxxx.jpg -m | mail -s "Uyarı Mesajı! Bilgisayar açıldı" aysubey@gmail.com < screenxxx.jpg
sudo uvccapture -d/dev/video0 -oscreenxxx.jpg -m | mail --attach=screenxxx.jpg -s "İzinsiz bilgisayarın açıldı." aysubey@gmail.com
```

## Yazı Okutma

```bash
spd-say "Ben Algoritma Uzmanına Bayılıyorum"
```

## Wav Uzantılı Dosya Çalma

```bash
play /usr/share/sounds/alsa/dosyaAdi.wav
```

## Resimleri Videoya Çevirme

```bash
ffmpeg -f image2 -i image%d.jpg dosyaAdi.mpg
```

## Videoları Resime Çevirme

```bash
ffmpeg -i video.mpg image%d.jpg
```

## Mpeg-Avi Çevirme

```bash
ffmpeg -i orjinalVideo.mpg donusturulecekVideo.avi
```

## Videodaki Sesi Mp3'e Çevirme

```bash
ffmpeg -i kaynakVideo.avi -vn -ar 44100 -ac 2 -ab 192k -f mp3Ses.mp3
```

## Avi-Gif Çevirme

```bash
ffmpeg -i orjinalVideo.avi gifDosyasi.gif
```