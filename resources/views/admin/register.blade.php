@extends ("layout.mainlayout")

@section ("pageTitle")
	About Us | 100TEFL
@endsection

@section ("content")
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
 <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
<div class="">
	<form class="form" method="POST" action="">
		@csrf
		<div class="columns">
			<div class="column"></div>
			<div class="column">
				<div class="field">
					<figure class="image is-2by1">
						<img src="{{env('APP_URL')}}uploads/static/100teflTransparent-small.png">
					</figure>
				</div>
				<div class="field">
					@if($errors->any)
						@foreach($errors->all() as $error)
						<div class="">
							{{$error}}
						</div>
						@endforeach
					@endif
				</div>
				@if(($success = session('success')))
				<div class="field">
					<div class="is-success" >
						{{$success}}
					</div>
				</div>
				@elseif($error = session('error'))
					<div class="is-danger" >
						{{$error}}
					</div>
				<div class="field">
					
				</div>
				@endif
				<div class="field">
					<label class="label">User display name</label>
					<div class="control has-icons-left has-icons-right">
						<input class="input " type="text" placeholder="User name" value="{{old('userName')}}" name="userName">
						<span class="icon is-small is-left">
						    <i class="fas fa-user"></i>
						</span>
					</div>

				</div>
				<div class="field">
					<label class="label">User Email address</label>
					<div class="control has-icons-left has-icons-right">
						<input class="input " type="email" placeholder="User email" value="{{old('userEmail')}}" name="userEmail">
						<span class="icon is-small is-left">
						    <i class="fas fa-email"></i>
						</span>
					</div>

				</div>
				<div class="field">
					<label class="label">User Password</label>
					<div class="control has-icons-left has-icons-right">
						<input class="input " type="Password" placeholder="User Password" value="" name="userPassword">
						<span class="icon is-small is-left">
						    <i class="fas fa-password"></i>
						</span>
					</div>

				</div>
				<div class="field">
					<label class="label">Confirm User Password</label>
					<div class="control has-icons-left has-icons-right">
						<input class="input " type="Password" placeholder="User Password" value="" name="userPassword_confirmation">
						<span class="icon is-small is-left">
						    <i class="fas fa-password"></i>
						</span>
					</div>

				</div>
				<div class="field">
					<label class="label">Admin Password</label>
					<div class="control has-icons-left has-icons-right">
						<input class="input " type="Password" placeholder="User Password" value="" name="adminstratorPassword">
						<span class="icon is-small is-left">
						    <i class="fas fa-password"></i>
						</span>
					</div>

				</div>


				<div class="field">
					<p class="control">
						<button class="button is-success">
							Add User
						</button>
					</p>
				</div>

			</div>
			<div class="column"></div>
		</div>
	</form>
</div>	
@endsection