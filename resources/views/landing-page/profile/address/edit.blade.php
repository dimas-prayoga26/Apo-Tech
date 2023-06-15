@extends('landing-page.layouts.main')

@section('title', 'Landing Page Apo Tech')
<link rel="stylesheet" href="{{ asset('assets-ui/sukai_produk.css') }}">

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
                                        <x-Landingpage.NavbarProfile />
                                    </div>
                                    <hr>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <h6>Edit Alamat</h6>
                                        {{-- <form action="" method="post">
                                            @csrf
                                            <div class='form-group mb-3'>
                                                <label for='penerima' class='mb-2'>Penerima</label>
                                                <input type='text' name='penerima'
                                                    class='form-control @error('penerima') is-invalid @enderror'
                                                    value='{{ old('penerima') }}'>
                                                @error('penerima')
                                                    <div class='invalid-feedback'>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class='form-group mb-3'>
                                                <label for='alamat_pengiriman' class='mb-2'>Alamat Pengiriman</label>
                                                <input type='text' name='alamat_pengiriman'
                                                    class='form-control @error('alamat_pengiriman') is-invalid @enderror'
                                                    value='{{ old('alamat_pengiriman') }}'>
                                                @error('alamat_pengiriman')
                                                    <div class='invalid-feedback'>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class='form-group mb-3'>
                                                <label for='daerah_pengiriman' class='mb-2'>Daerah Pengiriman</label>
                                                <input type='text' name='daerah_pengiriman'
                                                    class='form-control @error('daerah_pengiriman') is-invalid @enderror'
                                                    value='{{ old('daerah_pengiriman') }}'>
                                                @error('daerah_pengiriman')
                                                    <div class='invalid-feedback'>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="utama" name="utama">
                                                <label class="form-check-label" for="utama">
                                                    Jadikan Utama
                                                </label>
                                            </div>
                                            <div class="form-group text-right">
                                                <button class="btn background-tosca mt-3 text-white ">Tambah Alamat</button>
                                            </div>
                                        </form> --}}
                                        <form action="{{ route('address.update',$item->id) }}" method="post">
                                            @csrf
                                            @method('patch')
                                            {{-- <div class='form-group mb-3'>
                                                <label for='penerima' class='mb-2'>Penerima</label>
                                                <input type='text' name='penerima'
                                                    class='form-control @error('penerima') is-invalid @enderror'
                                                    value='{{ $item->penerima ?? old('penerima') }}'>
                                                @error('penerima')
                                                    <div class='invalid-feedback'>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class='form-group mb-3'>
                                                <label for='no_handphone' class='mb-2'>No Handphone</label>
                                                <input type='text' name='no_handphone'
                                                    class='form-control @error('no_handphone') is-invalid @enderror'
                                                    value='{{  $item->no_handphone ??  old('no_handphone') }}'>
                                                @error('no_handphone')
                                                    <div class='invalid-feedback'>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class='form-group mb-3'>
                                                <label for="kabupaten" class="col-md-4 col-form-label">Kabupaten</label>
                                                <div class="col-md-6">
                                                    <select name="kabupaten" id="kabupaten" class="form-control">
                                                        @foreach ($citys as $id => $name)
                                                            <option value="{{ $name }}"
                                                                {{ $name === 'KABUPATEN INDRAMAYU' ? 'selected readonly' : '' }}
                                                                readonly>{{ $name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('kabupaten')
                                                    <div class='invalid-feedback'>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div> --}}
                                            <div class='form-group mb-3'>
                                                <label for="kecamatan" class="col-md-4 col-form-label">Kecamatan</label>
                                                <div class="col-md-6">
                                                    <select name="kecamatan" id="kecamatan" class="form-control">
                                                        <option value="">== Select kecamatan ==</option>
                                                        @foreach ($districts as $id => $name)
                                                            <option @selected($name === $item->kecamatan) value="{{ $name }}">{{ $name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('kabupaten')
                                                    <div class='invalid-feedback'>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            {{-- <div class='form-group mb-3'>
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
                                            </div> --}}
                                            <div class='form-group mb-3'>
                                                <label for='desa' class='mb-2'>Desa</label>
                                                <input type='text' name='desa'
                                                    class='form-control @error('desa') is-invalid @enderror'
                                                    value='{{ $item->desa ?? old('desa') }}'>
                                                @error('desa')
                                                    <div class='invalid-feedback'>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class='form-group mb-3'>
                                                <label for='full_address' class='mb-2'>Detail Alamat</label>
                                                <input type='text' name='full_address'
                                                    class='form-control @error('full_address') is-invalid @enderror'
                                                    value='{{ $item->full_address ?? old('full_address') }}'>
                                                @error('full_address')
                                                    <div class='invalid-feedback'>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class='form-group mb-3'>
                                                <input type='hidden' name='latitude' class='form-control'
                                                    placeholder="latitude" id="lat" value="{{ $item->latitude }}">
                                            </div>
                                            <div class='form-group mb-3'>
                                                <input type='hidden' name='longitude' class='form-control'
                                                    placeholder="longitude" id="lng" value="{{ $item->longitude }}">
                                            </div>
                                            <div id="map" style="height:400px;width:800px" class="my-3"></div>
                                            <div class="form-check">
                                                <input class="form-check-input" @checked($item->is_default == 1) type="checkbox" value="1"
                                                    id="is_default" name="is_default">
                                                <label class="form-check-label" for="is_default">
                                                    Jadikan Utama
                                                </label>
                                            </div>
                                            <div class="form-group text-right">
                                                <button class="btn btn-primary mt-3 text-white">Update Alamat</button>
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
        let map;
        let latitude = {{ $item->latitude }};
        let longitude = {{ $item->longitude }};
        console.log(longitude);
        function myMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: latitude,
                    lng: longitude
                },
                zoom: 8,
                scrollable: true,
            });

            const indramayu = {
                lat: latitude,
                lng: longitude
            };
            let marker = new google.maps.Marker({
                position: indramayu,
                map: map,
                draggable: true,
            });

            google.maps.event.addListener(marker, 'position_changed', function() {
                let lat = marker.position.lat()
                let lng = marker.position.lng()
                console.log(lat);
                $('#lat').val(lat)
                $('#lng').val(lng)
            });

            google.maps.event.addListener(map, 'click', function(event) {
                pos = event.latLng
                marker.setPosition(pos)
            })
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtOyW9dEsEt0OiljZQ5k4tgZCbOO3jmn8&callback=myMap">
    </script>
@endsection
