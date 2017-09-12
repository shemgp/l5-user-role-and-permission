@php $title = $model->present()->full_name_or_email; @endphp
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
