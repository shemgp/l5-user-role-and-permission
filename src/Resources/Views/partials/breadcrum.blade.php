<nav class="Breadcrum">
  <ul class="Lista-Breadcrum">
  @php
    $bread = URL::to('/');
    $link = Request::path();
    $subs = explode("/", $link);
  @endphp
  @for($i = 0; $i < count($subs); $i++)
    <li>
    @php
      $bread = $bread."/".$subs[$i];
      $title = urldecode($subs[$i]);
      $title = str_replace("-", " ", $title);
      $title = title_case($title);
    @endphp
      <a href="{{ $bread }}"><span>{{ $title }}</span></a>
    </li>
  @endfor
  </ul>
</nav>
