# EDİTÖRLER (IDM)

- [Önsöz](https://github.com/yeniceri1453/Linux)


## Doğru Editör Seçimi (IDE)

Başka editörler kullanırken PHP kodları için eklenti yüklemek gerekebilir ve gerekecektir. Eğer kullandığınız dile ait bir IDE varsa onu kullanmamız gerekir.

Örneğin; Php için "Phpstorm" kullanmak gibi. Fakat biz sizlere [Atom](#Atom) yada [SublimeText](#SublimeText) kullanmanızı öneriyoruz. Çünkü, kullanmanız için herhangi bir ücret ödemeniz gerekmiyor.


## SUBLİME TEXT EDITOR
### SublimeText

#### Sublime Text Kod Düzenini Sağlamak

Sublime Text üzerinde kodlarımızı düzenlemek için editörün Reindent özelliğini kullanıyoruz.Bu özelliğini kullanabilmek için ilk önce programımızı açıp

Prefences > Key Bindings – User menü yolunu izliyoruz ve açılan sayfada köşeli parantezler içerisine aşağıdaki kod bloğunu girip sayfayı kaydedip kapatıyoruz.
	
```{ "keys": ["ctrl+alt+f"], "command": "reindent" , "args": { "single_line": false } }```

Artık Reindent özelliğimiz kullanıma hazır.Kodlarımızı düzenleyebilmek için artık yapmamız gereken ```CTRL+ALT+f``` klavye kısayolunu kullanmak.

#### SUBLİME KISAYOLLARI

[Kaynak](https://ertugruldeniz.com/sublime-text-kisayollari-132)

#### Sublime text eklenti kurma

```CTRL+Shift+p``` tuşlarına basalım ve açılan pencereye Install Package Yazalım.

Not:Eğer bu ekranda Install Package Yazısı gelmiyor ise aşağıdaki adımları uygulayın.

Bu hatayı düzeltmek için Sublime Text programında View > Show Console menüsüne girip Konsolu açalım. Altta açılan pencereye aşağıdaki kodları yapıştıralım ve progoramı kapatıp açalım

```bash
import urllib2,os,hashlib;
h = 'eb2297e1a458f27d836c04bb0cbaf282' + 'd0e7a3098092775ccb37ca9d6b2e4b7d';
pf = 'Package Control.sublime-package';
ipp = sublime.installed_packages_path();
os.makedirs( ipp ) if not os.path.exists(ipp) else None; urllib2.install_opener( urllib2.build_opener( urllib2.ProxyHandler()) );
by = urllib2.urlopen( 'http://packagecontrol.io/' + pf.replace(' ', '%20')).read();
 dh = hashlib.sha256(by).hexdigest(); open( os.path.join( ipp, pf), 'wb' ).write(by) if dh == h else None;
 print('Error validating download (got %s instead of %s), please try manual install' % (dh, h)
  if dh != h else 'Please restart Sublime Text to finish installation')
```

#### Eklentiler

1. Emmet: Kısayoldan html etiketleri oluşturmak için kullanılır.

```html
ul>li*5>a :

form>input[class="kelime"]*5: 
```

2. Emmet CSS Spinnets Eklentisi: HTML için olan Emmet eklentisinin CSS versiyonu.

3. ColorPick Eklentisi: ```CTRL+Shift+c``` kısayolu ile CSS de Renk Paleti açıyoruz ve istediğimiz rengi seçip kodunu alabiliyoruz.

4. AutoFileName Eklentisi: HTML/CSS de resim,ses kıcaca yol belirtirken dosyaların isimleri gösteren bir eklenti.

5. Alignment: Bu eklenti de kodlarınızı basit bir klavye tuş kombinasyonuyla hizalamanıza yarar. ```Ctrl+a``` klavye tuş kombinasyonuyla seçtiğiniz kodları ```Ctrl+Alt+a``` ile hizalayabilirsiniz. Ben bunu ```Ctrl+Alt+f``` yaptım.

#### Bazı sublime ayarları

Bu kodları kopyalayıp preferences/settings dosyası aracılığıyla user-settings sayfasına yapıştırın. Eğer sayfada hali hazırda ```{ }``` süslü parantezler bulunuyorsa yukarıdaki kodlardaki süslü parantezleri silin ve hali hazırdaki parantezlerin içerisine yapıştırın. Bir diğer ihtimal user-settings sayfanızda ```{ }``` süslü parantezlerinizin içinde kod ya da kodlar var ise yukarıdaki kodların süslü parantezleri olmayacak şekilde kopyalayın ve süslü parantezleriniz içerisindeki kodların son satırının bir altına geçin, yapıştırın. Ve yapıştırdığınız kodlarınızın başlangıcını unutmayın. Yapıştırdığınız kodlarınızın başlangıcından önceki en son kod satırının true ya da false değerinin yanına bir virgül koyun. 

```bash
{     
// Klasör isimlerinin kalın olmasını sağlar.
"bold_folder_labels": true,

// Sayfayı kaydettiğinizde sayfanızın en altına boş bir satır ekler.
"ensure_newline_at_eof_on_save": true,

// Tercih edilen karakter boyutu ( değiştirebilirsiniz )
"font_size": 10,

// Fare imlecinin bulunduğu satırı highlight yapar.
"highlight_line": true,

// Sayfada belirli bir süre işlem yapmadığınızda sayfa kaydedilir.
"save_on_focus_lost": true,

// Tab tuşunun her zaman boşluk bırakmasını sağlar.
"translate_tabs_to_spaces": true
}
```

##### Nasıl düzenlenir?

Sublime Text, kod yazma deneyiminizi görsel olarak geliştirecek bazı harika özelliklerle birlikte geliyor; ama nedendir bilinmez, bu özellikler varsayılan olarak etkinleştirilmiş halde olmuyor. Bu ayarları düzenleyebilmek için. 

Not: Sublime Text ayarlarının yer aldığı dosyayı düzenleyebilmek için, Sublime Text 3 > Preferences > Settings - Default'a gidin.
 

##### Yazı Tipleri and Aralıklar

Doğru yazı tipini ve aralık oranını seçmek kodunuzu özelleştirmenin olabilecek en kişisel yollarından biri. İlk olarak kodlamanıza uygun, tercihen de eşit aralıklı bir yazı tipi seçin. Yazı tipinizi belirledikten sonra, bu yazı tipinin sisteminizde yüklü olduğundan emin olun, ardından ayarlarınıza ekleyin ve boyutunu, yazı aralıklarını aşağıdaki seçeneklerle düzenleyin:

```bash
“font_face”: “Source Code Pro”;
"font_size": 14;
"line_padding_bottom": 1,
"line_padding_top": 1,
``` 

##### highlight_modified_tabs

Çalışmakta olduğunuz projedeki yaptığınız son değişikliklerin henüz kaydedilmediği dosyaları odak haline getirmek için, bu ayar o anki pencerede yer alıp düzenlenmiş ancak kaydedilmemiş sekmeleri vurgular.

```bash
"highlight_modified_tabs": true,
``` 

##### word_wrap

Sayfayı yatay olarak kaydırmak bazen işkence gibi geliyor insana. Bu sözcük kaydırma ayarını aktifleştirerek, metninizin ekran boyutunuza sığacak bir şekilde akışı olmasını sağlayacak ve sizi sayfayı yatay olarak kaydırma zahmetinden kurtaracak.

```bash
"word_wrap": true,
```

##### fade_fold_buttons

Sublime Text'te kod parçalarını katlayıp açabiiyorsunuz. Bu ayarı etkin hale getirmeniz durumunda, katlama/açma için kenarda çıkan ok işareti yerinde sabit kalacak.

```bash
"fade_fold_buttons": false,
```

##### bold_folder_labels

Yan menüye daha güçlü görsel elemanlar katmak için harika ayarlar var, bunlardan bazılarını aşağıda bulabilirsiniz:

```bash
"bold_folder_labels": true,
```
 
##### Açık Dosyaları Yan Menüde Gösterme

Bu seçenek preferences dosyasında etkin değil. Açık dosyaları yan menünün en üstünde göstermek için şu yolu izleyin:

```bash
View → Side Bar → Show Open Files
```


## ATOM TEXT EDİTOR
### Atom

#### Kurulum

Atom Text Editörünü kurabilmek için ilk önce paketin bulunduğu listeyi sistemimize ekliyoruz.

```bash
  # Atom paketinin indirileceği depoyu sisteme ekle.
  $ wget -qO - https://packagecloud.io/AtomEditor/atom/gpgkey | sudo apt-key add -
  $ sudo sh -c 'echo "deb [arch=amd64] https://packagecloud.io/AtomEditor/atom/any/ any main" > /etc/apt/sources.list.d/atom.list'
  $ sudo apt update
```

Şimdi kurmaya hazırız...

```bash
  $ sudo apt install atom -y  # Atom paketini kur.
```

Atom Metin editörü hakkında bilgiye ve kullanışlı eklentilerine [buradan](https://emregeldegul.net/2017/10/kullanisli-atom-paketleri/) ulaşabilirsiniz.

#### Önemli Eklentiler

| Eklenti Adı | Açıklama |
| ---- | ---- |
| atom-live-server | Değişiklikleri aynı anda lokalden görüntüleyebilmemize yarar. |
| emmet | Kodları otomatik tamamlar. |
| reindent | Kod girintilerini otomatik düzenliyerek, anlaşılır görünmelerini sağlar. |