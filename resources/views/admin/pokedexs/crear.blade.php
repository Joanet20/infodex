@extends('admin.admin')

@section('content')

<form class="col-3 mx-auto mt-3 border" action="{{ route('pokedexs.store') }}" method="POST">
    @csrf

    
  <div class="mb-3 p-3">
  @error('nombre')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
        @endif
    <label for="nombre" class="form-label">Pokedex</label>
    <input type="text" class="form-control" id="nombre" aria-describedby="emailHelp" name="nombre">

    <label for="region_id" class="form-label">Región</label>
            <select class="form-select" name="region_id" id="region_id">


                <option selected >Selecciona una región</option>
                @foreach ($regiones as $region)
                
                <option value="{{ $region->id }}">{{ $region->nombre }}</option>
                
                
                @endforeach
            </select>
    
  </div>
  <button type="submit" class="btn btn-primary m-3">Crear</button>
</form>

@endsection