## PHP FONKSİYONLAR

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


#### array_combine($key,$values)
İki farklı diziyi anahtar değer olarak birleştirmek için kullanılır.

#### array_count_values($arr)
Dizide tekrarlanan elemanların kaç kez tekrarlandığını bulmak için kullanılır.

#### array_filter($arr)
Genellikle dizilerde değerleri boş olan elemanları bulmak ve kaldırmak için kullanılır. Yeni bir değişken oluşturularak yapılır.

#### array_flip($arr)
Anahtarlar ile değerlerin yerini değiştirmeye yarar.

#### array_key_exists('key',$arr)
Dizi içerisinde belirlediğimiz anahtarın olup olmadığını kontrol eder. İç içe dizilerde kullanılamaz. İç içe için aşağıdaki örneğe balınız.

#### array_keys($arr)
Dizinin anahtarlarını listelemek için kullanılır.

#### array_map()
Bir dizi içerisindeki her elemanın değerini alıp ve bir manipülasyon üzerinde oynama yaparak geri döndürür. Örneğin; Değerlerin yüzdesini almak istediğimizde, string değerlerin önüne arkasına gelen işaretleri değiştirmek istediğimizde vb.) Örnek çalışma aşağıdadır.

#### array_merge($arr1,$arr2)
İki diziyi birleştirmek için kullanılır.

#### array_pop($arr)
Dizinin son elemanının değerini alır, diziden çıkartır.

#### array_product($arr)
Dizi elemanlarını  çarpımını bulur.

#### array_push($arr,$new_value)
Dizinin sonuna yeni bir eleman yada elemanlar eklemek için kullanılır.

#### array_rand($arr)
Dizi içerisinden rastgele anahtar getirir.

#### array_reverse($arr)
Dizi elemanlarını tersten yazdırır.

#### array_reverse($wanted,$arr)
Dizide değer aramak için kullanılır. Değer varsa anahtarını geri döndürür. 1. parametre aradığımız değer, 2. parametre dizidir.

#### array_shift($arr)
Dizinin ilk elemanının değerini alır, diziden çıkartır.

#### array_sum($arr)
Dizinin değerlerinin toplamını bulmak için kullanılır.

#### array_unique($arr)
Dizide tekrarlanan elemanları siler.

#### array_unshift($arr,$new_value)
Dizinin başına yeni bir eleman yada elemanlar eklemek için kullanılır.

#### array_values($arr)
Dizideki değerleri alıp başka bir dizi oluşturmamıza yarar. Dizide benzer elemanlar olduğunda array_unique() ile benzerlerden temizlediğimizde kalan elemanların anahtarları karışık olur. İşte bu fonksiyonla temizlenmiş dizi elemanlarını başka bir diziye alır ve anahtarları tekrar oluştururuz. Kısaca anahtarları yeniden sıralamak için kullanabiliriz.

#### arsort($arr)
Dizideki değerlere göre büyükten küçüğe doğru sıralama yapar.

#### asort($arr)
Dizideki değerlere göre küçükten büyüğe doğru sıralama yapar.

#### count($arr)
Bir dizinin kaç tane elemanı olduğunu bulmamızı sağlar.

#### current($arr)
Dizinin ilk elemanını bulmak için kullanılır.

#### end($arr)
Dizinin son elemanını verir.

#### explode(',', $arr)
Parçala. Belirli bir karakterle bir birinden ayrılmış olan ifadeleri, parçalamamıza olanak sağlıyor. Kısaca o metinden istediğimiz yeri alabilmemize yarıyor.

#### extract($arr)
Dizideki anahtarları değişken gibi kullanmamızı sağlar.

#### file_get_contents($web_adres)
Web sayfası kodlarını çeker. Bu fonksiyonu başka bir web sayfasından veri almak için kullanırız.

#### implode(':', $arr)
Birleştir. `explode();` fonksiyonunun tam tersidir. Bir diziyi istediğimiz karakterle birleştirip string ifadeye çeviriyor.

#### in_array($value,$arr)
Dizinde bir değerin olup olmadığını kontrol ederiz. Aşağıda kullanıldı.

#### is_array($variable)
Kontrol fonksiyonudur. İçerisine girdiğimiz değişkenin dizi olup olmadığını gösterir.

#### krsort($arr)
Dizideki anahtarlara göre büyükten küçüğe doğru sıralama yapar.

#### ksort($arr)
Dizideki anahtarlara göre küçükten büyüğe doğru sıralama yapar

#### next($arr)
Dizideki sonraki elemanı bulmak için kullanılır.

#### preg_match_all()
Bu fonksiyon bir dosya içerisinden belirlediğimiz aralıktan istediğimiz veriyi çekebilmemizi sağlar. Düzenli ifadeleri eşleştirmeye yarar. Aşağıdaki örneği inceliyecek olursak; "BAŞLANGIÇ" yazan yere aralığın nereden başlıyacağını ve "BİTİŞ" yazan yere aralığın nerede biteceğini yazarız. Bu aralığa nerede bakacağını $"veri" ile belirtiriz. Bulduğu veriyi de "$sonuç" değişkeni üzerine alır. Gelen veri dizi olacağından anahtar değeri ile beraber ekrana yazdırır.

Not: Başlangıç ve bitiş değerleri içerisinde çift tırnak ya da kesme işaretleri gibi karakterler olursa kaçış karakteri mutlaka kullanın, yoksa hata alırsınız!

```bash
preg_match_all(@BAŞLANGIÇ(.*?)BİTİŞ@si,$veri,$sonuç);
```
Kullanımı; Örnekte ```https://www.cankiripostasi.com/``` sitesinin anasayfasından ```<span>``` etiketleri arasında ne varsa çekilmektedir.

```bash
$haber = file_get_contents("https://www.cankiripostasi.com/");
preg_match_all('@<span>(.*?)</span>@si',$haber, $haber_metni);
# Kontrol
echo "<pre>";
print_r($haber_metni);
echo "</pre>";
```

#### prev($arr)
Dizideki önceki elemanı bulmak için kullanılır.

#### print_r($arr)
Dizi yada objenin okunabilir bir şekilde, insani bir şekilde yapısını gösterir.

#### reset($arr)
Dizideki ilk elemana döner. Başa döner.

#### shuffle($arr)
Diziyi karıştırarak, her bastırdığımızda elemanların sıralamasını değiştirir.

#### strip_tags($html_strings)
Html etiketlerini temizler. ```file_get_contents($web_adres)``` ile çektiğimiz web sayfası html kodlarını temizleyerek sadece ham verinin kalmasını sağlar.

#### unlink()
Dosya silmek için kullanılır. Bir parametre alır; sileceğiniz dosya.
```php
unlink('dizin/dosyaAdi.txt');
```
#### $yenidizi=array_slice($dizi,3,2)
Dizinin belirli bir aralığını seçmek için kullanılır. 3 parametre alır. 1. parametre dizi, 2. parametre kaçıncı elemandan başlayacağı, 3. parametre kaç eleman alacağı.

#### var_dump($arr)
Dizi yada objenin okunabilir bir şekilde, programlama görünümünde yapısını gösterir. Dizi yada objenin okunabilir bir şekilde, programlama görünümünde yapısını gösterir. Örneğin sayısal bir ifadeyi yazı değeri olarak almışsınız farkında değilsiniz ve bunu da toplamaya çalışıyorsunuz. Elbette hata alacaksınız. Hata durumunda ilk önce var_dump() ile değeri kontrol ettirirseniz hatayı kısasürede yakalama şansınız daha yüksek olur.

```php
$string = "Deneme yazısı.";
var_dump($string);
```

