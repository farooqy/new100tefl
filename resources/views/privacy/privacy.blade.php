@extends ("layout.mainlayout")

@section ("pageTitle")
	POLICES | 100TEFL
@endsection


@section ("content")

<div class="row">
	<div class="col-md-2 col-lg-2"></div>
	<div class="col-md-8 col-lg-8">
		<div class="row">

			@php

			$cookies = simplexml_load_file("xml/privacy.xml");
			@endphp

			<h1>
				{{$cookies->header}}
			</h1>
			<h3>{{$cookies->updatetime}}</h3>
			<p>
				{{$cookies->topbody->div1}}<br>
			</p>
			<p>
				{{$cookies->topbody->div2}}
			</p>
			<p>
				<h2>{{$cookies->whararecookies->h}}</h2>
				{{$cookies->whararecookies->div1}}
				<p>{{$cookies->whararecookies->div2}}</p>
			</p>
			<p>
				<h2>{{$cookies->howweuse->h}}</h2>
				{{$cookies->howweuse->div1}}
				<p>
					{{$cookies->howweuse->div2}}<a href="{{env('APP_URL')}}cookiespolicy">{{$cookies->howweuse->div2->link}}</a>
				</p>
			</p>
			<p>
				<h2>{{$cookies->choice->h}}</h2>
				<p>
					{{$cookies->choice->div1}}
				</p>
				
				
			</p>
			<p>
				<h2>{{$cookies->consent->h}}</h2>
				<p>
					{{$cookies->consent->div1}}
				</p>
				
				
			</p>
			<p>
				<h2>{{$cookies->moreinfo->h}}</h2>
				<p>
					{{$cookies->moreinfo->body}}
				</p>
					
			</p>

		</div>
	</div>
	<div class="col-md-2 col-lg-2"></div>
</div>
		
<style type="text/css">
	.navbarDiv {
		background: none;
		height: 100px;
	}
</style>
@endsection