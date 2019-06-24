<?php
session_start();
$pagina='clientes';
include("../login/check.php");
if(isset($_SESSION["user"]))
{
     //echo '<h3>Login Exitoso, Bienvenido - '.$_SESSION["usuario"].'</h3>';
     //echo '<br /><br /><a href="CerrarSesion.php"><div class="btn btn-danger">Cerrar Sesion</div></a>';
     $sql = "SELECT * FROM clientes";



     $req = $db->prepare($sql);
     //$req->bindParam(1, $_SESSION['email']);
     $req->execute();


}
else
{
     header("location:../login/login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Kinestec - Clientes</title>

  <!-- Custom fonts for this template-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Custom styles for this page -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <script type="text/javascript" src="../js/moment.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />





</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Incluir Sidebar -->
    <?php require '../sidebar.php';?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Incluir Topbar -->
        <?php include '../topbar.php';?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">


          <!-- Page Heading -->
          <!--<h1 class="h3 mb-2 text-gray-800">Clientes <button role="link" onclick="window.location='#addnew'"  class="btn btn-primary" type="button">
            <i class="fas fa-plus"></i></h1>
          </button>-->
          <h1 class="h3 mb-2 text-gray-800">Clientes <a href="#addnew" data-toggle="modal" class="btn btn-primary"><span class="fas fa-plus"></span> Nuevo</a></h1>
          <div class="row">
          <?php
            if(isset($_SESSION['error'])){
              echo
              "
              <div class='alert alert-danger text-center'>
                <button class='close'>&times;</button>
                ".$_SESSION['error']."
              </div>
              ";
              unset($_SESSION['error']);
            }
            if(isset($_SESSION['success'])){
              echo
              "
              <div class='alert alert-success text-center'>
                <button class='close'>&times;</button>
                ".$_SESSION['success']."
              </div>
              ";
              unset($_SESSION['success']);
            }
          ?>
          </div>
                <!-- Tabla Clientes -->
                <div class="card shadow mb-4">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Fecha de Nacimiento</th>
                            <th>E-Mail</th>
                            <th>Telefono</th>
                            <th>Opciones</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php

              							while($row = $req->fetch(PDO::FETCH_ASSOC)){
              								echo
              								"<tr>
                                <td>".$row['nombre']."</td>
                                <td>".$row['apellido']."</td>
                                <td>".$row['fecha_nacimiento']."</td>
                                <td>".$row['email']."</td>
              									<td>".$row['telefono']."</td>
              									<td>
                                  <a href='#verficha_".$row['id']."' class='btn btn-primary btn-sm' data-toggle='modal'><span class='far fa-address-book'></span> Ficha</a>
              										<a href='#edit_".$row['id']."' class='btn btn-success btn-sm' data-toggle='modal'><span class='fa fa-edit'></span> Editar</a>
              										<a href='#delete_".$row['id']."' class='btn btn-danger btn-sm' data-toggle='modal'><span class='fa fa-trash'></span> Eliminar</a>
              									</td>
              								</tr>";
              								include('edit_delete_modal.php');
                              include('ficha_modal.php');
              							}


              						?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <!-- Fin Tabla -->
          </div>


        </div>
        <!-- /.container-fluid -->
        <!-- Footer -->
        <?php include '../footer.php';?>
        <!-- End of Footer -->
      </div>
      <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


  <?php include('add_modal.php') ?>
  <!-- Bootstrap core JavaScript-->

  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script>
  $(document).ready(function() {
    $('#dataTable').DataTable({
      "language": {
    url: '//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
},
      "aoColumns": [
    null,
    null,
    { "sType": "date-uk" },
    null,
    null,
    null
]
    });

  });
  jQuery.extend( jQuery.fn.dataTableExt.oSort, {
  "date-uk-pre": function ( a ) {
      var ukDatea = a.split('/');
      return (ukDatea[2] + ukDatea[1] + ukDatea[0]) * 1;
  },

  "date-uk-asc": function ( a, b ) {
      return ((a < b) ? -1 : ((a > b) ? 1 : 0));
  },

  "date-uk-desc": function ( a, b ) {
      return ((a < b) ? 1 : ((a > b) ? -1 : 0));
  }
  } );
  </script>


  <script>
    $(function () {
        $('#datetimepicker1').datetimepicker({
          format: 'L',
          locale: 'es',
          viewMode: 'years'
        });
    });
</script>
</body>

</html>
