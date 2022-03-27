@extends('admin.admin')

@section('content')

<div class="container w-25 border p-4">
    <div class="row mx-auto">
    <form  method="POST" action="{{ route('regiones.update', ['regione' => $region->id]) }}">
        @method('PATCH')
        @csrf

        <div class="mb-3 col">
            @error('nombre')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            @if (session('success'))
                    <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif

            <label for="nombre" class="form-label">Región</label>
            <input type="text" class="form-control mb-2" name="nombre" id="nombre" value="{{ $region->nombre }}">

            <label for="version_id" class="form-label">Versiones a las que pertenece</label>

            <div class="d-flex flex-wrap">

            @foreach ($versiones as $version)
                @if (in_array($version->id, $arrayIds))
                <div class="form-check col-4">
                            <input class="form-check-input" type="checkbox" value="{{ $version->id }}" id="version_id" name="version_id[]" checked>
                            <label class="form-check-label" for="version_id">
                                {{ $version->nombre}}
                            </label>
                        </div>
                @else
                <div class="form-check col-4">
                            <input class="form-check-input" type="checkbox" value="{{ $version->id }}" id="version_id" name="version_id[]">
                            <label class="form-check-label" for="version_id">
                                {{ $version->nombre}}
                            </label>
                        </div>
                @endif

            @endforeach

            </div>

             
            <input type="submit" value="Actualizar región" class="btn btn-primary my-2" />
        </div>
    </form>

    
    </div>
</div>
@endsection