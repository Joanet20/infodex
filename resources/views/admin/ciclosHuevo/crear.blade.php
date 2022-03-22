@extends('admin.admin')

@section('content')

<form class="col-3 mx-auto mt-3 border" action="{{ route('ciclosHuevo.store') }}" method="POST">
    @csrf

    
  <div class="mb-3 p-3">
  @error('nombre')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
        @endif
    <label for="num_ciclos" class="form-label">Número de ciclos</label>
    <input type="number" class="form-control" id="num_ciclos" aria-describedby="emailHelp" name="num_ciclos">

    <label for="min_pasos" class="form-label">Minimo de pasos</label>
    <input type="number" class="form-control" id="min_pasos" aria-describedby="emailHelp" name="min_pasos">

    <label for="max_pasos" class="form-label">Maximo de pasos</label>
    <input type="number" class="form-control" id="max_pasos" aria-describedby="emailHelp" name="max_pasos">
    
  </div>
  <button type="submit" class="btn btn-primary m-3">Crear</button>
</form>

@endsection