<!DOCTYPE html>
<html lang="fa_IR">
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {!! SEO::generate() !!}
        <meta name="author" content="Salar shirkhani">
        <link rel="icon" href="{{asset('images/logo.png')}}">
        <link rel="stylesheet" href="{{asset('fonts/flaticon/flaticon.css')}}">
        <link rel="stylesheet" href="{{asset('css/all.css')}}">
        <link rel="stylesheet" href="{{asset('css/vendor/slick.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/vendor/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/custom/main.css')}}">
        <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/daterangepicker/daterangepicker.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/MDTimePicker/mdtimepicker.min.css') }}">
        <link rel="stylesheet" href="{{asset('css/custom/index.css')}}">
        <meta name="google-site-verification" content="V0NiiNnaIOc2mVXI4UdYmhlwjeGVUzb0siDVHbTQzLQ" />
    </head>
    <style>
       .btmbar-part {
          max-width: 375px;
       }
        .header-menu {
            display: none;
        }
       @media screen and (max-width:709px){
            .header-menu {
                display: block !important;
            }
            
            img {
                    max-height: 266px;
                    max-width: 385px;
            }

        }

    </style>
    <style>
    /* The Modal (background) */
    .modal {
      display: none; /* Hidden by default */
      position: fixed; /* Stay in place */
      z-index: 1; /* Sit on top */
      left: 0;
      top: 25%;
      width: 100%; /* Full width */
      height: 100%; /* Full height */
      overflow: auto; /* Enable scroll if needed */
      background-color: rgb(0,0,0); /* Fallback color */
      background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
      -webkit-animation-name: fadeIn; /* Fade in the background */
      -webkit-animation-duration: 0.4s;
      animation-name: fadeIn;
      animation-duration: 0.4s;
      direction:rtl;
    }
    
    /* Modal Content */
    .modal-content {
      position: fixed;
      top: 20%;
      z-index:1;
      background-color: #fefefe;
      width: 100%;
      -webkit-animation-name: slideIn;
      -webkit-animation-duration: 0.4s;
      animation-name: slideIn;
      animation-duration: 0.4s
    }
    .single-banner {
        z-index: -1 !important;
    }
    /* The Close Button */
    .close {
      color: white;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }
    
    .close:hover,
    .close:focus {
      color: #000;
      text-decoration: none;
      cursor: pointer;
    }
    
    .modal-header {
      padding: 2px 16px;
      background-color: #0044bb;
      color: white;
    }
    
    .modal-body {padding: 2px 16px;}
    
    .modal-footer {
      padding: 2px 16px;
      background-color: #5cb85c;
      color: white;
    }
    
    /* Add Animation */
    @-webkit-keyframes slideIn {
      from {bottom: -300px; opacity: 0} 
      to {bottom: 0; opacity: 1}
    }
    
    @keyframes slideIn {
      from {bottom: -300px; opacity: 0}
      to {bottom: 0; opacity: 1}
    }
    
    @-webkit-keyframes fadeIn {
      from {opacity: 0} 
      to {opacity: 1}
    }
    
    @keyframes fadeIn {
      from {opacity: 0} 
      to {opacity: 1}
    }
