<nav id="sidebar">
    <div id="main-menu">
        <ul class="sidebar-nav">
            <li class="<?= Request::is('/') ? 'current' : '' ?>">
                <a href="/"><i class="fa fa-dashboard"></i><span class="sidebar-text">Datos</span></a>
            </li>

            <li class="<?= Request::is('*beneficiarios*') ? 'current' : '' ?>">
                <a href="/beneficiarios"><i class="fa fa-user"></i><span class="sidebar-text">Beneficiarios</span></a>
            </li>


            <li class="<?= Request::is('*ayudas*') ? 'current' : '' ?>">
                <a href="/ayudas"><i class="fa fa-book"></i><span class="sidebar-text">Ayudas</span></a>
            </li>

            <li class="<?= Request::is('*user*') ? 'current' : '' ?>">
                <a href="/user"><i class="fa fa-user"></i><span class="sidebar-text">Usuarios</span></a>
            </li>

            <br>
        </ul>
    </div>
</nav>