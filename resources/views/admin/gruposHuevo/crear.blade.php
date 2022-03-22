@extends('admin.admin')

@section('content')

<form class="col-3 mx-auto mt-3 border" action="{{ route('gruposHuevo.store') }}" method="POST">
    @csrf

    
  <div class="mb-3 p-3">
  @error('nombre')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
        @endif
    <label for="nombre" class="form-label">Grupo Huevo</label>
    <input type="text" class="form-control" id="nombre" aria-describedby="emailHelp" name="nombre">
  </div>
  <button type="submit" class="btn btn-primary m-3">Crear</button>
</form>

@endsection