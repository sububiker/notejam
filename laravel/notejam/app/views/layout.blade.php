<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>@yield('page_title')</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
  ================================================== -->
    {{ HTML::style('css/base.css') }}
    {{ HTML::style('css/skeleton.css') }}
    {{ HTML::style('css/layout.css') }}
    {{ HTML::style('css/tables.css') }}
    {{ HTML::style('css/style.css') }}

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">

</head>
<body>
	<div class="container">
        <div class="sixteen columns">
            <div class="sign-in-out-block">
                @if(Auth::check())
                    {{ Auth::user()->email }}:&nbsp; <a href="{{ URL::route('settings'); }}">Account Settings</a> &nbsp;&nbsp;&nbsp;<a href="{{ URL::route('signout'); }}">Sign out</a>
                @else
                    <a href="{{ URL::route('signup'); }}">Sign up</a>&nbsp;&nbsp;&nbsp;<a href="{{ URL::route('signin'); }}">Sign in</a>
                @endif
            </div>
        </div>
        <div class="sixteen columns">
            <h1 class="bold-header"><a href="#" class="header">notejam</a> <span>@yield('page_title')</span></h1>
        </div>
        @yield('pad_menu')
        <div class="@yield('content_class', 'sixteen') columns content-area">
            @if(Session::has('success') || Session::has('error'))
            <div class="alert-area">
                @if(Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                    {{ Session::forget('success') }}
                @endif
                @if(Session::has('error'))
                    <div class="alert alert-error">{{ Session::get('error') }}</div>
                    {{ Session::forget('error') }}
                @endif
            </div>
            @endif
            @yield('content')
        </div>
        <hr class="footer" />
        <footer>
            <div class="footer">2013, notejam project</div>
        </footer>
	</div><!-- container -->
    <a href="https://github.com/you"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://s3.amazonaws.com/github/ribbons/forkme_right_gray_6d6d6d.png" alt="Fork me on GitHub"></a>
</body>
</html>
