@extends('main')
@section('play')

<div id="heroAvailable">
	<h1>CREATED HEROES</h1>
	<table class="table table-inverse">
	  <thead>
	    <tr>
		<th>#</th>
		<th>Name</th>
		<th>Class</th>
		<th>Atack</th>
		<th>Speed</th>
		<th>Luck</th>
		<th>Health</th>
		<th>Last Activity</th>
		<th>Action</th>
	    </tr>
	  </thead>
	  <tbody>


	  	<?php $i= -1 ?>
			@foreach($data as $heroes)
			<?php $i++ ?> 
				@if($heroes->health > 0)
					<th scope="row">{{$i}}</th>
						<td class="heroName" value="{{ $heroes->name }}">{{ $heroes->name }}</td>
						<td class="heroClass" value="{{ $heroes->class }}">{{ $heroes->class }}</td>
						<td class="heroAtack" value="{{ $heroes->atack }}">{{ $heroes->atack }}</td>
						<td class="heroSpeed" value="{{ $heroes->speed }}">{{ $heroes->speed }}</td>
						<td class="heroLuck" value="{{ $heroes->luck }}">{{ $heroes->luck }}</td>
						<td class="heroHealth" value="{{ $heroes->health }}">{{ $heroes->health }}</td>
						<td>{{ $heroes->updated_at }}</td>
						<td><button class="btn playBtn" value="{{ json_encode($data[$i]) }}">Play</button></td>
					</tr>
				@endif
			@endforeach

	  </tbody>
	</table>
</div>

<div class="gameContent" hidden>
	<div class="gameInfo">
		<h2>HERO INFO</h2>
		<a href="/play"><button class="btn btn-danger">EXIT</button></a>
		<dir class="heroInfo">
			<table class="table">
	            <thead>
	                <tr>
	                    <th>NAME</th>
						<th>CLASS</th>
						<th>ATACK</th>
						<th>SPEED</th>
						<th>LUCK</th>
						<th>HEALTH</th>
	                </tr>
	            </thead>
	            <tbody>
	                <tr>
					<td id="heroID" hidden></td>
					<td id="heroN"></td>
					<td id="heroC"></td>
					<td id="heroA"></td>
					<td id="heroS"></td>
					<td id="heroL"></td>
					<td id="heroH"></td>
				</tr>
	             
	            </tbody>
	        </table>
		</dir>
		<div class="logsView">
			<section class="logSection">
				<dir class="enemyAnimat">
				</dir>
				<dir class="heroAnimat">
				</dir>
			</section>
	    </div>
		<div class="enemyInfo">
			<dir class="enemyStats">
				<h2>ENEMY INFO</h2>
			<table class="table">
				<thead>
					<th>CLASS</th>
					<th>DAMAGE</th>
					<th>HEALTH</th>
				</thead>
				<tbody>
					
				</tbody>
				<tr>
					<td id="enemyC"></td>
					<td id="enemyD"></td>
					<td id="enemyH"></td>

				</tr>
			</table>
			</dir>
			
		</div>

		<div class="buttonsOption">
			<button class="contact" style="margin-top: -2px !important" id="find"><strong>FIND ENEMY</strong></button>
			<button class="contact" style="margin-top: -2px !important" id="atack" hidden><strong>ATACK</strong></button>
			<button class="contact" style="margin-top: -2px !important" id="run" hidden><strong>RUN</strong></button>
			<button class="contact" style="margin-top: -2px !important" id="luck"><strong>GET LUCKY</strong></button>
		</div>
		
	</div>		
</div>

<script src="{{ asset('/js/play.js') }}"></script>
@endsection

