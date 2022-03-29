@include('admin.header')


<body>


    <h1 class="text-center py-4">Campos a editar</h1>

    <div class="row col-6 mx-auto my-4 border border-5 border-danger rounded d-flex flex-wrap">

      <div class="col-3 text-center py-2">
        <a class="text-decoration-none text-dark" href=" {{ route('ciclosHuevo.index') }}">Ciclos Huevo</a>
      </div>

      <div class="col-3 text-center py-2">
        <a class="text-decoration-none text-dark" href=" {{ route('gruposHuevo.index') }}">Grupos Huevo</a>
      </div>

      <div class="col-3 text-center py-2">
        <a class="text-decoration-none text-dark" href=" {{ route('crecimientos.index') }}">Crecimientos</a>
      </div>

      <div class="col-3 text-center py-2">
        <a class="text-decoration-none text-dark" href=" {{ route('tipos.index') }}">Tipos</a>
      </div>

      <div class="col-3  text-center py-2">
        <a class="text-decoration-none text-dark" href=" {{ route('generaciones.index') }}">Generaciones</a>
      </div>

      <div class="col-3  text-center py-2">
        <a class="text-decoration-none text-dark" href=" {{ route('versiones.index') }}">Versiones</a>
      </div>

      <div class="col-3  text-center py-2">
        <a class="text-decoration-none text-dark" href=" {{ route('metodosEvolucion.index') }}">Métodos de evolución</a>
      </div>

      <div class="col-3  text-center py-2">
        <a class="text-decoration-none text-dark" href=" {{ route('objetos.index') }}">Objetos</a>
      </div>

      <div class="col-3  text-center py-2">
        <a class="text-decoration-none text-dark" href=" {{ route('habilidades.index') }}">Habilidades</a>
      </div>

      <div class="col-3  text-center py-2">
        <a class="text-decoration-none text-dark" href=" {{ route('localizaciones.index') }}">Localizaciones</a>
      </div>

      <div class="col-3  text-center py-2">
        <a class="text-decoration-none text-dark" href=" {{ route('regiones.index') }}">Regiones</a>
      </div>

      <div class="col-3  text-center py-2">
        <a class="text-decoration-none text-dark" href=" {{ route('pokedexs.index') }}">Pokedex</a>
      </div>

      <div class="col-3  text-center py-2">
        <a class="text-decoration-none text-dark" href=" {{ route('movimientos.index') }}">Movimientos</a>
      </div>

    </div>    

      @yield('content')
</body>
</html>