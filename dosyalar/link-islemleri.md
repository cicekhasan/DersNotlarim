## SEMBOLİK VE KATI LİNK İŞLEMLERİ

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


Sembolik link ile oluşturulmuş bağlantılar; dosyaların kısayolu görevini görür ve görevi yalnızca ilgili dosyaya yönlendirme yapmaktır. Katı link ile oluşturulmuş bağlantılar ise dosyanın kopyasıdır. Orijinal dosya silinse bile katı link içeriği korumaya devam eder.

Bağlantı türlerinin kullanımlarına geçmeden önce, inode kavramını öğrenmeliyiz.

#### inode(düğüm)

Inode(düğüm), dosyanın sahibi, oluşturulma tarihi, boyutu, tipi, erişim hakları, en son erişim tarihi ve en son değişikliklerin yapıldığı tarih gibi birçok meta verileri içeren yapıdır. Yani biz herhangi bir dosya oluşturduğumuzda disk üzerinde 1 inode yer kaplamaktadır.

```bash
# inode tablosunu görmek...
df -i
# inode numaralarını görmek...
ls -li
```

Örneğin /dev/sda1 disk alanını ele alırsak toplam 6348800 adet inode numarası alabilir yani sınırı bu kadar. Kullanılan 391980 inode numarasından toplam kullanılabilir olanı çıkarırsak (6348800–391980=5956820) geriye kullanılabilir 5956820 inode numarası kalmış oluyor. Bunun anlamı her bir dosya 1 inode yer kapladığı için /dev/sda1 dosya sisteminde 5956820 adet daha dosya oluşturulabilecek alan mevcut.

#### Sembolik Link

Dosya ve sembolik linkin inode değeri farklı olur! İçine yazıldıkça değer değişir.

```bash
# Sembolik link oluşturma...
ln -s dosyaAdi kisayolAdi
# Sembolik linkin inode numarasını görme. Linkin bulunduğu dizinde yap...
ls -i
```

#### Katı Link 

Katı link bağlantısı için ln komutu kullanılır. Dosya ve katı linkin inode değeri aynıdır!

```bash
# Katı link oluşturma...
ln dosyaAdi kisayolAdi
```
