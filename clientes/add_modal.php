<!-- Add New -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Nuevo miembro</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="add.php">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Nombre:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="nombre" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Apellido:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="apellido" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label modal-label">Fecha Nacimiento:</label>
					</div>
					<div class="col-sm-5">

    <input type="text" class="form-control datetimepicker-input" id="datetimepicker1" autocomplete="off" data-toggle="datetimepicker" data-target="#datetimepicker1" name="fecha_nacimiento" />

					</div>
				</div>
        <div class="row form-group">
          <div class="col-sm-2">
            <label class="control-label modal-label">Email:</label>
          </div>
          <div class="col-sm-10">
            <input type="email" class="form-control" name="email" >
          </div>
        </div>
        <div class="row form-group">
          <div class="col-sm-2">
            <label class="control-label modal-label">Telefono:</label>
          </div>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="telefono" >
          </div>
        </div>
            </div>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fas fa-cancel"></span> Cancelar</button>
                <button type="submit" name="add" class="btn btn-primary"><span class="fas fa-disk"></span> Guardar</a>
			</form>
            </div>

        </div>
    </div>
</div>
