@extends('layouts.app')

@section('contents')
  <!-- Page Heading -->
  <h1 class="h3 mb-1 text-gray-800">Ingresos</h1>
  <p class="mb-4">Visualice, edite y cree nuevos ingresos.</p>

  <!-- Content Row -->
  <div class="row">
    <!-- Border Left Utilities -->
    <div class="col-lg-12">
      <div class="card mb-4 border-left-success">
        <div class="card-body">
          <a class="btn btn-success" href="{{ route('income.index') }}">Nuevo Ingreso</a>
        </div>
      </div>
    </div>
  </div>

  <div class="row px-4">
    <div class="col-lg-12">
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Productos</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered data-table" width="100%" cellspacing="0">
              <thead>
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Concepto</th>
                <th>Monto</th>
                <th width="105px">Acción</th>
              </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script type="text/javascript">
      $(function () {
          var table = $('.data-table').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('income.datatable') }}",
              columns: [
                  {data: 'id', name: 'id'},
                  {data: 'date', name: 'date'},
                  {data: 'concept', name: 'concept'},
                  {data: 'amount', name: 'amount'},
                  {data: 'action', name: 'action', orderable: false, searchable: false},
              ],
              language: {
                  url: '//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json'
              }
          });
      });
  </script>
@endsection