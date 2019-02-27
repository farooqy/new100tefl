@extends ("layout.mainlayout")

@section ("pageTitle")
	News List | 100TEFL
@endsection



@section ("content")
<div class="container">
	<link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}css/newsListCss.css">
	<div class="row" style="min-height: 500px">
		<div class="col-md-2 col-lg-2"></div> 
		<div class="col-md-8 col-lg-8 newsListDiv" style="margin-top: 10px;">
		@if(isset($newsList))
			@foreach($newsList as $news)
				<div class="newsListContainer">
					<div class="newsListImage">
						<a href="{{env('APP_URL')}}news/{{$news->id}}">
							@if($news->feature_image_type === "video")
							<video height="160px" class="img" width="240px" controls="">
								<source src="{{$news->feature_image}}" type="video/mp4" >
							</video>
							@else
								<img src="{{$news->feature_image}}" height="160px" class="img" width="240px">
							@endif
							
						</a>
					</div>
					
					<div class="newsListTitle">

						<a href="{{env('APP_URL')}}news/{{$news->id}}">
							{{$news->title}}
						</a>
						
					</div>
				</div>
					
			@endforeach
			@if(count($newsList) <= 0)
				<div class="row" style="padding-top: 50px; text-align: center;">
					The are no news to display. 
				</div>
			@endif
		@elseif(isset($givenNews))
			<div class="row givenNewsContainer">
				@foreach($givenNews as $news)
					<div class="givenTitle">
						{{$news->title}}
					</div>
					{{-- <div class="givenFeatureImage">
							@if($news->feature_image_type === "video")
							<video  height="300px" width="400" controls="">
								<source src="{{$news->feature_image}}" type="video/mp4" >
							</video>
							@else
								<img src="{{$news->feature_image}}" height="300px" width="400"> 
							@endif
						
						
					</div> --}}
					<div class="givenContent">
						{{$news->content}}
					</div>

					@if(isset($news->newsFiles))
					@php $newsFiles = $news->newsFiles;  @endphp
					<div class="newsOtherFiles">
						@foreach($newsFiles as $file)
						<div class="otherImages">
							@if($file->file_type === "video")
								<video  height="150px" width="200px" controls="">
									<source src="{{$file->file_url}}" type="video/mp4" >
								</video>

							@else
								<img src="{{$file->file_url}}" height="150px" width="200px">
							@endif
							
						</div>
						@endforeach
					</div>
					@endif
				@endforeach
					

			</div>
			@if(count($givenNews) <=0)
			<div class="row">
				The news you are searching for is currently not available or has been 
				diactivated.
			</div>
			@endif
			</div>
		@else
			<div class="row">
				There are no news to display at the moment.
			</div>
		@endif	
		</div> 
		<div class="col-md-2 col-lg-2"></div> 
		
	</div>
@endsection