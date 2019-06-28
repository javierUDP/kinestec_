<?php
	function generateRow(){
		$contents = '';
		include("../login/check.php");

		if(isset($_SESSION["user"]))
		{
		     //echo '<h3>Login Exitoso, Bienvenido - '.$_SESSION["usuario"].'</h3>';
		     //echo '<br /><br /><a href="CerrarSesion.php"><div class="btn btn-danger">Cerrar Sesion</div></a>';
		     $sql = "SELECT * FROM clientes";



		     $req = $db->prepare($sql);
		     $req->execute();
				 while($row = $req->fetch(PDO::FETCH_ASSOC)){
					 $contents .= "
					 <tr>
					 		<td>".$row['nombre']."</td>
					 		<td>".$row['apellido']."</td>
					 		<td>".$row['fecha_nacimiento']."</td>
					 		<td>".$row['email']."</td>
					 		<td>".$row['telefono']."</td>
					 		<td>
					 </tr>
					 ";
				 }
				 		return $contents;

		}
		else
		{
		     header("location:../login/login.php");
		}
	}

	require_once('tcpdf/tcpdf.php');
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetTitle("PDF generado usando TCPDF");
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    $pdf->SetDefaultMonospacedFont('helvetica');
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    $pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    $pdf->SetAutoPageBreak(TRUE, 10);
    $pdf->SetFont('helvetica', '', 11);
    $pdf->AddPage();
    $content = '';
    $content .= '
      	<h2 align="center">PDF generado por kinestec</h2>
      	<h4>Tabla de clientes</h4>
      	<table border="1" cellspacing="0" cellpadding="3">
           <tr style="color:green;font-weight:bold">
                <th width="20%">Nombre</th>
				<th width="20%" >Apellido</th>
				<th width="15%">Fecha de Nacimiento</th>
				<th width="30%">E-Mail</th>
				<th width="15%">Telefono</th>
           </tr>
      ';
    $content .= generateRow();
    $content .= '</table>';
    $pdf->writeHTML($content);
    $pdf->Output('clientes.pdf', 'I');


?>
