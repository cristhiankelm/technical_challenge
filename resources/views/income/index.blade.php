@extends('layouts.app')

@section('title', 'Ingresos')

@section('contents')

  <div class="container">
    <h2>Laravel 10 Implementing Yajra Datatables </h2>
    <table class="table table-bordered data-table">
      <thead>
      <tr>
        <th>No</th>
        <th>Title</th>
        <th>Content</th>
        <th width="105px">Action</th>
      </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>

  {{--  </body>--}}
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
              ]
          });

      });
  </script>
@endsection