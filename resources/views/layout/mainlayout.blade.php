<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
    <!-- Basic Page Needs
    ================================================== -->
    <!-- Get the top scripts -->
    @include("layout.scriptsTop")
</head>
<body>

<div id="page" class="page">

    
    @include("layout.header")
    
    @yield("content")


    @include ("layout.footer")

    

</div>

<!-- JavaScript
================================================== -->
<!-- load the javascript scripts -->

@include("layout.scriptsBottom")
</body>
</html>
