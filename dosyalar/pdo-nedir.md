# PDO NEDİR?

Pdo bir veritabanı sınıfıdır! Php'nin kendisiyle beraber gelen bir yapıdır. 

Pdo güvenlik riskerine (sql injection) karşı doğal bir koruma sağlamakta olup, mysql dışında ki veritabanlarına da kolayca bağlanılabilmektedir.

## Sınıflarda Erişim Belirleyiciler

Sınıflar oluşturulduğunda tek başlarına bir şeyifade etmez. Sınıfların içerisinde mutlaka bir metod ya da özellik vardır. Fonksiyonel programlamada her hangi bir fonksiyona ulaşmak istediğimizde fonksiyon adını ve gerekli parametreleri yazmak yeterli olduğu halde, sınıf içerisindeki fonksiyonlara/metodlara doğrudan erişim yoktur. İşte bu aşamada yani bir sınıf içerisinde ki metodlara ulaşmak için erişim belirleyiciler kullanılır. Erişim belirleyiciler metod ve özelliklere erişme biçimini belirler. Erişim belirleyiciler üç adettir. Bunlar;

1. Public    (Açık)
2. Private   (Gizli)
3. Protected (Özel)

