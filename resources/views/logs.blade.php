@extends('main')

@section('logs')
<div id="heroAvailable">
	<h1>HEROES REGISTRED</h1>
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
				@if($heroes->health <= 0)
					<th class="" scope="row">{{$i}}</th>
						<td class="heroName" value="{{ $heroes->name }}">{{ $heroes->name }}</td>
						<td class="heroClass" value="{{ $heroes->class }}">{{ $heroes->class }}</td>
						<td class="heroAtack" value="{{ $heroes->atack }}">{{ $heroes->atack }}</td>
						<td class="heroSpeed" value="{{ $heroes->speed }}">{{ $heroes->speed }}</td>
						<td class="heroLuck" value="{{ $heroes->luck }}">{{ $heroes->luck }}</td>
						<td style="background-color: #de3f3f;" class="heroHealth" value="{{ $heroes->health }}"><strong>DEAD</strong></td>
						<td>{{ $heroes->updated_at }}</td>
						<td><button class="btn btn-warning deleteBtn" value="{{ json_encode($data[$i]) }}">Delete</button></td>
					</tr>
				@else
					<th scope="row">{{$i}}</th>
						<td class="heroName" value="{{ $heroes->name }}">{{ $heroes->name }}</td>
						<td class="heroClass" value="{{ $heroes->class }}">{{ $heroes->class }}</td>
						<td class="heroAtack" value="{{ $heroes->atack }}">{{ $heroes->atack }}</td>
						<td class="heroSpeed" value="{{ $heroes->speed }}">{{ $heroes->speed }}</td>
						<td class="heroLuck" value="{{ $heroes->luck }}">{{ $heroes->luck }}</td>
						<td class="heroHealth" value="{{ $heroes->health }}">{{ $heroes->health }}</td>
						<td>{{ $heroes->updated_at }}</td>
						<td><button class="btn btn-warning deleteBtn" value="{{ json_encode($data[$i]) }}">Delete</button></td>
					</tr>
				@endif
				
			@endforeach

	  </tbody>
	</table>
</div>
<script src="{{ asset('/js/logs.js') }}"></script>
@endsection

