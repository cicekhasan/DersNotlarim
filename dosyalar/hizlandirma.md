# HIZLANDIRMA

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)

1. Grup yükleme süresini azaltın; GRUB_TIMEOUT =10 yazan yeri bul ve değerini 2 yap. Sadece linux işletim sistemi kullanıyorsanız değeri 0 yap. Otomatik olaral linux işletim sistemi seçilip açılacaktır.
```bash
# Grup dosyasını açmak
sudo nano /etc/default/grub
# Aktif hale getirmek
sudo update-grub
```
2. Preload uygulamasını yükleyerek, uygulama yüklenme hızını arttırın.
```bash
sudo apt-get install preload
```
3. İnterneti Hızlandırma
```bash
# İlgili dosyayı aç
sudo gedit /etc/nsswitch.conf
# Aşağıdaki satırları ekliyoruz
hosts:	files mdns4_minimal [NOTFOUND=return] dns mdns4
hosts:	files dns
# Yeniden başlatıyoruz
reboot
```

4. Ekran Kartı İşlemleri

Performansı düşüren en büyük etkenlerden biride ekran kartının düzgün çalışmamasıdır. Düzeltmek için önce ekran kartı sürücümüzün doğru yüklenip yüklenmediğini kontrol etmek ve sonrasında yüklü değilse yüklemektir.

**Ekran Kartı Bilgilerini Görmek**

Ekran kartınızın detaylı bilgisini "inxi" paketi ile görebilirsiniz. 
```bash
# Paketin kurulumu
sudo apt-get install inxi -y
# Çalıştırılması
inxi -G
```
Not: "*driver:*" bölümünde yazıyorsa sürücü çalışıyor demektir. Hiç bir işle yapmanıza gerek yok!

**NVIDIA Ekran Kartını Kurmak**

Temiz bir ekran kartı sürücüsü kurmak için aşağıdaki adımların üzerinde bulunan açıklamaları dikkatlice okuyarak komutları sırası ile komut satırından gönderin. Anlatım; GeForce 8400 GS ekran kartı ve nvidia-340 sürücüsü ile gösterilmiştir. Siz "inxi -G" ve "nvidia-smi" komutlarındaki çıktılarınızda gördügüünüz kendi kart ve sürücünüze göre işlem yapın!

```bash
# Ekran kartının ihtiyacı olan sürücüsünü öğrenmek
nvidia-smi
# nvidia-smi komutu yoksa
sudo apt-get install nvidia-smi
# Varsa uygun olmayanı kaldırmak/temizlemek
sudo apt-get remove --purge nvidia*
# Grafik kartlarını yükleme listesine eklemek
sudo add-apt-repository ppa:graphics-drivers/ppa
# Eklenen listeyi kaydetmek
sudo apt-get update
# smi sonucu çıkan (340) sürücüyü yüklemek
sudo apt-get install nvidia-340
# Sistemi yeniden başlatmak
sudo shutdown -r now
```

5. Tarayıcı sorunlarını çözmek;
firefox mozillada flash yüklümü kontrol etmek için adres satırına ```about:plugins``` yaz!