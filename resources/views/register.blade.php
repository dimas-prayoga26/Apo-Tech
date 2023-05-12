<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" />
    <style>
      * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
      }
      .biru {
        display: none;
      }
      .merah {
        height: 100vh;
        width: 100%;
      }
      @media only screen and (min-width: 913px) {
        .biru {
          display: flex;
          width: 50%;
          height: 100vh;
        }
        .merah {
          width: 50%;
        }
      }
    </style>
  </head>
  <body>
    <div style="display: flex">
      <div class="biru">
        <div id="satu" style="width: 1500px" class="satu align-items-center d-flex">
          <div style="position: absolute; top: 0; right: 0">
            <img style="width: 200px; float: right" src="{{ asset('assets-image/variasi.png') }}" alt="variasi" />
          </div>
          <div class="col d-flex flex-column align-items-center justify-content-center">
            <img style="width: 500px" src="{{ asset('assets-image/regist.png') }}" alt="login" />
            <p style="width: 450px; color: #ACA8A8; font-weight: 600; text-align: center;" class="fs-1 pt-4">
                Let’s get started
            </p>
          </div>
        </div>
      </div>
      <div class="merah">
        <div class="d-flex flex-column" style="width: 100%; background-color: #91d8ea; height: 100vh; display: flex; justify-content: center; align-items: center">
          <div class="pb-2">
            <img style="width: 70px" src="{{ asset('assets-image/icon_toko.png') }}" alt="icon" />
            <p class="pt-2" style="text-align: center; color: #ffff; font-weight: 700">Register</p>
          </div>
          @if(session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show " role="alert">
              <strong>{{ session()->get('error') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
          @endif

          @if(session()->has('succes'))
            <div class="alert alert-succes alert-dismissible fade show " role="alert">
              <strong>{{ session()->get('succes') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
          @endif
          <div style="width: 400px" class="bg-white p-4 rounded-4">
            <form action="{{ route('auth.register.process') }} " method="post">
              @csrf
              <div class="">
                <label style="color: #00b9d8; font-weight: 700" for="inputUsername" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10 w-100">
                  <input style="background-color: #f3f3f3" type="text" name="username" class="form-control" id="inputUsername" placeholder="Your username here" required/></div>
                <div class="">
                  <label style="color: #00b9d8; font-weight: 700" for="inputEmail" class="col-sm-2 col-form-label">E-mail</label>
                  <div class="col-sm-10 w-100">
                    <input style="background-color: #f3f3f3" type="text" name="email" class="form-control" id="inputEmail" placeholder="your active e-mail here" required/>
                  </div>
                </div>
                {{-- <div class="">
                  <label style="color: #00b9d8; font-weight: 700" for="inputFirstName" class="col-sm-2 col-form-label">Nama Depan</label>
                  <div class="col-sm-10 w-100">
                    <input style="background-color: #f3f3f3" type="text" name="first_name" class="form-control" id="inputFirstName" placeholder="Nama Depan" />
                  </div>
                  <span id="pwvalid" style="font-size: 12px; color: #565656; text-align: end; float: right; display: none;"></span>
                </div>
                <div class="">
                  <label style="color: #00b9d8; font-weight: 700" for="inputLastName" class="col-sm-2 col-form-label">Nama Belakang</label>
                  <div class="col-sm-10 w-100">
                    <input style="background-color: #f3f3f3" type="text" name="last_name" class="form-control" id="inputLastName" placeholder="Nama Belakang" />
                  </div>
                  <span id="pwvalid" style="font-size: 12px; color: #565656; text-align: end; float: right; display: none;"></span>
                </div>
                <div class="">
                  <label style="color: #00b9d8; font-weight: 700" for="inputNoHandphone" class="col-sm-2 col-form-label">Nomor Handphone</label>
                  <div class="col-sm-10 w-100">
                    <input style="background-color: #f3f3f3" type="text" name="phone_number" class="form-control" id="inputNoHandphone" placeholder="Nomor Handphone" />
                  </div>
                  <span id="pwvalid" style="font-size: 12px; color: #565656; text-align: end; float: right; display: none;"></span>
                </div> --}}
                <div class="">
                  <label style="color: #00b9d8; font-weight: 700" for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10 w-100">
                    <input style="background-color: #f3f3f3" type="password" name="password" class="form-control" id="inputPassword" placeholder="password here" required/>
                  </div>
                  <span id="pwvalid" style="font-size: 12px; color: #565656; text-align: end; float: right; display: none;"></span>
                </div>
                
                {{-- <div class="">
                  <label style="color: #00b9d8; font-weight: 700" for="inputRetypePassword" class="col-sm-2 col-form-label w-100">Re-type Password</label>
                  <div class="col-sm-10 w-100">
                    <input style="background-color: #f3f3f3" type="password" class="form-control" id="inputRetypePassword" placeholder="retype password here" />
                  </div>
                  <p id="pwcinfimvalid" style="font-size: 12px; color: #565656; text-align: end; display: none;">Use the same password</p>
                </div> --}}
                
                  <div style="display: flex;">
                    <input type="checkbox" id="agreeCheckbox" />
                    <div>
                        <div style="padding-top: 12px;"></div>
                        <p style="color: #565656; font-size: 12px; padding-left: 10px;">
                            I agree to the <a href="#">Terms & Conditions & Privacy Policy</a>
                        </p>
                    </div>
                  </div>
              </div>

              <button id="registerButton" onclick="register()" style="background-color: #91d8ea; color: #ffff; font-weight: 700" class="btn w-100">Register</button>
              <p style="color: #565656; font-size: 12px" class="text-center pt-2">Already have an account? <a href="{{ route('auth.login') }}">Log In </a></p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
