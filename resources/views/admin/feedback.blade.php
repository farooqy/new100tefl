@extends ("layout.mainlayout")


@section ("content")

<div class="row">
	@foreach($feedbacks as $fback)
		<div class="">{{ $fback->created_at	}}</div>
		<div class="">{{ $fback->firstname}}</div>
		<div class="">{{ $fback->lastname}}</div>
		<div class="">{{ $fback->email}}</div>
		<div class="">{{ $fback->concernTopic}}</div>
		<div class="">{{ $fback->feedbackMessage}}</div>
	@endforeach
</div>

@endsection