<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}"/>
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
            <img style="width: 500px" src="{{ asset('assets-image/login.png') }}" alt="login" />
            <p style="width: 450px" class="fs-1 text-start pt-4">
              Hi there <br />
              welcome back
            </p>
          </div>
        </div>
      </div>
      <div class="merah">
        <div class="d-flex flex-column" style="width: 100%; background-color: #91d8ea; height: 100vh; display: flex; justify-content: center; align-items: center">
          <div class="pb-2">
            <img style="width: 70px" src="{{ asset('assets-image/icon.png') }}" alt="icon" />
            <p class="pt-2" style="text-align: center; color: #ffff; font-weight: 700">Login</p>
          </div>
            @if($errors->any())
                <h4>{{$errors->first()}}</h4>
            @endif
          <div style="width: 400px" class="bg-white p-4 rounded-4">
            <form action="{{ route('login') }}" method="post">
                @csrf
              <div class="">
                <label style="color: #00b9d8; font-weight: 700" for="inputEmail" class="col-sm-2 col-form-label">E-mail</label>
                <div class="col-sm-10 w-100">
                  <input style="background-color: #f3f3f3" name="email" type="text" class="form-control" id="inputEmail" placeholder="e-mail/username" required/>
                </div>
              </div>
              <div class="">
                <label style="color: #00b9d8; font-weight: 700" for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10 w-100">
                  <input style="background-color: #f3f3f3" name="password" type="password" class="form-control" id="inputPassword" placeholder="password here"required />
                </div>
                <div class="py-2">
                  <p> <a style="color: #00b9d8; font-weight: 500; text-decoration: none;" class="float-end" href="/forgotPassword.html">Forgot Password?</a></p>
                </div>
              </div>
              <button style="background-color: #91d8ea; color: #ffff; font-weight: 700" class="btn w-100 mt-2">Login</button>

              <p style="color: #aca8a8" class="text-center pt-2">don't have an account?, register below</p>
            </form>

              <div>
                <button style="background-color: #dbf2f6;  font-weight: 700" class="btn w-100">
                  <a style="color: #00b9d8; text-decoration: none;" href="/register.html">Register</a>
                </button>
              </div>
              <div class="d-flex flex-column align-items-center">
                <p style="color: #aca8a8" class="text-center pt-2">Login With</p>
                <img style="width: 50px" src="{{ asset('assets/google.png') }}" alt="google" />
              </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
