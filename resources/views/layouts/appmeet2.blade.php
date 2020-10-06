<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no" />

  <title>Booking meeting</title>


  <link rel="stylesheet" href="/tuser/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="/tuser/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="/tuser/bower_components/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="/tuser/bower_components/metisMenu/dist/metisMenu.min.css">
  <link rel="stylesheet" href="/tuser/bower_components/Waves/dist/waves.min.css"> 
  <link rel="stylesheet" href="/tuser/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css"> 

  <link rel="stylesheet" href="/tuser/js/selects/cs-select.css">
  <link rel="stylesheet" href="/tuser/js/selects/cs-skin-elastic.css">
  <script src="/tuser/js/menu/modernizr.custom.js"></script>
  @yield('css')
  <style>
    /*.big-box{
        padding: 90% ;
    }*/
  </style> 
  <link rel="stylesheet" href="/tuser/css/style.css">
 
  <link rel="icon" href="/tuser/img/favicon.ico" type="image/x-icon" />
  <link rel="shortcut icon" href="/tuser/img/favicon.ico" type="image/x-icon" />
  <!--[if lt IE 9]>
      <script src="bower_components/html5shiv/dist/html5shiv.min.js"></script>
      <script src="bower_components/respondJs/dest/respond.min.js"></script>
    <![endif]-->
</head>

