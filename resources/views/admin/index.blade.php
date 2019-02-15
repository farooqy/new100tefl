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
<div class="container">
	<div class="row">
		<h2>Administrtive tool </h2>
		{{session('logStatus')}}
	</div>

	<div class="row">
		<a href="admins/feedback">Client Feedbacks</a>
	</div>
	<div class="row">
		<a href="news/addnews">Add news</a>
	</div>
</div>

@endsection