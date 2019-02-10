@extends("whitelayout.fullbody")

@section ("pageTitle")
	POLICES | 100TEFL
@endsection

@include("mainlayout.menulist")

@section ("content")


<div class="">

	@php

	$cookies = simplexml_load_file("uploads/static/xml/termsofuse.xml");
	@endphp

	<h1>
		{{$cookies->header}}
	</h1>
	<h3>{{$cookies->updatetime}}</h3>
	<p>
		<h3>{{$cookies->subheader}}</h3>
		<div class="">
			{{$cookies->div1}}
		</div>
		<div class="">
			{{$cookies->div2}}
		</div>
	</p>
	<p>
		<h3>{{$cookies->subheader1}}</h3>
		<div class="">
			{{$cookies->div2}}
		</div>
	</p>
	<p>
		<h3>{{$cookies->subheader2}}</h3>
		<div class="">
			{{$cookies->div3}}
		</div>
	</p>
	<p>
		<h3>{{$cookies->subheader3}}</h3>
		<div class="">
			{{$cookies->div4}}
		</div>
	</p>
	<p>
		<h3>{{$cookies->subheader4}}</h3>
		<div class="">
			{{$cookies->div5}}
		</div>
	</p>
	<p>
		<h3>{{$cookies->subheader5}}</h3>
		<div class="">
			{{$cookies->div6->subdiv1}}
		</div>
		<div class="">
			{{$cookies->div6->subdiv2}}
		</div>
	</p>
	<p>
		<h3>{{$cookies->subheader6}}</h3>
		<div class="">
			{{$cookies->div7->subdiv1}}
		</div>
		<div class="">
			{{$cookies->div7->subdiv2}}
		</div>
	</p>
	<p>
		<h3>{{$cookies->subheader7}}</h3>
		<div class="">
			{{$cookies->div8->ol}}
			<ul>
				
				<li>{{$cookies->div8->l1}}</li>
				<li>{{$cookies->div8->l2}}</li>
				<li>{{$cookies->div8->l3}}</li>
			</ul>
		</div>
	</p>
	<p>
		<h3>{{$cookies->subheader8}}</h3>
		<div class="">
			{{$cookies->div9->subdiv1}}
		</div>
		<div class="">
			{{$cookies->div9->subdiv2}}
		</div>
	</p>
	<p>
		<h3>{{$cookies->subheader9}}</h3>
		<div class="">
			{{$cookies->div10}}
		</div>
	</p>
	<p>
		<h3>{{$cookies->subheader10}}</h3>
		<div class="">
			{{$cookies->div11}}
		</div>
	</p>
	<p>
		<h3>{{$cookies->subheader11}}</h3>
		<div class="">
			{{$cookies->div12->subdiv1}}
		</div>
		<div class="">
			{{$cookies->div12->subdiv2}}
		</div>
	</p>
	<p>
		<h3>{{$cookies->subheader12}}</h3>
		<div class="">
			{{$cookies->div12->subdiv1}}
			<ol class="">
				<li>{{$cookies->div13->l1}}</li>
				<li>{{$cookies->div13->l2}}</li>
				<li>{{$cookies->div13->l3}}</li>
				<li>{{$cookies->div13->l4}}</li>
				<li>{{$cookies->div13->l5}}</li>
				<li>{{$cookies->div13->l6}}</li>
				
			</ol>
		</div>
			
	</p>
	<p>
		<h3>{{$cookies->subheader13}}</h3>
		<div class="">
			{{$cookies->div14}}
		</div>
	</p>
	<p>
		<h3>{{$cookies->subheader14}}</h3>
		<div class="">
			{{$cookies->div15->subdiv1}}
		</div>
		<div class="">
			{{$cookies->div15->subdiv2}}
		</div>
	</p>
	<p>
		<h3>{{$cookies->subheader15}}</h3>
		<div class="">
			{{$cookies->div16}}
		</div>
	</p>
	<p>
		<h3>{{$cookies->subheader16}}</h3>
		<div class="">
			{{$cookies->div17}}
		</div>
	</p>
	<p>
		<h3>{{$cookies->subheader17}}</h3>
		<div class="">
			{{$cookies->div18}}
		</div>
	</p>
</div>
<style type="text/css">
	.navbarDiv {
		background: none;
		height: 100px;
	}
</style>
@endsection