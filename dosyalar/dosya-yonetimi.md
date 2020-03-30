# DOSYA YÖNETİMİ

- [Önsöz](https://github.com/cicekhasan/Linux)


## Dosya hakkında bilgi edinme
```bash
# Dosya hakkına istatistik bilgi verir.
wc dosyaAdi
```

## Dosya oluşturmak

```bash
touch               Dosya oluşturma
mkdir               Dizin oluşturma
echo selam >   mmm  Siler
echo selam >>  mmm  Satır sonuna ekler.
echo selam 2>> mmm  Hatalı ise yazar
```

## Dosya içeriklerini görüntüleme

```bash
# Dosyada entere basılışlarınıda gösterir. Herşeyi gösterir.
cat -A dosyaAdi
# Satır numaralarınında gösterir.
cat -n dosyaAdi
# Dosyayı dinlemeye devam eder.
tailf logDosyasiAdi
# Sıkıştırılmış dosya içeriğini gösterir.
zcat  dosya.tar.gz
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

## Dosya Sıkıştırma/Arşivleme ve Çıkarma

```bash
# 1,2 ve de ile başlayan dosyaları arşivler.
tar cf dosya.tar dosya1 dosya2 de*
# xf çıkarır, cf arşivler, czf (gzip) yada cjf (bzip) sıkıştırır. f dosya adı yazılacağını simgeler.
tar xf dosya.tar
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