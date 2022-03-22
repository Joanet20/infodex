@extends('admin.admin')

@section('content')

<form class="col-3 mx-auto mt-3 border" action="{{ route('generaciones.store') }}" method="POST">
    @csrf

    
  <div class="mb-3 p-3">
  @error('nombre')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
        @endif
    <label for="num_generacion" class="form-label">Generación</label>
    <input type="number" class="form-control" id="num_generacion" aria-describedby="emailHelp" name="num_generacion">
    
  </div>
  <button type="submit" class="btn btn-primary m-3">Crear</button>
</form>

@endsection