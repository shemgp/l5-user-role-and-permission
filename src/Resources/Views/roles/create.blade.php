@extends($layout)
@section('title', $title)
@section('content')
<header class="Titulo-Pagina">
  <h1>{{ $title }} <small>Nuevo registro</small></h1>
</header>
<div id="userForm">
  @include($module.$prefix.$resource_name.'.partials.pluma-create-form')
</div>
@endsection
