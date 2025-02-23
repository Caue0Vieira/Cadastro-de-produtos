<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('categorias.index') }}" class="nav-link {{ Request::is('categorias*') ? 'active' : '' }}">
        <i class=></i>
        <p>Categorias</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('produtos.index') }}" class="nav-link {{ Request::is('produtos*') ? 'active' : '' }}">
        <i class=""></i>
        <p>Produtos</p>
    </a>
</li>
