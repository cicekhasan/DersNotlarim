## OPP Sayfa Yapısı

```sh
projeAdi/
	class/
		Config.php........// Sınıflarımızı oluşturacağımız dosya.
		Cookie.php........//
		DB.php............// Bağlantılarımızın olduğu dosya.
		Hash.php..........//
		Input.php.........//
		Kullanici.php.....// Kullanıcı metotlarının (fonksiyonları) saklanacağı dosya.
		Onaylama.php......// Onaylama işlemlerinin yapılacağı dosya. Örneğin şifre yanlış gibi.
		Session.php.......// Sessionların saklanacağı dosya.
		Token.php.........//
		Yonlendir.php.....// 
	core/ 
		init.php..........// Başlangıç değişkenlerinin tanımlandığı ve dDosyaların birbirine bağlandığı çekirdek dosya.
	fonksiyon/
		filtre.php........// Sql injection için filitreleme dosyası.
	include/
		hatalar/..........//
			404.php.........// Kulanıcıya göstereceğimiz hatalar dosyası.
	cikis.php...........// Çıkış yapacağımız sayfa.
	giris.php...........// Giriş sayfamız.
	guncelle.php........// Güncellemelerin yapılacagı dosya.
	index.php...........// Ana sayfamız.
	profil.php..........// Profilimizin olduğu sayfa.
	sifre_degistir.php..// Şifre değiştirme sayfası.
	uye_ol.php..........// Üye olma sayfası.
```