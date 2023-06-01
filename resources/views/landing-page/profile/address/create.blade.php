@extends('landing-page.layouts.main')

@section('title', 'Landing Page Apo Tech')
<link rel="stylesheet" href="{{ asset('assets-ui/sukai_produk.css') }}">
<style>
    .scrollable-div {
        height: 300px; /* Atur tinggi div sesuai kebutuhan */
        overflow-y: auto;
    }
</style>

@section('content')

    <section class="main-content">
        <div class="container-fluid container-fluid-body">
            <div class="row">
                <div class="col-md-12 content-box">
                    <div class="content-account-box-detail" style="background-color: white;">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 mb-20">
                                <x-Landingpage.SidebarProfile />
                            </div>
                            <div class="col-lg-9 col-md-8 m-t-10">
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <ul class="nav justify-content-start">
                                            <li class="nav-item mx-4">
                                                <a class="nav-link text-dark" aria-current="page"
                                                    href="{{ route('profile.index') }}">Profile</a>
                                            </li>
                                            <li class="nav-item mx-4">
                                                <a class="nav-link text-dark"
                                                    href="{{ route('address.index') }}">Address</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <hr>
                                </div>
                                <div class="row">
                                    <div class="col-12 scrollable-div">
                                        <h6>Tambah Alamat</h6>
                                        <form action="" method="post">
                                            @csrf
                                            <div class='form-group mb-3'>
                                                <label for='penerima' class='mb-2'>Penerima</label>
                                                <input type='text' name='penerima' class='form-control @error('penerima') is-invalid @enderror' value='{{ old('penerima') }}'>
                                                @error('penerima')
                                                    <div class='invalid-feedback'>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class='form-group mb-3'>
                                                <label for='no_handphone' class='mb-2'>No Handphone</label>
                                                <input type='text' name='no_handphone' class='form-control @error('no_handphone') is-invalid @enderror' value='{{ old('no_handphone') }}'>
                                                @error('no_handphone')
                                                    <div class='invalid-feedback'>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class='form-group mb-3'>
                                                <label for="name" class="col-md-4 col-form-label">kabupaten</label>
                                                <div class="col-md-6">
                                                    <select name="cities" id="cities" class="form-control">
                                                        @foreach ($citys as $id => $name)
                                                            <option value="{{ $id }}" {{ $name === 'KABUPATEN INDRAMAYU' ? 'selected readonly' : '' }} readonly>{{ $name }}</option>
                                                        @endforeach
                                                    </select>                                                    
                                                </div>
                                                @error('kabupaten')
                                                    <div class='invalid-feedback'>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class='form-group mb-3'>
                                                <label for="name" class="col-md-4 col-form-label">Kecamatan</label>
                                                <div class="col-md-6">
                                                    <select name="district" id="district" class="form-control">
                                                        <option value="">== Select kecamatan ==</option>
                                                        @foreach ($districts as $id => $name)
                                                            <option value="{{ $id }}">{{ $name }}</option>
                                                        @endforeach
                                                    </select>                                                    
                                                </div>
                                                @error('kabupaten')
                                                    <div class='invalid-feedback'>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class='form-group mb-3'>
                                                <label for="name" class="col-md-4 col-form-label">Desa</label>
                                                <div class="col-md-6">
                                                    <select name="village" id="village" class="form-control" disabled>
                                                        <option value="">== Select desa ==</option>
                                                    </select>                                                
                                                </div>
                                                @error('kabupaten')
                                                    <div class='invalid-feedback'>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class='form-group mb-3'>
                                                <label for='detail_alamat' class='mb-2'>Detail Alamat</label>
                                                <input type='text' name='detail_alamat' class='form-control @error('detail_alamat') is-invalid @enderror' value='{{ old('detail_alamat') }}'>
                                                @error('detail_alamat')
                                                    <div class='invalid-feedback'>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class='form-group mb-3'>
                                                <input type='hidden' name='lat' class='form-control' placeholder="lat" id="lat">
                                            </div>
                                            <div class='form-group mb-3'>
                                                <input type='hidden' name='lng' class='form-control' placeholder="lng" id="lng">
                                            </div>
                                            <div id="map" style="height:400px;width:800px" class="my-3"></div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="utama" name="utama">
                                                <label class="form-check-label" for="utama">
                                                    Jadikan Utama
                                                </label>
                                            </div>
                                            <div class="form-group text-right">
                                                <button class="btn btn-primary mt-3 text-white">Tambah Alamat</button>
                                            </div>
                                        </form>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <script>
        $(document).ready(function() {
        $('#district').on('change', function() {
            var districtId = $(this).val();
            if (districtId) {
                $.ajax({
                    url: '/district/' + districtId + '/villages',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#village').empty();
                        $('#village').append('<option value="">== Select desa ==</option>');
                        $.each(data, function(key, value) {
                            $('#village').append('<option value="' + key + '">' + value + '</option>');
                        });
                        $('#village').prop('disabled', false);
                    }
                });
            } else {
                $('#village').empty();
                $('#village').prop('disabled', true);
            }
        });
    });

        
        let map;

        function myMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: { lat: -6.425721, lng: 108.081242 },
                zoom: 8,
                scrollable: true,
            });

            const indramayu = { lat: -6.425721, lng: 108.081242 };
            let marker = new google.maps.Marker({
                position: indramayu,
                map: map,
                draggable: true,
            });

            google.maps.event.addListener(marker, 'position_changed', function(){
                let lat = marker.position.lat()
                let lng = marker.position.lng()
                $('#lat').val(lat)
                $('#lng').val(lng)
            });

            google.maps.event.addListener(map, 'click', function(event){
                pos = event.latLng
                marker.setPosition(pos)
            })
        }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtOyW9dEsEt0OiljZQ5k4tgZCbOO3jmn8&callback=myMap"></script>
@endsection

