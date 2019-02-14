@extends ("layout.mainlayout")

@section ("pageTitle")
	New Year | 100TEFL
@endsection


@section ("content")

<div class="row text-center">
	<h2> Our New Year Party </h2>
</div>

<div class="row newsPageContainer">
	<div class="col-md-2 col-lg-2 col-sm-12 col-xs-12"></div>
	<div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
		<?php 
		for($i=1; $i<34; $i++)
		{
			if($i<10)
				$imgsrc = "news00".$i.'.PNG';
			else
				$imgsrc = "news0".$i.'.PNG';
			?>
		<div class="row newsPageDiv">
			<img src="{{env('APP_URL').'uploads/news/newyear/'.$imgsrc}}" height="100%" width="100%" />
		</div>
			<?php
		}
		?>
		
		
	</div>
	<div class="col-md-2 col-lg-2 col-sm-12 col-xs-12"></div>
	

</div>

@endsection