@extends('admin.admin')

@section('content')

<div class="col-6 mx-auto border-top border-end border-start">

  <a href="{{ route('metodosEvolucion.create') }}" class="btn btn-primary m-3">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 18">
      <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
    </svg>  
    Crear Método de evolución
  </a>

  <table class="table table-striped">
  <thead>
    <tr>
      <th>Método de evolución</th>
      <th>Editar</th>
      <th>Eliminar</th>
    </tr>
  </thead>

  <tbody>
  @foreach ($metodosEvolucion as $metodoEvolucion)
    <tr>
      <td>
        <span class="fs-5">{{ $metodoEvolucion->nombre }}</span>
      </td>
      <td>
        <a href="{{ route('metodosEvolucion.show', ['metodosEvolucion' => $metodoEvolucion->id]) }}" type="submit" class="btn btn-success btn-sm">Editar</a>
      </td>
      <td>
        <form action="{{ route('metodosEvolucion.destroy', [$metodoEvolucion->id]) }}" method="POST">
          @method('DELETE')
          @csrf
          <button class="btn btn-danger btn-sm">Eliminar</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
    
@endsection