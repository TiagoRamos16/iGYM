<div id="page-wrapper ">
    <div class="container-fluid ">
        <!-- Page Heading -->
        <div class="row " id="main-admin">
            <h1 class="title-exercicios text-center">Aulas</h1>

            <div class="container">
                <div id="calendar"></div>
            </div>

        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
</div><!-- /#wrapper -->


<script>

$(document).ready(function() {

    $('#calendar').fullCalendar({
        eventStartEditable:true, // permite arrastar o evento para outro dia
        eventDurationEditable:true, // permite arrastar para aumentar duracao do evento
        height: 650, // tamanho do calendario
        showNonCurrentDates: false, // bloqueia dias dos outros meses
        fixedWeekCount: false, // corrige quando mostra 4, 5 ou 6 semanas
        defaultView: 'month',
        themeSystem: 'bootstrap3',
        header: {
            left: 'prev,next,today',
            // center: 'title,addEventButton',
            center: 'title',
            right: 'month,agendaWeek,agendaDay,listMonth'
        },

        eventSources: [
        {
            events: function(start, end, timezone, callback) {
                $.ajax({
                url: '<?php echo base_url() ?>cliente/aulas',
                dataType: 'json',
                type: "post", 
                data: {
                    // our hypothetical feed requires UNIX timestamps
                    start: start.unix(),
                    end: end.unix(),   
                },
                success: function(doc) {
                    // console.log(doc);
                    // console.log(doc[0].title);
    
                    var events = [];

                    for(var i = 0;i<doc.length;i++){

                        /*   com o replace estamos a mudar a string do formato da BD "0000-00-00 00:00:00" para "0000-00-00T00:00:00"   */
                        var start_replace =  doc[i].start;
                        var start_r = start_replace.replace(" ", "T");

                        var end_replace =  doc[i].end;
                        var end_r = end_replace.replace(" ", "T");

                        events.push({
                            title: doc[i].title,
                            start: start_r,
                            end: end_r,
                            url: '<?php echo base_url() ?>cliente/visualizarAula/'+doc[i].id,
                        });
                    }

                    console.log(events);
                    callback(events);
                    console.log(events);
                    console.log(doc);
                }
                });
            }
        },
        ],


        // events: [{
        //     title: 'Front-End Conference',
        //     start: '2019-02-16',
        //     end: '2019-02-18'
        // },
        // {
        //     title: 'Hair stylist with Mike',
        //     start: '2019-02-20',
        //     allDay: true
        // },
        // {
        //     title: 'Car mechanic',
        //     start: '2019-02-14T09:00:00',
        //     end: '2019-02-14T11:00:00'
        // },
        // {
        //     title: 'Dinner with Mike',
        //     start: '2019-02-21T19:00:00',
        //     end: '2019-02-21T22:00:00'
        // },
        // {
        //     title: 'Chillout',
        //     start: '2019-02-15',
        //     allDay: true
        // },
        // {
        //     title: 'Vacation',
        //     start: '2019-02-23',
        //     end: '2019-02-29'
        // },
        // ],



        customButtons: {
            addEventButton: {
                text: 'add event...',
                click: function () {
                    var dateStr = prompt('Enter a date in YYYY-MM-DD format');
                    var name = prompt('Enter a name');
                    var date = moment(dateStr);

                    if (date.isValid()) {
                        $('#calendar').fullCalendar('renderEvent', {
                            title: name,
                            start: date,
                            allDay: true
                            //   end: '2019-02-18'
                        });
                        alert('Great. Now, update your database...');
                    } else {
                        alert('Invalid date.');
                    }
                }
            }
        },

        // quando está na vista mensal e clicka num dia, passa para vista da agenda diária
        dayClick: function(date, jsEvent, view) {
            if(view.name == 'month' || view.name == 'basicWeek') {
                $('#calendar').fullCalendar('changeView', 'agendaDay');
                $('#calendar').fullCalendar('gotoDate', date);      
            }
        }

        // dayClick: function () {

        //     alert('a day has been clicked!');
        // }

        // dayClick: function(date, jsEvent, view) {
        //     $('.calendar').fullCalendar('changeView', 'agendaDay')
        //     $('.calendar').fullCalendar('gotoDate', date);
        // }

        // dayClick: function(date, jsEvent, view) {
        //     $("#myModal").modal("show");
        // },


        // eventClick:  function(event, jsEvent, view) {
        //     $('#modalTitle').html(event.title);
        //     $('#modalBody').html(event.description);
        //     $('#eventUrl').attr('href',event.url);
        //     $('#calendarModal').modal();
        // },



    }); /* #calendar */

}); /* $(document).ready(function()  */                      
                    
</script>