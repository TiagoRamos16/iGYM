<div id="page-wrapper ">
        <div class="container-fluid ">
            <!-- Page Heading -->
            <div class="row " id="main-admin">
                
				<h1 class="title text-center"> Horário </h1>

				<div class="row row-pesquisa-horario">
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
				</div>

				<?= $this->calendar->generate();?>
				<?= $this->calendar->generate($this->uri->segment(3), $this->uri->segment(4));;?> 
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

