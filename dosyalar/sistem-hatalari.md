# KARŞILAŞTIĞIM SİSTEM HATALARI ve ÇÖZÜMLERİ

- [Önsöz](https://github.com/cicekhasan/Linux)


## Başlatılamayan systemd hizmetlerini bulmak

```bash
systemctl --failed
# Ekran çıktısı
  UNIT                        LOAD   ACTIVE SUB    DESCRIPTION              
● logrotate.service           loaded failed failed Rotate log files         

LOAD   = Reflects whether the unit definition was properly loaded.
ACTIVE = The high-level unit activation state, i.e. generalization of SUB.
SUB    = The low-level unit activation state, values depend on unit type.

1 loaded units listed. Pass --all to see loaded but inactive units, too.
To show all installed unit files use 'systemctl list-unit-files'.
```

logrotate.service ve nvidia-persistenced.service servislerin başlatılamadıını gördük. logrotate.service servisi log dosyaları belirli bir boyutu aştıktan sonra çalışan servis. Bundan dolayı sorun olarak görmüyoruz. nvidia-persistenced.service servisininde daha önce ekran kartını kurduk fakat düzgün çalışamıştı. Bende kullanmıyordum ama burada hata olarak kalmış. Kaldırmamakla hata etmişim. Neyse kaldırma dışında çözümüne bakalım. Belki ilerde kullanırız.  Canlı örneği için alttaki çözüme bakın...


## kern.log dosyası kontrolunda aşağıdaki hatayı farkettim...

```bash
[[0;1;31mFAILED[0m] Failed to start [0;1;39mNVIDIA Persistence Daemon[0m.
See 'systemctl status nvidia-persistenced.service' for details.
```

Bulduğum çözümü anlatıyım, belki işine yarıyan olur. Ama belirtmeliyim ki; kullanmadığınız bir kartsa kaldırın!

1. Servisin durumunu kontrol ettim

```bash
sudo systemctl status systemd-modules-load.service
# ÇIKTISI
yeniceri@fetih1453:/var/www/html/Ubuntu-Php$ sudo systemctl status systemd-modules-load.service
[sudo] password for yeniceri: 
● systemd-modules-load.service - Load Kernel Modules
   Loaded: loaded (/lib/systemd/system/systemd-modules-load.service; static; vendor preset: enabled)
   Active: failed (Result: exit-code) since Tue 2020-03-31 01:01:03 +03; 2min 22s ago
     Docs: man:systemd-modules-load.service(8)
           man:modules-load.d(5)
  Process: 12124 ExecStart=/lib/systemd/systemd-modules-load (code=exited, status=1/FAILURE)
 Main PID: 12124 (code=exited, status=1/FAILURE)

Mar 31 01:01:02 fetih1453 systemd-modules-load[12124]: modprobe: ERROR: could not insert 'nvidia': Operation not permitted
Mar 31 01:01:03 fetih1453 systemd-modules-load[12124]: modprobe: ERROR: could not insert 'nvidia_current_modeset': No such device
Mar 31 01:01:03 fetih1453 systemd-modules-load[12124]: modprobe: ERROR: ../libkmod/libkmod-module.c:979 command_do() Error running install command for 
Mar 31 01:01:03 fetih1453 systemd-modules-load[12124]: modprobe: ERROR: could not insert 'nvidia_modeset': Operation not permitted
Mar 31 01:01:03 fetih1453 systemd-modules-load[12124]: modprobe: ERROR: could not insert 'nvidia_current_drm': No such device
Mar 31 01:01:03 fetih1453 systemd-modules-load[12124]: Error running install command for nvidia_drm
Mar 31 01:01:03 fetih1453 systemd-modules-load[12124]: Failed to insert module 'nvidia_drm': Operation not permitted
Mar 31 01:01:03 fetih1453 systemd[1]: systemd-modules-load.service: Main process exited, code=exited, status=1/FAILURE
Mar 31 01:01:03 fetih1453 systemd[1]: systemd-modules-load.service: Failed with result 'exit-code'.
Mar 31 01:01:03 fetih1453 systemd[1]: Failed to start Load Kernel Modules.
```

2. Çıktıda da göründüğü gibi servis kendi kalkamamış. Tabiki yeniden başlatmayı denedim...

```bash
systemctl restart systemd-modules-load 
# ÇIKTISI
Job for systemd-modules-load.service failed because the control process exited with error code.
See "systemctl status systemd-modules-load.service" and "journalctl -xe" for details.
```
Beyfendi meşgul, işi varmış...

3. Birinci adımda PID kodunu görmüştüm. Ne işi varmış bir görüyüm dedim...

```bash
sudo journalctl _PID=12124
# Ekran çıktısı
-- Logs begin at Mon 2020-03-30 18:59:12 +03, end at Tue 2020-03-31 01:12:24 +03. --
Mar 31 01:01:02 fetih1453 systemd-modules-load[12124]: modprobe: ERROR: could not insert 'nvidia_current': No such device
Mar 31 01:01:02 fetih1453 systemd-modules-load[12124]: modprobe: ERROR: ../libkmod/libkmod-module.c:979 command_do() Error running install command for 
Mar 31 01:01:02 fetih1453 systemd-modules-load[12124]: modprobe: ERROR: could not insert 'nvidia': Operation not permitted
Mar 31 01:01:03 fetih1453 systemd-modules-load[12124]: modprobe: ERROR: could not insert 'nvidia_current_modeset': No such device
Mar 31 01:01:03 fetih1453 systemd-modules-load[12124]: modprobe: ERROR: ../libkmod/libkmod-module.c:979 command_do() Error running install command for 
Mar 31 01:01:03 fetih1453 systemd-modules-load[12124]: modprobe: ERROR: could not insert 'nvidia_modeset': Operation not permitted
Mar 31 01:01:03 fetih1453 systemd-modules-load[12124]: modprobe: ERROR: could not insert 'nvidia_current_drm': No such device
Mar 31 01:01:03 fetih1453 systemd-modules-load[12124]: Error running install command for nvidia_drm
Mar 31 01:01:03 fetih1453 systemd-modules-load[12124]: Failed to insert module 'nvidia_drm': Operation not permitted
lines 1-10/10 (END)
```

Yukarıda böyle bir cihaz yok, yüklenemedi ve işleme izin verilmedi gibi hatalar veriyor.

4. Kalkamıyan modülün dosyası modül yükleme dizininde varmı bir bakalım...

```bash
ls -Al /etc/modules-load.d/
# Ekran çıktısı
toplam 0
lrwxrwxrwx 1 root root 10 Oca 29 21:07 modules.conf -> ../modules
lrwxrwxrwx 1 root root 39 Mar 22 17:58 nvidia.conf -> /etc/alternatives/glx--nvidia-load.conf
```
5. nvidia ile ilgili bir tane dosya var. Bakalım içerisine yanlış bir şey var mı? anlıyabilecekmiyiz!

```bash
sudo gedit /etc/alternatives/glx--nvidia-load.conf
```
İçerisinde tek satır bir şey gördüm. Sadece "nvidia-drm" kernel modül adı yazıyordu. Nettende bir şey bulamadım ve başına # yazarak pasif edip kaydedip çıktım.

6. Yeniden başlatma ve son kontrol...

```bash
# Yeniden başlatma
systemctl restart systemd-modules-load
# Durum kontrolu
sudo systemctl status systemd-modules-load.service
# Ekran çıktısı
● systemd-modules-load.service - Load Kernel Modules
   Loaded: loaded (/lib/systemd/system/systemd-modules-load.service; static; vendor preset: enabled)
   Active: active (exited) since Tue 2020-03-31 01:52:42 +03; 17min ago
     Docs: man:systemd-modules-load.service(8)
           man:modules-load.d(5)
  Process: 313 ExecStart=/lib/systemd/systemd-modules-load (code=exited, status=0/SUCCESS)
 Main PID: 313 (code=exited, status=0/SUCCESS)

Warning: Journal has been rotated since unit was started. Log output is incomplete or unavailable.
```

Ve sistem ayağa kalktı...












