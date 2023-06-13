<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Login</title>
    <!-- Bootstrap CSS -->
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
            <h1 style="width: 450px; color: #ACA8A8;" class="fs-1 text-start pt-4">
              Hi there <br />
              welcome back
            </h1>
          </div>
        </div>
      </div>
      <div class="merah">
        <div class="d-flex flex-column" style="width: 100%; background-color: #91d8ea; height: 100vh; display: flex; justify-content: center; align-items: center">
          <div class="pb-2">
            <img style="width: 70px" src="{{ asset('assets-image/logoapotech.png') }}" alt="icon" />
            <p class="pt-2" style="text-align: center; color: #ffff; font-weight: 700">Login</p>
          </div>
            @if(session()->has('error'))
              <div class="alert alert-danger alert-dismissible fade show " role="alert">
                <strong>{{ session()->get('error') }}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>
            @elseif(session()->has('succes'))
            <div class="alert alert-success alert-dismissible fade show " role="alert">
              <strong>{{ session()->get('succes') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
          <div style="width: 400px" class="bg-white p-4 rounded-4">
            <form action="{{ route('auth.login.process') }}" method="post">
                @csrf
              <div class="">
                <label style="color: #00b9d8; font-weight: 700" for="inputEmail" class="col-sm-4 col-form-label">E-mail</label>
                <div class="col-sm-12 w-100">
                  <input style="background-color: #f3f3f3" name="email" type="text" class="form-control" id="inputEmail" placeholder="e-mail/username" required/>
                </div>
              </div>
              <div class="">
                <label style="color: #00b9d8; font-weight: 700" for="inputPassword" class="col-sm-4 col-form-label">Password</label>
                <div class="col-sm-12 w-100">
                  <input style="background-color: #f3f3f3" name="password" type="password" class="form-control" id="inputPassword" placeholder="password here"required />
                </div>
                <div class="py-2 col-sm-12 w-100">
                  <p> <a style="color: #00b9d8; font-weight: 500; text-decoration: none;" class="float-end" href="{{ route('forgot-password') }}">Forgot Password?</a></p>
                </div>
              </div>
              <button style="background-color: #91d8ea; color: #ffff; font-weight: 700" class="btn w-100 mt-2">Login</button>

              <p style="color: #aca8a8" class="text-center pt-2">don't have an account?, register below</p>
            </form>

              <div>
                <button style="background-color: #dbf2f6;  font-weight: 700" class="btn w-100">
                  <a style="color: #00b9d8; text-decoration: none;" href="{{ route('auth.register') }}">Register</a>
                </button>
              </div>
              <div class="d-flex flex-column align-items-center">
                <p style="color: #aca8a8" class="text-center pt-2">Login With</p>
                <a href="#"><img style="width: 50px" src="{{ asset('assets-image/google.png') }}" alt="google" /></a>
              </div>
          </div>
        </div>
      </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
