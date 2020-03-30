# TERMİNALDEN METİN İŞLEME

Öncesinde veri dosyamızı her yerden kullanabilmek adına bir değişkene atıyalım. Dosyamızın adı "tablo" olsun! Dosya içeriği aşağıda kod kullanımları sırasında verilmiştir.

```bash
# Değişken tanımama
tablo="/var/www/html/yeni/veriler.txt" 
# Kontrol
echo $tablo 
# Ekran çıktısı 
/var/www/html/yeni/veriler.txt
```

- set : Açık oturumdaki değişkenleri listelemek.
- unset : Değişkeni iptal eder.

## HEAD

İlk 10 satırı gösterir. Verilerin ilk satırında başlık olup olmadığını kontrol etmek amacı ile kullanabiliriz.

```bash
# İlk 10 satır için
head $tablo
# İlk 5 satır için
head -n 5 $tablo
```

## TAIL

Son 10 satırı gösterir.

```bash
# Son 10 satır için
tail $tablo
# Son 5 satır için
tail -n 5 $tablo
# Başlık olmadan listeler (2. satırdan başlar.)
tail -n+2 $tablo
```

## DATAMASH

```bash
sudo apt-get install datamash
```

Komut satırı aracılığıyla aktardığımız dosya üzerinden basit hesaplama (count, sum, min, max, mean, stdev, string coalescing gibi) işlemleri gerçekleştirebileceğimiz bir program. İşliyeceğiniz veriler tab ile ayrılmış olması gerekmektedir. 

- --header-in : İlk satırın başlık olduğunu belirtmek,
- --header-out : Başlıksız verilere başlık ekler,
- -H : Başlıklarla beraber döndürür,
- -st: Delimiter. Ayırıcı karakter belirlemek için kullanılır.


Datamash en yalın haliyle şu şekilde kullanılır;

```bash
seq 10 | datamash sum 1 mean 1
```

**Örnek dosya içeriği;** İçeriği tablo.txt adında kaydedin.

```bash
id	plaka	ilAdi	ilceAdı	mahalle	koy
1	18	Çankırı	Atkaracalar	11	8
2	18	Çankırı	Bayramören	3	27
3	18	Çankırı	Çerkeş	14	49
4	18	Çankırı	Eldivan	6	16
5	18	Çankırı	Ilgaz	9	75
6	18	Çankırı	Kızılırmak	3	26
7	18	Çankırı	Korgun	4	12
8	18	Çankırı	Kurşunlu	11	27
9	18	Çankırı	Merkez	14	50
10	18	Çankırı	Orta	8	25
11	18	Çankırı	Şabanözü	7	18
12	18	Çankırı	Yapraklı	6	38
```

**Örnek parasal dosya içeriği;** Aynı evde yaşayan üç arşadaşın aylık kazançlarını ortak olarak harcadıklarını düşünelim. Kişi başı ne kadar para düşer.

```bash
id	adi	soyadi	aylik
1	Hasan 	Çiçek	5300
2	Ahmet 	Çelik	3000
3	Kemal	Karaca	4500
```

Tablo üzerinden datamash çalışmaları;

```bash
# Verileri kontrol etmek
datamash check < $tablo # Çıktı: 13 lines, 6 fields 
# Başka veri kontrol şekli
cat $tablo | datamash check
```
***Uyarı: Datamash komutunu kullanırken dikkatli olup, önce dosyayı CAT ile çağırıp sonra işlem yapın. Alttaki örnekte olduğu gibi direkt kullanırken < yerine > yaparsanız verileriniz gider!*** 

Arkadaşların kişi başına düşen geliri: Aşağıdaki kod sonucunda sum 4. sütunun toplamını mena ise toplamın satır sayısına bölümünü verir. Yani 12800 liralık geliri 3'e bölünce 4266,6666666667 çıkar.

```bash
# Aman < işaretine dikkat!
datamash -H sum 4 mean 4 --header-in < $tablo
# Çıktısı
sum(aylik)	mean(aylik)
12800	4266,6666666667
```

