@php $title = $model->description ?: $model->name;  @endphp
@extends($layout)
@section('title', $title)
@section('content')
<header class="Titulo-Pagina">
  <h1>{{ $title }} <small>Actualizar registro</small></h1>
</header>
<div id="userForm">
  @include($module.$prefix.$resource_name.'.partials.pluma-edit-form')
</div>
@endsection
