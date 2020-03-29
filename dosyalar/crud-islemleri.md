# CRUD İŞLEMLERİ

- [Önsöz](https://github.com/yeniceri1453/Linux)

## Çekme (Select) İşlemi

### Tek satır çekmek
```php
$satir = $vt->query('SELECT * FROM tabloAdi WHERE id = 1')->fetch();
echo $satir['sutunAdi'];
```

### Tüm satırları çekmek
```php
$satirlar = $vt->query('SELECT * FROM tabloAdi')->fetchAll();
foreach($satirlar as $satir) {
    echo $satir['sutunAdi'] .'<br />';
}

# YA DA

foreach($vt->query('SELECT * FROM tabloAdi')->fetchAll() as $satir) {
    echo $satir['sutunAdi'] .'<br />';
}
```

## Ekleme (insert) İşlemi

**1. Yöntem :** 
```php
$yeniEkle = $vt->prepare('INSERT INTO tabloAdi (sutunAdi1,sutunAdi2) VALUES (:degerAdi1,:degerAdi2)');
$sonuc=$yeniEkle->execute
	([
	 ':degerAdi1' => $_POST['input1'],
	 ':degerAdi2' => $_POST['input2']
	]);
# Kontrol
echo ($sonuc==1) ? "Yüklenmiş olması lazım!" : "Yüklenemedi";
```

**2. Yöntem :** Değişken türleri kontrol altında.
```php
$yeniEkle = $vt->prepare('INSERT INTO tabloAdi (sutunAdi1,sutunAdi2) VALUES (:degerAdi1,:degerAdi2)');
$yeniEkle->bindValue(':degerAdi1', $_POST['input1'], PDO::PARAM_STR);
$yeniEkle->bindValue(':degerAdi2', $_POST['input2'], PDO::PARAM_STR);

$sonuc=$yeniEkle->execute();
# Kontrol
echo ($sonuc==1) ? "Yüklenmiş olması lazım!" : "Yüklenemedi";
```


## Silme (delete) İşlemi
```php
$sil = $vt->query("DELETE FROM tabloAdi WHERE id=".$_GET['id']."");
```
