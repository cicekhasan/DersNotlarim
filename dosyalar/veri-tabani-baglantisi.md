# Veritabanı Bağlantısı

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


## Direkt Bağlantı

```php
try {
	$vt = new PDO("mysql:host=localhost;dbname=vtAdi;charset=utf8", "root", "");
	$vt->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Hataları yakalamak için!
} catch ( PDOException $hata ){
	die($hata->getMessage());
}
```

## Değişken Tanımlayarak Bağlantı

```php
$sunucu    = "localhost";
$vtAdi     = "veritabanıAdi";
$kullanici = "root";
$parola    = "parola";

try {
	$vt = new PDO("mysql:host={$sunucu};dbname={$vtAdi};charset=utf8", $kullanici, $parola);
	$vt->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Hataları yakalamak için!
} catch ( PDOException $hata ){
	die($hata->getMessage());
}
```

```php
$dsn       = 'mysql:host=localhost;dbname=veritabaniAdi';
$kullanici = 'kullaniciAdi';
$parola    = 'parola';
 
try {
	$vt = new PDO($dsn, $kullanici, $parola);
} catch (PDOException $hata) {
	echo 'Bağlantı hatası: ' . $hata->getMessage();
}
```