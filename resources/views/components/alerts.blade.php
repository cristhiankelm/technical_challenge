@if (session('success'))
  <div class="alert alert-success">
    <p>{{ session()->get('success') }}</p>
  </div>
@endif

@if (session('error'))
  <div class="alert alert-danger">
    <p>{{ session()->get('error') }}</p>
  </div>
@endif

@if ($errors->any())
  <!-- Content Row -->
  <div class="row mb-4 px-3">
    <!-- Border Left Utilities -->
    <div class="col-lg-12">
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
@endif
