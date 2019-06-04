@can('Admin')
    {{-- <li class="nav-item{!! request()->is('admin/partes') ? ' active' : '' !!}">
        <a href="{{ route('admin.partes') }}" class="nav-link">Partes</a>
    </li> --}}
    {{-- <li class="nav-item{!! request()->is('admin/notas') ? ' active' : '' !!}">
        <a href="{{ route('admin.notas') }}" class="nav-link">Notas</a>
    </li> --}}

    <li class="nav-item{!! request()->is('admin/users') ? ' active' : '' !!}">
        <a href="{{ route('admin.users') }}" class="nav-link text-white">Usuarios
        </a>
    </li>

    <li class=" nav-item{!! request()->is('admin/users') ? ' active' : '' !!}">
            <a class="nav-link text-white" href="{{ route('admin.servicios') }}">Servicios</a>
    </li>

<li class="dropdown ">
        <a class="nav-link dropdown-toggle text-white" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false" href="#">Administración
        </a>
        <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
          {{-- <a class="dropdown-item nav-link" href="{{ route('admin.servicios') }}">Servicios</a> --}}
          <a class="dropdown-item nav-link" href="{{ route('admin.clientes') }}">Clientes</a>
          {{-- <a class="dropdown-item nav-link" href="{{ route('admin.users') }}">Tecnicos</a> --}}
          <a class="dropdown-item nav-link" href="{{ route('admin.proveedors') }}">Proveedores</a>
          {{-- <a class="dropdown-item nav-link" href="{{ route('admin.facturas') }}">Facturas</a> --}}
          <a class="dropdown-item nav-link" href="    {{ route('admin.productos') }}">Productos</a>

        </div>
    </li>
    <li class="dropdown ">
        <a class="nav-link dropdown-toggle text-white" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false" href="#">Gestión
    </a>
    <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                {{-- <a class="dropdown-item nav-link" href="{{ route('admin.articulos') }}">Articulos </a> --}}
                <a class="dropdown-item nav-link" href="{{ route('admin.estado_pedidos') }}">Estados de pedido </a>
                {{-- <a class="dropdown-item nav-link" href="{{ route('admin.pedidos') }}"> Pedidos </a> --}}
                <a class="dropdown-item nav-link" href="{{ route('admin.modo_servicios') }}">Modos de Servicio</a>
                <a class="dropdown-item nav-link" href="{{ route('admin.tipos') }}">Tipos de Servicio</a>
                <a class="dropdown-item nav-link" href="{{ route('admin.razons') }}">Gestionar pendientes</a>
            </div>
          </li>


    {{-- <li class="nav-item{!! request()->is('admin/servicios') ? ' active' : '' !!}">
        <a href="{{ route('admin.servicios') }}" class="nav-link">Servicios</a>
    </li> --}}
    {{-- <li class="nav-item{!! request()->is('admin/razons') ? ' active' : '' !!}">
        <a href="{{ route('admin.razons') }}" class="nav-link">Razons</a>
    </li> --}}
    {{-- <li class="nav-item{!! request()->is('admin/proveedors') ? ' active' : '' !!}">
        <a href="{{ route('admin.proveedors') }}" class="nav-link">Proveedors</a>
    </li> --}}
    {{-- <li class="nav-item{!! request()->is('admin/productos') ? ' active' : '' !!}">
        <a href="{{ route('admin.productos') }}" class="nav-link">Productos</a>
    </li> --}}
    {{-- <li class="nav-item{!! request()->is('admin/pedidos') ? ' active' : '' !!}">
        <a href="{{ route('admin.pedidos') }}" class="nav-link">Pedidos</a>
    </li> --}}
    {{-- <li class="nav-item{!! request()->is('admin/modo_servicios') ? ' active' : '' !!}">
        <a href="{{ route('admin.modo_servicios') }}" class="nav-link">ModoServicios</a>
    </li> --}}
    {{-- <li class="nav-item{!! request()->is('admin/facturas') ? ' active' : '' !!}">
        <a href="{{ route('admin.facturas') }}" class="nav-link">Facturas</a>
    </li> --}}
    {{-- <li class="nav-item{!! request()->is('admin/estado_pedidos') ? ' active' : '' !!}">
        <a href="{{ route('admin.estado_pedidos') }}" class="nav-link">EstadoPedidos</a>
    </li> --}}
    {{-- <li class="nav-item{!! request()->is('admin/detalles') ? ' active' : '' !!}">
        <a href="{{ route('admin.detalles') }}" class="nav-link">Detalles</a>
    </li> --}}
    {{-- <li class="nav-item{!! request()->is('admin/clientes') ? ' active' : '' !!}">
        <a href="{{ route('admin.clientes') }}" class="nav-link">Clientes</a>
    </li> --}}
    {{-- <li class="nav-item{!! request()->is('admin/categorias') ? ' active' : '' !!}">
        <a href="{{ route('admin.categorias') }}" class="nav-link">Categorias</a>
    </li> --}}
    {{-- <li class="nav-item{!! request()->is('admin/articulos') ? ' active' : '' !!}">
        <a href="{{ route('admin.articulos') }}" class="nav-link">Articulos</a>
    </li> --}}
    {{-- <li class="nav-item{!! request()->is('admin/users') ? ' active' : '' !!}">
        <a href="{{ route('admin.users') }}" class="nav-link">Users</a>
    </li> --}}
@endcan
