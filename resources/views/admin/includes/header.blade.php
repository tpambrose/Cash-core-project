<!-- Header -->
<div class="header">

	<!-- Logo -->
	<div class="header-left">
		<a href="{{route('dashboard')}}" class="logo">
			<img src="{{asset('assets/img/logo.svg')}}" alt="Logo">
		</a>
		<a href="{{route('dashboard')}}" class="logo logo-small">
			<img src="{{asset('assets/img/logo-small.png')}}" alt="Logo" width="30" height="30">
		</a>
	</div>
	<!-- /Logo -->

	<a href="javascript:void(0);" id="toggle_btn">
		<i class="fe fe-text-align-left"></i>
	</a>

	<!-- Visit codeastro.com for more projects -->
	<!-- Mobile Menu Toggle -->
	<a class="mobile_btn" id="mobile_btn">
		<i class="fa fa-bars"></i>
	</a>
	<!-- /Mobile Menu Toggle -->

	<!-- Header Right Menu -->
	<ul class="nav user-menu">
		<!-- User Menu -->
		<li class="nav-item dropdown has-arrow">
			<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
				<span class="user-img"><img class="rounded-circle" src="{{!empty(auth()->user()->avatar) ? asset('storage/users/'.auth()->user()->avatar): asset('assets/img/avatar_1nn.png')}}" width="31" alt="avatar"></span>
			</a>
			<div class="dropdown-menu">
				<div class="user-header">
					<div class="avatar avatar-sm">
						<img src="{{!empty(auth()->user()->avatar) ? asset('storage/users/'.auth()->user()->avatar): asset('assets/img/avatar_1nn.png')}}" alt="User Image" class="avatar-img rounded-circle">
					</div>
					<div class="user-text">
						<h6>{{auth()->user()->name}}</h6>
					</div>
				</div>

				{{-- <a class="dropdown-item" href="{{route('profile')}}">My Profile</a> --}}

				<a href="javascript:void(0)" class="dropdown-item">
					<form action="{{route('logout')}}" method="post">
					@csrf
					<button type="submit" class="btn">Logout</button>
				</form>
				</a>
			</div>
		</li>
		<!-- /User Menu -->

	</ul>
	<!-- /Header Right Menu -->

</div>
<!-- /Header -->
