@extends ("layouts.app")


@section ("pageTitle")
	Administrative | 100TEFL
@endsection

@section ("content")
<div class="container">
	<div class="row">
		<div class="col-md-2 col-lg-2"></div>
		<div class="col-md-8 col-lg-8">
			<div class="row" style="color: red; margin-bottom: 10px">
				@php if(isset($error)) echo $error @endphp
			</div>
		</div>
		<div class="col-md-2 col-lg-2"></div>
	</div>
	<div class="row">
		<table class="table">
			<thead>
				<th>Sender name</th>
				<th>Sender email</th>
				<th>Feedback Title</th>
				<th>Send Date</th>
				<th>Reply Status</th>
				<th>Action</th>
			</thead>
			<tbody>
			@foreach($feedbacks as $fback)
				<tr>
					
				
					<td>
						{{ $fback->firstname. ' '}} {{ $fback->lastname}}
					</td>
					<td>
						{{ $fback->email}}
					</td>
					<td>
						@php 
						$concernTopic = [
							"Recruit  招聘",
							"Job     求职",
							"Visa    签证",
							"Training  培训",
							"Incubator 创业",
							"Others  其他"
						];
						@endphp
						{{ $concernTopic[$fback->concernTopic]}}
					</td>
					<td>
						{{ $fback->created_at	}}
					</td>
					<td>
						@php
						if($fback->isRepliedTo ==='false')
							$status = 'Not Replied';
						else if($fback->isRepliedTo === 'true')
							$status = 'Replied';
						else
							$status = 'Unrecognized';


						@endphp
						{{ $status }}
					</td>
					<td>
						
						<div class="dropdown">
						  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						    Choose Action
						  </button>
						  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						    <a class="dropdown-item" href="/admins/feedback/markereplied/{{$fback->id}}">Mark As Replied</a>
						    <a class="dropdown-item" href="/admins/feedback/viewreply/{{$fback->id}}">View/Reply</a>
						  </div>
						</div>

					</td>
				

				</tr>
			@endforeach	
			</tbody>
		</table>
			
	</div>
</div>
	

@endsection