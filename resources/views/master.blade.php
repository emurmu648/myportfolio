<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Exclusive a Personal Category Bootstrap Responsive Web Template | Home :: W3layouts</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Exclusive Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta tag Keywords -->
    <!-- Custom-Files -->
    <link rel="stylesheet" href="{{asset('emurmu')}}/css/bootstrap.css">
    <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="{{asset('emurmu')}}/css/style.css" type="text/css" media="all" />
    <!-- Style-CSS -->
    <link rel="stylesheet" href="{{asset('emurmu')}}/css/font-awesome.css">
    <!-- Font-Awesome-Icons-CSS -->
    <!-- //Custom-Files -->
    <!-- Web-Fonts -->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <!-- //Web-Fonts -->
    <!--ToastrCss -->
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

</head>
<body class="bg-dark">
<!-- header -->
<!-- navigation -->
@include('emurmu/include/navigation')
<!-- //navigation-->

<!-- about -->
@include('emurmu/include/about')
<!-- //about-->

<!-- services -->
@include('emurmu/include/services')
<!-- //services-->

<!-- works -->
@include('emurmu/include/works')
<!-- //works -->

<!-- contact -->
@include('emurmu/include/contact')
<!-- //contact -->


<!--ToastrJs -->
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
<script>
    @if($errors->any())
    @foreach($errors->all() as $error)
    toastr.error('{{$error}}','Error',{
        closeButton:true,
        progressBar:true,
    });
    @endforeach
    @endif
</script>

</body>
</html>
