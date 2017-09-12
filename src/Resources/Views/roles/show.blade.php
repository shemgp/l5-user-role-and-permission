@php $title = $model->description; @endphp
@extends($layout)
@section('title', $title)
@section('content')
<header class="Titulo-Pagina">
  <h1>{{ $title }} <small>Ver detalles</small></h1>
</header>
<div id="userForm">
  @include($module.$prefix.$resource_name.'.partials.pluma-show-form')
</div>
@endsection
