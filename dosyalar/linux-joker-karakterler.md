## JOKER KARAKTERLER

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


#### * Karakteri

Anlamı * olan yere herhangi bir şey gelebileceğidir.

```bash
# Dosya adının başında aktar yazan dosyaları listeler...
ls aktar*
# Dosya adının sonunda aktar yazan dosyaları listeler...
ls *aktar
# Dosya adının içerisinde aktar yazan dosyaları listeler...
ls *aktar*
# Uzantısı php olan dosyaları listeler...
ls *.php
```

#### ? Karakteri

Herhangi bir tek karakterle eşleşir.

```bash
# Aradaki karakter farketmeden listeler...
ls hasan?cicek
# Örnek çıktı...
hasan_cicek
hasan-cicek
```

#### [] Karakteri

? karakterine benzer olmakla birlikte daha çok hedefe odaklı çalışır.

```bash
# Adında 2, 3 ve 4 olanları listele...
ls -l [234]
# Başka örnek...
ls -l [Aa]yarlar.php
# Başka örnek...
# Kullanıcıadı, kullanıcıadı, KullaniciAdi gibi...
ls -l [Kk]ullan[ıi]ci[Aa]d[ıi]
```

#### [0–9] Karakteri

0'dan 9'a kadar olan rakamları kapsar.

```bash
# Adında 0 dan 9 kadar olanları listele...
ls -l [0-9]
```

#### [x,y,z] Karakteri

Belirtilen değerlerle eşleşenleri basar.

```bash
# Adının sonunda 1, 2 ve 3 olanları listele...
ls -l dosyaAdi[1-2-3]
# Adının sonunda 1, 2 ve 3 olanları listele...
ls -l dosyaAdi[1,2,3]
```

#### [x-z] Karakteri

x ile z değerleri arasındaki karakterlerle eşleşir.

```bash
# Adının sonunda 2 den 6 ya kadar olanları listele...
ls -l dosya[2-6]
```

#### [!xyz] Karakteri

Belirtilen karakterlerin dışındakileri diğer tüm karakterleri basar.

```bash
# Adının sonunda 4, 5 ve 6 olmayanları listele...
ls -l dosya[!456]
```

#### [!x-z] Karakteri

Verilen x ile z değeri arasındaki değerler haricindeki karakterler basar.

```bash
# Adının sonunda 0 dan 5 e kadar olmayanları listele...
ls -l dosya[!0-5]
```
