<?php include('includes/head.php'); ?>
        <!--calendar css-->
<link href="assets/css/fullcalendar.min.css" rel="stylesheet">
<?php include('includes/css.php'); ?>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

<?php 
    include('includes/topbar.php');
    include('includes/sidebar.php'); 
?>

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Calender</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                           

                            <div class="col-12">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                    <div class="response"></div>
                                    <div id='calendar'></div>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
            
                    </div> <!-- container-fluid -->

                </div> <!-- content -->

<?php include('includes/footer.php'); ?>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->
            
<?php include('includes/script.php'); ?>      
        <!-- Jquery-Ui -->
<script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="assets/plugins/moment/moment.js"></script>
<script src="assets/js/moment.min.js"></script>
<script src="assets/js/fullcalendar.min.js"></script>
<?php include('includes/script-bottom.php'); ?>
<script>

$(document).ready(function () {
    var calendar = $('#calendar').fullCalendar({
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,basicWeek,basicDay'
		},
		navLinks: true, // can click day/week names to navigate views
		editable: true,
		eventLimit: true,
        events: "all_events.php",
        displayEventTime: false,
        eventRender: function (event, element, view) {
            if (event.allDay === 'true') {
                event.allDay = true;
            } else {
                event.allDay = false;
            }
        },
        selectable: true,
        selectHelper: true,
        select: function (start, end, allDay) {
            var title = prompt('Event Detail:');

            if (title) {
                var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");

                $.ajax({
                    url: 'add_event.php',
                    data: 'title=' + title + '&start=' + start + '&end=' + end,
                    type: "POST",
                    success: function (data) {
                        displayMessage("Added Successfully");
                    }
                });
                calendar.fullCalendar('renderEvent',
                        {
                            title: title,
                            start: start,
                            end: end,
                            allDay: allDay
                        },
                true
                        );
            }
            calendar.fullCalendar('unselect');
        },
        
        editable: true,
        eventDrop: function (event, delta) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    $.ajax({
                        url: 'update_event.php',
                        data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
                        type: "POST",
                        success: function (response) {
                            displayMessage("Updated Successfully");
                        }
                    });
                },
        eventClick: function (event) {
            var confimit = confirm("Do you really want to delete?");
            if (confimit) {
				
                $.ajax({
                    type: "POST",
                    url: "delete_event.php",
                    data: "&id=" + event.id,
                    success: function (response) {
						
                        if(parseInt(response) > 0) {
                            $('#calendar').fullCalendar('removeEvents', event.id);
                            displayMessage("Deleted Successfully");
                        }
                    }
                });
            }
        }

    });
});

function displayMessage(message) {
	    $(".response").html("<div align='center' style='padding:20px;font-size:18px;color:#3539EA' class='success'>"+message+"</div>");
    setInterval(function() { $(".success").fadeOut(); }, 2000);
}
</script>

    </body>

</html>