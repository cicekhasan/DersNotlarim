# DOSYA İŞLEMLERİ

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)

## Dosya Hakkında Bilgi Edinme
```bash
# Dosya hakkına istatistik bilgi verir.
wc dosyaAdi
```

## Dosya Oluşturmak

```bash
touch dosyaAdi
# Birden fazla dosya oluşturma...
touch dosyaAdi1 dosyaAdi2 dosyaAdi3
```

## İçerisine Yazarak Oluşturma

```bash
echo selam >   dosyaAdi.txt     # Tekrar yazarsan öncekini siler.
echo naber >>  dosyaAdi.txt     # Satır sonuna ekler.
echo nasılsın 2>> dosyaAdi.txt  # Hatalı ise yazar.
```

## Dosya İçeriklerini Görüntüleme

```bash
cat dosyaAdi
more dosyaAdi
less dosyaAdi
# Dosya içeriğinin ilk 10 satırını görüntülemek
head
# Dosya içeriğinin son 10 satırını görüntülemek
tail
# Dosya içeriğinin ilk 6 satırını görüntülemek
head -n 6
# Dosya içeriğinin son 6 satırını görüntülemek
tail -n 6
# Dosyada entere basılışlarınıda gösterir. Herşeyi gösterir.
cat -A dosyaAdi
# Satır numaralarınıda gösterir.
cat -n dosyaAdi
# Dosyayı dinlemeye devam eder.
tailf logDosyasiAdi
# Sıkıştırılmış dosya içeriğini gösterir.
zcat  dosya.tar.gz
```

## Dosya İçeriklerini Tersten Görüntüleme

```bash
tac dosyaAdi
```

## Satır Satır Tersten Görüntüleme

```bash
rev dosyaAdi
```

## Dosya çÇıktılarını Sıralatmak

```bash
# A-Z ye sıralamak...
sort dosyaAdi
# Z-A ye sıralamak...
sort -r dosyaAdi
```

## Aynı Anda İki Dosya Çıktısını Yan Yana Görmek

```bash
paste dosyaAdi1 dosyaAdi2
```

## İki Dosyayı Karşılaştırmak

```bash
cmp dosyaAdi1 dosyaAdi2
```

## Dosyada Filtreleme Yapmak

Aşağıdaki komutla büyük küçük harf duyarlı (-i) olarak Hasan keimesini aratıyoruz.

```bash
# Belirli dosyada arama...
grep -i "Hasan" dosyaAdi
# Bulunduğu yerdeki dosyalar içerisinde arar...
grep -r "hasan" *
```

## Ekrana Çıktı Verme

```bash
echo "Görüntülenecek metin."
```

## Dosya Ya da Klasör Kopyalama

```bash
cp dosyaAdı yeniDosyaAdı
cat dosyaAdı > yeniDosyaAdı
dd if=dosyaAdı of=yeniDosyaAdı
```

## Dosya Birleştirme

```bash
# 1 ve 2. dosyayı toplam dosyasında birleştirir. Video da birleştirebilir.
cat dosya1 dosya2 >toplam
```

## Dosya Taşıma Ya da Yeniden Adlandırma

```bash
mv dosyaAdı yeniDosyaAdı
```

## Bir Dosya Ya da Klasör İçin Link Oluşturma

```bash
ln dosyaAdı link
```

## Dosyaları Sıkıştırmak Ya da Çıkarmak

Aşağıdaki paketlerden birini kur!

```bash
sudo apt install -y p7zip
# ya da
sudo apt install -y p7zip-full
# ya da
sudo apt install -y p7zip-rar
```

## Dosya içeriği parçalama / Veri çıkarma

```bash
# not.asc dosyasının 6. sütununu dikey olarak getirir.
awk '{print $6}' NOT.asc
# not.asc dosyasının 6. sütununu yatay olarak getirir.
awk '{print $6}' NOT.asc |paste -s
```

## Dizin/Dosya Kopyalama

```bash
cp kaynakDosya hedefDosya
# Dizin kopyalarsak (İçindekilerle beraber)...
cp -i kaynakDizin hedefDizin
```

## Dizin/Dosya Taşımak

```bash
mv dosyaKonumu/dosyaAdi tasinacakKonum
# Dizin kopyalarsak (İçindekilerle beraber)...
mv -r dizinKonumu/dizinAdi tasinacakKonum
```

## Dizin/Dosya Silme

Bu komut sayesinde dosyalarımızı daha güvenli şekilde silebiliriz. shred komutu dosyanın içerisine rastgele bitler yazarak dosyanın okunmaz hale gelmesini sağlıyor.

```bash
rm dosyaAdi
# İçindekilerle beraber...
rm -r dizinAdi
# Güvenli dosya silme...
shred dosyaAdi
```
