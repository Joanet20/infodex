@extends('admin.admin')

@section('content')

<form class="col-3 mx-auto mt-3 border" action="{{ route('regiones.store') }}" method="POST">
    @csrf

    
  <div class="mb-3 p-3">
  @error('nombre')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
        @endif
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" class="form-control" id="nombre" aria-describedby="emailHelp" name="nombre">

    <label for="version_id" class="form-label">Versiones disponibles</label>

    <div class="d-flex flex-wrap">
    @foreach ($versiones as $version)
    <div class="form-check col-4">
        <input class="form-check-input" type="checkbox" value="{{ $version->id }}" name="version_id[]" id="version_id">
        <label class="form-check-label" for="version_id">
            {{ $version->nombre }}
        </label>
    </div>
    @endforeach
    </div>
    
  </div>
  <button type="submit" class="btn btn-primary m-3">Crear</button>
</form>

@endsection