@extends ("layouts.app")


@section ("pageTitle")
	Admin - News | 100TEFL
@endsection
@section ("content")

<div class="container" style="font-family: Times New Roman">

<script src="{{env('APP_URL')}}js/jquery-1.11.3.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="{{env('APP_URL')}}css/jodit.min.css">

<script src="{{env('APP_URL')}}js/jodit.min.js" type="text/javascript"></script>
<script src="{{env('APP_URL')}}js/main.js" type="text/javascript"></script>
	<form class="col-lg-6 col-md-6 col-sm-6 col-xs-6 formNews" enctype="multipart/form-data" name="newsForm" method="POST" action="/news/saveEdit" >
			@csrf

			@if($errors->any())
				<ul class="is-danger">
					@foreach ($errors->all() as $err)
						
						<li> {{$err}} </li>
						
					@endforeach
					
				</ul>
			@endif

			@if($success = session('success'))
				<ul class="is-success">
					<li>
						Successfully added news
					</li>
				</ul>
			@endif
			@if($flash = session('uploadFailed'))
				<ul>
					<li>
						{{$flash}}
					</li>
				</ul>
					
			@endif
			<div class="row">
				<label for="newsTitle" class="label">Edit the title</label>
				<input type="text" name="newsTitle" placeholder="Enter news Title" value="{{$targetNews[0]->title}}" style="border:thin solid gray">
			</div>
			<div class="row">
				<label for="newsFiles" class="label">Edit News Feature Image/Video</label>
				<input type="file" name="newsFeatureImage" >
			</div>
			<div class="row" >
				<button class="btn btn-primary col-md-3 col-lg-4 insertImage">Insert File</button>
				<span  class="col-md-9 col-lg-8 filePathHolder" style="min-height: 30px; border:thin solid gray;">Copy file url/path from here</span>
			</div>
			<div class="row">
				<label for="newsTitle" class="label">Edit the content</label>
				<textarea type="text" name="newsContent" placeholder="Write the content" id="editor" rows="30">{{$targetNews[0]->content}}</textarea>
				{{-- <input type="hidden" value="{{old('newsContent')}}" name="newsContent" class="hiddenNewsContent"> --}}
			</div>
			{{-- <textarea id="editor" placeholder="Your news content" name="newsContent" rows="20"></textarea>  --}}
			<div id="editor" ></div>
			<div class="row">
				<input type="hidden" name="changeTargetId" value="{{$targetNews[0]->id}}">
			</div>
			<div class="row">
				<input type="submit" name="submitNews" class="btn btn-primary submitNews" value="Save Changes">
			</div>

	</form>
	<form action="/news/addFile" method="POST" id="addFileForm" name="addFileForm" enctype="multipart/form-data" style="display: none;">
			@csrf
			<input type="file" class="hide addFile" name="addFile" >
			<input type="submit" class="hide submitAddFile" name="submitAddFile">
			<input type="hidden" name="fileTargetUrl" class="fileTargetUrl" value="{{env('APP_URL')}}news/addFile">
	</form>
</div>

<link rel="stylesheet" type="text/css" href="{{env('APP_URL').'css/newscss.css'}}">
@endsection