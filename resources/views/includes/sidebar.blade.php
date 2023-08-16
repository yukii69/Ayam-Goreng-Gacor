<div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="#"><img src="{{ asset('front/images/logo.png') }}" width="140" style="filter: brightness(0) invert(1);"></a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">AG</a>
          </div>
          <ul class="sidebar-menu">

            <li class="menu-header">Dashboard</li>
            <li class="nav nav-primary {{ request()->is('*dashboard*') ? 'active' : '' }}">
				<a class="nav-link" href="{{ route ('dashboard') }}">
					<i class="fas fa-chart-bar"></i> 
					<span class="{{ request()->is('dashboard*') ? : '' }}">Dashboard</span>
				</a>
			</li>
			
            <li class="menu-header">Menu</li>
            <li class="nav nav-primary {{ request()->is('*user*') ? 'active' : '' }}">
				<a class="nav-link" href="{{ route ('user.index') }}">
					<i class="fas fa-user"></i> 
					<span class="{{ request()->is('user*') ? : '' }}">Users</span>
				</a>
			</li>			

			<li class="nav nav-primary {{ request()->is('*banner*') ? 'active' : '' }}">
				<a class="nav-link" href="{{ route ('banner.index') }}">
					<i class="fas fa-tags"></i> 
					<span class="{{ request()->is('banner*') ? : '' }}">Banner</span>
				</a>
			</li>

			<li class="nav nav-primary {{ request()->is('*andalan*') ? 'active' : '' }}">
				<a class="nav-link" href="{{ route ('andalan.index') }}">
					<i class="fas fa-bolt"></i> 
					<span class="{{ request()->is('andalan*') ? : '' }}">Andalan</span>
				</a>
			</li>

			<li class="nav nav-primary {{ request()->is('*menu*') ? 'active' : '' }}">
				<a class="nav-link" href="{{ route ('menu.index') }}">
					<i class="fas fa-utensils"></i> 
					<span class="{{ request()->is('menu*') ? : '' }}">Menu</span>
				</a>
			</li>

			<li class="nav nav-primary {{ request()->is('*promo*') ? 'active' : '' }}">
				<a class="nav-link" href="{{ route ('promo.index') }}">
					<i class="fas fa-percent"></i> 
					<span class="{{ request()->is('promo*') ? : '' }}">Promo</span>
				</a>
			</li>			
			
			<li class="nav nav-primary {{ request()->is('*galery*') ? 'active' : '' }}">
				<a class="nav-link" href="{{ route ('galery.index') }}">
					<i class="fas fa-images"></i> 
					<span class="{{ request()->is('galery*') ? : '' }}">Galery</span>
				</a>
			</li>

			<li class="nav nav-primary {{ request()->is('*testi*') ? 'active' : '' }}">
				<a class="nav-link" href="{{ route ('testi.index') }}">
					<i class="fas fa-comment"></i> 
					<span class="{{ request()->is('testi*') ? : '' }}">Testimonials</span>
				</a>
			</li>

			<li class="nav nav-primary {{ request()->is('*wa*') ? 'active' : '' }}">
				<a class="nav-link" href="{{ route ('wa.index') }}">
					<i class="fas fa-phone"></i> 
					<span class="{{ request()->is('wa*') ? : '' }}">Whatsapp</span>
				</a>
			</li>
           
</aside>
</div>

