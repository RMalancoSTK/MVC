<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= BASE_URL ?>">Sistema de Ventas y Compras</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Ventas y Compras
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item nav-link" href="../clientes/listar">Clientes</a></li>
            <li><a class="dropdown-item nav-link" href="../proveedores/listar">Proveedores</a></li>
            <li><a class="dropdown-item nav-link" href="../productos/listar">Productos</a></li>
            <li><a class="dropdown-item nav-link" href="../ventas/listar">Ventas</a></li>
            <li><a class="dropdown-item nav-link" href="../compras/listar">Compras</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Logística
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item nav-link" href="../almacenes/listar">Almacenes</a></li>
            <li><a class="dropdown-item nav-link" href="../bodegas/listar">Bodegas</a></li>
            <li><a class="dropdown-item nav-link" href="../categorias/listar">Categorías</a></li>
            <li><a class="dropdown-item nav-link" href="../marcas/listar">Marcas</a></li>
            <li><a class="dropdown-item nav-link" href="../unidades/listar">Unidades</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Reportes
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item nav-link" href="../reportes/ventas">Ventas</a></li>
            <li><a class="dropdown-item nav-link" href="../reportes/compras">Compras</a></li>
            <li><a class="dropdown-item nav-link" href="../reportes/productos">Productos</a></li>
            <li><a class="dropdown-item nav-link" href="../reportes/clientes">Clientes</a></li>
            <li><a class="dropdown-item nav-link" href="../reportes/proveedores">Proveedores</a></li>
          </ul>
        </li>
        <?php if (Utils::decrypt($_SESSION['id_role']) == ROL_ADMINISTRADOR) : ?>
          <li class="nav-item dropdown" id="configBtn">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Configuración
            </a>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item nav-link" href="../usuarios/listar">Usuarios</a></li>
              <li><a class="dropdown-item nav-link" href="../ajustes/general">Ajustes</a></li>
            </ul>
          </li>
        <?php endif; ?>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <div class="dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              <?= Utils::decrypt($_SESSION['usuario']) ?>
            </a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item nav-link" href="../usuarios/perfil">Perfil</a></li>
              <li><a class="dropdown-item nav-link" href="../login/logout">Cerrar sesión</a></li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>