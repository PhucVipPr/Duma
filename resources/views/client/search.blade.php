<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>pro</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- style css -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    <!-- fevicon -->
    <link rel="icon" href="{{asset('images/fevicon.png')}}" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/jquery.mCustomScrollbar.min.css')}}">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->
<body class="main-layout">
<!-- header -->
<header>
    <div class="logo">
        <img src="{{asset('images/logo.png')}}">
    </div>
    <div class="menu">
        <li><a href="">Trang chủ</a></li>
        <li><a href="">Sữa tăng cân</a>
            <ul class="sub-menu">
                <li><a href="">Tăng cân nhanh</a></li>
                <li><a href="">Tăng cân nạc</a></li>
            </ul>
        </li>
        <li><a href="">Whey Protein</a>
            <ul class="sub-menu">
                <li><a href="">Whey Protein Blend</a></li>
                <li><a href="">Whey Protein Isolate</a></li>
                <li><a href="">Hydrolyzed Whey</a></li>
                <li><a href="">Casein Protein</a></li>
                <li><a href="">Meal Replacement</a></li>
            </ul>
        </li>
        <li><a href="">BCAAs, EAAs</a></li>
        <li><a href="">Pre-Workout,Creatine</a>
            <ul class="sub-menu">
                <li><a href="">Pre-Workout</a></li>
                <li><a href="">Pre & Giảm mỡ</a></li>
                <li><a href="">Creatine</a></li>
                <li><a href="">Đơn chất</a></li>
            </ul>
        </li>
        <li><a href="">Vitamin,khoáng chất</a>
            <ul class="sub-menu">
                <li><a href="">Bổ sung Vitamin</a></li>
                <li><a href="">Tăng Testosterone</a></li>
                <li><a href="">Bổ sung dầu cá</a></li>
            </ul>
        </li>
        <li><a href="">Giảm mỡ</a>
            <ul class="sub-menu">
                <li><a href="">Sinh nhiệt đốt mỡ</a></li>
                <li><a href="">Ít chất kích thích</a></li>
            </ul>
        </li>
    </div>
    <div class="others">
        <li><input name="keywords_submit" placeholder="Tìm kiếm" type="text"> <i class="fa fa-search"></i></li>
        <li> <a class="fa fa-user" href=""></a></li>
        <li> <a class="fa fa-shopping-bag" href=""></a></li>
    </div>
</header>

<!-- end header inner -->
<!-- end header -->




<!--  footer -->
<footer>
    <div class="footer">
        <div class="daih_bg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="conta">
                            <li><i class="fa fa-phone" aria-hidden="true"></i> Gọi ngay:  +01 123467890</li>
                            <li><i class="fa fa-map-marker" aria-hidden="true"></i> Vị trí cửa hàng</li>
                            <li> <i class="fa fa-envelope" aria-hidden="true"></i><a href="#"> anhnamco9@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <!-- <div class="col-sm-12">
                   <img class="tex_left" src="images/logo2.png" alt="#"/>
                </div>
                <div class=" col-md-3 col-sm-6">
                   <p class="variat">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim Lorem ipsum </p>
                </div> -->
                <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                    <h3>Thông tin  </h3>
                    <ul class="link_menu">
                        <li> Kiến thức tập gym</li>
                        <li> Chế độ dinh dưỡng</li>
                    </ul>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                    <h3>Giới thiệu chung</h3>
                    <ul class="link_menu">
                        <li> Giới thiệu về cửa hàng </li>
                        <li> Quy định</li>
                        <li> Liên hệ </li>
                        <li> Chính sách đổi trả</li>
                    </ul>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                    <h3>Hỗ trợ</h3>
                    <ul class="link_menu">
                        <li> Hướng dẫn đặt hàng</li>
                        <li> Hướng dẫn thanh toán</li>
                        <li> Chính sách bảo mật</li>
                        <li> Chính sách vận chuyển</li>
                        <li>Chính sách bảo hành</li>
                    </ul>
                </div>
                <div class="col-sm-12">
                    <ul class="social2_icon">
                        <li><a href="javascript:void(0)"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="javascript:void(0)"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="javascript:void(0)"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                        <li><a href="javascript:void(0)"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <p>© 2019 All Rights Reserved.<a href="https://html.design/"> Free html Templates</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- end footer -->
<!-- Javascript files-->
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/jquery-3.0.0.min.js')}}"></script>
<!-- sidebar -->
<script src="{{asset('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>
</body>
</html>
