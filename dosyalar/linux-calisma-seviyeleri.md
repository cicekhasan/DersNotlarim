## ÇALIŞMA SEVİYELERİ

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


#### ```runlevel``` Komutu

Sistem açıldığında hangi çalışma seviyesindeyse o seviyeye göre belirlenmiş olan hizmetler başlatılır. İşte bu olaya da Runlevels(çalışma seviyeleri) deniyor. Linux sisteminde 7 farklı seviye bulunuyor.

| Runlevel | Çalışma Modu | İşlevler |
|---|---|---|
| 0 | Halt | Kapatma işleminin başladığı seviye. |
| 1 | Tek Kullanıcılı | Ağ servisleri olamadan sistem bakımı için kullanılan seviye. |
| 2 | Ağ Desteği Olmadan Çok Kullanıcılı | Ağ servisleri olamadan normal kullanım seviyesi. |
| 3 | Ağ Destekli Çok Kullanıcılı | Ağ destekli normal kullanım seviyesi. |
| 4 | Tanımsız | Kullanılmıyor ancak, kullanıcı tarafından tanımlanabilir seviye. |
| 5 | Grafiksel Kullanıcı Arayüzü | Grafiksel arayüzün çalıştığı seviye. Varsayılan olarak başlar. |
| 6 | Yeniden Başlatma | Sistemin yeniden başladığı seviye. |


O anda hangi seviyede çalıştığımızı öğrenmek istersek komut satırına ```runlevel``` komutunu vermemiz yeterli.

```bash
# Örnek ekran çıktısı...
kaptan@armada:~$ runlevel
N 5
# Çalışma seviyesini değiştirmek...
init seviyeNumarasi
```

Seviyeyi değiştirdiğimizde sistemi yeniden başlatana kadar seçtiğimiz çalışma seviyesinde devam ederiz. Ancak, sistemi yeniden başlattığınızda sistem varsayılan olarak 5. seviyede başlar. Sistemi kapatmak istersek, hiç bir hizmetin çalışmadığı 0. seviye ile yani ```init 0``` komutunu vererek yapabiliriz.

```bash
# Ayrıca sistemi hemen kapatmak için;
shutdown now
shutdown -h now
# 5 dk sonra kapatmak için...
shutdown -h now+5
# Yeniden başlatmak için (restart)...
shutdown -r now
init 6
```
