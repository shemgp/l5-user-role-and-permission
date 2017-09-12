{!! Form::model($model, ['method' => 'PUT', 'route' => [$update_route, $model->{$model->getRouteKeyName()}], 'class' => 'Formulario-Horizontal']) !!}  
  <section>
    <div class="Fila {{ $errors->has('name') ? 'El--con-error' : '' }}">
      {!! Form::label('name', 'Nombre *', ['class' => 'Grupo-Formulario Col-Tablet-2']) !!}
      <div class="Grupo-Formulario Col-Tablet-8">
        {!! Form::text('name', null) !!}
        @if($errors->has('name'))
        <span class="Mensaje-Validacion">{{ $errors->first('name') }}</span>
        @endif
      </div>
    </div>
    <div class="Fila {{ $errors->has('description') ? 'El--con-error' : '' }}">
      {!! Form::label('description', 'Descripción', ['class' => 'Grupo-Formulario Col-Tablet-2']) !!}
      <div class="Grupo-Formulario Col-Tablet-8">
        {!! Form::text('description', null) !!}
        @if($errors->has('description'))
        <span class="Mensaje-Validacion">{{ $errors->first('description') }}</span>
        @endif
      </div>
    </div>
    <div class="Fila {{ $errors->has('special') ? 'El--con-error' : '' }}">
      {!! Form::label('special', 'Privilegio especial', ['class' => 'Grupo-Formulario Col-Tablet-2']) !!}
      <div class="Grupo-Formulario Col-Tablet-8">
        {!! Form::select('special', isset($specials) ? $specials : [], null) !!}
        @if($errors->has('special'))
        <span class="Mensaje-Validacion">{{ $errors->first('special') }}</span>
        @endif
      </div>
    </div>
  </section>
  <hr>
  <section>
    <div class="Titulo-Pagina Texto-Centrado">
      <h3>Permisos asignables / desasignables</h3>
    </div>
    @if($errors->has('permissions'))
    <div class="Nota Error">
      <i class="Icono Icono-Izquierda fa fa-times"></i>{{ $errors->first('permissions') }}
    </div>
    @endif
    <div class="Caja-Tabla Compensar-Padding-Layout">
      <table class="Tabla Responsive Tabla-Rayada">
        <thead>
          <tr>
            <th></th>
            <th>Nombre</th>
            <th>Descripción</th>
          </tr>
        </thead>
        <tbody>
        @foreach($permissions as $permission)
          <tr>
            <td>
              {!! Form::hidden('permissions['.$permission->id.']', null) !!}
              <label class="Checkbox-Inline">{!! Form::checkbox('permissions['.$permission->id.']', null, $model->permissions->contains('id', $permission->id)) !!}</label>
            </td>
            <td>{{ $permission->name }}</td>
            <td>{{ $permission->description }}</td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </section>
  <section class="Botonera-Inferior-Derecha">
      <button type="submit" class="Btn-Primario"><i class="Icono Icono-Izquierda fa fa-save"></i>Guardar</button>
      <a class="Btn Btn-Default" href="{{ route($index_route) }}"><i class="Icono Icono-Izquierda fa fa-arrow-left"></i>Volver</a>
    </div>
  </section>
{!! Form::close() !!}
