<!-- Custom fonts for this template -->
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="css/sb-admin-2.min.css" rel="stylesheet">

<!-- Custom styles for this page -->

<!-- Bootstrap Core CSS -->


<!-- FullCalendar -->
<link href='calendario/css/fullcalendar.css' rel='stylesheet' />


  <!-- Custom CSS -->
  <style>
#calendar {
  max-width: 800px;
}
.col-centered{
  float: none;
  margin: 0 auto;
}
  </style>

          <!-- Calendario -->
          <div id="calendar" class="col-centered">
        </div>
        <!-- Modal -->
        <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
          <div class="modal-content">
          <form class="form-horizontal" method="POST" action="calendario/addEvent.php">

            <div class="modal-header">

            <h4 class="modal-title" id="myModalLabel">Agregar Hora</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

              <div class="form-group">
              <label for="title" class="col-sm-2 control-label">Titulo</label>
              <div class="col-sm-10">
                <input type="text" name="title" class="form-control" id="title" placeholder="Titulo">
              </div>
              </div>
              <div class="form-group">
              <label for="color" class="col-sm-2 control-label">Color</label>
              <div class="col-sm-10">
                <select name="color" class="form-control" id="color">
                        <option value="">Seleccionar</option>
                  <option style="color:#0071c5;" value="#0071c5">&#9724; Azul oscuro</option>
                  <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquesa</option>
                  <option style="color:#008000;" value="#008000">&#9724; Verde</option>
                  <option style="color:#FFD700;" value="#FFD700">&#9724; Amarillo</option>
                  <option style="color:#FF8C00;" value="#FF8C00">&#9724; Naranja</option>
                  <option style="color:#FF0000;" value="#FF0000">&#9724; Rojo</option>
                  <option style="color:#000;" value="#000">&#9724; Negro</option>

                </select>
              </div>
              </div>
              <div class="form-group">
              <label for="start" class="col-sm-4 control-label">Hora inicial</label>
              <div class="col-sm-10">
                 <input type="text" class="form-control datetimepicker-input" data-target="#start" data-toggle="datetimepicker"  name="start"  id="start" autocomplete="off"/>
              </div>
              </div>
              <div class="form-group">
              <label for="end" class="col-sm-4 control-label">Hora Final</label>
              <div class="col-sm-10">
                <input type="text" class="form-control datetimepicker-input" data-target="#end" data-toggle="datetimepicker"  name="end"  id="end" autocomplete="off"/>
              </div>
              </div>

            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </form>
          </div>
          </div>
        </div>



        <!-- Modal -->
        <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
          <div class="modal-content">
          <form class="form-horizontal" method="POST" action="editEventTitle.php">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Modificar Evento</h4>
            </div>
            <div class="modal-body">

              <div class="form-group">
              <label for="title" class="col-sm-2 control-label">Titulo</label>
              <div class="col-sm-10">
                <input type="text" name="title" class="form-control" id="title" placeholder="Titulo">
              </div>
              </div>
              <div class="form-group">
              <label for="color" class="col-sm-2 control-label">Color</label>
              <div class="col-sm-10">
                <select name="color" class="form-control" id="color">
                  <option value="">Seleccionar</option>
                  <option style="color:#0071c5;" value="#0071c5">&#9724; Azul oscuro</option>
                  <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquesa</option>
                  <option style="color:#008000;" value="#008000">&#9724; Verde</option>
                  <option style="color:#FFD700;" value="#FFD700">&#9724; Amarillo</option>
                  <option style="color:#FF8C00;" value="#FF8C00">&#9724; Naranja</option>
                  <option style="color:#FF0000;" value="#FF0000">&#9724; Rojo</option>
                  <option style="color:#000;" value="#000">&#9724; Negro</option>

                </select>
              </div>
              </div>
                <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <div class="checkbox">
                  <label class="text-danger"><input type="checkbox"  name="delete"> Eliminar Evento</label>
                  </div>
                </div>
              </div>

              <input type="hidden" name="id" class="form-control" id="id">


            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </form>
          </div>
          </div>
        </div>

        <!-- Bootstrap core JavaScript-->

        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/datatables-demo.js"></script>

        <script src='calendario/js/moment.min.js'></script>
        <script src='calendario/js/fullcalendar/fullcalendar.min.js'></script>
        <script src='calendario/js/fullcalendar/fullcalendar.js'></script>
        <script src='calendario/js/fullcalendar/locale/es.js'></script>
        <script src='calendario/js/fullcalendar/locale-all.js'></script>
        <script>

        $(document).ready(function() {

          var date = new Date();
             var yyyy = date.getFullYear().toString();
             var mm = (date.getMonth()+1).toString().length == 1 ? "0"+(date.getMonth()+1).toString() : (date.getMonth()+1).toString();
             var dd  = (date.getDate()).toString().length == 1 ? "0"+(date.getDate()).toString() : (date.getDate()).toString();

          $('#calendar').fullCalendar({
            locale: 'es',
            header: {
              language: 'es',
              left: 'prev,next today',
              center: 'titulo',
              right: 'month,agendaWeek,agendaDay',

            },
            defaultDate: yyyy+"-"+mm+"-"+dd,
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            selectable: true,
            selectHelper: true,
            select: function(start, end) {

              $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm'));
              $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm'));
              $('#ModalAdd').modal('show');
            },
            eventRender: function(event, element) {
              element.bind('dblclick', function() {
                $('#ModalEdit #id').val(event.id);
                $('#ModalEdit #title').val(event.title);
                $('#ModalEdit #color').val(event.color);
                $('#ModalEdit').modal('show');
              });
            },
            eventDrop: function(event, delta, revertFunc) { // si changement de position

              edit(event);

            },
            eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

              edit(event);

            },
            events: [
            <?php foreach($events as $event):

              $start = explode(" ", $event['start']);
              $end = explode(" ", $event['end']);
              if($start[1] == '00:00'){
                $start = $start[0];
              }else{
                $start = $event['start'];
              }
              if($end[1] == '00:00'){
                $end = $end[0];
              }else{
                $end = $event['end'];
              }
            ?>
              {
                id: '<?php echo $event['id']; ?>',
                title: '<?php echo $event['title']; ?>',
                start: '<?php echo $start; ?>',
                end: '<?php echo $end; ?>',
                color: '<?php echo $event['color']; ?>',
              },
            <?php endforeach; ?>
            ]
          });

          function edit(event){
            start = event.start.format('YYYY-MM-DD HH:mm');
            if(event.end){
              end = event.end.format('YYYY-MM-DD HH:mm');
            }else{
              end = start;
            }

            id =  event.id;

            Event = [];
            Event[0] = id;
            Event[1] = start;
            Event[2] = end;

            $.ajax({
             url: 'calendario/editEventDate.php',
             type: "POST",
             data: {Event:Event},
             success: function(rep) {
                if(rep == 'OK'){
                  alert('Evento se ha guardado correctamente');
                }else{
                  alert('No se pudo guardar. Inténtalo de nuevo.');
                }
              }
            });
          }

        });

      </script>
