## GÜNCELLEME, KURMA VE KALDIRMA İŞLEMLERİ

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


Linux işletim sistemini kullanacaksak mutlaka bilmemiz gerekenler arasında; sistemi güncelleme, program kurma ve kurulu programları kaldırma gibi işlemleri yerine getirmek vardır.

### Sistemi Güncelleme

Linux sistemleri, kullanıcının ihtiyacı olduğunda, programa kolayca ulaşabilmesini sağlayacak program paketlerini içinde bulunduran kendi paket depolarına(repository) sahiptirler. Farklı Linux dağıtımları için bu paketler de farklılık gösterebiliyor. Bu yüzden farklı Linux dağıtımlarının da kendi paketleri üzerinde işlem yapabilmek için farklı komutları vardır.

Dağıtımlar ve kullanılan paketlere göre komutları aşağıdaki tabloda verilmiştir.

| Dağıtım | Paketler | Komutlar |
|---|---|---|
| Debian | .deb | apt, apt-cache, apt-get, dpkg | 
| Ubuntu | .deb | apt, apt-cache, apt-get, dpkg | 
| CentOs | .rpm | yum | 
| Fedora | .rpm | dnf | 
| FreeBSD | .txz | make, pkg | 

#### ```update``` Komutu

Komut sources.list dosyasına eklemiş olduğumuz repolara bakarak paket listelerini kontrol edip paketlerin son sürümleri ve bağımlılıkları hakkında bilgi almak için bunları “günceller”. Yani bu komutumuz; güncelleme işleminden önce, nelerin güncellenmesi gerektiğine bakarak sistemimizdeki sürümünden yüksek sürümleri bulunan yani güncellenmesi gereken doğru paketlerin güncellenmesini sağlıyor. Kısaca bu komutumuzun amacı sadece depolarda yer alan yenilikleri kontrol etmektir.

```bash
sudo apt-get update
```

#### ```upgrade``` Komutu

```sudo apt-get update``` komutunun depolardan kontrol edip bildirmiş olduğu güncellenmesi gereken paketleri en son versiyonlarına günceller.

```bash
sudo apt-get upgrade
```

#### ```dist-upgrade``` Komutu

```sudo apt-get upgrade``` komutundan farklı olarak sadece güncelleme yapmakla kalmaz, sistemimizdeki gereksiz paketleri de siler.

```bash
sudo apt-get dist-upgrade
```

#### ```clean``` Komutu

Kurmak üzere indirmiş olduğumuz paketlerin hepsini silebiliyoruz. Depodan indirmiş olduğumuz tüm paketler ve uygulamanın çalışması için gereken bağımlılıklar .deb uzantısı ile arşivlenerek /var/cache/apt/archives dizini içerisinde daha sonra tekrar kullanılma ihtimaline karşı tutuluyorlar. İşte bizler de apt-get clean komutu yardımıyla eğer internet bağlantımızda sorun yoksa yani bu paketleri tekrar indirirken sorun yaşamayacaksak bu paketleri silerek sistemimizde yer işgal etmelerini önlemiş oluyoruz.

```bash
sudo apt-get clean
```

#### ```autoclean``` Komutu

```apt-get clean``` komutuyla benzer şekilde arşivlenmiş paketleri silme işlemini yapar. Fakat burada silinen arşivler bütün arşiv paketleri değil sadece eski sürüm olup artık kullanımda olmayan ve depolardan kaldırılmış paketlerdir.

```bash
sudo apt autoclean
```

#### ```autoremove``` Komutu

Komutu ise silmiş olduğumuz uygulamadan geriye kalan ve artık ihtiyaç duyulmayan bağımlılıkları kaldırmamızı sağlıyor.

```bash
sudo apt autoremove -y
```

### Program Kurmak

Linux’ta program kurmak için birden fazla yöntem bulunuyor. Bunlardan bir tanesi kullandığımız dağıtıma uygun programı, paket yönetim sistemi ile kurmaktır. Diğer bir yol, programı kaynak koddan derleyerek kurmaktır. Diğer seçenek ise dağıtımın kullandığı depolardan(repository) otomatik kurulum yapmaktır.

### Depodan Kurulum

Depoda bulunan programların kurulumlarını yaparken ```apt-get install programAdi``` komut bütünü kullanılıyor. Unutmayın depodan(repository) kurulum yaparken sisteminizin güncel olması önemlidir. Şayet sisteminizi güncel tutmuyorsanız yani repolarınız güncel değilse depodan program yükleme çabalarınız hüsranla sonuçlanabilir.

Ancak programın yüklenmeme sebebi bir tek güncelleme işlemi ile ilgili değil. Şayet yüklemek istediğimiz program depolarda yer almıyorsa depodan yükleme işlemimiz de haliyle başarısız olacaktır.

Bu yüzden öncelikle kurmak istediğimiz program depolarda yer alıyor mu ona bakalım. Ben örnek olması açısından depolarda filezilla aracını araştırıyorum eğer depolarda varsa kurulum yapabiliriz. Depoları kontrol etmek üzere konsola ```apt-cache search filezilla``` şeklinde komutumu vererek filezilla aracını depolarda var mı diye kontrol ediyorum.

```bash
# Program depolarda varmı arama...
sudo apt-cache search programAdi
# Programı kurma...
sudo apt-get install programAdi -y
# Programı silme/kaldırma...
sudo apt-get remove programAdi -y
# Yapılandırma dosyaları ile birlikte programı kaldırmak 1...
sudo apt-get --purge remove programAdi -y
# Yapılandırma dosyaları ile birlikte programı kaldırmak 2...
sudo apt-get purge programAdi -y
```

### Paket Yönetim Sistemi İle Kurulum

Bu işlem için kullandığımız dağıtıma uygun derleyiciyi kullanmalıyız. Ubuntu .deb uzantılı paketleme sistemi kullanmaktadır. Bu yüzden .deb uzantılı kurulum paketlerini açmak için dpkg komutunu kullanıyoruz. Sanırım kodun kısaltmasının nereden geldiğini bilirsek daha kolay akılda kalabilir. Kodun kısaltması "debian package(debian paketi)" kısaltmasından gelmektedir. Ayrıca dpkg komutunu kullanmadan yardımcı bir paket yöneticisi programı(synaptic) kullanarak da kurulum işlemlerini yerine getirebiliriz. 

```bash
# Paket kurma...
dpkg -i paketAdi.deb
# Paket kaldırma...
dpkg -r programAdi
# Paket kaldırma. /etc dizini altındaki konfigürasyon dosyaları ile beraber...
dpkg -P programAdi
# Paketin konfigürasyon ayarlarını tekrar yapılandırmak için...
dpkg-reconfigure paketAdi
# Kurulu paketleri listelemek...
dpkg -l 
```

ii : paket normal olarak sisteme yüklendi.

rc : paket yüklendikten sonra silindi ancak konfigürasyon dosyaları halen mevcut.

pn : paket konfigürasyon dosyaları ile birlikte sistemden kaldırıldı.

```bash
# Kurulu paketin durumunu öğrenmek...
dpkg -s paketAdi
# Kurulu paketin içeriğini öğrenmek...
dpkg -L paketAdi
# Eğer indirmiş olduğumuz .deb uzantılı dosyanın içeriğini henüz kurmadan görmek...
dpkg -c paketAdi.deb
# Sistemde kurulmuş ve kaldırılmış tüm paketleri görmek...
dpkg --get-selections
```
