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
#modalcliente .modal-dialog{

          width: 360px;

          height:600px !important;

        }

#modalcliente .modal-content {

    /* 80% of window height */

    height: 40%;


}
  </style>

          <!-- Calendario -->
          <div id="calendar" class="col-centered">
        </div>
        <!-- Modal -->

        <div id="modalcliente" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
              <form name="nombresiti" id="nombresiti">
              <div class="search-box">
                  <input type="text" autocomplete="off" placeholder="Buscar cliente..." name="nombresiti" id"nombresiti"/>
                  <div class="result"></div>
              </div>
            </form>

            </div>
            <div class="modal-footer">
      <button type="button" class="btn btn-primary hide-modal" data-toggle="modal">Guardar cambios</button>
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    </div>
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
         var calendar = $('#calendar').fullCalendar({
          editable:true,
          defaultView : 'agendaWeek',
          header:{
           left:'prev,next today',
           center:'title',
           right:'month,agendaWeek,agendaDay'
          },
          events: 'calendario/load.php',
          selectable:true,
          selectHelper:true,
          select: function(start, end, allDay)
          {
            /*  $('#modalcliente').modal('show');
              $(".hide-modal").click(function(){

        });*/
        var title = prompt("Ingrese nombre de hora");
        if(title)
        {

          document.getElementById("nombresiti").onsubmit = function() {

           var nombresiti =document.getElementById("nombresiti").value;

       }
         var start = $.fullCalendar.formatDate(start, "YYYY-MM-DD HH:mm:ss");
         var end = $.fullCalendar.formatDate(end, "YYYY-MM-DD HH:mm:ss");
         $.ajax({
          url:"calendario/insert.php",
          type:"POST",
          data:{title:title, start:start, end:end},
          success:function()
          {

           calendar.fullCalendar('refetchEvents');
           alert("Añadido con éxito");
           $("#modalcliente").modal('hide');
          }
         })
        }






          },
          editable:true,
          eventResize:function(event)
          {
           var start = $.fullCalendar.formatDate(event.start, "YYYY-MM-DD HH:mm:ss");
           var end = $.fullCalendar.formatDate(event.end, "YYYY-MM-DD HH:mm:ss");
           var title = event.title;
           var id = event.id;
           $.ajax({
            url:"update.php",
            type:"POST",
            data:{title:title, start:start, end:end, id:id},
            success:function(){
             calendar.fullCalendar('refetchEvents');
             //alert('Hora actualizada');
            }
           })
          },

          eventDrop:function(event)
          {
           var start = $.fullCalendar.formatDate(event.start, "YYYY-MM-DD HH:mm:ss");
           var end = $.fullCalendar.formatDate(event.end, "YYYY-MM-DD HH:mm:ss");
           var title = event.title;
           var id = event.id;
           $.ajax({
            url:"calendario/update.php",
            type:"POST",
            data:{title:title, start:start, end:end, id:id},
            success:function()
            {
             calendar.fullCalendar('refetchEvents');
             //alert("Hora actualizada");
            }
           });
          },

          eventClick:function(event)
          {
           if(confirm("Estás seguro que quieres remover esta hora?"))
           {
            var id = event.id;
            $.ajax({
             url:"calendario/delete.php",
             type:"POST",
             data:{id:id},
             success:function()
             {
              calendar.fullCalendar('refetchEvents');
              alert("Hora removida");
             }
            })
           }
          },

         });

        });

        </script>
        <script>
        $('#modalcliente').modal({
    show: 'false'
});


    $("#modalcliente").on("hide", function() {    // remove the event listeners when the dialog is dismissed
        $("#modalcliente a.btn").off("click");
    });

    $("#modalcliente").on("hidden", function() {  // remove the actual elements from the DOM when fully hidden
        $("#modalcliente").remove();
    });

    $("#modalcliente").modal({                    // wire up the actual modal functionality and show the dialog
        "backdrop"  : "static",
        "keyboard"  : true,
        "show"      : true                     // ensure the modal is shown immediately
    });
</script>
