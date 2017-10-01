<ul class="Lista-Inline">
@if($appliedFilters)
  <li><span class="Texto-Secundario">Ordenados por: </span>
  @foreach($appliedSorters as $k => $v)
    <span class="Medalla Medalla-Primario">{{ $v }}</span>
  @endforeach
  </li>
@endif
if($appliedSorters)
  <li><span class="Texto-Secundario">Filtrados por: </span>
  @foreach($appliedFilters as $k => $v)
    <span class="Medalla Medalla-Primario">{{ $v }}</span>
  @endforeach
  </li>
@endif
</ul>
@endif