<body onLoad="startTime()">
  <div id="main-wrapper" class="main-wrapper">
    <!--Preloader-->
    <!-- <div id="preloader" class="preloader table-wrapper">
      <div class="table-row">
        <div class="table-cell">
          <div class="la-ball-scale-multiple la-3x">
            <div></div>
            <div></div>
            <div></div>
          </div>
        </div>
      </div>
    </div> -->
    
    <ul id="gn-menu" class="gn-menu-main">
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
              <li class="gn-search-item">
                <input placeholder="Search" type="search" class="gn-search">
                <a class="search-icon"><i class="fa fa-search"></i><span>Search</span></a>
              </li>
              <li>
                <a href="index.html" aria-expanded="false"><i class="fa fa-th"></i>Dashboards<span class="fa arrow"></span></a>
                <ul class="gn-submenu collapse" aria-expanded="false">
                  <li><a href="index.html">Dashboard v1</a></li>
                  <li><a href="dashboard_2.html">Dashboard v2</a></li>
                  <li><a href="dashboard_3.html">Dashboard v3</a></li>
                </ul>
              </li>


              <li>
                <a href="calendar.html"><i class="fa fa-calendar-o"></i>Calendar<span class="label label-warning pull-right">9</span></a>
              </li>

              <li>
                <a href="mailbox.html" aria-expanded="false">
                  <i class="fa fa-envelope-o"></i>Email
                  <span class="fa arrow"></span>
                </a>
                <ul class="gn-submenu collapse" aria-expanded="false">
                  <li><a href="mailbox.html">Mailbox</a></li>
                  <li><a href="email-inbox.html">Inbox</a></li>
                  <li><a href="email-compose.html">Email Compose</a></li>
                  <li><a href="email-view.html">Email View</a></li>
                </ul>
              </li>
              <li>
                <a href="widgets.html">
                  <i class="fa fa-th-list"></i>Widgets
                  <span class="label label-danger pull-right">16</span>
                </a>
              </li>
              <li>
                <a href="typography.html">
                  <i class="fa fa-font"></i>Typography
                </a>
              </li>
              <li>
                <a href="grids.html">
                  <i class="fa fa-desktop"></i>Grid System
                </a>
              </li>
              <li>
                <a href="#" aria-expanded="false"><i class="fa fa-table"></i>Tables<span class="fa arrow"></span></a>
                <ul class="gn-submenu collapse" aria-expanded="false">
                  <li><a href="tables.html">Tables</a></li>
                  <li><a href="datatables.html">Data Tables</a></li>
                </ul>
              </li>
              <li class="active">
                <a href="#" aria-expanded="true"><i class="fa fa-briefcase"></i>UI Kits<span class="fa arrow"></span></a>
                <ul class="gn-submenu collapse" aria-expanded="true">
                  <li><a href="colors.html">Colors</a></li>
                  <li><a href="animations.html">Animations</a></li>
                  <li><a href="icons.html">Icons</a></li>
                  <li><a href="form-elements.html">Forms</a></li>
                  <li><a href="sliders.html">Sliders</a></li>
                  <li><a class="active" href="buttons.html">Buttons</a></li>
                  <li><a href="breadcrumbs.html">Breadcrumbs</a></li>
                  <li><a href="nav-buttons.html">Nav buttons</a></li>
                  <li><a href="notifications.html">Notifications</a></li>
                  <li><a href="panels.html">Panels</a></li>
                  <li><a href="tabs.html">Tabs</a></li>
                  <li><a href="media.html">Media</a></li>
                  <li><a href="components.html">Other components</a></li>
                </ul>
              </li>
              <li>
                <a href="#" aria-expanded="false"><i class="fa fa-edit"></i>Charts<span class="fa arrow"></span></a>
                <ul class="gn-submenu collapse" aria-expanded="false">
                  <li><a href="flotjs.html">Flot.js</a></li>
                  <li><a href="chartjs.html">Chart.js</a></li>
                  <li><a href="morrisjs.html">Morris.js</a></li>
                </ul>
              </li>
              <li>
                <a href="#" aria-expanded="false"><i class="fa fa-file"></i>Other pages<span class="fa arrow"></span></a>
                <ul class="gn-submenu collapse" aria-expanded="false">
                  <li><a href="todo_list.html">Todo list</a></li>
                  <li><a href="timeline.html">Timeline</a></li>
                  <li><a href="contacts.html">Contacts</a></li>
                  <li><a href="profile.html">Profile</a></li>
                  <li><a href="chat.html">Chat</a></li>
                  <li><a href="projects.html">Projects</a></li>
                  <li><a href="wizard.html">Wizard</a></li>
                  <li><a href="login.html">Login</a></li>
                  <li><a href="registration.html">Registration</a></li>
                  <li><a href="404.html">404</a></li>
                </ul>
              </li>
            </ul>
          </div>
          <!-- /gn-scroller -->
          <div class="bottom-bnts">
            <a class="profile" href="profile.html"><i class="mdi mdi-account"></i></a>
            <a class="fix-nav" href="#"><i class="mdi mdi-pin"></i></a>
            <a class="logout" href="#"><i class="mdi mdi-power"></i></a>
          </div>
        </nav>
      </li>
      <li>
        <a href="index.html" class="logo">ADVANTAGE<i class="fa fa-toggle-on"></i></a>
      </li>
      <li class="top-clock">
        <span class="current-time"></span>
      </li>
      <li class="pull-right">
        <ul class="nav navbar-right right-menu">
          <li class="members-btn">
            <a class="show-members">
              <i class="fa fa-group"></i>
            </a>
          </li>
          <li class="lang">
            <select class="cs-select cs-skin-elastic">
              <option value="english" data-class="flag-england cs-selected" selected>English</option>
              <option value="german" data-class="flag-germany">German</option>
              <option value="french" data-class="flag-france">French</option>
            </select>
          </li>
          <li class="dropdown notifications">
            <a class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i> <span class="label label-warning">4</span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <h4 class="zero-m text-center">Notifications</h4>
              </li>
              <li>
                <div class="messages">
                  <div class="member-info">
                    <img src="img/team/admin.png" alt="admin" class="img-circle pull-left">
                    <span class="member-name">Sash Ficus</span>
                    <p class="members-message zero-m">Research is done!</p>
                  </div>
                  <div class="member-info">
                    <img src="img/team/member.png" alt="admin" class="img-circle pull-left">
                    <span class="member-name">Vivien Hulk</span>
                    <p class="members-message zero-m">Working hard</p>
                  </div>
                  <div class="member-info">
                    <img src="img/team/admin.png" alt="admin" class="img-circle pull-left">
                    <span class="member-name">Sash Ficus</span>
                    <p class="members-message zero-m">Research is done!</p>
                  </div>
                  <div class="member-info">
                    <img src="img/team/member.png" alt="admin" class="img-circle pull-left">
                    <span class="member-name">Vivien Hulk</span>
                    <p class="members-message zero-m">Working hard</p>
                  </div>
                </div>
              </li>
            </ul>
          </li>
          <li class="dropdown some-btn">
            <a class="fullscreen">
              <i class="mdi mdi-fullscreen"></i>
            </a>
          </li>
        </ul>
      </li>
    </ul>

    <!--Content-->
    <div id="content" class="content">
      <div class="row">
        <div class="col-lg-12">
          <div class="page-header">
            <h2>Timeline</h2>
            <ol class="breadcrumb">
              <li><a href="index.html">Tanggal & Waktu</a></li>
              <li>{{ date('d-M-yy')}}</li>
              <li class="active" id="txt"></li>
            </ol>
          </div>
        </div>
      </div>
      @yield('content')
    </div>

      <!--Footer-->
      <!-- <div class="footer">@apakata-do</div> -->
    </div>



    <!--Members Sidebar-->
    <div id="members-sidebar" class="members-sidebar">
      <h4 class="pull-left zero-m">Members</h4>
      <span class="close-members-sidebar"><i class="fa fa-remove pull-right"></i></span>
      <div class="clearfix"></div>
      <ul class="nav">
        <li>
          <div class="messages">
            <div class="member-info">
              <img src="/tuser/img/team/admin.png" alt="admin" class="img-circle pull-left">
              <span class="member-name">Sash Ficus</span>
              <p class="members-message zero-m">Sushi time)))</p>
            </div>
            <div class="member-info">
              <img src="/tuser/img/team/admin.png" alt="admin" class="img-circle pull-left">
              <span class="member-name">Sash Ficus</span>
              <p class="members-message zero-m">Working hard</p>
            </div>
          </div>
        </li>
        <li class="members-group">Work</li>
        <li><span class="status online"></span>Sash Ficus</li>
        <li><span class="status online"></span>Sash Ficus</li>
        <li><span class="status not-available"></span>Sash Ficus</li>
        <li><span class="status"></span>Sash Ficus</li>
        <li><span class="status"></span>Sash Ficus</li>
        <li><span class="status"></span>Sash Ficus</li>
        <li><span class="status"></span>Sash Ficus</li>
        <li><span class="status"></span>Sash Ficus</li>
        <li><span class="status"></span>Sash Ficus</li>
        <li class="members-group">Partner</li>
        <li><span class="status"></span>Sash Ficus</li>
        <li><span class="status"></span>Sash Ficus</li>
        <li><span class="status"></span>Sash Ficus</li>
        <li><span class="status"></span>Sash Ficus</li>
      </ul>
    </div>

  </div>
  
    <div class="login-modal modal fade">
      <div class="table-wrapper">
        <div class="table-row">
          <div class="table-cell text-center">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div class="login i-block">
              <div class="content-box">
                <div class="light-blue-bg biggest-box">

                  <h1 class="zero-m text-uppercase">Welcome</h1>

                </div>
                <div class="big-box text-left login-form">
                  <h4 class="text-center">Login</h4>
                  <form>
                    <div class="form-group">
                      <input type="text" class="form-control material" id="login" placeholder="Username">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control material" id="password" placeholder="Password">
                    </div>

                    <button type="submit" class="btn btn-block btn-info text-uppercase waves">Login</button>

                  </form>
                  <a href="#" class="green i-block">Forgot password?</a>
                  <p>Do not have an account?</p>
                  <a class="btn btn-block btn-warning text-uppercase waves waves-button">Create an account</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
  <div class="logout-modal modal fade">
      <div class="table-wrapper">
        <div class="table-row">
          <div class="table-cell text-center">
            <div class="login i-block">
              <div class="content-box">
                <div class="light-blue-bg biggest-box">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h3 class="zero-m text-uppercase">Do you want to exit?</h3>
                  <a href="#" class="i-block" data-dismiss="modal">Yes</a>
                  <a href="#" class="i-block" data-dismiss="modal">No</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>

    <!--Scripts-->
  <script src="/tuser/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="/tuser/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="/tuser/bower_components/metisMenu/dist/metisMenu.min.js"></script>
  <script src="/tuser/bower_components/Waves/dist/waves.min.js"></script>
  <script src="/tuser/bower_components/moment/min/moment.min.js"></script>
  <script src="/tuser/bower_components/jquery.nicescroll/jquery.nicescroll.min.js"></script>
  <script src="/tuser/bower_components/slimScroll/jquery.slimscroll.min.js"></script>
  <script src="/tuser/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.js"></script>
  <script src="/tuser/bower_components/cta/dist/cta.min.js"></script>
  
  <!--Menu-->
  <script src="/tuser/js/menu/classie.js"></script>
  <script src="/tuser/js/menu/gnmenu.js"></script>

  <!--Selects-->
  <script src="/tuser/js/selects/selectFx.js"></script>

    <!--Custom Scripts-->
  <script src="/tuser/js/common.js"></script>
  <script type="text/javascript">
    function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('txt').innerHTML =
        h + ":" + m + ":" + s;
        var t = setTimeout(startTime, 500);
    }
    function checkTime(i) {
        if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
        return i;
    }
  </script>
  <script>
    var canvas = document.getElementById("canvas");
    var ctx = canvas.getContext("2d");
    var radius = canvas.height / 2;
    ctx.translate(radius, radius);
    radius = radius * 0.90
    setInterval(drawClock, 1000);

    function drawClock() {
      drawFace(ctx, radius);
      drawNumbers(ctx, radius);
      drawTime(ctx, radius);
    }

    function drawFace(ctx, radius) {
      var grad;
      ctx.beginPath();
      ctx.arc(0, 0, radius, 0, 2*Math.PI);
      ctx.fillStyle = 'white';
      ctx.fill();
      grad = ctx.createRadialGradient(0,0,radius*0.95, 0,0,radius*1.05);
      grad.addColorStop(0, '#333');
      grad.addColorStop(0.5, 'white');
      grad.addColorStop(1, '#333');
      ctx.strokeStyle = grad;
      ctx.lineWidth = radius*0.1;
      ctx.stroke();
      ctx.beginPath();
      ctx.arc(0, 0, radius*0.1, 0, 2*Math.PI);
      ctx.fillStyle = '#333';
      ctx.fill();
    }

    function drawNumbers(ctx, radius) {
      var ang;
      var num;
      ctx.font = radius*0.15 + "px arial";
      ctx.textBaseline="middle";
      ctx.textAlign="center";
      for(num = 1; num < 13; num++){
        ang = num * Math.PI / 6;
        ctx.rotate(ang);
        ctx.translate(0, -radius*0.85);
        ctx.rotate(-ang);
        ctx.fillText(num.toString(), 0, 0);
        ctx.rotate(ang);
        ctx.translate(0, radius*0.85);
        ctx.rotate(-ang);
      }
    }

    function drawTime(ctx, radius){
        var now = new Date();
        var hour = now.getHours();
        var minute = now.getMinutes();
        var second = now.getSeconds();
        //hour
        hour=hour%12;
        hour=(hour*Math.PI/6)+
        (minute*Math.PI/(6*60))+
        (second*Math.PI/(360*60));
        drawHand(ctx, hour, radius*0.5, radius*0.07);
        //minute
        minute=(minute*Math.PI/30)+(second*Math.PI/(30*60));
        drawHand(ctx, minute, radius*0.8, radius*0.07);
        // second
        second=(second*Math.PI/30);
        drawHand(ctx, second, radius*0.9, radius*0.02);
    }

    function drawHand(ctx, pos, length, width) {
        ctx.beginPath();
        ctx.lineWidth = width;
        ctx.lineCap = "round";
        ctx.moveTo(0,0);
        ctx.rotate(pos);
        ctx.lineTo(0, -length);
        ctx.stroke();
        ctx.rotate(-pos);
    }
  </script>
  @yield('js')
  {{ TawkTo::widgetCode() }}
</body>

</html>