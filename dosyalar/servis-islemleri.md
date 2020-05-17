## SERVİS İŞLEMLERİ

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)


## Servisi başlatma durdurma

```bash
# Başlatma
systemctl start servisAdi
# Durdurma
systemctl stop servisAdi
```

## Servis Restart Etmek

```bash
systemctl restart servisAdi
# Ya da
systemctl reload servisAdi
```

## Servislerin sistem açılışlarında otomatik olarak start edilmesi

```bash
systemctl enable servisAdi
```

## Servislerin sistem açılışlarında kaldırmak. Servis devredışı kalır.

```bash
systemctl disable servisAdi
```

## Servisin çalıştırılmasını engellemek/engeli kaldırmak

```bash
# Engellemek
systemctl mask servisAdi
# Engeli kaldırmak
systemctl unmask servisAdi
```
