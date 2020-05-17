## TERMİNAL KULLANIMI

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


### YARDIMCI PAKETLER
### TMUX

#### Nedir?

TMUX (Terminal Multiplexer) modern bir terminal çoklayıcısıdır. Diğer terminallerden ayıran en büyük özelliği elektrik kesilse, bilgisayar kapansa dahi, açıldıktan sonra yapmakta olduğu işlemlere devam edebiliyor olmasıdır. Ekranı bölerek birden fazla işlemi takip edeblmemize olanak sağlar.

#### Kurulum

```bash
sudo apt-get install tmux
```

#### Timux Oturumu Açma

Aşağıdaki komutlardan her hangi birisi oturum açar.

```bash
tmux
tmux new
tmux new-session
```

En alt satırdaki yeşil durum çubuğu dikkatimizi çekecektir. Açılan bu ortam Tmux’un oturumudur. Durum çubuğunu sol tarafında “```[0] 0 :bash*```” ibaresi, sağ tarafında ise “sistemin_ismi” “saat” “tarih” görünecektir. Sol taraftaki [0] oturumun ismi, 0:bash ise bu oturumdaki pencerenin ismidir. * karakteri ise aktif pencereyi gösterir. Şu an için tek oturumumuz ve tek penceremiz olduğu için görüp göreceğimiz bu kadardır. Bunun haricinde oturumun Tmux’a ait olduğunu fark edecek başka bir belirti yoktur uçbirimde, tabi şu aşamada. Uçbirimde yaptığımız her şeyi burada da (haliyle) yapabiliriz. Deneme yapmaya başlayalım. less aracı ile /etc/fstab dosyamıza bakalım.


**Oturum açma :** ``` tmux ```

**İsimlendirerek oturum açma :** ``` tmux new -s top``` Top komutunu kullanacaksak böyle "top" isimli oturum açabiliriz.

**Arka plana at :** "CTRL-b d" CTRL ile beraber aynı anda b ye bas kaldır ve hemen peşinden d ye bas. Uç birimde “[detached]”  yazar.

**Ön tarafa getir :** ``` tmux a ``` (tmux attach)

**Session ismi değiştirme :** "CTRL-b ," CTRL ile beraber aynı anda b ye bas kaldır ve hemen peşinden , e bas. Sonra istediğin ismi yaz ve enter'a bas. Bu isimlendirmeden sonra Tmux işlemlere göre kendiliğinden pencere isimlendirmesi yapmayacaktır. Bizim belirlediğimiz isim her neyse, sabit olarak kalacaktır.

**İsim + arkaplana atarak oturum açma :** ``` tmux new -d -s oturum_ismi ```

**Oturum_ismi + pencere_ismi + arkaplana atarak oturum açma :** ``` tmux new -d -n pencere_ismi -s oturum_ismi ```

**Uç birimde oturumları görme :** ``` tmux ls ``` komutu ile ekrana listeler.

**Oturuma bağlanma :** ``` tmux a -t oturum_ismi ``` Buradaki bir oturum numarasıdır.

**Oturumlar arası geçme :** Sonraki pencere "CTRL+b n" ve  önceki pencere "CTRL+b p". Ya da pencere numaralarına göre geçiş yapılır.

**Eğer pencere sayımız 10’dan fazlaysa :** CTRL+b ' ile index açılır sonra oturum ismi yada numarası ile geçiş yapılır.

**Pencereleri listeleterek geçiş yapmak:** "CTRL+b f"

**Pencereler arasında geçiş yapmanın en kolay yolu :** "CTRL+b w" 

**Dikey bölmek için:** "CTRL+b %"

**Yatay bölmek için:** CTRL+b "

**Pencereler arası geçmek:** "CTRL+b" "yön tuşları"  ya da  "CTRL+b o"

**Bölmeler arası gezinme:** "CTRL+b ;" ya da  "CTRL+b q"

**Oturuma kapatma :** Önce yaptığı işi durdur. "CTRL+d"

**Uç Birimi Sonlandırma :** ``` pkill gnome-terminal ``` (İstersen, bildiğimiz dalı kesiyoruz.)
