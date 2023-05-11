<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reset Password</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" />

    </style>
  </head>
  <body>

    <div style="height: 100vh;" class="w-100 d-flex align-items-center justify-content-center">
        <div style="width: 400px" class="bg-white p-4 rounded-4 shadow-lg">
            <form action="{{ route('password.update') }}" method="post">
              @csrf
              <div class="">
                @if (count($errors) > 0)
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
                  @endif
                  @if (session()->has('status'))
                      <div class="alert alert-succes">
                          {{ session()->get('status') }}
                      </div>
                @endif
                <input type="hidden" name="token" value="{{ request()->token }}">

                <input type="hidden" name="email" value="{{ request()->email }}">

                <label style="color: #00b9d8; font-weight: 700" for="inputEmail" class="col-sm-2 col-form-label w-100">New Password</label>
                <div class="col-sm-10 w-100">
                  <input style="background-color: #f3f3f3;" type="text" class="form-control" name="password" id="inputEmail" placeholder="your new password" />
                </div>
              </div>
              <div class="mt-2">
                <label style="color: #00b9d8; font-weight: 700" for="inputEmail" class="col-sm-2 col-form-label w-100">Retype password</label>
                <div class="col-sm-10 w-100">
                  <input style="background-color: #f3f3f3" type="text" class="form-control" name="password_confirmation" id="inputEmail" placeholder="password confirmation" />
                </div>
              </div>
              <button style="background-color: #91d8ea; color: #ffff; font-weight: 700" class="btn w-100 mt-4">Change Password</button>
            </form>
          </div>
          <div style="position: absolute; top: 0; right: 0">
            <img style="width: 200px; float: right" src="{{ asset('assets-image/variasi.png') }}" alt="variasi" />
          </div>
    </div>
  </body>
</html>
