# E-POSTA İŞLEMLERİ

- [Önsöz](https://github.com/yeniceri1453/Linux)


## E-Posta Yapılandırması

Kurulu olarak gelen programlarda "Mozilla Thunderbird" elektronik posta programını bilgilerini girerek etkinleştir. 

**Konsoldan Elektronik Posta Gönderme Ayarları**

"Mozilla Thunderbird" ayarları yapılı değilse kurulum sırasında terminalde açılan ekranı okuyarak talimatları takip et.

**Kurulum**

```bash
sudo apt install -y postfix
sudo apt install -y mailutils
```

**Gmail Hesabı İçin Ayarlar**

Önce aşağıdaki komutla dosyayı aç. 

```bash
sudo gedit /etc/postfix/main.cf
```

Açılan dosyanın en altına aşağıdaki kodları yapıştır, önceki satırlarda boş olan "relayhost = " satırını sil ve dosyayı kaydet.

```bash
relayhost = smtp.gmail.com:587
smtp_sasl_auth_enable = yes
smtp_use_tls = yes
smtp_enforce_tls = yes
smtp_sasl_security_options =
smtp_sasl_tls_security_options =
smtp_sasl_tls_verified_security_options =
smtp_tls_loglevel = 2
smtp_sasl_password_maps = hash:/etc/postfix/smtp_sasl_passwords
smtp_tls_per_site = hash:/etc/postfix/smtp_tls_sites
tls_random_source = dev:/dev/urandom
```

Gmail hesabını tanıt. 

```bash
sudo su 
echo "smtp.gmail.com mailiniz@gmail.com:parolanız" > /etc/postfix/smtp_sasl_passwords
echo "smtp.gmail.com  MUST_NOPEERMATCH" > /etc/postfix/smtp_tls_sites
cd /etc/postfix
chmod go-rx smtp_sasl_passwords
postmap smtp_sasl_passwords
postmap smtp_tls_sites
```

**E-posta Gönderme**

1. Yol

```bash
sudo mail -s "Deneme" epostaAdresi@gmail.com
```

Komuttan sonra entere bas, ikinci eposta varsa yaz yoksa entere bas, sonra metni yaz. Göndermek için **CTRL+D** bas gitsin. 

2. Yol

```bash
echo "İçerik" | mail -s "Başlık" mail-adresi@gmail.com
```

3. Dosya içeriğini gönderme

```bash
sudo mail -s "Açık Portlar" nuriakman@gmail.com < acikPortlar.txt
```

4. Html gönderme

```bash
mail --content-type=text/html --attach=/var/www/html/eposta/index.html -s "HTML sayfası" aysubey@gmail.com 
```