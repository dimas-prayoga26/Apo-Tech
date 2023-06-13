@extends('landing-page.layouts.main')

@section('title', 'Landing Page Apo Tech')
<link rel="stylesheet" href="{{ asset('assets-ui/sukai_produk.css') }}">
<style>
    .label-uploadLicense:hover {
        cursor: pointer;
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
                                        <x-Landingpage.NavbarProfile />
                                    </div>
                                    <hr>
                                </div>
                                <div class="row">
                                    <div class="col-md-">
                                        <form action="{{ route('profile.update') }}" method="post">
                                            @csrf
                                            <div class='form-group mb-3 row'>
                                                <div class="col-md-6">
                                                    <label for='first_name' class='mb-2'>Nama Depan</label>
                                                    <input type='text' name='first_name'
                                                        class='form-control @error('first_name') is-invalid @enderror'
                                                        value='{{ $user_apotech->first_name ?? old('first_name') }}'>
                                                    @error('first_name')
                                                        <div class='invalid-feedback'>
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label for='last_name' class='mb-2'>Nama Belakang</label>
                                                    <input type='text' name='last_name'
                                                        class='form-control @error('last_name') is-invalid @enderror'
                                                        value='{{ $user_apotech->last_name ?? old('last_name') }}'>
                                                    @error('last_name')
                                                        <div class='invalid-feedback'>
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class='form-group mb-3'>
                                                <label for='nama_toko' class='mb-2'>Nama Toko</label>
                                                <input type='text' name='nama_toko'
                                                    class='form-control @error('nama_toko') is-invalid @enderror'
                                                    value='{{ $user_apotech->user->username ?? old('nama_toko') }}'>
                                                @error('nama_toko')
                                                    <div class='invalid-feedback'>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class='form-group mb-3'>
                                                <label for='email' class='mb-2'>Email</label>
                                                <input type='text' name='email'
                                                    class='form-control @error('email') is-invalid @enderror'
                                                    value='{{ $user_apotech->user->email ?? old('email') }}' readonly>
                                                @error('email')
                                                    <div class='invalid-feedback'>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class='form-group mb-3'>
                                                <label for='phone_number' class='mb-2'>No. Handphone</label>
                                                <input type='text' name='phone_number'
                                                    class='form-control @error('phone_number') is-invalid @enderror'
                                                    value='{{ $user_apotech->phone_number ?? old('phone_number') }}'>
                                                @error('phone_number')
                                                    <div class='invalid-feedback'>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class='form-group mb-3'>
                                                <label class='mb-2' for='jenis_kelamin'>Jenis Kelamin</label>
                                                <br>
                                                <div class='form-check form-check-inline'>
                                                    <input class='form-check-input' type='radio' name='jenis_kelamin' id="lk"
                                                        @checked($user_apotech->jenis_kelamin === 'Laki-Laki') value='Laki-Laki'>
                                                    <label class='form-check-label' for='lk'>Laki-laki</label>
                                                </div>
                                                <div class='form-check form-check-inline'>
                                                    <input class='form-check-input' type='radio' name='jenis_kelamin' id="pr"
                                                        @checked($user_apotech->jenis_kelamin === 'Perempuan') value='Perempuan'>
                                                    <label class='form-check-label' for='pr'>Perempuan</label>
                                                </div>
                                                @error('jenis_kelamin')
                                                    <div class='invalid-feedback d-inline'>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <div class="float-right">
                                                    <button class="btn btn-primary">Update</button>
                                                </div>
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
@endsection
@section('script')
    <script>
        $(function() {
            $('#uploadLicense').on('change', function() {
                $('#formUploadLicense').submit();
            })
            $('#changeImageProfile').on('change', function() {
                $('#formChangeImageProfile').submit();
            })
        })
    </script>
@endsection
