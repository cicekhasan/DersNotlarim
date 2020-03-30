# GİT İŞLEMLERİ

- [Önsöz](https://github.com/yeniceri1453/Linux)


## Git Server'a Kendimizi Tanıtmak

```bash
git config --global user.name "Hasan Çiçek"
git config --global user.email aysubey@gmail.com 
```

## Kendi Repository’mizi Oluşturma (Lokal)

```bash
git init 
```

## Repository Klonlamak

```bash
git clone git@github.com:yeniceri1453/sihlar.git
```

## Repostory'e EKLEMEK
Öncesinde bilgisayarımızda çalışıp github'a eklemek istersek:
1. Versiyon takibi yapmadıysak;
```bash
git init 
git add .
git commit -m "Yeni proje"
git push -u origin master 
```
2. [github.com](https://github.com/) 'a giderek yeni proje oluşturuyoruz;
	- "NEW" tuşuna bas,
	- Proje adını yaz,
	- Proje açıklamasını istersen yazabilirsin. Çok da gerekli değil,
	- Herkese (Public) açık mı? Yoksa gizli (Private) mi? çalışacaksın seç,
	- Önemli; Bilgisayarımızdaki projeyi ekleyeceksek "Initialize this repository with a README" yazısının solundaki kutuyu "İŞARETLEMİYORUZ". Yani README.md dosyasını oluşturmuyoruz.
	- "create repository" düğmesine basıyoruz.
	- Yeni Projeyi oluşturduk :).
3. Sonrasında açılan sayfadaki bölümden; "…or push an existing repository from the command line" bölümdeki kodları terminalden çalıştırıyoruz.

```bash 
git remote add origin git@github.com:yeniceri1453/sihlar.git
git push -u origin master
```

## Başka Bir Server’dan Repository Clonelamak

```bash
git clone kullaniciAdi@host:/repository/yolu/adresi
```

## Dosya Ekleme

```bash
# Hepsini Ekleme
git add .
# Dosya Ekleme
git add dosyaAdi
```

## Commit (Mesaj) Ekleme

```bash
git commit -am "Mesajınız."
```

## Repository Server’a Gönderme

```bash
git push origin master
```

## Değişiklik Varmı Görme 

```bash
git status
```

## Repository Server'a Bağlanma

```bash
git remote add origin <server>
```

## Eklenmiş Serverleri Görmek

```bash
git remote -v
```

## Remote Server’daki Değişiklikleri Çekmek

```bash
git pull
```
