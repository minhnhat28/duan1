<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>BlueTech - Admin</title>
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
  <link rel="stylesheet" href="vendor/owl-carousel/css/owl.carousel.min.css">
  <link rel="stylesheet" href="vendor/owl-carousel/css/owl.theme.default.min.css">
  <link href="vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="vendor/summernote/summernote.css" rel="stylesheet">
  <link href="vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>

<body>
  <!--**********************************
        Main wrapper start
    ***********************************-->
  <div id="main-wrapper">
    <!--**********************************
            Nav header start
        ***********************************-->
    <div class="nav-header">
      <a href="index.php?act=shop" class="brand-logo">
        BLUETECH
      </a>

      <div class="nav-control">
        <div class="hamburger">
          <span class="line"></span><span class="line"></span><span class="line"></span>
        </div>
      </div>
    </div>
    <!--**********************************
            Nav header end
        ***********************************-->

    <!--**********************************
            Header start
        ***********************************-->
    <div class="header">
      <div class="header-content">
        <nav class="navbar navbar-expand">
          <div class="collapse navbar-collapse justify-content-between">
            <div class="header-left">
              <div class="search_bar dropdown">
                <!-- <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                  <i class="mdi mdi-magnify"></i>
                </span> -->
                <div class="dropdown-menu p-0 m-0">
                  <!-- <form>
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search" />
                  </form> -->
                </div>
              </div>
            </div>

            <!-- --------------------------------- Thông Báo --------------------------------- -->
            <ul class="navbar-nav header-right">
              <li class="nav-item dropdown notification_dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                  <i class="mdi mdi-bell"></i>
                  <div class="pulse-css"></div>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                  <ul class="list-unstyled">
                    <li class="media dropdown-item">
                      <span class="success"><i class="ti-user"></i></span>
                      <div class="media-body">
                        <a href="#">
                          <p>
                            <strong>Martin</strong> has added a
                            <strong>customer</strong> Successfully
                          </p>
                        </a>
                      </div>
                      <span class="notify-time">3:20 am</span>
                    </li>
                    <li class="media dropdown-item">
                      <span class="primary"><i class="ti-shopping-cart"></i></span>
                      <div class="media-body">
                        <a href="#">
                          <p>
                            <strong>Jennifer</strong> purchased Light
                            Dashboard 2.0.
                          </p>
                        </a>
                      </div>
                      <span class="notify-time">3:20 am</span>
                    </li>
                    <li class="media dropdown-item">
                      <span class="danger"><i class="ti-bookmark"></i></span>
                      <div class="media-body">
                        <a href="#">
                          <p>
                            <strong>Robin</strong> marked a
                            <strong>ticket</strong> as unsolved.
                          </p>
                        </a>
                      </div>
                      <span class="notify-time">3:20 am</span>
                    </li>
                    <li class="media dropdown-item">
                      <span class="primary"><i class="ti-heart"></i></span>
                      <div class="media-body">
                        <a href="#">
                          <p>
                            <strong>David</strong> purchased Light Dashboard
                            1.0.
                          </p>
                        </a>
                      </div>
                      <span class="notify-time">3:20 am</span>
                    </li>
                    <li class="media dropdown-item">
                      <span class="success"><i class="ti-image"></i></span>
                      <div class="media-body">
                        <a href="#">
                          <p>
                            <strong> James.</strong> has added a<strong>customer</strong>
                            Successfully
                          </p>
                        </a>
                      </div>
                      <span class="notify-time">3:20 am</span>
                    </li>
                  </ul>
                  <a class="all-notification" href="#">See all notifications <i class="ti-arrow-right"></i></a>
                </div>
              </li>
              <!-- --------------------------------- ADMIN --------------------------------- -->

              <li class="nav-item dropdown header-profile">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                  <i class="mdi mdi-account"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                  <a href="" class="dropdown-item">
                    <i class="icon-user"></i>
                    <span class="ml-2">Thông Tin Tài Khoản </span>
                  </a>
                  <a href="" class="dropdown-item">
                    <i class="icon-key"></i>
                    <span class="ml-2">Đăng Xuất </span>
                  </a>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
    <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

    <!--**********************************
            Sidebar start
        ***********************************-->

    <div class="quixnav">
      <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">
          <?php
          if (empty($_SESSION['user_name_login'])) {
            echo "<script>alert('bạn không đủ thẩm quyền');</script>";
          } else if (extract($_SESSION['user_name_login']) && $role >= 1) {
            ?>

              <li class="nav-label first">Trang Chủ</li>
              <li>
                <a class="" href="index.php" aria-expanded="false"><i class="fa-solid fa-cube"></i><span
                    class="nav-text">Bảng Điều Khiển</span></a>

              </li>


              <li>
                <a class="" href="index.php?act=chart" aria-expanded="false"><i class="icon icon-chart-bar-33"></i><span
                    class="nav-text">Biểu Đồ Thống Kê</span></a>
               
              </li>
              <li class="nav-label">Quản Lý Cửa Hàng</li>

              <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                    class="fa-solid fa-microchip"></i><span class="nav-text">Danh Mục</span></a>
                <ul aria-expanded="false">
                  <li><a href="index.php?act=list_cate">Danh Sách Danh Mục</a></li>
                  <li><a href="index.php?act=add_cate">Thêm Danh Mục</a></li>
                  <li><a href="index.php?act=list_color">Danh Sách Màu</a></li>
                  <li><a href="index.php?act=add_color">Thêm Màu</a></li>
                  <li><a href="index.php?act=list_brand">Danh Sách Hãng</a></li>
                  <li><a href="index.php?act=add_brand">Thêm Hãng</a></li>
                </ul>
              </li>

              <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                    class="fa-solid fa-headphones-simple"></i><span class="nav-text">Sản Phẩm</span></a>
                <ul aria-expanded="false">
                  <li><a href="index.php?act=list_pro">Danh Sách Sản Phẩm</a></li>
                  <li><a href="index.php?act=add_pro">Thêm Sản Phẩm</a></li>
                </ul>
              </li>
              <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                    class="fa-solid fa-truck-fast"></i><span class="nav-text">Đơn Hàng</span></a>
                <ul aria-expanded="false">
                  <li><a href="index.php?act=list_order">Danh Sách Đơn Hàng</a></li>
                  <li><a href="index.php?act=list_completed_order">Đơn Hàng Đã Giao</a></li>
                  <li><a href="index.php?act=list_cancelled_order">Đơn Hàng Đã Bị Hủy</a></li>
                </ul>
              </li>

              <li class="nav-label">Quản Lý Khách Hàng</li>
              <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="fa-solid fa-users"></i><span
                    class="nav-text">Người Dùng</span></a>
                <ul aria-expanded="false">
                  <li><a href="index.php?act=list_account">Danh Sách Người Dùng</a></li>
                  <li><a href="#">Danh Sách Hội Viên</a></li>
                </ul>
              </li>

            

            <?php
          }
          ?>

         
      </div>
    </div>
    <!--**********************************
            Sidebar end
        ***********************************-->