**Eğer veri "virgül" ile ayrılmış olsaydı;** Sed ile "virgülleri" leri "nokta" ile değiştiriyoruz.

**Örnek dosya içeriği**

```bash
id	adi	soyadi	aylik
1	Hasan 	Çiçek	5300,50
2	Ahmet 	Çelik	3000,76
3	Kemal	Karaca	4500,19
```

```bash
cat $tablo | sed '/[0-9]\./s/\,/./g' | datamash -H --header-in sum 4 mean 4 
# Sonuç çıktısı
sum(aylik)	mean(aylik)
12801,45	4267,15
```

**Karışık örnek veri;** Aşağıdaki veride sütun yok "noktalı virgül" ile ayırmışlar güya! Bu veriyi aşağıdaki kodlarda da kullanacağız.

```bash
siparisTarihi;sehir;temsilci;malinCinsi;birimler;maliyet;toplam
1.6.19;Ankara;Hasan;Kalem;95;1.99;189.05
1.23.19;Ankara;Hasan;Kalemlik;50;19.99;999.50
2.9.19;İstanbul;Faruk;Defter;36;4.99;179.64
2.26.19;Kayseri;Necati;Kalemlik;27;19.99;539.73
3.15.19;Samsun;Recep;Cetvel;56;2.99;167.44
4.1.19;Kayseri;Necati;Defter;60;4.99;299.40
4.19.19;Samsun;Recep;Kalem;75;1.99;149.25
5.5.19;Kayseri;Necati;Defter;90;4.99;449.10
6.6.19;Samsun;Recep;DefterX;95;5.99;569.05
6.13.19;İstanbul;Faruk;Kalem;50;1.99;99.50
7.19.19;Samsun;Recep;Defter;96;4.99;479.64
7.6.19;Samsun;Recep;DefterXX;27;9.99;269.73
7.5.19;İstanbul;Faruk;Kalemtraş;56;3.99;223.44
8.13.19;Samsun;Recep;Çanta;60;49.99;2999.40
9.28.19;Kayseri;Necati;Kitap;75;12.99;974.25
9.25.19;Samsun;Recep;Defter;20;4.99;99.8
```

```bash
cat $tablo | sed '/[0-9]\./s/\,/./g'| datamash -st ';' -H --header-in sum 5 mean 5
# Sonuç çıktısı
sum(birimler);mean(birimler)
968;60,5
```

Açıklaması: Sed ile virgüller noktaya çevrildi, -st ile satırlar noktali virgüle göre sütunlara bölündü ve 5. sütun toplandı ve satır sayısına göre ortalaması alındı.

**Aynı verilerde pivot işlemine bakalım;**

```bash
sed '/[0-9]\./s/\,/./g' $tablo | datamash -st ';' -H --header-in crosstab 2,4 sum 5
# Sonuç çıktısı
GroupBy(Region);GroupBy(Item);sum(Units)
;Binder;Pen;Pencil
Central;50;27;201
East;60;N/A;95
West;N/A;N/A;56
# Normal ekran çıktısı
GroupBy(sehir);GroupBy(malinCinsi);sum(birimler)
;Cetvel;Defter;DefterX;DefterXX;Kalem;Kalemlik;Kalemtraş;Kitap;Çanta
Ankara;N/A;N/A;N/A;N/A;95;50;N/A;N/A;N/A
Kayseri;N/A;150;N/A;N/A;N/A;27;N/A;75;N/A
Samsun;56;116;95;27;75;N/A;N/A;N/A;60
İstanbul;N/A;36;N/A;N/A;50;N/A;56;N/A;N/A
# Bir şey anlamadınız değil mi?
# Biraz düzeltince bakın: hangi şehirde hangi maldan kaç birim satılmış...
# N/A lar o şehirde o malzemeden satılmamış demek...
GroupBy(sehir);GroupBy(malinCinsi);sum(birimler)
        ;Cetvel;Defter;DefterX;DefterXX;Kalem;Kalemlik;Kalemtraş;Kitap;Çanta
Ankara  ;N/A   ;N/A   ;N/A    ;N/A     ;95   ;50      ;N/A      ;N/A  ;N/A
Kayseri ;N/A   ;150   ;N/A    ;N/A     ;N/A  ;27      ;N/A      ;75   ;N/A
Samsun  ;56    ;116   ;95     ;27      ;75   ;N/A     ;N/A      ;N/A  ;60
İstanbul;N/A   ;36    ;N/A    ;N/A     ;50   ;N/A     ;56       ;N/A  ;N/A
```

