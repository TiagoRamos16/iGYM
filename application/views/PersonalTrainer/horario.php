<div id="page-wrapper ">
        <div class="container-fluid ">
            <!-- Page Heading -->
            <div class="row " id="main-admin">
                
				<h1 class="title text-center"> Horário </h1>
				<br><br><br>
				<!-- <div class="row row-pesquisa-horario">
					<form action="">
						<div class="col-md-5">
							<div class="form-group ">
								<select class="form-control" name="" id="">
									<option value="">Horario por:</option>
									<option value="2">Por semana</option>
									<option value="3">Por mes</option>
								</select>
							</div> 
						</div>
						<div class="col-md-5">
							<div class="form-group ">
								<input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="escolher data">
							</div>		
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<input type="submit" value="Pesqusiar"	class="btn btn-default">
							</div>
						</div>
					</form>
				</div> -->

				<div class="container">
                <div id="calendar"></div>
            </div>
            
            <div id="calendarModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
                            <h4 id="modalTitle" class="modal-title"></h4>
                        </div>
                        <div id="modalBody" class="modal-body"> </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
			</div>

	<!-- <div class="calendar" data-toggle="calendar">

		<div class="row">
			<div class="col-xs-12 calendar-day calendar-no-current-month">
				<b>Segunda-feira</b>
				<time datetime="2014-06-29">29</time>
			</div>
			<div class="col-xs-12 calendar-day calendar-no-current-month">
			<b>Segunda-feira</b>
				<time datetime="2014-06-30">30</time>
			</div>
			<div class="col-xs-12 calendar-day">
			<b>Segunda-feira</b>
				<time datetime="2014-07-01">01</time>
			</div>
			<div class="col-xs-12 calendar-day">
			<b>Segunda-feira</b>
				<time datetime="2014-07-02">02</time>
			</div>
			<div class="col-xs-12 calendar-day">
			<b>Segunda-feira</b>
				<time datetime="2014-07-03">03</time>
				<div class="events">
					<div class="event">
                        EVENTO 1        
					</div>
				</div>
			</div>
			<div class="col-xs-12 calendar-day">
			<b>Segunda-feira</b>
				<time datetime="2014-07-04">04</time>
			</div>
			<div class="col-xs-12 calendar-day">
			<b>Segunda-feira</b>
				<time datetime="2014-07-05">05</time>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 calendar-day">
				<time datetime="2014-07-06">06</time>
			</div>
			<div class="col-xs-12 calendar-day">
				<time datetime="2014-07-07">07</time>
			</div>
			<div class="col-xs-12 calendar-day">
				<time datetime="2014-07-08">08</time>
			</div>
			<div class="col-xs-12 calendar-day">
				<time datetime="2014-07-09">09</time>
			</div>
			<div class="col-xs-12 calendar-day">
				<time datetime="2014-07-10">10</time>
			</div>
			<div class="col-xs-12 calendar-day">
				<time datetime="2014-07-11">11</time>
				<div class="events">
					<div class="event">
						AULA 10
					</div>
				</div>
			</div>
			<div class="col-xs-12 calendar-day">
				<time datetime="2014-07-12">12</time>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 calendar-day">
				<time datetime="2014-07-13">13</time>
			</div>
			<div class="col-xs-12 calendar-day">
				<time datetime="2014-07-14">14</time>
			</div>
			<div class="col-xs-12 calendar-day">
				<time datetime="2014-07-15">15</time>
				<div class="events">
					<div class="event">
					</div>
				</div>
			</div>
			<div class="col-xs-12 calendar-day">
				<time datetime="2014-07-16">16</time>
			</div>
			<div class="col-xs-12 calendar-day">
				<time datetime="2014-07-17">17</time>
			</div>
			<div class="col-xs-12 calendar-day">
				<time datetime="2014-07-18">18</time>
			</div>
			<div class="col-xs-12 calendar-day">
				<time datetime="2014-07-19">19</time>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 calendar-day">
				<time datetime="2014-07-20">20</time>
				<div class="events">
					<div class="event">
					</div>
				</div>
			</div>
			<div class="col-xs-12 calendar-day">
				<time datetime="2014-07-21">21</time>
			</div>
			<div class="col-xs-12 calendar-day">
				<time datetime="2014-07-22">22</time>
			</div>
			<div class="col-xs-12 calendar-day">
				<time datetime="2014-07-23">23</time>
			</div>
			<div class="col-xs-12 calendar-day">
				<time datetime="2014-07-24">24</time>
			</div>
			<div class="col-xs-12 calendar-day">
				<time datetime="2014-07-25">25</time>
			</div>
			<div class="col-xs-12 calendar-day">
				<time datetime="2014-07-26">26</time>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 calendar-day">
				<time datetime="2014-07-27">27</time>
			</div>
			<div class="col-xs-12 calendar-day">
				<time datetime="2014-07-28">28</time>
			</div>
			<div class="col-xs-12 calendar-day">
				<time datetime="2014-07-29">29</time>
			</div>
			<div class="col-xs-12 calendar-day">
				<time datetime="2014-07-30">30</time>
			</div>
			<div class="col-xs-12 calendar-day">
				<time datetime="2014-07-31">31</time>
			</div>
			<div class="col-xs-12 calendar-day calendar-no-current-month">
				<time datetime="2014-08-01">01</time>
			</div>
			<div class="col-xs-12 calendar-day calendar-no-current-month">
				<time datetime="2014-08-02">02</time>
			</div>
		</div>
	</div> -->
    


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
				url: '<?php echo base_url() ?>cliente/calendario',
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






