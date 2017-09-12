<aside id="sidebarFilters" class="Sidebar Sidebar-Default Sidebar-Empujona Absolute">
  {!! Form::open(['class' => 'Formulario-Filtros', 'method' => 'GET', 'route' => $index_route]) !!}
    <div class="Contenido-Sidebar" style="margin-top:1rem;">
      <div class="Cuerpo-Panel">
        <h3><small>Orden de resultados</small></h3>
        @foreach($appliedSorters as $k => $v)
          <span class="Medalla Medalla-Primario">{{ $v }}</span> <span class="Medalla Medalla-Default">{{ $order }}</span>
        @endforeach
        <div class="Grupo-Formulario {{ $errors->has('orderBy') ? 'El--con-error' : '' }}">
          {!! Form::label('orderBy', 'Ordenar por') !!}
          {!! Form::select('orderBy', $orderByKeys, $orderBy, ['placeholder' => 'Ordenar por', 'id' => 's2OrderBy']) !!}
          @if($errors->has('orderBy'))
          <span class="Mensaje-Validacion">
            <strong>{{ $errors->first('orderBy') }}</strong>
          </span>
          @endif
        </div>
        <div class="Grupo-Formulario {{ $errors->has('order') ? 'El--con-error' : '' }}">
          {!! Form::label('order', 'Dirección') !!}
          {!! Form::select('order', ['asc' => 'Ascendente', 'desc' => 'Descendente'], $order, ['placeholder' => 'Dirección', 'id' => 's2Order']) !!}
          @if($errors->has('order'))
          <span class="Mensaje-Validacion">
            <strong>{{ $errors->first('order') }}</strong>
          </span>
          @endif
        </div>
        <div class="Grupo-Formulario {{ $errors->has('show') ? 'El--con-error' : '' }}">
          {!! Form::label('show', 'Mostrar') !!}
          {!! Form::select('show', ['25' => '25 ', '50' => '50', '100' => '100', '200' => '200', '400' => '400'], Request::get('show') ?: '25', ['placeholder' => 'Mostrar', 'id' => 's2Show']) !!}
          @if($errors->has('show'))
          <span class="Mensaje-Validacion">
            <strong>{{ $errors->first('show') }}</strong>
          </span>
          @endif
        </div>
      </div>
      <section class="Cuerpo-Panel">
        <h3><small>Filtros de búsqueda</small></h3>
        @foreach($appliedFilters as $k => $v)
          <span class="Medalla Medalla-Primario">{{ $v }}</span>
        @endforeach
        <div class="Grupo-Formulario {{ $errors->has('company') ? 'El--con-error' : '' }}">
          {!! Form::label('company', 'Empresa') !!}
          {!! Form::text('company', null, ['placeholder' => 'Búsq. similares']) !!}
          @if($errors->has('company'))
          <span class="Mensaje-Validacion">
            <strong>{{ $errors->first('company') }}</strong>
          </span>
          @endif
        </div>
        <div class="Grupo-Formulario {{ $errors->has('cuit') ? 'El--con-error' : '' }}">
          {!! Form::label('cuit', 'CUIT') !!}
          {!! Form::text('cuit', null, ['placeholder' => 'Búsqueda exacta']) !!}
          @if($errors->has('cuit'))
          <span class="Mensaje-Validacion">
            <strong>{{ $errors->first('cuit') }}</strong>
          </span>
          @endif
        </div>
        <div class="Fila">
          <div class="Grupo-Formulario Col-Tablet-6">
            {!! Form::submit('Aplicar filtros', ['class' => 'Btn-Primario Btn-Bloque']) !!}
          </div>
          <div class="Grupo-Formulario Col-Tablet-6">
            <a class="Btn Btn-Default Btn-Bloque" href="{{ route($index_route) }}">Quitar Filtros</a>
          </div>
      </div>
    </section>
  {!! Form::close() !!}
</aside>
