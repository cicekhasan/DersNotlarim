# SIK KULLANILAN KOMUTLAR

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)

#### Sistemi Güncelleme

```bash
sudo apt update
sudo apt upgrade -y
```

#### Dosya Arama

```bash
sudo find / -name dosyaAdi.uzantisi
```

#### Bozuk Paket Tespiti

```bash
sudo apt-get install -f
```

#### Paket Kaldırma

```bash
sudo apt-get purge paketAdi
sudo apt-get --purge remove paketAdi
sudo apt-get remove --purge paketAdi
```