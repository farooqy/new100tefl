@extends ("layout.mainlayout")

@section ("pageTitle")
	About Us | 100TEFL
@endsection

@section ("content")

@php 
session(['test' => 'testsession']);

if(session('isLoggedIn'))
{
	header("Location: ".env('APP_URL').'admins');
	exit(0);
}

@endphp
<div class="">
	<form class="form" method="POST" action="login">
		@csrf
		<div class="container" style="min-height: 550px; margin-top: 50px">
			<div class="sixteen columns">
				<div class="one columns"></div>
				<div class="fourteen columns" style="border:thin solid gray; padding: 20px;">
					<div class="field">
						{{-- <figure class="image is-2by1">
							<img src="{{env('APP_URL')}}uploads/static/100teflTransparent-small.png">
						</figure> --}}
					</div>
					@if($errors->any)
					<div class="field is-danger">
						@foreach($errors->all() as $error)
							<div class="is-danger" style="color: red">
								{{$error}}
							</div>
						@endforeach
					</div>
					@endif
					@if($error = session('error'))
					<div class="field is-danger" style="color: red">
						{{$error}}
					</div>
					@endif
					<div class="field">
						<label class="label">User Email address</label>
						<div class="control has-icons-left has-icons-right">

							<input class="" type="text" placeholder="User email" value="{{old('memberEmail')}}" name="memberEmail" style="border:thin solid gray; height: 30px; color: black; width:50%">
						</div>

					</div>
					<div class="field">
						<label class="label">User password</label>
						<p class="control has-icons-left">
							<input class="" type="password" placeholder="Password" name="memberPassword" style="border:thin solid gray; height: 30px; color: black; width:50%">
						</p>
					</div>

					<div class="field">
						<p class="control">
							<button class="btn btn-primary" style="width: 30%; background-color: blue;color:white">
								Login
							</button>
						</p>
					</div>

				</div>
				<div class="column"></div>
			</div>
		</div>
			
	</form>
</div>	
@endsection