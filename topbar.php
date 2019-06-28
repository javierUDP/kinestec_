
<?php



$tipejo = "SELECT tipo,nombre FROM utenti WHERE rut= ?";

$tipejo2 = $db->prepare($tipejo);

$tipejo2->bindParam(1, $_SESSION['rut']);



$tipejo2->execute();

$rowtipo= $tipejo2->fetch(PDO::FETCH_ASSOC);

if($rowtipo['tipo'] == 1){

  $res_type="Administrador";
}else{
  if($rowtipo['tipo'] == 2){
    $res_type="Especialista";
  }else{
    if($rowtipo['tipo'] == 3){
      $res_type="Anfitrión";
    }else{
      if($rowtipo['tipo'] == 4){
          $res_type="Recepcionista";
      }

    }
  }
}

?>


<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow ">

  <div class="col d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
<img class="img-profile rounded-circle mr-1" src="https://png.pngtree.com/svg/20161229/e7a5cf5c9e.svg" width="40" height="40">
    <span class="mr-1 d-none d-lg-inline text-gray-600 medium">Hola, <?php echo $rowtipo['nombre'];?>!</span><span class="mr-1 d-none d-lg-inline text-gray-600 small"> <?php echo $res_type;?></span>
  </div>

  <!-- Topbar Navbar -->
  <ul class="navbar-nav ml-auto">

    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Nav Item - Config -->
    <!--
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" class="dropdown-item" href=# data-toggle="modal" data-target="#logoutModal">
        <span class="mr-2 d-none d-lg-inline text-gray-600"><i class="fas fa-cog"></i></span>
        <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
      </a>-->



    </li>

    <!-- Nav Item - Logout -->
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
        <span class="mr-2 d-none d-lg-inline text-gray-600"><i class="fas fa-sign-out-alt"></i></span>
        <!-- en el caso que queramos colocar una foto de perfil -->
        <!--<img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">-->
      </a>


    </li>

  </ul>

</nav>
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Selecciona "Salir" abajo si estás listo para salir.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
        <a class="btn btn-primary" name="logout" href="<?php if($pagina!='home'){echo '../';}?>index.php?logout=1">Salir</a>
      </div>
    </div>
  </div>
</div>