</style>

    <body>
                            <!-- The Modal -->
                    <div id="myModal" class="modal">
                    
                      <!-- Modal content -->
                      <div class="modal-content">
                        <div class="modal-header">
                          <span class="close">&times;</span>
          
                        </div>
                        <div class="modal-body">
                    <form action="{{route('search')}}" >
                        <div class="header-main-search">
                            <button type="submit" class="header-search-btn">
                                <i class="fas fa-search"></i>
                            </button>
                            <input type="text" name="q" class="form-control" placeholder="چیزی که دوست داری را جستجو کن ..."  autocomplete="off">
                        </div>
                    </form>
                        </div>

                      </div>
                    
                    </div>
        <header class="header-part">
            <div class="container">
                <div class="header-content">
                    <div class="header-left">
                        <ul class="header-widget">
                            <li>
                                <button type="button" onclick="openNav()" class="header-menu" style="display:none;">
                                    <i class="fas fa-align-left"></i>
                                </button>
                            </li>
                            <li>
                                <a href="{{route('/')}}" class="header-logo">
                                    <img src="{{asset('images/logo.png')}}" alt="logo">
                                </a>
                                 
                            </li>
                            <li>
                                 @if(Auth::check())
                                <a href="{{route('dashboard.customer.index')}}" class="header-user">
                                    <i class="fas fa-user"></i>
                                    <span>پنل </span>
                                </a>                            
                                @else
                                <a href="{{route('login')}}" class="header-user">
                                    <i class="fas fa-user"></i>
                                    <span>ورود</span>
                                </a>                            
                                @endif
                            </li>
                            <li>
                               
                                <button type="button" id="myBtn">
                                    <i class="fas fa-search"></i>
                                </button>
                            </li>

                        </ul>
                    </div>
                    <script>
                    // Get the modal
                    var modal = document.getElementById("myModal");
                    
                    // Get the button that opens the modal
                    var btn = document.getElementById("myBtn");
                    
                    // Get the <span> element that closes the modal
                    var span = document.getElementsByClassName("close")[0];
                    
                    // When the user clicks the button, open the modal 
                    btn.onclick = function() {
                      modal.style.display = "block";
                    }
                    
                    // When the user clicks on <span> (x), close the modal
                    span.onclick = function() {
                      modal.style.display = "none";
                    }
                    
                    // When the user clicks anywhere outside of the modal, close it
                    window.onclick = function(event) {
                      if (event.target == modal) {
                        modal.style.display = "none";
                      }
                    }
                    </script>
                    <form action="{{route('search')}}" class="header-search">
                        <div class="header-main-search">
                            <button type="submit" class="header-search-btn">
                                <i class="fas fa-search"></i>
                            </button>
                            <input type="text" name="q" class="form-control" placeholder="چیزی که دوست داری را جستجو کن ..."  autocomplete="off">
                        </div>
                    </form>
                    <div class="header-right">
                        <ul class="header-widget">
                         <!--   <li>
                                <button class="header-favourite">
                                    <i class="fas fa-heart"></i>
                                    <sup>0</sup>
                                </button>
                            </li>
                            <li>
                                <button class="header-notify">
                                    <i class="fas fa-bell"></i>
                                    <sup>0</sup>
                                </button>
                            </li>
                            <li>
                                <button class="header-message">
                                    <i class="fas fa-envelope"></i>
                                    <sup>0</sup>
                                </button>
                            </li> -->
                        </ul>
                        @if(Auth::check())
                        <a href="{{route('dashboard.customer.index')}}" class="btn btn-inline">
                            
                            <span style="font-size: 16px;">سلام 😍 {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                        </a>
                        @else
                        <a href="{{route('register')}}" class="btn btn-inline">
                            <i class="fas fa-plus-circle"></i>
                            <span style="font-size: 16px;">ثبت نام</span>
                        </a>
                        @endif
                    </div>
                </div>
                <div class="clearfix" style="clear:both;"></div>
                <br>
                <div class="col-md-12">
                    <style>
                        .submenu{
                            list-style: none;
                            position: absolute !important;
                            right: 440px !important;
                            background-color: white;
                            margin-top: 10px;
                            border-radius: 0 0 20px 20px;
                            margin-right: 0px;
                            display: none;
                            width: max-content;
                            z-index: 2;
                            top: 26px !important;
                        }
                        .submenu li {
                            text-align: center;
                            margin: 5px 34px;
                            display:none;
                        }
                        .submenu li a {
                            transition: 0.3s;
                        }
                        
                        .nav-menu li:hover .submenu{
                              display:block;
                              transition: 0.3s;
                        }

                        .nav-menu ul li ul{
                              display:block;
                              margin: 0px;
                        }
                        .jmenu{float:none;}
                        .nav-menu li:hover .submenu li{
                              display:block;
                              transition: 0.3s;
                        }
                        .nav-menu ul li ul{
                              display:block;
                              margin: 0px;
                        }
                        .jmenu ul{
                            position:absolute;
                            left:10px !important; 
                        }
                    </style>
                    <div class="nav-menu">
                        <ul>
                            <li class="jmenu"><i class="fas fa-home"></i><a href="{{route('/')}}">صفحه اصلی</a>

                            </li>
                            
                            <li><i class="fas fa-shopping-cart"></i><a href="{{route('products')}}">فروشگاه</a></li>
    
                            <li class="jmenu"><i class="fab fa-discourse"></i><a href="https://www.iranmedslp.com/category/articles">مقالات</a>
                            </li>
                            <li><i class="fas fa-chalkboard-teacher"></i><a href="#">آموزش</a>
                                <ul class="submenu">
                                    <li><a href="https://www.iranmedslp.com/category/resume">تجربیات درمانگران</a></li>
                                    <li><a href="https://www.iranmedslp.com/category/movies">فیلم های آموزشی</a> </li>
                                    <li><a href="{{route('responses')}}">تجربیات شما</a> </li>
                                </ul>
                            </li>
                            <li><i class="far fa-folder-open"></i><a href="#">پرونده الکترونیک</a>
                                <ul class="submenu" style="right:595px !important">
                                    <li><a href="{{route('dashboard.customer.index')}}">ورود به پرونده الکترونیکی</a> </li>
                                </ul>
                            </li>
                            <li><i class="far fa-building"></i><a href="{{route('about')}}">درباره ی ما</a>
                                <ul class="submenu" style="right:805px !important">
                                    <li><a href="{{route('employees')}}">معرفی درمانگران</a></li>
                                    <li><a href="{{route('team')}}">رزومه درمانگران</a> </li>
                                </ul>
                            </li>
                            <li><i class="fas fa-phone"></i><a href="{{route('contact')}}">تماس با ما</a></li>                        
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <div id="sidebar-part">
            <div class="sidebar-body">
                <div class="sidebar-header">
                    <a href="index.html" class="sidebar-logo">
                        <img src="{{asset('images/logo.png')}}" alt="logo">
                    </a>
                    <button onclick="closeNav()" class="sidebar-cross">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="sidebar-content">
                    @if(Auth::check())
                    <div class="sidebar-profile">
                        <h4>
                            <a href="{{route('dashboard.customer.index')}}" class="sidebar-name">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</a>
                        </h4>
                        <a href="{{route('dashboard.customer.index')}}" class="btn btn-inline sidebar-btn">
                            <i class="fas fa-plus-circle"></i>
                            <span style="font-size: 16px;">ورود به پنل کاربری</span>
                        </a>
                    </div>
                    @else 
                    <div class="sidebar-profile">
                        <a href="{{route('login')}}" class="btn btn-inline sidebar-btn">
                            <i class="fas fa-plus-circle"></i>
                            <span style="font-size: 16px;">ورود به سایت</span>
                        </a>
                    </div>
                    @endif
                    <div class="sidebar-menu">
                        <ul class="nav nav-tabs">
                            <li>
                                <a href="#main-menu" class="nav-link active" data-toggle="tab">منوی اصلی </a>
                            </li>
                            <li>
                                <a href="#author-menu" class="nav-link" data-toggle="tab">منوی کاربری</a>
                            </li>
                        </ul>
                        <div class="tab-pane active" id="main-menu">
                            <ul class="navbar-list">
                                <li class="navbar-item">
                                    <a class="navbar-link" href="{{route('/')}}">صفحه اصلی</a>
                                </li>
                                <!--
                                <li class="navbar-item navbar-dropdown">
                                    <a class="navbar-link" href="{{route('products')}}">
                                        <span>فروشگاه</span>
                                        <i class="fas fa-plus"></i>
                                    </a>
                                    
                                </li>
                                -->
                                <li class="navbar-item navbar-dropdown">
                                    <a class="navbar-link" href="https://www.iranmedslp.com/category/articles">
                                        <span>مقالات</span>
                                        <i class="fas fa-plus"></i>
                                    </a>
                                </li>
                                <li class="navbar-item navbar-dropdown">
                                    <a class="navbar-link" href="{{route('blog')}}">
                                        <span>آموزش</span>
                                        <i class="fas fa-plus"></i>
                                    </a>
                                    <ul class="navbar-list">
                                    <li><a class="navbar-link"  href="https://www.iranmedslp.com/category/resume">تجربیات درمانگران<a></li>
                                    <li><a class="navbar-link"  href="https://www.iranmedslp.com/category/movies">فیلم های آموزشی</a> </li>
                                    <li><a class="navbar-link"  href="#">تجربیات شما</a> </li>
                                    </ul>
                                </li>
                                <li class="navbar-item navbar-dropdown">
                                    <a class="navbar-link" href="{{route('dashboard.customer.index')}}">
                                        <span>پرونده الکترونیک</span>
                                        <i class="far fa-books"></i>
                                    </a>
                                </li>
                                <li class="navbar-item navbar-dropdown">
                                    <a class="navbar-link" href="{{route('contact')}}">
                                        <span>تماس با ما</span>
                                        <i class="fas fa-plus"></i>
                                    </a>
                                </li>
                                <li class="navbar-item navbar-dropdown">
                                    <a class="navbar-link" href="{{route('about')}}">
                                        <span>درباره ی ما</span>
                                        <i class="fas fa-plus"></i>
                                    </a>
                                <ul class="navbar-list">
                                    <li><a class="navbar-link"  href="{{route('employees')}}">معرفی درمانگران</a></li>
                                    <li><a class="navbar-link"  href="{{route('team')}}">رزومه درمانگران</a> </li>
                                </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-pane" id="author-menu">
                            <ul class="navbar-list">
                                <li class="navbar-item">
                                    <a class="navbar-link" href="{{route('dashboard.customer.index')}}">داشبورد</a>
                                </li>
                                <li class="navbar-item">
                                    <a class="navbar-link" href="{{route('dashboard.customer.consultant.create')}}">ایجاد درخواست مشاوره</a>
                                </li>
                                <li class="navbar-item">
                                    <a class="navbar-link" href="{{route('dashboard.customer.consultant.manage')}}">درخواست های مشاوره</a>
                                </li>
                                <li class="navbar-item">
                                    <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class="navbar-link">{{ __('خروج') }}</a>
                            
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-footer">
                        <p>
                            کلیه حقوق محفوظ است توسط <a href="#">آوا وب</a>
                        </p>
                        <p>
                            طراحی توسط <a href="http://ava-web.com">سالار شیرخانی </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="btmbar-part">
            <div class="container">
                <ul class="btmbar-widget">
                    <li>
                        @if(Auth::check())
                        <a href="{{route('dashboard.customer.index')}}">
                            <i class="fas fa-user"></i>
                        </a>                            
                        @else
                        <a href="{{route('login')}}">
                            <i class="fas fa-user"></i>
                        </a>                              
                        @endif
                    </li>
                    <li>
                        <a class="plus-btn" href="{{route('register')}}">
                            <i class="fas fa-plus"></i>
                            <span style="font-size: 16px;">ثبت نام</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-bell"></i>
                            <sup>0</sup>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-envelope"></i>
                            <sup>0</sup>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('contact')}}">
                            <i class="fas fa-phone"></i>                            
                        </a>
                    </li>
                </ul>
            </div>
        </div>

