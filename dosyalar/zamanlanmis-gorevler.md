## ZAMANLANMIŞ GÖREVLER

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


#### Zamanlanmış Görevler Oluşturmak

KaçıncıDakika-SaatKaçta-Günler-HangiAy-HaftanınGünü-Komut

```bash
@reboot     BİR KERE ÇALIŞ, BAŞLANGIÇTA
@yearly     BİR KERE ÇALIŞ, YILDA            "0 0 1 1 *"
@annually   (@yearly  AYNI İŞLEVİ GÖRÜR)
@monthly    BİR KERE ÇALIŞ, AYDA             "0 0 1 * *"
@weekly     BİR KERE ÇALIŞ, HAFTADA          "0 0 * * 0"
@daily      BİR KERE ÇALIŞ, GÜNDE            "0 0 * * *"
@midnight   (@daily AYNI İŞLEVİ GÖRÜR)
@hourly     BİR KERE ÇALIŞ, HER SAATTE 
```

```bash
# Yeni bir görev eklemek için kullanırız.
sudo crontab -e
# Eklenmiş görevlendirmeyi listelemek için kullanırız.
sudo crontab -l
# Görevlendirmeleri silmek için kullanırız.
sudo crontab -r
# Her dakikada script.sh dosyasını çalıştırsın.
* * * * * /bin/execute/this/script.sh
# Her Her cuma günü saat 13:30 da dosya1'i dosya2'ye kopyala.
30 13 * * 5 cp dosya1.txt dosya2.txt
# Ayda bir kopyala
@monthly cp dosya1.txt dosya2.txt
# Bilgisayar açılınca eposta gönder örnek 1.
@reboot mail -s "Uyarı Mesajı! Bilgisayar açıldı" aysubey@gmail.com
# Bilgisayarı açanı çek ve fotografını postala örnek 2. 
@reboot uvccapture -d/dev/video0 -oscreenxxx.jpg -m | mail --attach=screenxxx.jpg -s "İzinsiz bilgisayarın açıldı." aysubey@gmail.com
```
