@extends("whitelayout.fullbody")

@section ("pageTitle")
	POLICES | 100TEFL
@endsection

@include("mainlayout.menulist")

@section ("content")


<div class="">

	@php

	$cookies = simplexml_load_file("uploads/static/xml/cookies.xml");
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
		<ol>
			{{$cookies->howweuse->subh}}
			<li>{{$cookies->howweuse->li1}}</li>
			<li>{{$cookies->howweuse->li2}}</li>
			<li>{{$cookies->howweuse->li3}}</li>
		</ol>
	</p>
	<p>
		<h2>{{$cookies->choice->h}}</h2>
		<p>
			{{$cookies->choice->div1}}
		</p>
		<p>
			{{$cookies->choice->div2}}
		</p>
		<p>
			{{$cookies->choice->subh}}
		</p>
		<ol>
			<li>{{$cookies->choice->li1}}</li>
			<li>{{$cookies->choice->li2}}</li>
			<li>{{$cookies->choice->li3}}</li>
			<li>{{$cookies->choice->li4}}</li>
			<li>{{$cookies->choice->li5}}</li>
		</ol>
		
		
	</p>
	<p>
		<h2>{{$cookies->moreinfo->h}}</h2>
		<p>
			{{$cookies->moreinfo->body}}
		</p>
		<p>
			{{$cookies->moreinfo->body->subb->h}}
			<p>
				<a href="{{$cookies->moreinfo->body->subb->li1}}" _blank>
					{{$cookies->moreinfo->body->subb->li1}}
				</a>
				
			</p>
			<p>
				<a href="{{$cookies->moreinfo->body->subb->li2}}" _blank>
					{{$cookies->moreinfo->body->subb->li2}}
				</a>
				
			</p>
			
		</p>
			
	</p>

</div>
<style type="text/css">
	.navbarDiv {
		background: none;
		height: 100px;
	}
</style>
@endsection