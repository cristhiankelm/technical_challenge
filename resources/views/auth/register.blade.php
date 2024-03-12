<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin 2 - Register</title>
  <!-- Custom fonts for this template-->
  <link href="{{ asset('sb-admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link
      href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet">
  
  <!-- Custom styles for this template-->
  <link href="{{ asset('sb-admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>
<body class="bg-gradient-primary">
<div class="container">
  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
        <div class="col-lg-7">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">¡Crea una nueva cuenta!</h1>
            </div>
            <form action="{{ route('register.save') }}" method="POST" class="user">
              @csrf
              <div class="form-group row">
                <div class="col-sm-6">
                  <input name="first_name" type="text"
                         class="form-control form-control-user @error('first_name')is-invalid @enderror"
                         id="exampleInputFirstName" placeholder="Nombre">
                  @error('first_name')
                  <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
                <div class="col-sm-6">
                  <input name="last_name" type="text"
                         class="form-control form-control-user @error('last_name')is-invalid @enderror"
                         id="exampleInputLastName" placeholder="Apellido">
                  @error('last_name')
                  <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <input name="email" type="email"
                       class="form-control form-control-user @error('email')is-invalid @enderror" id="exampleInputEmail"
                       placeholder="Dirección de correo electrónico">
                @error('email')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input name="password" type="password"
                         class="form-control form-control-user @error('password')is-invalid @enderror"
                         id="exampleInputPassword" placeholder="Contraseña">
                  @error('password')
                  <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
                <div class="col-sm-6">
                  <input name="password_confirmation" type="password"
                         class="form-control form-control-user @error('password_confirmation')is-invalid @enderror"
                         id="exampleRepeatPassword" placeholder="Repetir Contraseña">
                  @error('password_confirmation')
                  <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <input name="phone_number" type="number"
                       class="form-control form-control-user @error('phone_number')is-invalid @enderror"
                       id="exampleInputPhoneNumber"
                       placeholder="Número de Teléfono">
                @error('phone_number')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group">
                <input name="address" type="text"
                       class="form-control form-control-user @error('address')is-invalid @enderror"
                       id="exampleInputAddress"
                       placeholder="Dirección del Usuário">
                @error('address')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary btn-user btn-block">Registrar Cuenta</button>
            </form>
            <hr>
            <div class="text-center">
              <a class="small" href="{{ route('login') }}">¿Ya tienes una cuenta? ¡Accede al login!</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="{{ asset('sb-admin/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('sb-admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('sb-admin/js/sb-admin-2.min.js') }}"></script>
</body>
</html>