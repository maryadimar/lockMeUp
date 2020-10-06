<li class="gn-trigger">
    <a id="menu-toggle" class="menu-toggle gn-icon gn-icon-menu">
      <div class="hamburger">
        <span></span>
        <span></span>
        <span></span>
      </div>
      <div class="cross">
        <span></span>
        <span></span>
      </div>
    </a>
    <nav class="gn-menu-wrapper">
      <div class="gn-scroller">
        <ul class="gn-menu metismenu">
			<li>
				<a href="typography.html">
					<i class="fa fa-font"></i>Typography
				</a>
			</li>
          
			<li>
				<a href="#" aria-expanded="false"><i class="fa fa-edit"></i>History<span class="fa arrow"></span></a>
				<ul class="gn-submenu collapse" aria-expanded="false">
					<li><a href="flotjs.html">Flot.js</a></li>
					<li><a href="chartjs.html">Chart.js</a></li>
					<li><a href="morrisjs.html">Morris.js</a></li>
				</ul>
			</li>
        </ul>
      </div>
      <!-- /gn-scroller -->
      <div class="bottom-bnts">
        <a class="profile" href="/home"><i class="mdi mdi-account"></i></a>
        <a class="fix-nav" href="#"><i class="mdi mdi-pin"></i></a>
        <a href="#" class="logout" href="{{ route('logout') }}"  
            onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
            <i class="mdi mdi-power"></i></a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
      </div>
    </nav>
  </li>
  <li class="top-clock">
    <span id="watch"></span>
  </li>
  <li class="pull-right">
    <ul class="nav navbar-right right-menu">
      <li class="dropdown some-btn">
        <a class="fullscreen">
          <i class="mdi mdi-fullscreen"></i>
        </a>
      </li>
    </ul>
</li>