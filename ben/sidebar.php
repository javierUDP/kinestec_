
<?php



$tip1 = "SELECT tipo,nombre FROM utenti WHERE rut= ?";

$tip2 = $db->prepare($tip1);

$tip2->bindParam(1, $_SESSION['rut']);



$tip2->execute();

$tipomenu= $tip2->fetch(PDO::FETCH_ASSOC);
?>

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php if($pagina!='home'){echo '../';}?>index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Kinestec</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Calendario -->
      <li class="nav-item <?php if($pagina=='home'){echo 'active';}?>">
        <a class="nav-link" href="<?php if($pagina!='home'){echo '../';}?>index.php">
          <i class="fas fa-fw fa-calendar-alt"></i>
          <span>Calendario</span></a>
      </li>

      <!-- Nav Item - Clientes -->
      <li class="nav-item <?php if($pagina=='clientes'){echo 'active';}?>">
        <a class="nav-link" href="<?php if($pagina!='home'){echo '../';}?>clientes/clientes.php">
          <i class="fas fa-fw fa-grin"></i>
          <span>Clientes</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <?php if (3 >= $tipomenu['tipo']): ?>
      <!-- Nav Item - Productos -->
      <li class="nav-item <?php if($pagina=='productos'){echo 'active';}?>">
        <a class="nav-link" onclick="alert('Página en construcción');">
          <i class="fas fa-fw fa-spray-can"></i>
          <span>Productos</span></a>
      </li>

      <!-- Nav Item - Insumos -->
      <li class="nav-item <?php if($pagina=='insumos'){echo 'active';}?>">
        <a class="nav-link" onclick="alert('Página en construcción');">
          <i class="fas fa-fw fa-prescription-bottle"></i>
          <span>Insumos</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      <?php endif; ?>

      <?php if (1 == $tipomenu['tipo']): ?>

      <!-- Nav Item - Personal -->
      <li class="nav-item <?php if($pagina=='personal'){echo 'active';}?>">
        <a class="nav-link" href="<?php if($pagina!='home'){echo '../';}?>personal/personal.php">
          <i class="fas fa-fw fa-user-friends"></i>
          <span>Personal</span></a>
      </li>

      <!-- Nav Item - Maquinas -->
      <li class="nav-item <?php if($pagina=='maquinas'){echo 'active';}?>">
        <a class="nav-link" href="<?php if($pagina!='home'){echo '../';}?>maquinas/maquinas.php">
          <i class="fas fa-fw fa-solar-panel"></i>
          <span>Maquinas</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
      <?php endif; ?>

    </ul>