**Başlık ekleme;**

Tablonun başlığını silip kodu deneyin.

```bash
cat $tablo | sed '/[0-9]\./s/\,/./g'| datamash -st ';' --header-out sum 5 mean 5 
```

Kaynak : https://www.gnu.org/software/datamash/examples/

Kaynak : https://manpages.debian.org/testing/datamash/datamash.1.en.html 

## AWK

Örüntü temelli tarama ve işleme dilidir. Komut kullanımının dışında kapsamlı işlemler yapmanızı mümkün kılan bir dil olma özelliğine sahiptir. Awk komutu ile sütun olarak ifade edebileceğimiz ayrılmış alanları (space, tab space, noktalı virgül, virgül, pipe vb.) değişkenler olarak sıralı bir şekilde edinebilmekteyiz.

- -F: Delimiter. Ayırıcı karakter belirlemek için kullanılır.

**Kullanacağımız örnek veriler:**

```bash
siparisTarihi;sehir;temsilci;malinCinsi;birimler;birimMaliyet;toplam
1.6.19 ;Ankara;Hasan;Kalem;95;1.99;189.05
1.23.19;Ankara;Hasan;Kalemlik;50;19.99;999.50
2.9.19 ;İstanbul;Faruk;Defter;36;4.99;179.64
2.26.19;Kayseri;Necati;Kalemlik;27;19.99;539.73
3.15.19;Samsun;Recep;Cetvel;56;2.99;167.44
4.1.19 ;Kayseri;Necati;Defter;60;4.99;299.40
4.19.19;Samsun;Recep;Kalem;75;1.99;149.25
5.5.19 ;Kayseri;Necati;Defter;90;4.99;449.10
6.6.19 ;Samsun;Recep;DefterX;95;5.99;569.05
6.13.19;İstanbul;Faruk;Kalem;50;1.99;99.50
7.19.19;Samsun;Recep;Defter;96;4.99;479.64
7.6.19 ;Samsun;Recep;DefterXX;27;9.99;269.73
7.5.19 ;İstanbul;Faruk;Kalemtraş;56;3.99;223.44
8.13.19;Samsun;Recep;Çanta;60;49.99;2999.40
9.28.19;Kayseri;Necati;Kitap;75;12.99;974.25
9.25.19;Samsun;Recep;Defter;20;4.99;99.8
```

#### İlk satır (başlık) olmadan verileri çekmek

```bash
awk '{if(NR>1)print}' $tablo
awk '{if(NR!=1)print}' $tablo
awk '{if(NR==1){next}print}' $tablo 
```
#### Random veri almak

```bash
head -$((${RANDOM} % `wc -l < $tablo` + 10)) $tablo | tail -10
```
#### Satır sayısı elde etmek

```bash
wc -l < $tablo
# ya da
awk 'END{print NR}' $tablo
```
#### Sütun sayısını öğrenmek

Aşağıdaki komut yukarıdaki tablomuzun sütun sayısının 7 olduğu sonucunu verecektir. -F burada sütunları noktalı virgül (;) ile ayırdığımızı ifade eder.

```bash
awk -F';' '{print NF; exit}' $tablo 
```

#### Sütunları görmek

