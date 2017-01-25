<div class="header">
	{{--логин и регистрация--}}
	<div class="sb-search-ddd">
		<ul class="">
			<!-- Authentication Links -->
			@if (Auth::guest())
				<li><a href="{{ url('/login') }}">Login</a></li>
				<li><a href="{{ url('/register') }}">Register</a></li>
			@else
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
						{{ Auth::user()->name }} <span class="caret"></span>
					</a>

					<ul class="dropdown-menu" role="menu">
						<li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
					</ul>
				</li>
			@endif
		</ul>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="header-left">
					<div class="logo">
						<a href="/"><img src="/images/logo.png" alt=""/></a>
					</div>
					<div class="menu">
						<a class="toggleMenu" href="#"><img src="../images/nav.png" alt="" /></a>
						@if(!empty($topMenus))
							<ul class="nav" id="nav">
								@foreach ($topMenus as $topMenu)
									<li><a href="{{ $topMenu->link }}">{{ $topMenu->title }}</a>
										@if( isset( $topMenu->children ) && count($topMenu->children ) > 0 )
											@include('_partials.children', array('topMenus' => $topMenu->children))
										@endif
									</li>
								@endforeach
							</ul>
						@endif
						<div class="clear"></div>
						<script type="text/javascript" src="../js/responsive-nav.js"></script>
					</div>
					<div class="clear"></div>
				</div>
				<div class="header_right">
					<!-- start search-->
					<div class="search-box">
						<div id="sb-search" class="sb-search">
							<form>
								<input class="sb-search-input" placeholder="Enter your search term..." type="search" name="search" id="search">
								<input class="sb-search-submit" type="submit" value="">
								<span class="sb-icon-search"> </span>
							</form>
						</div>
					</div>
					<!----search-scripts---->
					<script src="../js/classie.js"></script>
					<script src="../js/uisearch.js"></script>
					<script>
						new UISearch( document.getElementById( 'sb-search' ) );
					</script>
					<!----//search-scripts---->
					<ul class="icon1 sub-icon1 profile_img">
						<li><a class="active-icon c1" href="#"> </a>
							<ul class="sub-icon1 list">
								<div class="product_control_buttons">
									<a href="#"><img src="../images/edit.png" alt=""/></a>
									<a href="#"><img src="../images/close_edit.png" alt=""/></a>
								</div>
								<div class="clear"></div>
								<li class="list_img"><img src="../images/1.jpg" alt=""/></li>
								<li class="list_desc"><h4><a href="#">velit esse molestie</a></h4><span class="actual">1 x
                          $12.00</span></li>
								<div class="login_buttons">
									<div class="check_button"><a href="checkout.html">Check out</a></div>
									<div class="login_button"><a href="login.html">Login</a></div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</ul>
						</li>
					</ul>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</div>
</div>







{{--<a href="{{ url(config('sleeping_owl.url_prefix')) }}" class="logo">--}}
	{{--<span class="logo-lg">{!! AdminTemplate::getLogo() !!}</span>--}}
	{{--<span class="logo-mini">{!! AdminTemplate::getLogoMini() !!}</span>--}}
{{--</a>--}}

{{--<nav class="navbar navbar-static-top" role="navigation">--}}
	{{--<!-- Sidebar toggle button-->--}}
	{{--<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">--}}
		{{--<span class="sr-only">Toggle navigation</span>--}}
	{{--</a>--}}
	{{--<div class="navbar-custom-menu">	--}}
		{{--<ul class="nav navbar-nav">--}}
			{{--@yield('navbar')--}}
		{{--</ul>--}}

		{{--<ul class="nav navbar-nav navbar-right">--}}
			{{--@yield('navbar.right')--}}
		{{--</ul>--}}
	{{--</div>--}}
{{--</nav>--}}
