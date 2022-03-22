@extends('admin.admin')

@section('content')

<div class="container w-25 border p-4">
    <div class="row mx-auto">
    <form  method="POST" action="{{ route('ciclosHuevo.update', ['ciclosHuevo' => $cicloHuevo->id]) }}">
        @method('PATCH')
        @csrf

        <div class="mb-3 col">
            @error('nombre')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            @if (session('success'))
                    <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif

            <label for="num_ciclos" class="form-label">Numero de ciclos</label>
            <input type="number" class="form-control mb-2" name="num_ciclos" id="num_ciclos" value="{{ $cicloHuevo->num_ciclos }}">

            <label for="min_pasos" class="form-label">Mínimo de pasos</label>
            <input type="number" class="form-control mb-2" name="min_pasos" id="min_pasos" value="{{ $cicloHuevo->min_pasos }}">

            <label for="max_pasos" class="form-label">Máximo de pasos</label>
            <input type="number" class="form-control mb-2" name="max_pasos" id="max_pasos" value="{{ $cicloHuevo->max_pasos }}">

             
            <input type="submit" value="Actualizar ciclo huevo" class="btn btn-primary my-2" />
        </div>
    </form>

    
    </div>
</div>
@endsection