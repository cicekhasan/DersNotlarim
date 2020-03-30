# İPUÇLARI

- [Önsöz](https://github.com/cicekhasan/Linux)


### Kısa Echo Kullanımı

```php
define("BASLIK", "Anasayfa");
# Ekrana yazdırma için aşağıdaki kod yeterlidir
<?=BASLIK?>
```

### Süslü Parantezsiz "if" Kullanımı

```php
function getKontrol() {
	if($_GET['id']==1)
		return "Doğru id";
	else
		return "Yanlış id";
}
echo getKontrol();
```

### Kısa "if" Kullanımı

koşul ? doğruysa yapılacak olan : yanlışsa yapılacak olan;
koşul ? doğruysa yapılacak olan : null;

```php
$deger = 1;

$deger==1 ? print("Değer = 1") : print("Yanlış değer.");
# YA DA
echo $deger==1 ? "Değer = 1" : "Yanlış değer.";
```
### Kullanım Örnekleri

```php
if(true):
	yapılacak;
	yapılacak;
endif;
```

```php
while(true):
	yapılacak;
	yapılacak;
endwhile;
```

```php
foreach($uyeler as $uye):
	yapılacak;
	yapılacak;
endforeach;
```

### <pre></pre> Etiketi

Bu html etiketi arasında ne olursa olsun ekrana gördüğünü basar. Normalde html boşlukları dikkate almaz ve ekranda göstermez, ama ```<pre>``` etiketi ile yazdırdığımızda boşluklarda görülür. Biz bu etiketi daha çok dizilerin ekranda düzgün/anlaşılır görülmesi için kullanıyoruz.

```php
echo "<pre>";
print_r($dizi);
echo "</pre>";
```

Aynı kodun başka yazım şekli;

```php
echo "<pre>",print_r($dizi),"</pre>";
```