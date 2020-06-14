## SORUN TESPİTİ

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


1. Ana servislerin başlama süresini görme

Başlangıçta çekirdek, initrd ve kullanıcı alanı tarafından harcanan süre dahil olmak üzere her bir hizmeti başlatmak için harcanan toplam süre hakkındaki bilgileri listeler.

```bash
systemd-analyze
# Örnek çıktı
yeniceri@fetih1453:/var/www/html/DersNotlarim$ systemd-analyze
Startup finished in 8ms (firmware) + 983us (loader) + 4.670s (kernel) + 8.333s (userspace) = 13.014s 
graphical.target reached after 8.106s in userspace
```

2. Tüm servislerin başlama süresini görme

```bash
systemd-analyze blame
# Örnek çıktı
yeniceri@fetih1453:/var/www/html/DersNotlarim$ systemd-analyze blame
  6.622s NetworkManager-wait-online.service
  4.540s plymouth-quit-wait.service
   988ms mariadb.service
   384ms systemd-logind.service
   322ms exim4.service
...
   7ms rtkit-daemon.service
   6ms proc-sys-fs-binfmt_misc.mount
   5ms kmod-static-nodes.service
   4ms console-setup.service
   3ms ifupdown-pre.service

```

3. Kritik servislerin zaman ağacını görme

```bash
systemd-analyze critical-chain
# Örnek çıktı
yeniceri@fetih1453:/var/www/html/DersNotlarim$ systemd-analyze critical-chain
The time after the unit is active or started is printed after the "@" character.
The time the unit takes to start is printed after the "+" character.

graphical.target @8.106s
└─multi-user.target @8.102s
  └─exim4.service @7.778s +322ms
    └─network-online.target @7.774s
      └─NetworkManager-wait-online.service @1.150s +6.622s
        └─NetworkManager.service @983ms +156ms
          └─dbus.service @981ms
            └─basic.target @965ms
              └─sockets.target @965ms
                └─avahi-daemon.socket @965ms
                  └─sysinit.target @964ms
                    └─systemd-timesyncd.service @755ms +208ms
                      └─systemd-tmpfiles-setup.service @705ms +48ms
                        └─local-fs.target @702ms
                          └─boot-efi.mount @609ms +93ms
                            └─systemd-fsck@dev-disk-by\x2duuid-3010\x2dF0B3.service @558ms +48ms
                              └─dev-disk-by\x2duuid-3010\x2dF0B3.device @543ms
```

4. Kritik servisin zaman ağacını görme(O servisten sonraki aşamaları gösterir)

```bash
systemd-analyze critical-chain servisAdi
# Örnek çıktı
yeniceri@fetih1453:/var/www/html/DersNotlarim$ systemd-analyze critical-chain NetworkManager.service
The time after the unit is active or started is printed after the "@" character.
The time the unit takes to start is printed after the "+" character.

NetworkManager.service +156ms
└─dbus.service @981ms
  └─basic.target @965ms
    └─sockets.target @965ms
      └─avahi-daemon.socket @965ms
        └─sysinit.target @964ms
          └─systemd-timesyncd.service @755ms +208ms
            └─systemd-tmpfiles-setup.service @705ms +48ms
              └─local-fs.target @702ms
                └─boot-efi.mount @609ms +93ms
                  └─systemd-fsck@dev-disk-by\x2duuid-3010\x2dF0B3.service @558ms +48ms
                    └─dev-disk-by\x2duuid-3010\x2dF0B3.device @543ms

```

5. Başlama sürelerinin grafiksel incelenmesi

```bash
# Başlama sürelerini svg olarak kaydet
systemd-analyze plot > boot_analizi.svg
# Grafiği göster
xdg-open boot_analizi.svg
```

## Uzak sunucu işlemleri

```bash
systemd-analyze time -H root@192.168.56.5
systemd-analyze blame -H root@192.168.56.5
systemd-analyze critical-chain -H root@192.168.56.5
```

## Servis log dosyalarını görmek

```bash
sudo journalctl -u NetworkManager.service
```
