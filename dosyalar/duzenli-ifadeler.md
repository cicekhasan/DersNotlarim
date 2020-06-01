## DÜZENLİ İFADELER

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


Düzenli ifadeleri deneme siteleri:

- [regex101.com](https://regex101.com/)
- [www.phpliveregex.com](https://www.phpliveregex.com/)

#### DÜZENLİ İFADE KURALLARI

| DESEN     | AÇIKLAMA                                                                                                                      |
| ---       | ---                                                                                                                           |
| +         | Dahil                                                                                                                         |
| ^         | Hariç                                                                                                                         |
| ^         | Başlangıç karakteri                                                                                                           |
| $         | Son karakter                                                                                                                  |
| [abc]+    | a,b ya da c harfleri ile eşleştir.                                                                                            |
| [^abc]+   | a,b ya da c harfleri hariç diğer karekterlerle eşleştir.                                                                      |
| [a-z]+    | a'dan z'ye kadar harfler ile eşleştir. a-z ifadesinde türkçe karakterleri de istersek a-zçişöüğÖÜ şeklinde eklememiz gerekir. |
| [^a-z]+   | a'dan z'ye kadar olan harfler hariç eşleştir.                                                                                 |
| [a-zA-Z]+ | a'dan z'ye kadar olan küçük büyük farketmez eşleştir.                                                                         |
| .+        | Satır başı karakterleri hariç her hangi bir karakterle eşleşir. Satır başında eşleşmesini isterseniz /s flagı kullanılabilir. |
| \s        | Boşluk ya da tab karakteri ile eşleşir.                                                                                       |
| \S        | Boşluk ya da tab karakterleri hariç diğerleri ile eşleşir.                                                                    |
| \d        | Her hangi bir sayı ile eşleşir.                                                                                               |
| \D        | Sayı hariç diğerleri ile eşleşir.                                                                                             |
| \w+       | Harf, sayı ve alt çizgi karakterleriyle eşleşir.                                                                              |
| \W+       | Harf, sayı ve alt çizgi karakterleri hariç eşleşir.                                                                           |
| (da)      | Parantez içerisinde yazan kelimeler eşleşir.                                                                                  |
| (a|b)     | a veya b ile eşleşir.                                                                                                         |
|  a?       | ? işaretinden önceki karakter, yani a olsada olur olmasa da.                                                                  |
| a*        | * karakterinden önce belirtilen karakter varsa kaç tane olduğu fark etmeden eşleşir. Olmayadabilir.                           |
| a+        | + sembolünden önce belirtilen karakter en az bir karakter olmalı. Birden fazla varsa yine de eşleşir.                         |
| a{3}      | {} içinde kaç yazılmış ise önceki karakterden o kadarla eşleşeni bulur. Örneğe göre; 3 tane a olanla eşleiecektir.            |
| a{3,}     | {} sembollerinden önceki karakterden 3 ya da daha fazlası var ise eşleşir.                                                    |
| a{2,4}    | {} sembollerinden önceki karakterden 2 ile 4 arasında olan var ise eşleşir.                                                   |
| ^a        | İfade a ile başlıyorsa eşleşir.                                                                                               |
| a$        | İfade a ile biterse eşleşir.                                                                                                  |
| n\b       | n ile biten her kelime ile eşleşir.                                                                                           |
| n\B       | n ile bitmeyen fakat içerisinde n geçen kelimelerle eşleşir.                                                                  |

#### MODİFİER

| Niteleyici | Açıklama                                                                                                                      |
| ---        | ---                                                                                                                           |
| /g         | İlk eşleşmeden sonra eşleşmeyi devam ettirir.                                                                                 |
| /i         | Büyük küçük harf duyarlılığını kaldırır.                                                                                      |
| /s         | Çoklu satırlarda filtreleme yapmak için kullanılır.                                                                           |


Örnek: E-posta geçerli bir e-posta mı?

```php
<?php
$ePosta = 'hasancicek@yandex.com.tr';
$desen  = '/^\w+@[a-z]+\.[a-z]{2,}(.[a-z]{2}|)$/';
$sonuc  = preg_match($desen, $ePosta);

if ($sonuc) {
  echo "E-Posta geçerlidir...";
}else{
  echo "E-Posta geçerli değildir!";
}
?>
```

Açıklaması:

1. Baştaki ve sondaki ```/``` karakteri sınırlayıcı karakterdir,
2. Sadece ```^\w+``` sayı,harf ve alt çizgi( _ ) karakterleri ile başlar ve kullanılabilir,
3. @ ,şareti olacak,
4. ```[a-z]+``` en az bir, sadece harf olacak,
5. ``` . ``` olacak,
6. ```[a-z]{2,}``` en az 2, sadece harf olacak,
7. (.tr kısmı!) ```(.[a-z]{2}|)$``` en az 2, harf olacak. Nokta ile başlayacak. Burası olada bilir, olmayabilir de!
