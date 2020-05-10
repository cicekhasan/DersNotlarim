# KURULUM SONRASI YAPILACAKLAR

- [Önsöz](https://github.com/cicekhasan/DersNotlarim)

```bash
# Bu dosyayı açmak için "SublimeText" kur!
wget -qO - https://download.sublimetext.com/sublimehq-pub.gpg | sudo apt-key add -
sudo apt-get install apt-transport-https
echo "deb https://download.sublimetext.com/ apt/stable/" | sudo tee /etc/apt/sources.list.d/sublime-text.list
sudo apt-get update
sudo apt-get install sublime-text
# Sistem güncellemelerini kontrol et...
sudo apt update && sudo apt upgrade -y
# Sistemi yeniden başlat...
shutdown -r now
# Dışardan saldırılar için "root" parolasını değiştir. Kurulumda tanımladığın parola değişmez!
sudo passwd root
# Uygulamaları tek tıkla minimize/maximize etmek...
gsettings set org.gnome.shell.extensions.dash-to-dock click-action 'minimize'
# Kullanılmayan paketleri temizle...
sudo apt autoremove && sudo apt autoclean
# Media kodeklerini yükle. Her şeye evet işaretle...
sudo apt install ubuntu-restricted-extras libavcodec-extra libdvd-pkg
# Flash paketini yükle...
sudo apt install flashplugin-installer
# Sistemi yeniden başlat...
shutdown -r now
# Sistem güncellemelerini kontrol et...
sudo apt update && sudo apt upgrade -y
# VLC media oynatıcı yükle...
sudo apt-get install vlc
```

##### TeamViewer Kurulumu

[TeamViewer](https://download.teamviewer.com/download/linux/teamviewer_amd64.deb)

```bash
cd
cd İndirilenler/
# Alttaki kodu yapıştır ve tab tuşuna bas!
sudo dpkg -i teamviewer
```
