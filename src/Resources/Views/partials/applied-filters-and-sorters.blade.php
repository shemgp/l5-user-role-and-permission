@if($appliedFilters || $appliedSorters)
<ul class="Lista-Inline">
  <li><span class="Texto-Secundario">Ordenados por: </span>
  @foreach($appliedSorters as $k => $v)
    <span class="Medalla Medalla-Primario">{{ $v }}</span> <span class="Medalla Medalla-Default">{{ $order }}</span>
  @endforeach
  </li>
  <li><span class="Texto-Secundario">Filtrados por: </span>
  @foreach($appliedFilters as $k => $v)
    <span class="Medalla Medalla-Primario">{{ $v }}</span>
  @endforeach
  </li>
</ul>
@endif
