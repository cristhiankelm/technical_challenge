@extends('layouts.app')

@section('contents')
  <div class="px-5">
    <!-- Page Heading -->
    <h1 class="h3 mb-1 text-gray-800">Permisos</h1>
    <p class="mb-4">Actualizar nivel de Acceso.</p>

    <!-- Content Row -->
    <div class="row">
      <!-- Border Left Utilities -->
      <div class="col-lg-12">
        <div class="card mb-4 border-left-primary">
          <div class="card-body">
            <a class="btn btn-secondary" href="{{ route('permissions.index') }}">Listar Permisos</a>
          </div>
        </div>
      </div>
    </div>

    @include('components.alerts')

    <div class="row">
      <div class="col-lg-12">
        <div class="card mb-4 pb-5">
          <div class="card-header py-3 mb-5">
            <h6 class="m-0 font-weight-bold text-primary">Formulario para registrar permisos</h6>
          </div>
          <form method="POST" enctype="multipart/form-data" action="{{ route('permissions.update', $permission->id) }}"
                enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="px-5">
              <div class="form-group">
                <label for="name"><b>Nombre</b></label>
                <input type="text" name="name" class="form-control" id="name"
                       placeholder="Nombre del nivel de acceso" value="{{ $permission->name }}">
              </div>

              <button type="submit" class="btn btn-primary mt-4">Actualizar Permiso</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
