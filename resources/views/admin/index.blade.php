@extends ("layouts.app")


@section ("pageTitle")
	About Us | 100TEFL
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
				<a href="news/addnews" style="font-size: 18px">Add news</a>
			</div>
		</div>
		<div class="col-md-3 col-lg-3">
			<div class="row">
				<img src="{{env('APP_URL')}}images/uploads/icons/feedback.jpg" height="200px" width="100%" style="border:thin solid gray; border-radius: 4px">
			</div>
			<div class="row">
				<a href="admins/feedback" style="font-size: 18px">Client Feedbacks</a>
			</div>
		</div>
		<div class="col-md-3 col-lg-3">
			<div class="row">
				<img src="{{env('APP_URL')}}images/uploads/icons/membersicon.png" height="200px" width="100%"  style="border:thin solid gray; border-radius: 4px">
			</div>
			<div class="row">
				<a href="admins/feedback" style="font-size: 18px">Member Details</a>
			</div>
		</div>
	</div>
			

			
			
</div>

@endsection