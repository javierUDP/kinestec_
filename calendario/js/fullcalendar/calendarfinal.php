<!-- Custom fonts for this template -->
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="css/sb-admin-2.min.css" rel="stylesheet">

<!-- Custom styles for this page -->

<!-- Bootstrap Core CSS -->


<!-- FullCalendar -->
<link href='calendario/css/fullcalendar.css' rel='stylesheet' />
<script>

$(document).ready(function() {
 var calendar = $('#calendar').fullCalendar({
  editable:true,
  header:{
   left:'prev,next today',
   center:'title',
   right:'month,agendaWeek,agendaDay'
  },
  events: 'load.php',
  selectable:true,
  selectHelper:true,
  select: function(start, end, allDay)
  {
   var title = prompt("Enter Event Title");
   if(title)
   {
    var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
    var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
    $.ajax({
     url:"insert.php",
     type:"POST",
     data:{title:title, start:start, end:end},
     success:function()
     {
      calendar.fullCalendar('refetchEvents');
      alert("Added Successfully");
     }
    })
   }
  },
  editable:true,
  eventResize:function(event)
  {
   var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
   var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
   var title = event.title;
   var id = event.id;
   $.ajax({
    url:"update.php",
    type:"POST",
    data:{title:title, start:start, end:end, id:id},
    success:function(){
     calendar.fullCalendar('refetchEvents');
     alert('Event Update');
    }
   })
  },

  eventDrop:function(event)
  {
   var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
   var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
   var title = event.title;
   var id = event.id;
   $.ajax({
    url:"update.php",
    type:"POST",
    data:{title:title, start:start, end:end, id:id},
    success:function()
    {
     calendar.fullCalendar('refetchEvents');
     alert("Event Updated");
    }
   });
  },

  eventClick:function(event)
  {
   if(confirm("Are you sure you want to remove it?"))
   {
    var id = event.id;
    $.ajax({
     url:"delete.php",
     type:"POST",
     data:{id:id},
     success:function()
     {
      calendar.fullCalendar('refetchEvents');
      alert("Event Removed");
     }
    })
   }
  },

 });
});

</script>

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
