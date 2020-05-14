# ARAMA İŞLEMLERİ

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


## Dosya arama 

```bash
# yol aramaya nereden başlıyacağını ifade eder...
find yol -iname "dosyaIsmi"
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
