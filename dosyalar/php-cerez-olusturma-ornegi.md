## GİRİŞ ÖRNEĞİ

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


Çerezler çalışılan bilgisayarda oluşturulurlar, sunucu tarafında oluşturulmazlar!

```php
# Cookie oluşturma...
# setcookie('cerezAdi', 'degeri', 'kalacagiSure');
# 10 sn lik site adınnı, aysubey olarak tutuk...
# 1 gün 86400 sn dir.
setcookie('siteAdi', 'aysubey', time() + 10);
# Cookie silmek...
# setcookie('cerezAdi', 'degeri', 'kalacagiSure');
# Silmek içinde zamanın aksini yaparak tekrar oluşturmamız gerekmektedir...
setcookie('siteAdi', 'aysubey', time() - 10);
# Görmek için...
print_r($_COOKIE);
```

Çerezleri Dizi Şeklinde Oluşturma:

```php
setcookie('uye[id]', 1, time() + 86400);
setcookie('uye[KullaniciAdi]', 'hasancicek', time() + 86400);
setcookie('uye[parola]', '123', time() + 86400);
setcookie('uye[tamAdi]', 'Hasan Çiçek', time() + 86400);
setcookie('uye[ePosta]', 'hasan.cicek@yandex.com.tr', time() + 86400);
setcookie('uye[yetki]', 1, time() + 86400);
```
