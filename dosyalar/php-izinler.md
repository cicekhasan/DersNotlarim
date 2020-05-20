## PHP İZİNLER

#### ```chmod``` Komutu

```php
# Php ile dosyaya izin vermek
chmod('dosyaAdi.php', 0777);
```

1. numara mutlaka 0 ile başlar,
2. numara dosya sahibinin izni,
3. numara kullanıcı gruplarının izni,
4. numara da geri kalan herkesin iznini temsil eder.

1 = execute (işlem) izni,
2 = yazma izni,
4 = okuma izni.

777 = (1+2+4)(1+2+4)(1+2+4)
