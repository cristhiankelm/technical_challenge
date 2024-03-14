@extends('layouts.app')

@section('contents')
  <div class="px-5">
    <!-- Page Heading -->
    <h1 class="h3 mb-1 text-gray-800">Egresos</h1>
    <p class="mb-4">Crear nuevo Egreso.</p>

    <!-- Content Row -->
    <div class="row">
      <!-- Border Left Utilities -->
      <div class="col-lg-12">
        <div class="card mb-4 border-left-primary">
          <div class="card-body">
            <a class="btn btn-secondary" href="{{ route('expenses.index') }}">Listar Egresos</a>
          </div>
        </div>
      </div>
    </div>

    @include('components.alerts')

    <div class="row">
      <div class="col-lg-12">
        <div class="card mb-4 pb-5">
          <div class="card-header py-3 mb-5">
            <h6 class="m-0 font-weight-bold text-primary">Formulario para registrar egresos</h6>
          </div>
          <form method="POST" enctype="multipart/form-data" action="{{ route('expenses.store') }}"
                enctype="multipart/form-data">
            @csrf

            <div class="px-5">
              <div class="form-group">
                <label for="concept"><b>Concepto</b></label>
                <input type="text" name="concept" class="form-control" id="concept"
                       placeholder="Informe el concepto (motivo) sobre la operación">
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="date"><b>Fecha</b></label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">Seleccionar dia</span>
                    </div>
                    <input class="form-control" name="date" type="date" required>
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label for="amount"><b>Monto</b></label>
                  <input type="number" name="amount" id="amount" class="form-control"
                         placeholder="G$ 0.000 Ingrese el monto en guaraníes" aria-label="Monto"
                         aria-describedby="basic-addon1" required>
                </div>
              </div>

              <button type="submit" class="btn btn-primary mt-4">Registrar Egreso</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