```bash
# Bütün sütunları getirmek
# Buradaki $n bütün sütunları getirir
awk -F';' '{print $n}' $tablo
# Yalnızca 1. sütunu getirmek
awk -F';' '{print $1}' $tablo
# Yalnızca 3. sütundaki isimleri getirmek
awk -F';' '{print $3}' $tablo
# 3. sütundaki ilk 5 ismi çekelim
# NR!=1 başlığı kaldırır
# head -n 5 ise ilk 5satırı getirir
awk -F';' 'NR!=1 { print $3 }' $tablo | head -n 5
```

#### Delimiter parametrelerini değiştirme

Satış tablomuzdan sehir, temsilci, malinCinsi, birimler sütunlarını çekip aralarını pipe (|) ile bölelim. Burada 2,3,4 ve 5. sütunları çekip aralarındaki "noktalı virgül" yerine dikey çizgi işaretini ekliyeceğiz. Bu komutu noktaları (.) virgül (,) olarak değiştirmek için de kullanabiliriz.

- FS = Veride şu an kullanılan ayracı ifade eder.
- OFS = Yerine geçmesini istediğimiz ayracı ifade eder.
- FIELDWIDTHS = Belirttiğimiz karakter sayısı kadar veri verir.

```bash
awk 'BEGIN{FS=";"; OFS="|"} {print $2,$3,$4,$5}' $tablo
# Ekran çıktısı
sehir|temsilci|malinCinsi|birimler
Ankara|Hasan|Kalem|95
Ankara|Hasan|Kalemlik|50
İstanbul|Faruk|Defter|36
Kayseri|Necati|Kalemlik|27
Samsun|Recep|Cetvel|56
Kayseri|Necati|Defter|60
Samsun|Recep|Kalem|75
Kayseri|Necati|Defter|90
Samsun|Recep|DefterX|95
İstanbul|Faruk|Kalem|50
Samsun|Recep|Defter|96
Samsun|Recep|DefterXX|27
İstanbul|Faruk|Kalemtraş|56
Samsun|Recep|Çanta|60
Kayseri|Necati|Kitap|75
Samsun|Recep|Defter|20
# Başlığı hariç tutarak
awk 'BEGIN{FS=";"; OFS="|"} 'NR==1' {next} {print  $2,$3,$4,$5}' $tablo
# -F ayraç. 2 ve 4 üncü sütunun 4 er karakterini, 3 üncü sütunun 2 karakterini getirir
awk  -F';' 'BEGIN{FIELDWIDTHS="4 2 4"} 'NR==1' {next} {print $2,$3,$4}' $tablo
```

## NAWK

Gelecek...

## GAWK

Gelecek...

## SED 

Listeleme, işaretleme, sorgulama, örüntülerle metin işlemleri gerçekleştirme gibi özelliklere sahiptir. grep komutuyla benzer şekilde özel karakterleri ```([] . * ^ $ ve \)``` sed ile de kullanabiliriz. sed komutuyla sağlanan değişiklikler aksi ifade edilmediği sürece orjinal dosya üzerinde herhangi bir değişikliğe neden olmaz.

| Parametre | Açıklama |
| ---- | ---- |
| a\ | Aktif satır altına ekleme yapar. |
| c\ | Aktif satırı verilen kelime/cümle ile değiştirir. |
| d | Yazıyı sil. |
| i\ |Aktif satırın yukarısına ekleme yap. |
| p | Yazıyı dök. |
| r | Dosyayı oku. |
| s | Bul ve değiştir. |
| w | Dosyaya yaz. |

| Opsiyon | Açıklama |
| ---- | ---- |
| -e script | Birden fazla sed opsiyonu tanımla. |
| -f | Sed komutlarının olduğu bir bash script dosyasını çalıştır. |

```bash
# İlk satırı almaz. Başlıksız çıktı verir
sed 1,1d $tablo
# ya da
sed -n '1!p' $tablo
# 7 ile başlayan satırları gösterme
sed '/^7.*/d' $tablo
```


## EK BİLGİLER

```bash
# Veri kaç satırdan oluşuyor
cat $tablo | wc -l 
```