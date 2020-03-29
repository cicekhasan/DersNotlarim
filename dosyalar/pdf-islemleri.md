# PDF İŞLEMLERİ

- [Önsöz](https://github.com/yeniceri1453/Linux)


## Pdf'e çevirmek

```bash
# Kurulumu
sudo apt-get install qpdf
# Kullanımı
qpdf --decrypt s02.pdf merge1.pdf
```

## Pdf dosyaları birleştirmek

```bash
# Kurulumu
sudo apt-get install pdfunite
# Kullanımı
pdfunite source1.pdf source2.pdf source3.pdf merged_output.pdf
```