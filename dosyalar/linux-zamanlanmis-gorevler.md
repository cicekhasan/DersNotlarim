## ZAMANLANMIŞ GÖREVLER

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


Sistemde yapılması gereken rutin işlerin zamanı geldiğinde otomatik olarak yapılması işine zamanlanmış görevler deniyor. Bu rutin işlere örnek söylemek gerekirse; benim her pazartesi sistemi yedeklemem gerekiyor diyelim, bunu her pazartesi elle yapmak yerine bu işi zamanlanmış görevlere ekleyerek otomatiğe bağlayabilirim. İşte zamanlanmış görevler bu ve bunun gibi durumlarda sıkça kullanılıyor.

#### ```cron``` Komutu

Rutin tekrarları sağlayan zamanlanmış görevleri yerine getirmemizi sağlayan servisimizin adı ```cron```'dur.

```bash
# cron servisinin durumunu kontrol etme...
service cron status
```

Cron servisimizin çalıştığını teyit etmiş olduk. Cron servisinin yapılandırma dosyası /etc/crontab konumunda yer alıyor.

```bash
# Göz atmak için...
cat /etc/crontab
# Düzenlemek için...
crontab -e
# Eklenmiş görevlendirmeyi listelemek için...
sudo crontab -l
# Görevlendirmelerin hepsini silmek için...
sudo crontab -r
# Her dakikada script.sh dosyasını çalıştırmak...
* * * * * /bin/execute/this/script.sh
# Her Her cuma günü saat 13:30 da dosya1'i dosya2'ye kopyalamak...
30 13 * * 5 cp dosya1.txt dosya2.txt
# Ayda bir kopyala
@monthly cp dosya1.txt dosya2.txt
# Bilgisayar açılınca eposta gönder örnek 1.
@reboot mail -s "Uyarı Mesajı! Bilgisayar açıldı" aysubey@gmail.com
# Bilgisayarı açanı çek ve fotografını postala örnek 2. 
@reboot uvccapture -d/dev/video0 -oscreenxxx.jpg -m | mail --attach=screenxxx.jpg -s "İzinsiz bilgisayarın açıldı." aysubey@gmail.com
```

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
