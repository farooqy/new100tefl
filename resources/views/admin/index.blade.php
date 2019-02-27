@extends ("layouts.app")


@section ("pageTitle")
	Administrative | 100TEFL
@endsection
@section ("content")
<style type="text/css">
	.navbarDiv {
  background: none;
  height: 120px;
}
</style>
<div class="container" style="font-family: Times New Roman">
	<div class="row text-center">
		<h2>Administrtive tool </h2>
		{{session('logStatus')}}
	</div>
	<div class="row">
		<div class="col-md-3 col-lg-3">
			<div class="row text-center">
				<img src="{{env('APP_URL')}}images/uploads/icons/newsicon.jpg" height="200px" width="100%" style="border:thin solid gray; border-radius: 4px">
			</div>
			<div class="row">
				<a href="" style="font-size: 18px"></a>
			</div>

			<div class="row">
				<div class="dropdown">
				  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    Choose Action
				  </button>
				  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				    <a class="dropdown-item" href="news/addnews">Add news</a>
				    <a class="dropdown-item" href="news/viewnews">View News</a>
				  </div>
				</div>
			</div>

				


		</div>
		<div class="col-md-3 col-lg-3">
			<div class="row">
				<img src="{{env('APP_URL')}}images/uploads/icons/feedback.jpg" height="200px" width="100%" style="border:thin solid gray; border-radius: 4px">
			</div>
			<div class="row">
				<a href="" style="font-size: 18px"></a>
			</div>
			<div class="row">
				<div class="dropdown">
				  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    Choose Action
				  </button>
				  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				    <a class="dropdown-item" href="admins/feedback">Client Feedbacks</a>
				  </div>
				</div>
			</div>
		</div>
		<div class="col-md-3 col-lg-3">
			<div class="row">
				<img src="{{env('APP_URL')}}images/uploads/icons/membersicon.png" height="200px" width="100%"  style="border:thin solid gray; border-radius: 4px">
			</div>
			<div class="row">
				<div class="dropdown">
				  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    Choose Action
				  </button>
				  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				    <a class="dropdown-item" href="admins/memberDetails">Member Details</a>
				  </div>
				</div>
			</div>
		</div>
	</div>
			

			
			
</div>

@endsection