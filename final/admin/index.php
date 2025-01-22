<?php
    include 'counter.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Visual Admin Dashboard - Home</title>
    <meta name="description" content="">
    <meta name="author" content="templatemo">
    <!-- 
    Visual Admin Template
    http://www.templatemo.com/preview/templatemo_455_visual_admin
    -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/templatemo-style.css" rel="stylesheet">
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Badeen+Display&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Orbitron:wght@400..900&family=Protest+Guerrilla&family=Shizuru&display=swap" rel="stylesheet">
    <script src="js/dem.js"></script>
  </head>
  <body>  
    <!-- Left column -->
    <div class="templatemo-flex-row">
      <div class="templatemo-sidebar">
        <header class="templatemo-site-header">
          <div class="square"></div>
          <img src="../image/logo.webp" alt="" class="logo">
        </header>
        <div class="profile-photo-container">
          <img src="images/profile-photo.jpg" alt="Profile Photo" class="img-responsive">
          <div class="profile-photo-overlay"></div>
        </div>      
        <!-- Search box -->
        <form class="templatemo-search-form" role="search">
          <p class="name_ad">ADMIN:</p>
          <p class="name_ad">Dũng Đẹp Trai</p>
          <div class="input-group">
              <button type="submit" class="fa fa-search"></button>
              <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">           
          </div>
        </form>
        <div class="mobile-menu-icon">
            <i class="fa fa-bars"></i>
        </div>
        <nav class="templatemo-left-nav">          
          <ul>
            <li><a href="#" class="active"><i class="fa fa-home fa-fw"></i>TRANG CHỦ</a></li>
            <li><a href="thongtin/Thongtin.php"><i class="fa fa-bar-chart fa-fw"></i>THÔNG TIN SẢN PHẨM</a></li>
            <li><a href="Khachhang/Khachhang.php"><i class="fa fa-users fa-fw"></i>THÔNG TIN KHÁCH HÀNG</a></li>
            <li><a href="dondathang/dondathang.php"><i class="fa fa-sliders fa-fw"></i>ĐƠN ĐẶT HÀNG</a></li>
            <li><a href="../src/login.php"><i class="fa fa-eject fa-fw"></i>ĐĂNG XUẤT</a></li>
          </ul>  
        </nav>
      </div>
      <!-- Main content --> 
      <div class="templatemo-content col-1 light-gray-bg">
        <div class="templatemo-top-nav-container">
          <div class="row">
            <nav class="templatemo-top-nav col-lg-12 col-md-12">
              <ul class="text-uppercase" style="text-align: right;">
                <li><a href="login.html" style="    line-height: 50px;">Sign out</a></li>
                <img src="../image/357444673_1702327550214019_4545460425657428332_n.jpg" alt="" class="img-thumbnail"
                     style="width: 50px;
                height: 50px;
                border-radius: 25px;">
              </ul>  
            </nav> 
          </div>
        </div>
        <div class="templatemo-content-container">
          <div class="templatemo-flex-row flex-content-row">
            <div class="templatemo-content-widget white-bg col-2">
              <i class="fa fa-times"></i>
              <div class="square"></div>
              <h2 class="templatemo-inline-block">THÍCH VIẾT GÌ THÌ VIẾT</h2><hr>
              <p></p>
              <p></p>              
            </div>
            <div class="templatemo-content-widget white-bg col-1 text-center">
              <i class="fa fa-times"></i>
              <h2 class="text-uppercase">WEB</h2>
              <h3 class="text-uppercase margin-bottom-10">Design Project</h3>
              <img src="data:image/png;base64,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" alt="Bicycle" class="img-circle img-thumbnail">
            </div>
            <div class="templatemo-content-widget white-bg col-1">
              <i class="fa fa-times"></i>
              <h2 class="text-uppercase">CV</h2>
              <h3 class="text-uppercase">Tiến độ</h3><hr>
              <div class="progress">
                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
              </div>
              <div class="progress">
                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
              </div>
              <div class="progress">
                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
              </div>                          
            </div>
          </div>
          <div class="templatemo-flex-row flex-content-row">
            <div class="col-1">              
              <div class="templatemo-content-widget orange-bg">
                <i class="fa fa-times"></i>                
                <div class="media">
                  <div class="media-left">
                    <a href="#">
                      <img class="media-object img-circle" src="images/sunset.jpg" alt="Sunset">
                    </a>
                  </div>
                  <div class="media-body">
                    <p id="visit-count" style="font-size: 30px;
                                                margin: 0;"></p>
                    <h2 class="media-heading text-uppercase" style="font-size: 14px;
                                                                    font-style: italic;">Số lượng người truy cập</h2>
                  </div>        
                </div>                
              </div>            
              <div class="templatemo-content-widget white-bg">
                <i class="fa fa-times"></i>
                <div class="media">
                  <div class="media-left">
                    <a href="#">
                      <img class="media-object img-circle" src="images/sunset.jpg" alt="Sunset">
                    </a>
                  </div>
                  <div class="media-body">
                    <p id="visit-count" style="font-size: 30px;
                                                margin: 0;"></p>
                    <h2 class="media-heading text-uppercase" style="font-size: 14px;
                                                                    font-style: italic;">Số lượng khách hàng</h2>
                  </div>
                </div>                
              </div>            
            </div>
            <div class="col-1">
              <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
                <i class="fa fa-times"></i>
                <div class="panel-heading templatemo-position-relative"><h2 class="text-uppercase">Thành viên GAYTEAM</h2></div>
                <div class="table-responsive">
                  <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <td>STT</td>
                        <td>Họ</td>
                        <td>Tên</td>
                        <td>Địa chỉ</td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1.</td>
                        <td>Lưu</td>
                        <td>Dũng</td>
                        <td>Hải Dương</td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Bill</td>
                        <td>Jones</td>
                        <td>@bJ</td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Mary</td>
                        <td>James</td>
                        <td>@mJ</td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Steve</td>
                        <td>Bride</td>
                        <td>@sB</td>
                      </tr>
                      <tr>
                        <td>5.</td>
                        <td>Paul</td>
                        <td>Richard</td>
                        <td>@pR</td>
                      </tr>  
                      <tr>
                        <td>4.</td>
                        <td>Steve</td>
                        <td>Bride</td>
                        <td>@sB</td>
                      </tr>
                      <tr>
                        <td>5.</td>
                        <td>Paul</td>
                        <td>Richard</td>
                        <td>@pR</td>
                      </tr>  
                      <tr>
                        <td>4.</td>
                        <td>Steve</td>
                        <td>Bride</td>
                        <td>@sB</td>
                      </tr>                   
                    </tbody>
                  </table>    
                </div>                          
              </div>
            </div>           
          </div> <!-- Second row ends -->
          <div class="templatemo-flex-row flex-content-row templatemo-overflow-hidden"> <!-- overflow hidden for iPad mini landscape view-->
            <div class="col-1 templatemo-overflow-hidden">
              <div class="templatemo-content-widget white-bg templatemo-overflow-hidden">
                <i class="fa fa-times"></i>
                <div class="templatemo-flex-row flex-content-row">
                  <div class="col-1 col-lg-6 col-md-12">
                    <h2 class="text-center">GHI CHÚ<span class="badge">new</span></h2>
                    <div id="pie_chart_div" class="templatemo-chart"></div> <!-- Pie chart div -->
                  </div>
                </div>                
              </div>
            </div>
          </div>
          <footer class="text-right">
            <p>Đây là trang admin đẹp nhât thế giới
            | Designed by <a href="" target="_parent">LD:1203</a></p>
          </footer>         
        </div>
      </div>
    </div>
    
    <!-- JS -->
    <script src="js/jquery-1.11.2.min.js"></script>      <!-- jQuery -->
    <script src="js/jquery-migrate-1.2.1.min.js"></script> <!--  jQuery Migrate Plugin -->
    <script src="https://www.google.com/jsapi"></script> <!-- Google Chart -->
    <script type="text/javascript" src="js/templatemo-script.js"></script>      <!-- Templatemo Script -->

  </body>
</html>