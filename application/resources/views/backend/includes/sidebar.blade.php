<div class="col-md-3 left_col menu_fixed">
	<div class="left_col scroll-view">
		<div class="navbar nav_title" style="border: 0;">
			<a href="{{ route('backend.home') }}" class="site_title"> <span>Nutragen</span></a>
		</div>

		<div class="clearfix"></div>

		<div class="profile">
			<div class="profile_pic">
				<img src="{{ asset(Auth::user()->avatar != '' ? Auth::user()->avatar : 'backend/images/user.png') }}" alt="..." class="img-circle profile_img">
			</div>
			<div class="profile_info">
				<span>Hai,</span>
				<h2>{{ Auth::user()->name }}</h2>
			</div>
		</div>

		<br />

		<!-- sidebar menu -->
		<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
			<div class="menu_section active">
				<h3>General</h3>
				<ul class="nav side-menu">
					<li class="{{ Route::is('backend.home*') ? 'active' : '' }}"><a href="{{ route('backend.home') }}"><i class="fa fa-home"></i>Home</a></li>

					@can('list-inbox')
					<li class="{{ Route::is('backend.inbox*') ? 'active' : '' }}"><a href="{{ route('backend.inbox') }}"><i class="fa fa-envelope"></i>Inbox</a></li>
					@endcan

					@can('list-news')
					<li class="{{ Route::is('backend.news*') ? 'active' : '' }}"><a href="{{ route('backend.news') }}"><i class="fa fa-newspaper-o" aria-hidden="true"></i>News</a></li>
					@endcan

					@can('list-partner')
					<li class="{{ Route::is('backend.partner*') ? 'active' : '' }}"><a href="{{ route('backend.partner') }}"><i class="fa fa-handshake-o" aria-hidden="true"></i>Partner</a></li>
					@endcan

					@can('list-distribution')
					<li class="{{ Route::is('backend.distribution*') ? 'active' : '' }}"><a href="{{ route('backend.distribution') }}"><i class="fa fa-truck" aria-hidden="true"></i>Distribution</a></li>
					@endcan

					@can('list-license')
					<li class="{{ Route::is('backend.license*') ? 'active' : '' }}"><a href="{{ route('backend.license') }}"><i class="fa fa-certificate" aria-hidden="true"></i>License</a></li>
					@endcan

					@can('list-product')
					<li class="{{ Route::is('backend.product*') ? 'active' : '' }}"><a href="{{ route('backend.product') }}"><i class="fa fa-cubes" aria-hidden="true"></i></i>Product</a></li>
					@endcan

					{{-- <li>
						<a>
							<i class="fa fa-beer"></i>Menu<span class="fa fa-chevron-down"></span>
						</a>
						<ul class="nav child_menu" style="">
							<li ><a href="">Sub 1</a></li>
							<li ><a href="">Sub 2</a></li>
							<li ><a href="">Sub 3</a></li>
						</ul>
					</li> --}}
					
				</ul>
			</div>
			<div class="menu_section">
                <h3>Access</h3>
	                <ul class="nav side-menu">
	                	@can('list-user')
	                  	<li class="{{ Route::is('backend.user*') ? 'active' : '' }}"><a href="{{ route('backend.user') }}"><i class="fa fa-users"></i></i>User List</a></li>
	                  	@endcan

	                  	@can('list-role')
	                  	<li class="{{ Route::is('backend.role*') ? 'active' : '' }}"><a href="{{ route('backend.role') }}"><i class="fa fa-key"></i>Role List</a></li>
	                  	@endcan

	                  	@can('config')
	                  	<li class="{{ Route::is('backend.config*') ? 'active' : '' }}"><a href="{{ route('backend.config') }}"><i class="fa fa-wrench"></i>Configuration</a></li>
	                  	@endcan
                    </ul>
              </div>

		</div>
		<!-- /sidebar menu -->

		<!-- /menu footer buttons -->
		<div class="sidebar-footer hidden-small">
			@can('list-user')
			<a href="{{ route('backend.user') }}" data-toggle="tooltip" data-placement="top" title="Users">
				<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
			</a>
			@endcan

			@cannot('list-user')
			<a href="#" data-toggle="tooltip" data-placement="top" title="">
				
			</a>
			@endcannot
			
			<a href="{{ route('backend.inbox') }}" data-toggle="tooltip" data-placement="top" title="Inbox">
				<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
			</a>

			@can('edit-user')
			<a href="{{ route('backend.user.edit', ['id' => Auth::id()]) }}" data-toggle="tooltip" data-placement="top" title="Profile">
				<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
			</a>
			@endcan

			@cannot('edit-user')
			<a href="#" data-toggle="tooltip" data-placement="top" title="">
				
			</a>
			@endcannot

			<a href="{{ route('backend.logout') }}" data-toggle="tooltip" data-placement="top" title="Logout">
				<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
			</a>
		</div>
		<!-- /menu footer buttons -->
	</div>
</div>
