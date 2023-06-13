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
<<<<<<< HEAD
                                        <ul class="nav justify-content-start">
                                            <li class="nav-item mx-2">
                                                <a style="border-radius: 50px; display:flex; width: 100px; justify-content:center" class="btn btn-sm mb-2 btn btn-outline-primary text-primary ms-0" aria-current="page"
                                                    href="{{ route('profile.index') }}">Profile</a>
                                            </li>
                                            <li class="nav-item mx-2">
                                                <a style="border-radius: 50px; display:flex; width: 100px; justify-content:center" class="btn btn-sm mb-2 btn btn-outline-secondary text-secondary ms-0" href="{{ route('address.index') }}">Address</a>
                                            </li>
                                        </ul>
=======
                                        <x-Landingpage.NavbarProfile />
>>>>>>> 18ec0daca92ce05b9ec2d8e296a29c18fa129245
                                    </div>
                                    <hr>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <img style="border-radius: 30%;" src="{{ asset(Auth::user()->userApotech->image ?? 'virtual/assets/img/default-user.webp') }}" alt="" height="250" width="250"
                                                    class="img-fluid round-image">
                                                <div class="row mt-4">
                                                    <div class="col-md-6">
                                                        <span>File Size : 2 Mb</span>
                                                        <br>
                                                        <span>File Type : .jpg</span>
                                                    </div>
                                                    <div class="col-md align-self-center">
                                                        <form action="{{ route('change-image-profile') }}" method="post"
                                                            id="formChangeImageProfile" enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="file" class="d-none" id="changeImageProfile"
                                                                name="image_profile">
                                                            <label for="changeImageProfile"
                                                                class="btn btn-primary">ChooseFoto</label>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <p class="fw-bold mb-0">Personal Data</p>
                                        <table>
                                            <tr>
                                                <td style="width:120px">Nama</td>
                                                <td style="width:20px"> : </td>
                                                <td>{{ Auth::user()->userApotech()->first()->first_name }}
                                                    {{ Auth::user()->userApotech()->first()->last_name }}</td>
                                            </tr>
                                            <tr>
                                                <td style="width:120px">Jenis Kelamin</td>
                                                <td style="width:20px"> : </td>
                                                <td>{{ auth()->user()->userApotech->jenis_kelamin ?? '-' }}</td>
                                            </tr>
                                        </table>
                                        <p class="fw-bold mt-3 mb-0">Kontak Personal</p>
                                        <table>
                                            <tr>
                                                <td style="width:120px">Email</td>
                                                <td style="width:20px"> : </td>
                                                <td>{{ auth()->user()->email }}</td>
                                            </tr>
                                            <tr>
                                                <td style="width:120px">Phone</td>
                                                <td style="width:20px"> : </td>
                                                <td>{{ auth()->user()->userApotech->phone_number ?? '-' }}</td>
                                            </tr>
                                        </table>
                                        <p class="fw-bold mt-3 mb-0">Licenses</p>
                                        <table>
                                            <tr>
                                                @if(auth()->user()->userApotech->licenses || auth()->user()->status_user->name === 'verified')
                                                    {{-- @if (auth()->user()->status_user->name !== 'verified')
                                                        <strong class="small text-warning">Proses Verification <i
                                                                class="fa-solid fa-circle-info"
                                                                style="margin-left: 5px;"></i></strong>
                                                    @else
                                                        <strong class="small text-success">Verification <i
                                                                class="fa-solid fa-circle-check"
                                                                style="margin-left: 5px;"></i></strong>
                                                    @endif --}}
                                                    {!! auth()->user()->userApotech->statusVerification() !!}
                                                @else
                                                    <form action="{{ route('upload-license') }}" method="post"
                                                        id="formUploadLicense" enctype="multipart/form-data">
                                                        @csrf
                                                        <input name="uploadLicense" type="file" class="d-none"
                                                            id="uploadLicense">
                                                        <label for="uploadLicense" style="font-size: 14px;margin-left:16px;"
                                                            class="label-uploadLicense"><u>Upload</u></label><i
                                                            class="fa-solid fa-circle-info" style="margin-left: 5px;"></i>
                                                    </form>
                                                @endif
                                            </tr>
                                        </table>
                                        <div class="col-md align-right mt-3">
                                            <a href="{{ route('profile.edit') }}" class="btn btn-primary"
                                                style="display: flex; width:100px; justify-content:center">Edit</a>
                                        </div>
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
