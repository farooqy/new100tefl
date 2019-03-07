@extends ("layouts.app")


@section ("pageTitle")
	Administrative | 100TEFL
@endsection

@section ("content")
<div class="container">

<script src="{{env('APP_URL')}}js/jquery-1.11.3.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="{{env('APP_URL')}}css/jodit.min.css">

<script src="{{env('APP_URL')}}js/jodit.min.js" type="text/javascript"></script>
<script src="{{env('APP_URL')}}js/main.js" type="text/javascript"></script>
	<div class="row" style="border:thin solid gray;">
		<div class="col-md-2 col-lg-2"></div>
		<div class="col-md-8 col-lg-8">
			<div class="row">
				<div class="" style="font-weight: bold; text-decoration: underline;">Send Date</div>
			</div>
			<div class="row" style="margin-bottom: 16px">
				<div class="content">
					{{$feedback[0]->created_at}}
				</div>
			</div>
			<div class="row">
				<div class="" style="font-weight: bold; text-decoration: underline;">Sender name</div>
			</div>
			<div class="row" style="margin-bottom: 16px">
				<div class="content">
					{{$feedback[0]->firstname.' '.$feedback[0]->lastname}}
				</div>
			</div>
			<div class="row">
				<div class="" style="font-weight: bold; text-decoration: underline;">Title:</div>
			</div>
			<div class="row" style="margin-bottom: 16px">
				<div class="content">
					@php $concernTopic = [
							"Recruit  招聘", "Job     求职", "Visa    签证",
							"Training  培训", "Incubator 创业", "Others  其他"
						];
						$topic = $concernTopic[$feedback[0]->concernTopic];
					@endphp
					{{$topic}}
				</div>
			</div>
			<div class="row">
				<div class="" style="font-weight: bold; text-decoration: underline;">Feedback Content</div>
			</div>
			<div class="row" style="margin-bottom: 16px">
				<div class="content">
					{{$feedback[0]->feedbackMessage}}
				</div>
			</div><hr>
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<form class="row" method="post" action="" >
						@csrf
						<div class="col-md-12 col-lg-12">
							<div class="row">
								
								@if($errors->any())
									<ul class="is-danger">
										@foreach ($errors->all() as $err)
											
											<li> {{$err}} </li>
											
										@endforeach
										
									</ul>
								@endif

							</div>
							<div class="row">
								Write the replying message to this client/person
							</div>
							<div class="row">
								<textarea id="editor" placeholder="Write Feedback" name="feedbackReplyContent">{{old('feedbackReplyContent')}}</textarea>
							</div>
							<div class="row">
								<div class="col-md-4 col-lg-4"></div>
								<div class="col-md-4 col-lg-4">
									<div class="row" style="margin-top: 10px">
										<input type="submit" name="submitFeedback" class="btn btn-primary" value="Reply to Message">
									</div>
								</div>
								<div class="col-md-4 col-lg-4"></div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-2 col-lg-2"></div>
	</div>
</div>

@endsection