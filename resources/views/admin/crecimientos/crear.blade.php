@extends('admin.admin')

@section('content')

<form class="col-3 mx-auto mt-3 border" action="{{ route('crecimientos.store') }}" method="POST">
    @csrf

    
  <div class="mb-3 p-3">
  @error('nombre')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        @error('puntos_exp')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
        @endif
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" class="form-control" id="nombre" aria-describedby="emailHelp" name="nombre">

    <label for="puntos_exp" class="form-label">Puntos de experiencia</label>
    <input type="number" class="form-control" id="puntos_exp" aria-describedby="emailHelp" name="puntos_exp">
    
  </div>
  <button type="submit" class="btn btn-primary m-3">Crear</button>
</form>

@endsection