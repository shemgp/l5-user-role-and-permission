@php $message_levels = [
    'success' => 'fa-check-circle',
    'info' => 'fa-exclamation-circle',
    'warning' => 'fa-exclamation-triangle',
    'error' => 'fa-times-circle'
]; @endphp

@foreach($message_levels as $level => $icon)

@if(session()->has('rafflesargentina.resource_controller.'.$level))
<div class="Alerta {{ ucfirst($level) }} Alerta-Desestimable">
  <button class="Btn-Cerrar">&times</button>
  <i class="Icono Icono-Izquierda fa {{ $icon }}"></i><span>{{ session()->get('rafflesargentina.resource_controller.'.$level) }}</span>
</div>
@endif

@endforeach
