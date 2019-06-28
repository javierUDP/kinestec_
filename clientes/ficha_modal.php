<!-- Add New -->
<div class="modal fade" id="verficha_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title" id="myModalLabel">Ficha </h4></center>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
        <form method="POST" action="edit_ficha.php">
          <input type="hidden" class="form-control" name="id" value="<?php echo $row['id']; ?>">
          <div class="row form-group">
            <div class="col-sm-2">
              <label class="control-label modal-label">Peso:</label>
            </div>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="peso" required value="<?php echo $row['peso']; ?>">
            </div>
          </div>
          <div class="row form-group">
            <div class="col-sm-2">
              <label class="control-label modal-label">Tamaño:</label>
            </div>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="tamano" required value="<?php echo $row['tamano']; ?>">
            </div>
          </div>
          <div class="row form-group">
            <div class="col-sm-4">
              <label class="control-label modal-label">Observacion:</label>
            </div>
            <div class="col-sm-6">
              <textarea type="text" class="form-control" id="exampleFormControlTextarea1" name="observacion" rows="5"><?php echo $row['observacion']; ?></textarea>
            </div>
          </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fas fa-trash"></span> Cancelar</button>
              <button type="submit" name="edit" class="btn btn-success"><span class="fas fa-check"></span> Actualizar</a>
			</form>
            </div>

        </div>
    </div>
</div>
