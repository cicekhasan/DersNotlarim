# ARAMA İŞLEMLERİ

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


## Dosya arama 

```bash
# yol aramaya nereden başlıyacağını ifade eder...
find yol -iname "dosyaIsmi"
# ayarlar.txt dosyasını aratalım...
find yol -name ayar*
# Sadece dosyalarda arıyalım...
find yol -name ayar* -type f
# Sadece dizinlerde arıyalım...
find yol -name ayar* -type d
# Sadece 500 KB’tan büyük olan dosyalarda arıyalım...
find yol -name ayar* -size +500k
# Sadece 500 KB’tan küçük olan dosyalarda arıyalım...
find yol -name ayar* -size -500k
# Tam olarak 10 gün önce değişikliğe uğramış dosyalarda/dizinlerde arıyalım...
find yol -name ayar* -ctime 10
# 10 günden daha kısa bir süre önce değişikliğe uğramış dosyalarda/dizinlerde arıyalım...
find yol -name ayar* -ctime -10
# 10 günden daha uzun bir süre önce değişikliğe uğramış dosyalarda/dizinlerde arıyalım...
find yol -name ayar* -ctime +10
# Yalnızca erişim izni 755 olan dosyalarda/dizinlerde arıyalım...
find yol -name ayar* -cperm 755

```

## Önce verilen girdi verilerini kendisinden sonrakine tek tek aktarmak

Aşağıdaki komutla Masaüstü'nde bulduğu her jpg uzantılı dosyayı tek tek siler.

```bash
find /home/kaptan/Masaüstü -name *.jpg | xargs rm
```

## İçeriğinde belli bir kelimenin geçtiği dosyayı ya da belli bir uzantıya sahip dosyaları listelemek

```bash
locate "*.jpg"
```

## Son bir saatte değiştirilen dosyaları bulmak

```bash
find / -mmin -60
```

## Boyuta göre dosya aramak

```bash
find / -size +250M -size -512M
```
