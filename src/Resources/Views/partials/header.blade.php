<header class="Header Header-Compacto Header-Negativo Fixed">
  <a class="Logo">{{ env('APP_NAME') ?: 'L5 User Role & Permission' }}</a>
  <nav class="Menu-Header Primario">
    <ul class="Lista-Menu-Header">
      <li class="Item-Menu-Header">
        <a href="{{ route($index_route) }}">
          <span class="Medalla Medalla-Default">{{ $usersCount }}</span> Usuarios
        </a>
      </li>
      <li class="Item-Menu-Header"><a href="{{ route($create_route) }}">Nuevo Usuario</a></li>
      <li class="Item-Menu-Header">
        <a href="{{ route($role_index_route) }}">
          <span class="Medalla Medalla-Default">{{ $rolesCount }}</span> Roles
        </a>
      </li>
    </ul>
  </nav>
</header>
