{!! Form::model($model, ['method' => 'GET', 'class' => 'Formulario-Horizontal']) !!}
  <section>
    <div class="Titulo-Pagina">
      <h2 class="Texto-Centrado">Identidad</h2>
    </div>
    <div class="Fila {{ $errors->has('cuit') ? 'El--con-error' : '' }}">
      {!! Form::label('cuit', 'CUIT', ['class' => 'Grupo-Formulario-Chico Col-Tablet-2']) !!}
      <div class="Grupo-Formulario-Chico Col-Tablet-8">
        {!! Form::text('cuit', null, ['readonly']) !!}
        @if($errors->has('cuit'))
        <span class="Mensaje-Validacion">{{ $errors->first('cuit') }}</span>
        @endif
      </div>
    </div>
    <div class="Fila {{ $errors->has('documentType_id') ? 'El--con-error' : '' }}">
      {!! Form::label('documentType_id', 'Tipo de Documento', ['class' => 'Grupo-Formulario-Chico Col-Tablet-2']) !!}
      <div class="Grupo-Formulario-Chico Col-Tablet-8">
        {!! Form::select('documentType_id', isset($documentTypes) ? $documentTypes : [], null, ['disabled']) !!}
        @if($errors->has('documentType_id'))
        <span class="Mensaje-Validacion">{{ $errors->first('documentType_id') }}</span>
        @endif
      </div>
    </div>
    <div class="Fila {{ $errors->has('document_number') ? 'El--con-error' : '' }}">
      {!! Form::label('document_number', 'Nº de documento *', ['class' => 'Grupo-Formulario-Chico Col-Tablet-2']) !!}
      <div class="Grupo-Formulario-Chico Col-Tablet-8">
        {!! Form::text('document_number', null, ['readonly']) !!}
        @if($errors->has('document_number'))
        <span class="Mensaje-Validacion">{{ $errors->first('document_number') }}</span>
        @endif
      </div>
    </div>
    <div class="Fila {{ $errors->has('first_name') ? 'El--con-error' : '' }}">
      {!! Form::label('first_name', 'Nombre', ['class' => 'Grupo-Formulario-Chico Col-Tablet-2']) !!}
      <div class="Grupo-Formulario-Chico Col-Tablet-8">
        {!! Form::text('first_name', null, ['readonly']) !!}
        @if($errors->has('first_name'))
        <span class="Mensaje-Validacion">{{ $errors->first('first_name') }}</span>
        @endif
      </div>
    </div>
    <div class="Fila {{ $errors->has('last_name') ? 'El--con-error' : '' }}">
      {!! Form::label('last_name', 'Apellido', ['class' => 'Grupo-Formulario-Chico Col-Tablet-2']) !!}
      <div class="Grupo-Formulario-Chico Col-Tablet-8">
        {!! Form::text('last_name', null, ['readonly']) !!}
        @if($errors->has('last_name'))
        <span class="Mensaje-Validacion">{{ $errors->first('last_name') }}</span>
        @endif
      </div>
    </div>
  </section>
  <section>
    <div class="Titulo-Pagina">
      <h2 class="Texto-Centrado">Ubicación</h2>
    </div>
    <div class="Fila {{ $errors->has('legal_address') ? 'El--con-error' : '' }}">
      {!! Form::label('legal_address', 'Domicilio legal', ['class' => 'Grupo-Formulario-Chico Col-Tablet-2']) !!}
      <div class="Grupo-Formulario-Chico Col-Tablet-8">
        {!! Form::text('legal_address', null, ['readonly']) !!}
        @if($errors->has('legal_address'))
        <span class="Mensaje-Validacion">{{ $errors->first('legal_address') }}</span>
        @endif
      </div>
    </div>
    <div class="Fila {{ $errors->has('country_id') ? 'El--con-error' : '' }}">
      {!! Form::label('country_id', 'País', ['class' => 'Grupo-Formulario-Chico Col-Tablet-2']) !!}
      <div class="Grupo-Formulario-Chico Col-Tablet-8">
        {!! Form::select('country_id', isset($countries) ? $countries : [],  null, ['disabled']) !!}
        @if($errors->has('country_id'))
        <span class="Mensaje-Validacion">{{ $errors->first('country_id') }}</span>
        @endif
      </div>
    </div>
    <div class="Fila {{ $errors->has('state_id') ? 'El--con-error' : '' }}">
      {!! Form::label('state_id', 'Provincia', ['class' => 'Grupo-Formulario-Chico Col-Tablet-2']) !!}
      <div class="Grupo-Formulario-Chico Col-Tablet-8">
        {!! Form::select('state_id', isset($states) ? $states : [], null, ['disabled']) !!}
        @if($errors->has('state_id'))
        <span class="Mensaje-Validacion">{{ $errors->first('state_id') }}</span>
        @endif
      </div>
    </div>
    <div class="Fila {{ $errors->has('city_id') ? 'El--con-error' : '' }}">
      {!! Form::label('city_id', 'Ciudad', ['class' => 'Grupo-Formulario-Chico Col-Tablet-2']) !!}
      <div class="Grupo-Formulario-Chico Col-Tablet-8">
        {!! Form::select('city_id', isset($cities) ? $cities : [], null, ['disabled']) !!}
        @if($errors->has('city_id'))
        <span class="Mensaje-Validacion">{{ $errors->first('city_id') }}</span>
        @endif
      </div>
    </div>
    <div class="Fila {{ $errors->has('town') ? 'El--con-error' : '' }}">
      {!! Form::label('town', 'Localidad, barrio o pueblo', ['class' => 'Grupo-Formulario-Chico Col-Tablet-2']) !!}
      <div class="Grupo-Formulario-Chico Col-Tablet-8">
        {!! Form::text('town', null, ['readonly']) !!}
        @if($errors->has('town'))
        <span class="Mensaje-Validacion">{{ $errors->first('town') }}</span>
        @endif
      </div>
    </div>
    <div class="Fila {{ $errors->has('zip_code') ? 'El--con-error' : '' }}">
      {!! Form::label('zip_code', 'Codigo postal', ['class' => 'Grupo-Formulario-Chico Col-Tablet-2']) !!}
      <div class="Grupo-Formulario-Chico Col-Tablet-8">
        {!! Form::text('zip_code', null, ['readonly']) !!}
        @if($errors->has('zip_code'))
        <span class="Mensaje-Validacion">{{ $errors->first('zip_code') }}</span>
        @endif
      </div>
    </div>
    <div class="Fila {{ $errors->has('home_address') ? 'El--con-error' : '' }}">
      {!! Form::label('home_address', 'Domicilio real', ['class' => 'Grupo-Formulario-Chico Col-Tablet-2']) !!}
      <div class="Grupo-Formulario-Chico Col-Tablet-8">
        {!! Form::text('home_address', null, ['readonly']) !!}
        @if($errors->has('home_address'))
        <span class="Mensaje-Validacion">{{ $errors->first('home_address') }}</span>
        @endif
      </div>
    </div>
  </section>
  <section>
    <div class="Titulo-Pagina">
      <h2 class="Texto-Centrado">Contacto</h2>
    </div>
    <div class="Fila {{ $errors->has('email') ? 'El--con-error' : '' }}">
      {!! Form::label('email', 'Email', ['class' => 'Grupo-Formulario-Chico Col-Tablet-2']) !!}
      <div class="Grupo-Formulario-Chico Col-Tablet-8">
        {!! Form::email('email', null, ['readonly']) !!}
        @if($errors->has('email'))
        <span class="Mensaje-Validacion">{{ $errors->first('email') }}</span>
        @endif
      </div>
    </div>
    <div class="Fila {{ $errors->has('mobile') ? 'El--con-error' : '' }}">
      {!! Form::label('mobile', 'Teléfono celular', ['class' => 'Grupo-Formulario-Chico Col-Tablet-2']) !!}
      <div class="Grupo-Formulario-Chico Col-Tablet-8">
        {!! Form::text('mobile', null, ['readonly']) !!}
        @if($errors->has('mobile'))
        <span class="Mensaje-Validacion">{{ $errors->first('mobile') }}</span>
        @endif
      </div>
    </div>
    <div class="Fila {{ $errors->has('phone') ? 'El--con-error' : '' }}">
      {!! Form::label('phone', 'Teléfono fijo', ['class' => 'Grupo-Formulario-Chico Col-Tablet-2']) !!}
      <div class="Grupo-Formulario-Chico Col-Tablet-8">
        {!! Form::text('phone', null, ['readonly']) !!}
        @if($errors->has('phone'))
        <span class="Mensaje-Validacion">{{ $errors->first('phone') }}</span>
        @endif
      </div>
    </div>
    <div class="Fila {{ $errors->has('website') ? 'El--con-error' : '' }}">
      {!! Form::label('website', 'Sitio web', ['class' => 'Grupo-Formulario-Chico Col-Tablet-2']) !!}
      <div class="Grupo-Formulario-Chico Col-Tablet-8">
        {!! Form::text('website', null, ['readonly']) !!}
        @if($errors->has('website'))
        <span class="Mensaje-Validacion">{{ $errors->first('website') }}</span>
        @endif
      </div>
    </div>
  </section>
  <section class="Botonera-Inferior-Derecha">
      <a class="Btn Btn-Default" href="{{ route($index_route) }}"><i class="Icono Icono-Izquierda fa fa-arrow-left"></i>Volver</a>
    </div>
  </section>
{!! Form::close() !!}
