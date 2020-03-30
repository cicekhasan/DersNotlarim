# LARAVEL NOTLARI

- [Önsöz](https://github.com/cicekhasan/Linux)


## COMPOSER PAKETLERİ


Alertin şeklini değiştiriyor.
https://github.com/yoeunes/toastr

### Kurulum;
composer require yoeunes/toastr

### config/app.php  dosyasına ekleme yap;

'providers' => [
    ...
    Yoeunes\Toastr\ToastrServiceProvider::class
    ...
];

### config/ klasörüne toastr.php yi komutla ekle;
php artisan vendor:publish --provider='Yoeunes\Toastr\ToastrServiceProvider' --tag="config"


### Header in en altına;
@toastr_css

### Footerin en altına;
@toastr_js
@toastr_render

### Kullanmak için;

toastr()->success('Have fun storming the castle!', 'Miracle Max Says');
toastr()->error('I do not think that word means what you think it means.', 'Inconceivable!'); // i want to display this one
toastr()->info('Are you the 6 fingered man?'); // and this one

toastr()->maxItems(2);

toastr()->info('Are you the 6 fingered man?')->success('Makale başarı bir şekilde eklendi.')->warning('doritos');


## RESOURCES CONTROL İSİMLERİNİ DEĞİŞTİRME

Providers\AppServiceProvider.php dosyası içerisinde ;

    public function boot()
    {
        Route::resourceVerbs([
            'create'=>'olustur',
            'edit'=>'guncelle'
        ]);
    }

bölümünde ki gibi adres çubuğunda görünen ismi değiştiriyoruz.


## MAKALE SİLME İŞLEMİ

Form yolu ile silme bağlantı bölümü (sayfadaki bölüm)

```bash
<form method="post" action="{{route('admin.makaleler.destroy',$article->id)}}">
  @csrf
  @method('DELETE')
  <button type="submit" title="Sil" class="btn btn-sm bg-danger text-white my-1 btn-block"><i class="fa fa-times"></i></button>
</form>
```