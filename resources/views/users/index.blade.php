@extends('layouts.app')

@section('contents')
  <div class="px-5">
    <!-- Page Heading -->
    <h1 class="h3 mb-1 text-gray-800">Usuários</h1>
    <p class="mb-4">Visualice, edite y cree nuevos usuários.</p>

    <div class="row">
      <div class="col-lg-12">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Usuários</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                  <th width="5%">ID</th>
                  <th width="10%">Nombre</th>
                  <th width="10%">Apellido</th>
                  <th width="15%">Email</th>
                  <th width="15%">Numero de Teléfono</th>
                  <th>Dirección</th>
                  <th width="105px">Acciones</th>
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
  </div>
@endsection

@section('scripts')
  <script type="text/javascript">
      $(document).ready(function() {
          $('#dataTable').DataTable({
              "processing": true,
              "serverSide": true,
              "ajax": "{{ route('users.datatable') }}",
              columns: [
                  {data: 'id', name: 'id'},
                  {data: 'first_name', name: 'first_name'},
                  {data: 'last_name', name: 'last_name'},
                  {data: 'email', name: 'email'},
                  {data: 'phone_number', name: 'phone_number'},
                  {data: 'address', name: 'address'},
                  {data: 'action', name: 'action'},
              ],
              language : {
                  url: '//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json'
              }
          });
          $('#dataTable').on('click', '.linkDelete', function() {
              let deleteLink = $(this).attr('data-href');
              $('#deleteForm').attr('action', deleteLink);
          });
      });
  </script>
@endsection