## PHP OPERATÖRLER

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


#### Aritmatik Operatörler

Matematik işlemleri için kullanılırlar. Aşağıdaki tabloda operatörler görülmektedir.

| Operatör | Açıklama |
|----|----|
| \* | Çarpma operatörü. |
| \/ | Bölme operatörü. |
| \+ | Toplama operatörü |
| \- | Çıkarma operatörü. |
| \% | Mod (Kalan) |

Örnek Operatör İşlemleri;
```php
<?php
    $a = 15;
    $b = 5;
    $c = 4;

  //Çarpma işlemine örnek.
  echo  $a * $b ."<br>";  // Ekran çıktısı 75 dir.
  //Bölme işlemine örnek.
  echo  $a / $b ."<br>";  // Ekran çıktısı 3 dür.
  //Toplama işlemine örnek.
  echo  $a + $b ."<br>";  // Ekran çıktısı 20 dir.
  //Çıkarma işlemine örnek.
  echo  $a - $b ."<br>";  // Ekran çıktısı 10 dur.
  //Mod(Kalan) işlemine örnek.
  echo  $a % $c;  // Ekran çıktısı kalan 3 dür.
?>
```

Yalnız, matematiksel operatörleri kullanırken işlem sırasına(önceliğine) dikkat etmek gerekmektedir.

###### İşlem Önceliği

- Üs alma işlemleri
- Parantez içindeki işlemler
- Çarpma veya Bölme İşlemi
- Toplama veya Çıkarma İşlemi

*Önemli Not: Eğer aynı önceliğe sahip işlemler varsa (Örneğin bir işlemde hem çarpma hem de bölme varsa) işlemler soldan sağa doğru yapılır.*


#### Atama Operatörleri

| Operatör | Açıklama |
| ---- | ---- |
| \= | Değer atama operatörü.|
| \+= | Artırarak değer atama operatörü. |
| \-= | Azaltarak değer atama operatörü. |
| \/= | Bölerek değer atama operatörü. |
| \* | Çarparak değer atama operatörü.|
| \% | Kalanını bularak (Modunu alarak) değer atama operatörü.|
| \. | Birleştirme operatörü.|
| \.= | Birleştirerek değer atama operatörü.|



#### Artırma ve Azaltma Operatörleri

| Operatör | Açıklama |
|----|----|
| \$a++ | Artırma operatörü. |
| \++$a | Artırma operatörü. |
| \$a-- | Azaltma operatörü |
| \--$a | Azaltma operatörü. |



#### Karşılaştırma Operatörleri

| Operatör | Açıklama |
|----|----|
| \== | Eşittir. |
| === | Aynıdır, Denkse. |
| \!= | Eşit değildir. |
| \<> | Eşit değildir. |
| \!== | Farklıdır. |
| \< | Küçüktür. |
| \> | Büyüktür. |
| \<= | Küçük yada eşittir. |
| \>= | Büyük yada eşittir. |
| <=> | Mekik (Php 7 ve üstü).|

*İpucu 1: Sonuçlar true(1) yada false(0) döner.*

*İpucu 2: Denkse de değişkenlerin hem değerleri hem de türleri eşit olacak.*

#### Mantıksal Operatörler

| Operatör | Açıklama ||
|----|----|----|
| \&& | AND - ve | 1.Koşul ve 2.Koşul doğru ise |
| \!= | OR - yada | 1. Koşul yada 2.Koşul doğru ise |
| \! | Değilse | Koşul doğru değilse |

*İpucu : Sonuçlar true(1) yada false(0) döner.*  
