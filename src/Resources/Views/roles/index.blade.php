@extends($layout)
@section('title', $title)
@section('sidebar')
  @include($module.$prefix.$resource_name.'.partials.pluma-sidebar')
@endsection
@section('content')
  <header class="Titulo-Pagina">
    <h1>{{ $title }} <small>Listado actual</small></h1>
    @include($module.$prefix.'partials.applied-filters-and-sorters')
  </header>
  <div class="Botonera-Superior-Derecha">
    <a class="Btn Btn-Redondo Btn-Primario" href="{{ route($create_route) }}">
        <i class="Icono fa fa-plus"></i>
    </a>
    {!! Form::button('<i class="Icono fa fa-filter"></i>', ['type' => 'button', 'class' => 'Btn-Redondo Btn-Default Btn-Sidebar', 'data-sidebar' => 'sidebarFilters']) !!}
    {!! Form::open(['method' => 'GET', 'route' => $index_route]) !!}
      <div class="Grupo-Formulario">
        {!! Form::text('term', null, ['placeholder' => 'Búsqueda rápida...', 'class' => 'Con-Icono-Izquierda']) !!}
        <i class="Icono-Control-Izquierda fa fa-search"></i>
      </div>
    {!! Form::close() !!}
  </div>
  @include($module.$prefix.$resource_name.'.partials.pluma-index-table')
  <div class="Botonera-Inferior-Derecha">
    <a class="Btn Btn-Primario" href="{{ route($create_route) }}"><i class="Icono Icono-Izquierda fa fa-plus"></i>Nuevo Rol</a>
  </div>
@endsection
