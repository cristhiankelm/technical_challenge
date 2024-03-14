@extends('layouts.app')

@section('contents')
  <div class="px-5">
    <!-- Page Heading -->
    <h1 class="h3 mb-1 text-gray-800">Permisiones</h1>
    <p class="mb-4">Gerenciar nivel de acceso de los usuários</p>

    <!-- Content Row -->
    <div class="row">
      <!-- Border Left Utilities -->
      <div class="col-lg-12">
        <div class="card mb-4 border-left-primary">
          <div class="card-body">
            <a class="btn btn-secondary" href="{{ route('permissions.index') }}">Listar Permisiones</a>
          </div>
        </div>
      </div>
    </div>

    @include('components.alerts')

    <div class="row">
      <div class="col-lg-12">
        <div class="card mb-4 pb-5">
          <div class="card-header py-3 mb-5">
            <h6 class="m-0 font-weight-bold text-primary">Formulário para asignar permisiones</h6>
          </div>

          <form method="POST" action="{{ route('assign-permissions.update', ['user' => '__USER_ID__']) }}">
            @csrf
            @method('PUT')

            <div class="px-5">
              <div class="form-group">
                <label for="user"><b>Usuário</b></label>
                <select id="user" class="form-control" onchange="updatePermissions(this)">
                  <option value="">Seleccione um usuário</option>
                  @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group" id="permissions">
                <!-- As permissões serão carregadas aqui pelo JavaScript -->
              </div>

              <button type="submit" class="btn btn-primary mt-4">Asignar Permisiones</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script>
      function updatePermissions(select) {
          var userId = $(select).val();
          var permissionsDiv = $('#permissions');
          permissionsDiv.empty(); // Limpa as permissões atuais

          if (userId) {
              var url = "{{ route('assign-permissions.index', ['user' => '__USER_ID__']) }}".replace('__USER_ID__', userId);
              $.ajax({
                  url: url,
                  type: 'GET',
                  success: function(data) {
                      $.each(data, function(index, permission) {
                          var checkbox = $('<input>', {
                              type: 'checkbox',
                              name: 'permissions[]',
                              value: permission.id,
                              checked: permission.assigned
                          });

                          var label = $('<label>').append(checkbox).append(` ${permission.name}`);

                          var div = $('<div>').append(label);

                          permissionsDiv.append(div);
                      });

                      // Atualiza a ação do formulário com o ID do usuário selecionado
                      $('form').attr('action', "{{ route('assign-permissions.update', ['user' => '__USER_ID__']) }}".replace('__USER_ID__', userId));
                  }
              });
          }
      }
  </script>
@endsection