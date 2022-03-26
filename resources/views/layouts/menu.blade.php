<li class="side-menus {{ Request::is('home') ? 'active' : '' }}">
    <a class="nav-link" href="/home">
        <i class=" fas fa-building"></i><span>Dashboard</span>
    </a>
</li>
<li class='active'>
    <a class="nav-link" href="/equipos"><i class="fas fa-plus"></i><span>Equipos</span></a>
</li>
<li class='active'>
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-solid fa-user"></i> <span>Gestion Entrenamiento</span></a>
        <ul class="dropdown-menu">
            
        <li class=""><a class="nav-link" href="/entrenamientos">Entrenamientos</a></li>
        <li class=""><a class="nav-link" href="/tipos">Tipo Entrenamientos</a></li>    
    </ul>
</li>
<li class='active'>
    <a class="nav-link" href="/usuarios"><i class="fas fa-users"></i><span>Usuarios</span></a>
</li>
<li class='active'>
    <a class="nav-link" href="/roles"><i class="fas fa-user-lock"></i><span>Roles</span></a>
</li>