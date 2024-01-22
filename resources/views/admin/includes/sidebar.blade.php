<!-- Sidebar -->
<div class="sidebar" id="sidebar">
	<div class="sidebar-inner slimscroll">
		<div id="sidebar-menu" class="sidebar-menu">

			<ul>

				<li class="{{ route_is('dashboard') ? 'active' : '' }}">
					<a href="{{route('dashboard')}}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
				</li>
                <li class="{{ route_is('dashboard') ? 'active' : '' }}">
					<a href="{{route('incomes')}}"><i class="fe fe-wallet"></i> <span>Incomes</span></a>
				</li>


                <li class="{{ route_is('dashboard') ? 'active' : '' }}">
					<a href="{{route('expenses')}}"><i class="fe fe-money"></i><span>Expenses</span></a>
				</li>

                {{-- <li class="{{ route_is('dashboard') ? 'active' : '' }}">
					<a href="{{route('dashboard')}}"><i class="fe fe-user"></i><span>Profile</span></a>
				</li> --}}

			</ul>
		</div>
	</div>
</div>
<!-- /Sidebar -->
