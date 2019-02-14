@extends ("layout.mainlayout")

@section ("pageTitle")
	Admin | 100TEFL
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
				@if($errors->any())
					<div class="field is-danger">
						@foreach($errors->all() as $error)
						<li class="is-danger">
							{{$error}}
						</li>
						@endforeach
					</div>
				@endif
				<div class="field">
					<label class="label">Role Name</label>
					<div class="control has-icons-left has-icons-right">
						<input class="input " type="text" placeholder="User email" value="" name="role_name">
						<span class="icon is-small is-left">
						    <i class="fas fa-user"></i>
						</span>
					</div>

				</div>

				<div class="field">
					<p class="control">
						<button class="button is-success">
							Create New Role
						</button>
					</p>
				</div>

			</div>
			<div class="column"></div>
		</div>
	</form>
</div>	
@endsection