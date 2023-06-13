@extends('landing-page.layouts.main')

@section('title', 'Landing Page Apo Tech')
<link rel="stylesheet" href="{{ asset('assets-ui/style.css') }}">

@section('content')

<div id="hero-slider" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
    <div class="carousel-item active">
        <img src="{{ asset('assets-image/landingpage.png') }}" class="d-block w-100" alt="Slide 1">
        <div class="carousel-caption d-none d-md-block">
            
        </div>
    </div>
    <div class="carousel-item">
        <img src="{{ asset('assets-image/landingpage.png') }}" class="d-block w-100" alt="Slide 2">
        <div class="carousel-caption d-none d-md-block">
            
        </div>
    </div>
    <div class="carousel-item">
        <img src="{{ asset('assets-image/landingpage.png') }}" class="d-block w-100" alt="Slide 3">
        <div class="carousel-caption d-none d-md-block">
            
        </div>
    </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#hero-slider" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#hero-slider" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<div class="mb-5" style="display: flex; align-items: center; justify-content: left;margin-top: 30px;">
    <h3 style="margin-left: 275px;">Kategori</h3>
</div> 
<section class="category-section">
    <div class="category-item">
        <div class="category-icon-1">
            <a href="#">
                <img src="{{ asset('assets-image/images-landing/Katagori.png') }}" alt="Kategori">
            </a>
            <div class="category-name">
                Lainnya
            </div>
        </div>
    </div>
    <div class="category-item">
    <div class="category-icon-2">
        <a href="">
            <img src="{{ asset('assets-image/images-landing/Bottle.png') }}" alt="Botol">
        </a>
        <div class="category-name">
            Obat Umum
        </div>
    </div>
    </div>  
    <div class="category-item">
        <div class="category-icon-3">
            <a href="">
                <img src="{{ asset('assets-image/images-landing/Hati.png') }}" alt="Hati">
            </a>
            <div class="category-name">
                Suplement
            </div>
        </div>
    </div> 
    <div class="category-item">
        <div class="category-icon-4">
            <a href="">
                <img src="{{ asset('assets-image/images-landing/Bayi.png') }}" alt="Bayi">
            </a>
            <div class="category-name">
                Baby
            </div>
        </div>
    </div> 
    <div class="category-item">
        <div class="category-icon-5">
            <a href="">
                <img src="{{ asset('assets-image/images-landing/keluarga.png') }}" alt="Keluarga">
            </a>
            <div class="category-name">
                Keluarga
            </div>
        </div>
    </div> 
    <div class="category-item">
        <div class="category-icon-6">
            <a href="">
                <img src="{{ asset('assets-image/images-landing/keras.png') }}" alt="Keras">
            </a>
            <div class="category-name">
                Obat Resep
            </div>
        </div>
    </div> 
    <div class="category-item">
        <div class="category-icon-7">
            <a href="">
                <img src="{{ asset('assets-image/images-landing/milk.png') }}" alt="Susu">
            </a>
            <div class="category-name">
                Minuman Sehat
            </div>
        </div>
    </div> 
</section>


<div class="category-item-container">      
    <div class="mb-5" style="display: flex; align-items: center; justify-content: center;">
        <hr style="width: 25%; margin-right: 10px;">
        <h3 style="margin: 0;">Produk Terlaris</h3>
        <hr style="width: 25%; margin-left: 10px;">
    </div>      
    <div class="row">
        @foreach($products as $product)
        {{-- {{ dd($products) }} --}}
        <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="item-mobile">
                <a href="{{ route('showProduct.index', ['name' => $product->name]) }}" style="text-decoration:none; color:inherit;">
                    <div class="item-image-wrapper-m">
                        <figure class="item-image-container">
                            <picture>
                                <img src="{{ ($product->images->pluck('image')->first()) }}" alt="" style="object-fit: cover;width: 200px;height: 200px;border-radius:8%;">
                            </picture>
                        </figure>
                    </div>
                    <div class="item-meta-container-m mt-2">
                        <div class="item-name-m" style="background-color: #D9D9D9;">
                            <span style="display: inline-block;">{{ $product->name }}</span>
                        </div>
                        <div class="item-price-m" style="background-color: #00B9D8;">
                            <br>
                            <span class="price">{{ $product->price }}</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        @endforeach               
    </div>
