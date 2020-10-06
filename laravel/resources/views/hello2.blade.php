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

<body  onLoad="startTime()">
  <!--Preloader-->
  <div id="preloader" class="preloader table-wrapper">
    <div class="table-row">
      <div class="table-cell">
        <div class="la-ball-scale-multiple la-3x">
          <div></div>
          <div></div>
          <div></div>
        </div>
      </div>
    </div>
  </div>
  <div id="main-wrapper" class="main-wrapper">

    <ul id="gn-menu" class="gn-menu-main">
      <li class="top-clock">
        <span id="txt"></span>
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
    </ul>

    <!--Content-->
    <div id="content" class="content">
      <center>
        <h1 class="text-uppercase">
          <u>Aplikasi Booking internal Kanwil Jakarta 3</u>
        </h1>
      </center>
        <div class="row">
            <div class="col-lg-6 col-sm-6">
                <a href="/meeting/lt-2">
                    <div class="content-box box-shadow big-box">
                        <center>
                            <h1>Ruang Meeting Lantai 2</h1>
                        </center>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 col-sm-6">
                <a href="/meeting/lt-3">
                    <div class="content-box box-shadow big-box">
                        <center>
                            <h1>Ruang Meeting Lantai 3</h1>
                        </center>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-6">
                <a href="/meeting/lt-4">
                    <div class="content-box box-shadow big-box">
                        <center>
                            <h1>Ruang Meeting Lantai 4</h1>
                        </center>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 col-sm-6">
                <a href="/meeting/lt-5">
                    <div class="content-box box-shadow big-box">
                        <center>
                            <h1>Ruang Meeting Lantai 5</h1>
                        </center>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-6">
                <a href="/meeting/lt-8">
                    <div class="content-box box-shadow big-box">
                        <center>
                            <h1>Ruang Meeting Lantai 8 (1)</h1>
                        </center>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 col-sm-6">
                <a href="/meeting/lt-8-2">
                    <div class="content-box box-shadow big-box">
                        <center>
                            <h1>Ruang Meeting Lantai 8 (2)</h1>
                        </center>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-6">
                <a href="/meeting/lt-9">
                    <div class="content-box box-shadow big-box">
                        <center>
                            <h1>Ruang Meeting Lantai 9</h1>
                        </center>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 col-sm-6">
                <a href="/meeting/lt-aula">
                    <div class="content-box box-shadow big-box">
                        <center>
                            <h1>Ruang Meeting Lantai aula</h1>
                        </center>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-6">
                <a href="/meeting/lt-10-kiri">
                    <div class="content-box box-shadow big-box">
                        <center>
                            <h1>Ruang Meeting Lantai 10 Kiri</h1>
                        </center>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 col-sm-6">
                <a href="/meeting/lt-10-kanan">
                    <div class="content-box box-shadow big-box">
                        <center>
                            <h1>Ruang Meeting Lantai 10 Kanan</h1>
                        </center>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
          <div class="col-md-2 col-sm-3 col-md-offset-5">
            <div class="content-box box-shadow small-box">
              <center>
                <a href="/see-all">See all</a> | <a href="/vicon-self">Vicon</a> | <a href="/login">LOGIN</a>
              </center>  
            </div>
          </div>
        </div>
    </div>

      <!--Footer-->
      <div class="footer">@apakata-do</div>
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
</body>

</html>