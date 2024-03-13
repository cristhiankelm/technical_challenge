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
    <div class="row mb-4">
        <!-- Border Left Utilities -->
        <div class="col-lg-12">
            <div class="card mb-4 border-left-primary">
                <div class="card-body">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
