
  	<header>
  		<div class="container-fluid position-relative no-side-padding">

  			<a href="{{ route('home')}}" class="logo">Catering KOPKAR UMG</a>

  			<div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="ion-navicon"></i></div>

  			<ul class="main-menu visible-on-click" id="main-menu">
          @auth
          <form class="form-group" action="{{ route('logout') }}" method="post">
            @csrf
          <li><button type="submit" value="keluar" />Keluar</li>
          </form>
          @endauth
          @guest
  				<li><a href="{{url('/')}}">Beranda</a></li>
  				<li><a href="{{ route('login')}}">Masuk</a></li>
  				<li><a href="{{ route('register')}}">Daftar</a></li>
          <li><a href="#">Tentang Kami</a></li>
          @endguest
  			</ul><!-- main-menu -->



  		</div><!-- conatiner -->
  	</header>