@yield('content')


<footer class="footer-part">
    <div class="container">

        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="footer-content">
                    <h3>تماس با ما</h3>
                    <ul class="footer-address">
                        <li>
                            <i class="fas fa-map-marker-alt"></i>
                            <p>
                  تهران اتوبان همت غرب، نرسیده به خروجی دهکده المپیک، روبروی بوستان جوانمردان، بیمارستان نیکان غرب، طبقه دوم، واحد گفتاردرمانی
                            </p>
                        </li>
                        <li>
                            <i class="fas fa-envelope"></i>
                            <p>
                                iranmedslp@gmail.com
                            </p>
                        </li>
                        <li>
                            <i class="fas fa-phone-alt"></i>
                            <p>
                                02129124213 <span>09912508325</span>
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="footer-content">
                    <h3>اطلاعات </h3>
                    <ul class="footer-widget">
                        <li>
                            <a href="#">برای همکاران</a>
                        </li>
                        <li>
                            <a href="#">برای بیماران </a>
                        </li>
                        <li>
                            <a href="#">برای پزشکان </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="footer-content">
                    <h3>سایر </h3>
                    <ul class="footer-widget">
                        <li>
                            <a href="{{route('about')}}">درباره ما</a>
                        </li>
                        <li>
                            <a href="#">سوالات متداول </a>
                        </li>
                        <li>
                            <a href="{{route('contact')}}">تماس با ما</a>
                        </li>
                        <li>
                            <a href="#">درخواست همکاری(صفحه در حال طراحی است) </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
    <div class="footer-end">
        <div class="container">
            <div class="footer-end-content">
                <p>
                    تمام حق و حقوق محفوظ است. 1400 - طراحی توسط <a href="#">سالارشیرخانی  </a>
                </p>
                <ul class="social-transparent footer-social">
                    <li>
                        <a href="https://instagram.com/moayed_salmani_slp">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<script src="{{asset('js/vendor/jquery-1.12.4.min.js')}}"></script>
<script src="{{asset('js/vendor/bootstrap.min.js')}}"></script>
<script src="{{asset('js/vendor/slick.min.js')}}"></script>
<script src="{{asset('js/vendor/popper.min.js')}}"></script>
<script src="{{asset('js/custom/slick.js')}}"></script>
<script src="{{asset('js/custom/main.js')}}"></script>
<script src="{{ asset('assets/dashboard/js/persianDatepicker.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/MDTimePicker/mdtimepicker.min.js')}}"></script>
<script>
    mdtimepicker('.mdtimepicker-input', {
        is24hour: true,
    });

</script>

</body>
</html>
