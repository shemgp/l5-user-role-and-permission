<section class="Caja-Tabla">
  <table class="Tabla Responsive Tabla-Hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Email</th>
        <th>Nombre completo</th>
        <th>Documento</th>
        <th>Estado</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($items as $item)
      <tr>
        <td>{{ $item->present()->id }}</td>
        <td>{{ $item->present()->email }}</td>
        <td>{{ $item->present()->full_name }}</td>
        <td>{{ $item->present()->document }}</td>
        <td>{{ $item->present()->activated }}</td>
        <td>
          {!! Form::open(['method' => 'DELETE', 'route' => [$destroy_route, $item->{$item->getRouteKeyName()}], 'class' => 'Formulario-Tabla']) !!}
            <a class="Btn Btn-Tabla" href="{{ route($show_route, $item->{$item->getRouteKeyName()}) }}"><i class="Icono Icono-Izquierda fa fa-eye"></i></a>
            <a class="Btn Btn-Tabla" href="{{ route($edit_route, $item->{$item->getRouteKeyName()}) }}"><i class="Icono Icono-Izquierda fa fa-pencil-square-o"></i></a>
            <button type="submit" class="Btn-Tabla"><i class="Icono Icono-Izquierda fa fa-trash"></i></button>
          {!! Form::close() !!}
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</section>
<div class="Wrapper-Paginacion">
  <span class="Cuenta-Resultados"><i class="Icono Icono-Izquierda fa fa-search"></i>Viendo {{ $items->count() }} de {{ $items->total() }} resultados.</span>
  {!! $items->appends($appliedFiltersAndSorters)->render() !!}
</div>
