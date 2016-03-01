<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>{{ trans('front/site.title') }}</title>
		<meta name="description" content="">	
		<meta name="viewport" content="width=device-width, initial-scale=1">

		@yield('head')

		{!! HTML::style('css/bootstrap.min.css') !!}
		{!! HTML::style('css/steambtn.css') !!}
		<!--[if (lt IE 9) & (!IEMobile)]>
			{!! HTML::script('js/vendor/respond.min.js') !!}
		<![endif]-->
		<!--[if lt IE 9]>
			{!! HTML::style('https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js') !!}
			{!! HTML::style('https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js') !!}
		<![endif]-->

		{!! HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800') !!}
		{!! HTML::style('http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic') !!}

	</head>

  <body>

	<!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->

	<header role="banner">

		<!--<div class="brand">{{ trans('front/site.title') }}</div>
		<div class="address-bar">{{ trans('front/site.sub-title') }}</div>-->
		<div id="flags" class="text-center"></div>
		<nav class="navbar navbar-inverse" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand">{{ trans('front/site.title') }}</a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
					<ul class="nav navbar-nav">
						<li {!! classActivePath('/') !!}>
							{!! link_to('/', trans('front/site.home')) !!}
						</li>
						
						<li {!! classActiveSegment(1, ['articles', 'blog']) !!}>
							{!! link_to('articles', trans('front/site.blog')) !!}
						</li>
                        
                        <!-- <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Categories<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li class="divider"></li>
                                <li class="dropdown"><center><font face="ubuntu mono" size="3" color="red">Programming</font></center></li>
                                <li class="divider"></li>
                                    <li><a href="blog/search" name="category">.NET</a></li>
                                    <li><a href="#">Web Development</a></li>
                                    <li><a href="#">Apps Development</a></li>
                                    <li><a href="#">Python</a></li>
                                    <li><a href="#">C++</a></li>
                                    <li><a href="#">Java</a></li>
                                    
                                <li class="divider"></li>
                                <li><center><font face="ubuntu mono" size="3" color="white">Life</font></center></li>
                                <li class="divider"></li>
                                    <li><a href="#">One more separated link</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    
                                <li class="divider"></li>
                                <li><center><font face="ubuntu mono" size="3" color="green">Religion</font></center></li>
                                <li class="divider"></li>
                                    <li><a href="#">Islam</a></li>
                                    <li><a href="#">Christian</a></li>
                                    <li><a href="#">Jews</a></li>
                                    <li><a href="#">Other</a></li>
                                    
                                <li class="divider"></li>
                                <li><center><font face="ubuntu mono" size="3" color="blue">News</font></center></li>
                                <li class="divider"></li>
                                    <li><a href="#">Indonesia</a></li>
                                    <li><a href="#">Ranah Minang</a></li>
                                    <li><a href="#">Middle East</a></li>
                                    <li><a href="#">Europe</a></li>
                                    <li><a href="#">America</a></li>
                            </ul>
                        </li> -->
                        
                        @if(session('statut') == 'visitor' || session('statut') == 'user')
							<li {!! classActivePath('contact/create') !!}>
								{!! link_to('contact/create', trans('front/site.contact')) !!}
							</li>
						@endif
                        
                        </ul>
                        
                        <ul class="nav navbar-nav navbar-right">
						@if(Request::is('auth/register'))
							<li class="active">
								{!! link_to('auth/register', trans('front/site.register')) !!}
							</li>
						@elseif(Request::is('password/email'))
							<li class="active">
								{!! link_to('password/email', trans('front/site.forget-password')) !!}
							</li>
						@else
							@if(session('statut') == 'visitor')
								<li {!! classActivePath('auth/login') !!}>
									{!! link_to('auth/login', trans('Login')) !!}
								</li>
							@else
								@if(session('statut') == 'admin')
									<li>
										{!! link_to_route('admin', trans('front/site.administration')) !!}
									</li>
								@elseif(session('statut') == 'redac') 
									<li>
										{!! link_to('blog', trans('front/site.redaction')) !!}
									</li>
								@endif
								<li>
									{!! link_to('auth/logout', trans('front/site.logout')) !!}
								</li>
							@endif
						@endif
                        </ul>
						<!--<li class="dropdown">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#"><img width="32" height="32" alt="{{ session('locale') }}"  src="{!! asset('img/' . session('locale') . '-flag.png') !!}" />&nbsp; <b class="caret"></b></a>
							<ul class="dropdown-menu">
							@foreach ( config('app.languages') as $user)
								@if($user !== config('app.locale'))
									<li><a href="{!! url('language') !!}/{{ $user }}"><img width="32" height="32" alt="{{ $user }}" src="{!! asset('img/' . $user . '-flag.png') !!}"></a></li>
								@endif
							@endforeach
							</ul>
						</li>-->
					
				</div>
			</div>
		</nav>
		@yield('header')	
	</header>

	<main role="main" class="container">
		@if(session()->has('ok'))
			@include('partials/error', ['type' => 'success', 'message' => session('ok')])
		@endif	
		@if(isset($info))
			@include('partials/error', ['type' => 'info', 'message' => $info])
		@endif
		@yield('main')
	</main>

	</br>
	<div class="jumbotron">
	<footer role="contentinfo">
		 @yield('footer')
		<p class="text-center">&#x534d| <small>Copyright &copy; <b>CodeBlog</b> 2015 </small>|&#x534d </p>
		<p class="text-center">
			<iframe src="https://ghbtns.com/github-btn.html?user=MFathirIrhas&type=follow&count=false" frameborder="0" scrolling="0" width="170px" height="20px"></iframe>|
			<a href="https://twitter.com/FathirIrhas1" class="twitter-follow-button" data-show-count="false" data-size="medium">Follow @bgardner</a> |
			<a target="_blank" class="steam-group-button" target="_blank" href="http://steamcommunity.com/id/fathirirhas/"> 
				<i class="steam-group-icon"></i>
				<span class="steam-group-label">Follow me on Steam</span>
			</a> 
		</p>	
	</footer>
	</div>

	<!--javascript for twitter follow button-->	
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	<!--END for javascript for twitter follow button-->


	{!! HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js') !!}
	<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
	{!! HTML::script('js/plugins.js') !!}
	{!! HTML::script('js/main.js') !!}

	<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
	<script>
		(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
		function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
		e=o.createElement(i);r=o.getElementsByTagName(i)[0];
		e.src='//www.google-analytics.com/analytics.js';
		r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
		ga('create','UA-XXXXX-X');ga('send','pageview');
	</script>

	@yield('scripts')

  </body>
</html>