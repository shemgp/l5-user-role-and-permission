{!! Form::model($model, ['method' => 'GET', 'class' => 'Formulario-Horizontal']) !!}
  <section>
    <div class="Fila {{ $errors->has('name') ? 'El--con-error' : '' }}">
      {!! Form::label('name', 'Nombre *', ['class' => 'Grupo-Formulario-Chico Col-Tablet-2']) !!}
      <div class="Grupo-Formulario-Chico Col-Tablet-8">
        {!! Form::text('name', null, ['readonly']) !!}
        @if($errors->has('name'))
        <span class="Mensaje-Validacion">{{ $errors->first('name') }}</span>
        @endif
      </div>
    </div>
    <div class="Fila {{ $errors->has('description') ? 'El--con-error' : '' }}">
      {!! Form::label('description', 'Descripción', ['class' => 'Grupo-Formulario-Chico Col-Tablet-2']) !!}
      <div class="Grupo-Formulario-Chico Col-Tablet-8">
        {!! Form::text('description', null, ['readonly']) !!}
        @if($errors->has('description'))
        <span class="Mensaje-Validacion">{{ $errors->first('description') }}</span>
        @endif
      </div>
    </div>
    <div class="Fila {{ $errors->has('special') ? 'El--con-error' : '' }}">
      {!! Form::label('special', 'Privilegio especial', ['class' => 'Grupo-Formulario-Chico Col-Tablet-2']) !!}
      <div class="Grupo-Formulario-Chico Col-Tablet-8">
        {!! Form::select('special', isset($specials) ? $specials : [], null, ['disabled']) !!}
        @if($errors->has('special'))
        <span class="Mensaje-Validacion">{{ $errors->first('special') }}</span>
        @endif
      </div>
    </div>
  </section>
  <hr>
  <section>
    <div class="Titulo-Pagina Texto-Centrado">
      <h3>Permisos</h3>
    </div>
    <div class="Caja-Tabla">
      <table class="Tabla Responsive Tabla-Rayada">
        <thead>
          <tr>
            <th class="Texto-Centrado"></th>
            <th class="Texto-Centrado">Visualizar</th>
            <th class="Texto-Centrado">Crear</th>
            <th class="Texto-Centrado">Editar</th>
            <th class="Texto-Centrado">Eliminar</th>
          </tr>
        </thead>
        <tbody>
        @foreach($permissions->chunk(4) as $chunk)
          <tr>
            <th>{{ $chunk->first()->resource }}</th>
          @foreach($chunk as $permission)

            <td class="Texto-Centrado {{ $model->permissions->contains('id', $permission->id) || $model->special === 'all-access' ? 'Texto-Success' : 'Texto-Error' }}">
              <i class="Icono fa fa-{{ $model->permissions->contains('id', $permission->id) || $model->special === 'all-access' ? 'check' : 'times' }}"></i>
            </td>
          @endforeach
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </section>
  <section class="Botonera-Inferior-Derecha">
      <a class="Btn Btn-Default" href="{{ route($index_route) }}"><i class="Icono Icono-Izquierda fa fa-arrow-left"></i>Volver</a>
    </div>
  </section>
{!! Form::close() !!}