</div>
<div class="container text-center">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner rounded">
        <div class="carousel-item active">
            <img src="{{ asset('assets-image/landingpage.png') }}" class="d-block w-100" alt="Promo 1">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('assets-image/landingpage.png') }}" class="d-block w-100" alt="Promo 2">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('assets-image/landingpage.png') }}" class="d-block w-100" alt="Promo 3">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('assets-image/landingpage.png') }}" class="d-block w-100" alt="Promo 4">
        </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
        </button>
    </div>
    </div>
</div>
<div class="container-item">
    <div class="category-item-container mt-5">      
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="item-mobile">
                    <a href="{{ route('showProduct.index', ['name' => $product->name]) }}" style="text-decoration:none; color:inherit;">
                        <div class="item-image-wrapper-m">
                            <figure class="item-image-container">
                                <picture>
                                    <img src="{{ ($product->images->pluck('image')->first()) }}" alt="" style="object-fit: cover;width: 200px;height: 200px;border-radius:8%;">
                                </picture>
                            </figure>
                        </div>
                        <div class="item-meta-container-m mt-2">
                            <div class="item-name-m" style="background-color: #D9D9D9;">
                                <span style="display: inline-block;">{{ $product->name }}</span>
                            </div>
                            <div class="item-price-m" style="background-color: #00B9D8;">
                                <br>
                                <span class="price">{{ $product->price }}</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach   
        </div>              
    </div>
    <div class="category-item-container mt-5">      
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="item-mobile">
                    <a href="{{ route('showProduct.index', ['name' => $product->name]) }}" style="text-decoration:none; color:inherit;">
                        <div class="item-image-wrapper-m">
                            <figure class="item-image-container">
                                <picture>
                                    <img src="{{ ($product->images->pluck('image')->first()) }}" alt="" style="object-fit: cover;width: 200px;height: 200px;border-radius:8%;">
                                </picture>
                            </figure>
                        </div>
                        <div class="item-meta-container-m mt-2">
                            <div class="item-name-m" style="background-color: #D9D9D9;">
                                <span style="display: inline-block;">{{ $product->name }}</span>
                            </div>
                            <div class="item-price-m" style="background-color: #00B9D8;">
                                <br>
                                <span class="price">{{ $product->price }}</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach   
        </div>       
    </div>
</div>
<div class="next-product-container" style="padding: 10px; background-color: #D9D9D9;margin: 5px 10px 0px 10px;border-radius: 0px 0px 10px 10px;">
    <a class="next-product-button"style="text-decoration: none;" href="{{ route('allProduct.index') }}">Lihat Produk Selanjutnya</a>
    {{-- <button class="next-product-button">Lihat Produk Selanjutnya</button> --}}
</div>
<div class="row" style="margin-top: 100px;">
    <div class="col-md-4">
        <div class="card mx-auto" style="max-width: 325px;border-radius: 15px;background-color: #00B9D8;">
            <img class="card-img-top" src="{{ asset('assets-image/images-landing/icon_footer_main.png') }}" alt="Card image cap">
            <div class="card-body text-center">
                <p class="card-text" style="font-size: 18px;font-weight: bold; color: white;">Aplikasi Beli Obat Online yang Bisa Membantumu Tebus Resep Tanpa Antre</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card mx-auto" style="max-width: 325px;border-radius: 15px;background-color: #00B9D8;">
            <img class="card-img-top" src="{{ asset('assets-image/images-landing/icon_footer_main.png') }}" alt="Card image cap">
            <div class="card-body text-center">
                <p class="card-text" style="font-size: 18px;font-weight: bold; color: white;">Aplikasi Beli Obat Online yang Bisa Membantumu Tebus Resep Tanpa Antrei</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card mx-auto" style="max-width: 325px;border-radius: 15px;background-color: #00B9D8;">
            <img class="card-img-top" src="{{ asset('assets-image/images-landing/icon_footer_main.png') }}" alt="Card image cap">
            <div class="card-body text-center">
                <p class="card-text" style="font-size: 18px;font-weight: bold; color: white;">Aplikasi Beli Obat Online yang Bisa Membantumu Tebus Resep Tanpa Antre</p>
            </div>
        </div>
    </div>
</div>

@endsection