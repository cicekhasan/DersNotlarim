## SORUN TESPİTİ

1. Ana servislerin başlama süresini görme

Başlangıçta çekirdek, initrd ve kullanıcı alanı tarafından harcanan süre dahil olmak üzere her bir hizmeti başlatmak için harcanan toplam süre hakkındaki bilgileri listeler.

```bash
systemd-analyze
```

2. Tüm servislerin başlama süresini görme

```bash
systemd-analyze blame
```

3. Kritik servislerin zaman ağacını görme

```bash
systemd-analyze critical-chain
```

4. Kritik servisin zaman ağacını görme

```bash
systemd-analyze critical-chain servisAdi
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