## BASH KISAYOLLARI

#### İmleç Hareketleri

1.  ```CTRL+A ```    İmleç satır başına gider.
2.  ```CTRL+E ```    İmleç satır sonuna gider.
3.  ```CTRL+P ```    Önce çalıştırılmış komutu gösterir.
4.  ```CTRL+N ```    Sonra çalıştırılmış komutu gösterir.
5.  ```ALT+F  ```    Sağa doğru (ileri) bir kelime kadar imleç kayar.
6.  ```ALT+B  ```    Sola doğru (geri) bir kelime kadar imleç kayar.
7.  ```CTRL+F ```    İmleç bir karakter ileri gider.
8.  ```CTRL+B ```    İmleç bir karakter geri gider.
9.  ```CTRL+XX```    Geçerli imleç konuundan, imleç satır başına geçer.

#### Düzenleme

1.  ```CTRL+L ```    Ekranı temizler ve imleç en üste çıkar. 'clear' komutu ile aynı işlemi yapar.
2.  ```ALT+O  ```    İmleçten sonraki kelimeyi siler.
3.  ```CTRL+U ```    İmlecin solundaki her şeyi siler.
4.  ```CTRL+K ```    İmlecin sağındaki her şeyi siler.
5.  ```CTRL+Y ```    Kesilmiş olan son metni yapıştırır.
6.  ```ESC+T  ```    İmleçten önceki iki kelimeyi yer değiştirir.
7.  ```CTRL+H ```    Sola doğru tek tek karekterleri siler.
8.  ```ALT+U  ```    İmlecin başladığı yerden sözcüğün sonuna bütün karakterleri BÜYÜK HARF yapar.
9.  ```ALT+L  ```    İmlecin başladığı yerden sözcüğün sonuna bütün karakterleri KÜÇÜK HARF yapar.
10. ```ALT+C  ```    İmlecin üstünde bulunduğu karakteri BÜYÜK HARF yapar.
11. ```CTRL+C ```    Komutu sonlandırır.
12. ```CTRL+R ```    Kullanılmış koutlarda arama yapar.
13. ```CTRL+Z ```    Çalışan komutu arka plana atarak duraklatır.
14. ```CTRL+D ```    Terminali sonlandırır.
15. ```TAB    ```    Otomatik tamamlama yapar.
16. ```CTRL+_ ```    Geri alma (Undo).
16. ```ALT+DEL```    İmlecin önündeki sözcüğü siler.

#### Püf Noktaları

1. Birinci komut başarısız olursa diğer komutu çalıştırması için komutlar arasına ```||``` konulur.

```bash
# Örnek;
sudo cp index.php ~/Masaüstü/index.php || sudo mv index.php ~/Masaüstü/index.php 
```

2. Aynı anda birden fazla komut çalıştırmak için, komutlar arasına ```&&``` ya da ```;``` konulur.

```bash
# Örnek;
sudo apt update && apt upgrade -y
sudo apt update ; apt upgrade -y
```

3. ```CTRL+D``` ile yanlışlıkla komut satırını kapanmasını engellemek için, Bu özelliği sınırlandırabiliriz. En alt satırda 4, ```CTRL+D``` 4 defa girildikten sonra kapanılacak olduğunu ifade etmektedir. Siz istediğiniz değeri verebilirsiniz.

```bash
# Dosyayı aç...
sudo gedit -w ~/.bashrc
# En alt satıra aşağıdakini ekle, kaydet ve konsolu yeniden başlat!
export IGNOREEOF=4
```
