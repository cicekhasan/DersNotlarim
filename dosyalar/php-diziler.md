## PHP DİZİLER

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


Diziler çoklu veri tutmaya yarayan yapılardır. Bu değişkenler aynı türdedir ve tek bir ana değişken içerisinde bulunurlar.

Dizilerin özellikleri;
- `array()` fonksiyonu ile oluşturulur,
- Her elemanının bir indis değeri olur ve bu indislere biz müdahale etmediğimiz sürece indis numarası "0" dan başlar,
- Dizinin boyutu birden fazla olabilir,
- İndisi "string" bir değer olabilir,
- Elemanlarına köşeli parantezler içine indis değeri yazılarak ulaşılır,
- Eleman sayısına "count()" fonksiyonu ile ulaşırız.

Örnek;

#### Dizi Oluşturma

**1. Yol:** Sadece değerleri girerek oluşturmak. İndis numarası otomatik oluşur.

```php
$kimlik = array ("Hasan", "Çiçek", "Eğitmen", "50");
# ya da...
$kimlik = ["Hasan", "Çiçek", "Eğitmen", "50"];
```

**2. Yol:** İndis numarasını girerek oluşturmak.

```php
$kimlik = array (
  [0] => "Hasan",
  [1] => "Çiçek",
  [2] => "Eğitmen",
  [3] => "50"
);
```

**3. Yol:** İndislerini kendimiz vererek oluşturabiliriz. Bu veri çekerken hatırlanabilir olur.

```php
$kimlik = array (
  'ad'      => "Hasan",
  'soyad'   => "Çiçek",
  'meslek'  => "Eğitmen",
  'yas'     => "50"
);
```

#### İç İçe Dizi Oluşturmak;

2 boyutlu dizi...

```php
$depo = array(
  "manav"     => array(
    "sebzeler" => array(
      "fasulye" => 250,
      "prasa" => 50,
      "biber" => 100,
      "domates" => 150
    ),
    "meyveler" => array("elma",
      "armut"    => 50,
      "üzüm"     => 30,
      "portakal" => 60
    )
  ),
  "kirtasiye" => array(
    "kitaplar" => array(
      "Alis Harikalar Diyarında" => 15,
      "Robinson Crouse"          => 10,
      "Nutuk"                    => 5,
      "Dinimi Öğreniyorum"       =>20
    ),
    "kalemler" => array(
      "Kurşun Kalem"   => array(
        "Kırmızı" => 300,
        "Kurşun"  => 500
      ),
      "Tükenmez Kalem" => array(
        "Kırmızı" => 600,
        "Mavi"    => 600
      ),
      "Gazlı Kalem"    => array(
        "Kırmızı"  => 250,
        "Mavi"     => 330,
        "Yeşil"    => 330,
        "Lacivert" => 330,
        "Mor"      => 330,
        "Siyah"    => 330
      )
    ),
    "boyalar"  => array(
      "Kuru Boya"   => 50,
      "Pastel Boya" => 30
    )
  ),
  "kasap"     => array(    
    "kirmiziEt" => array(
      "Kuzu Eti" => 525,
      "Dana Eti" => 525
    ),
    "beyzaEt"   => array(
      "Tavuk Eti" => 525,
      "Hindi Eti" => 525
    ),
  )
);
```

#### Dizileri görmek;
```php
print_r($kimlik);
// ya da okunaklı görünmesi için...
echo "<pre>";
print_r($kimlik);
echo "</pre>";
// ya da okunaklı görünmesi için...
var_dump($kimlik);
```

#### Örnekler...

```php
# Dizi içerisinden bir elemanı görmek
echo $kimlik['meslek'];
# Eleman sayısını öğrenmek...
echo count($kimlik);
```
