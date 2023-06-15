<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Apo-Tech')</title>
    <!-- Import file CSS Bootstrap -->
    {{-- <link rel="stylesheet" href="{{ asset('assets-ui/style.css') }}"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-cYrNjLb6U5Sw6U11aMR7FWRL0jlvTV15zJd1gpXG1ZVGLjv0Jez7VszSXfA8DW7oOgjeBVqGxqQJ9XrBOfjU1g==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    <link rel="stylesheet" href="{{ asset('assets-ui/fontawesome/css/all.min.css') }}">
  
  
    {{-- <link rel="stylesheet" href="{{ asset('assets-ui/.css') }}"> --}}
    @yield('css')

    <style>
        body, html {
            margin: 0;
            padding: 0;
        }
    
        .header-main {
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container-top{
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
    
        .header-top-logo {
            padding: 20px;
        }
    
        .header-top-logo img {
            width: 100px;
            /* display: block; */
            margin: 0 auto;
        }
    </style>
  
  </head>
<body>
<div class="header-main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                <div class="header-top-logo">
                    <a href="/">
                        <img src="{{ asset('assets-image/logo.png') }}" alt="Logo">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="listcheckouts">
    <div>
        <div>
            <section class="main-content" style="padding: 10px 178px;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 content-box">
                            <p class="f-size-20 font-weight-bold">Checkout</p>
                            <div class="cart-content p-t-20 height-checkout">
                                <div class="row">
                                    <div class="col-md-8 col-sm-7 m-b-20">
                                        <div class="card-checkout bg-light p-3 rounded">
                                            <div class="card-header bg-transparent">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item text-black f-size-14 font-weight-bold">Alamat Pengiriman</li>
                                                </ul>
                                            </div>
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="media-left mr-2">
                                                        <div class="d-flex">
                                                            @foreach ($userApoteches as $userApotech)
                                                                <p>{{ $userApotech->first_name }} {{ $userApotech->last_name }}</p>
                                                                
                                                                <p class="m-b-0 text-muted font-weight-light">(Rumah)</p>
                                                            </div>
                                                            <h5 class="mb-2">{{ $userApotech->phone_number }}</h5>
                                                            @endforeach
                                                            @foreach ($userAddress as $address)
                                                        <h6 class="font-weight-normal col-10 pl-0">{{ $address->full_address }}, {{ $address->desa }}, {{ $address->kecamatan }}, KABUPATEN INDRAMAYU</h6>
                                                            @endforeach
                                                        <div class="mt-4">
                                                            <ul class="list-inline">
                                                                <li class="list-inline-item font-size-15">
                                                                    @foreach ($userAddress as $address)
                                                                        @if ($address->is_default == true)
                                                                            <a href="{{ route('address.edit', $address->id) }}" class="btn btn-warning font-weight-medium btn-goa-custom-grey btn-sm">Ubah Alamat</a>
                                                                        @endif
                                                                    @endforeach

                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                    
                                        <div>
                                            <div class="card-checkout mt-4 bg-light p-3 rounded">
                                                <div class="card-header border-0 bg-transparent">
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item">
                                                            @foreach ($userApotechesPenjual as $userApotechPenjual)
                                                                {{-- <img src="{{ asset($userApotechPenjual->image) }}" width="26" alt="icon apotek goapotik"> --}}
                                                            </li>
                                                            <li class="list-inline-item font-black">{{ $userApotechPenjual->user->username }}</li>
                                                            @endforeach
                                                    </ul>
                                                </div>
                                                <div class="card-body">
                                                    <div class="media">
                                                        <div class="media-body">
                                                            <div>
                                                                <div>
                                                                    <ul class="list-unstyled">
                                                                        <div class="hr-last-bottom">
                                                                            <li class="media d-flex">
                                                                                <div class="media-img border-0 mr-4">
                                                                                    {{-- @foreach ($userApotechesPenjual as $userApotechPenjual) --}}
                                                                                        <img width="50" height="50" alt="BLACKMORES COQ10 75MG BOTOL 30 KAPSUL" data-src="https://assets.goapotik.com/thumbs/blackmores_coq10_75mg_botol_30_kapsul_1.jpg" src="{{ asset($product->images[0]->image) }}" lazy="loaded">
                                                                                    {{-- @endforeach --}}
                                                                                </div>
                                                                                <div class="media-body" style="margin-left: 15px;">
                                                                                    <h6 class="mt-0 mb-2" style="text-transform: uppercase; font-size: 14px; color: black;">{{ $product->name }}</h6>
                                                                                    <h6 class="mt-0 mb-2" style="text-transform: uppercase; font-size: 14px; color: orange;">Rp. {{ $product->price }}</h6>
                                                                                    <p class="font-size-12 mb-5">1 Produk</p>
                                                                                    <span class="text-muted">
                                                                                        <small></small>
                                                                                    </span>
                                                                                </div>
                                                                                <div class="media shipping right align-items-center" style="margin-left: auto;">
                                                                                    <div class="media-right mr-2">
                                                                                        <p style="margin-bottom: 10px; font-weight: bold; font-size: 12px;">Pilih Pengiriman</p>
                                                                                        <div id="" class="mb-4" style="display: flex; justify-content: center;">
                                                                                            <a href="javascript:void(0);" id="2309" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-primary font-weight-medium btn-sm img-round-6 dropdown-toggle" style="width: 150px;">Pengiriman</a>
                                                                                            <div id="dropdownship-2309" aria-labelledby="account-dropdown" class="dropdown-menu dropdown-menu-category mid-2309" style="width: 208px; box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 10px; border-radius: 6px; border: none; padding: 12px; z-index: 100000;"></div>
                                                                                        </div>                                                                                                                                                                              
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                        </div>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                </div>                                                                                                                                            
                                                <div class="card-footer bg-white">
                                                    <div class="media col-12 align-items-center">
                                                        <div class="media-left col-6 p-0">
                                                            <p class="font-weight-bold mb-0 f-size-14">Subtotal</p>
                                                        </div>
                                                        <div class="media-right col-6 p-0 text-right">
                                                            <div class="d-flex">
                                                                <p class="font-weight-bold mb-0 f-size-14 mr-1">Rp. {{ $product->price }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>                                                                                              
                                            </div><!---->
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-5 ">
                                        <div class="card-checkout p-3 bg-light p-3 rounded">
                                            <p class="f-size-14-weight mb-0">Ringkasan Belanja</p>
                                                <hr class="mb-3">
                                                <div class="d-flex justify-content-between flex-row">
                                                    <div class="d-flex justify-content-start">
                                                        <p class="f-size-12">Harga Barang (1)</p>
                                                    </div>
                                                    <div class="d-flex justify-content-end">
                                                        <p class="f-size-12-weight">Rp. {{ $product->price }}</p>
                                                    </div>
                                                </div>
                                                <hr class="m-0">
                                                <div class="d-flex justify-content-between flex-row mt-3">
                                                    <div class="d-flex justify-content-start">
                                                        <p class="f-size-12">Total Pembayaran</p>
                                                    </div>
                                                    <div class="d-flex justify-content-end">
                                                        <p class="f-size-12-weight">Rp. {{ $product->price }}</p>
                                                    </div>
                                                </div>
                                                    <a href="javascript:void(0);" id="payment-modal" class="btn btn-primary p-14">Bayar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<footer class="bg-primary" style="">
    <div class="container-top">
        <div style="">
            <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                <div class="header-top-logo">
                    <a href="/">
                        <img src="{{ asset('assets-image/logo.png') }}" width="170">
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-LdAtrzaumIW9gfbV"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script type="text/javascript">

    $(document).ready(function(){
        $('#payment-modal').click(function(e){
            var data = {
                'total_price': '{{ $product->price }}',
                'shipping_cost': 10000,
                'product_id': '{{ $product->id }}',
                'qty': 1,
            }
            var url = '/order/order';
            $.getJSON(url, function(data, textStatus, jqXHR){
                console.log(data);
            })
        })
    })

</script>
</body>  
</html>  