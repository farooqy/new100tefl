@extends ("layouts.app")


@section ("pageTitle")
	Admin - News | 100TEFL
@endsection
@section ("content")

<div class="container" style="font-family: Times New Roman">
	
	@if($newsList)
	
	
	<div class="row">
		<table class="table">
			<thead style="background-color: rgb(222, 228, 131)">
				<th>News Title</th>
				<th>Publish Data</th>
				<th>Last updated</th>
				<th>Action</th>
			</thead>
			<tbody>
				@foreach($newsList as $news)
				<tr>
					<td>{{$news->title}}</td>
					<td>{{$news->created_at}}</td>
					<td>{{$news->updated_at}}</td>
					<td>
						<div class="dropdown">
						  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						    Choose Action
						  </button>
						  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						    <a class="dropdown-item" href="/news/editnews/{{$news->id}}">Edit News</a>
						    <a class="dropdown-item" href="/news/deletenew/{{$news->id}}">Delete New</a>
						  </div>
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		
	</div>
	
	
	@else
	<div class="row">
		There are news to view at the moment
	</div>
	@endif
	
	
</div>
@endsection