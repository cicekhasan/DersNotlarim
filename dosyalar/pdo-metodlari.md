# PDO METODLARI

- [Önsöz](https://github.com/yeniceri1453/Linux)


## Exec Metodu

Exec Metodu SQL sorgusu çalıştırır ve etkilenen satır sayısını döndürür. **İnsert, update ve delete işlemleri gibi sonuç almayı beklediğimiz sorgularda kullanılır.**

```php
$sonuc = $db->exec(INSERT INTO rehber(adSoy,telefon) VALUES ('Hasan Çiçek', '03124443322'));
echo $sonuc .' satır eklendi ';
```

## Query Metodu

Query Metodu SQL sorgusu çalıştırıp tablodaki veri sonuçlarını bir dizi değişken olarak döndürür. İkinci parametresi sonuç döndürme biçimidir. **Select gibi her hangi bir etki yapmadan sadece görüntülemek için kullanılan sorguda kullanılır.**

Sonuçların Elde Edilme Biçimleri;

| # | Açıklama |
| ---- | ---- |
| PDO::FETCH_ASSOC | Sütun isimlerine göre indisli bir dizi döner. |
| PDO::FETCH_BOTH  | Bu varsayılandır. Hem sütun isimlerine hem de sütun numaralarına göre indislenmiş bir dizi döner. İlk indis 0’dır. |
| PDO::FETCH_BOUND | Sütun değerlerini "bindColumn()"" ile ilişkilendirip PHP değişkenlerine atar ve "TRUE" döndürür. |
| PDO::FETCH_INTO  | Bir sınıfın örneğini sütun isimlerini sınıf özelliklerine eşleyerek günceller. |
| PDO::FETCH_LAZY  | PDO::FETCH_BOTH ve PDO::FETCH_OBJ sabitlerinin birleşimidir. |
| PDO::FETCH_NUM   | Sütun numaralarına göre bir dizi döner. İlk indis 0’dır. |
| PDO::FETCH_OBJ   | Bir sınıfın metotları bir anonim nesne örneği döndürür. |


```php
$sonuc = $db->query("SELECT * FROM rehber",PDO::FETCH_NUM);
foreach ($sonuc as $row){
     echo $row[1]; // Bir sütunun sıra numarasını yazdık
}
```
ya da 

```php
$veri = $db->query("SELECT * FROM rehber")->FetchAll(PDO::FETCH_ASSOC);
foreach($veri as $satir){
     echo $satir["adSoy"]. " isimli kişi <br />";
}
```