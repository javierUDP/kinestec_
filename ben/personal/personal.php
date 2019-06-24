<?php
session_start();
$pagina='personal';
include("../login/check.php");
if(isset($_SESSION["user"]))
{
     //echo '<h3>Login Exitoso, Bienvenido - '.$_SESSION["usuario"].'</h3>';
     //echo '<br /><br /><a href="CerrarSesion.php"><div class="btn btn-danger">Cerrar Sesion</div></a>';
     $sql = "SELECT * FROM utenti where email != ?";

     $req = $db->prepare($sql);
     $req->bindParam(1, $_SESSION['email']);
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

  <title>Kinestec - Personal</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Custom styles for this page -->
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


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
          <h1 class="h3 mb-2 text-gray-800">Personal <a href="#addnew" data-toggle="modal" class="btn btn-primary"><span class="fas fa-plus"></span> Nuevo</a></h1>
          <?php if(isset($_SESSION['errorsito'])){
            ?>

            <div id="myDiv1" class='alert alert-danger text-center'>
              <button class='close' onclick="document.getElementById('myDiv').style.display='none'" >&times;</button>
              <?= $_SESSION['errorsito']; ?>
            </div>
            <?php
            unset($_SESSION['errorsito']);
          }
          ?>
          <?php
            if(isset($_SESSION['error'])){
?>
              <div id='myDiv2' class='alert alert-danger text-center'>
                <button class="close" onclick="document.getElementById('myDiv2').style.display='none'">&times;</button>
                <?= $_SESSION['error'] ?>
              </div>

              <?php
              unset($_SESSION['error']);
            }
            if(isset($_SESSION['success'])){
?>
              <div id='myDiv3' class='alert alert-success text-center'>
                <button class="close" onclick="document.getElementById('myDiv3').style.display='none'">&times;</button>
                ".$_SESSION['success']."
              </div>
<?php
              unset($_SESSION['success']);
            }
          ?>

                <!-- Tabla Clientes -->
                <div class="card shadow mb-4">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th>RUT</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Cargo</th>
                            <th>Email</th>
                            <th>Opciones</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php

              							while($row = $req->fetch(PDO::FETCH_ASSOC)){
                              if($row['tipo'] == 1){
                                $rtipo="Administrador";
                              }else{
                                if($row['tipo'] == 2){
                                  $rtipo="Especialista";
                                }else{
                                  if($row['tipo'] == 3){
                                    $rtipo="Anfitrión";
                                  }else{
                                    if($row['tipo'] == 4){
                                        $rtipo="Recepcionista";
                                    }
                                  }
                                }
                              }

                              echo
              								"<tr>
                                <td>".$row['rut']."</td>
                                <td>".$row['nombre']."</td>
                                <td>".$row['apellido']."</td>
                                <td>".$rtipo."</td>
                                <td>".$row['email']."</td>
              									<td>
              										<a href='#edit_".$row['id']."' class='btn btn-success btn-sm' data-toggle='modal'><span class='fa fa-edit'></span> Editar</a>
              										<a href='#delete_".$row['id']."' class='btn btn-danger btn-sm' data-toggle='modal'><span class='fa fa-trash'></span> Eliminar</a>
              									</td>
              								</tr>";
              								include('edit_delete_modal.php');
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
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/demo/datatables-demo.js"></script>
  <script src="../js/rut.js"></script>
</body>
<script>

$(document).ready(function() {
   $('#rut').Rut();
});



</script>
</html>
