<!DOCTYPE html>
<html lang="fa_IR">
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {!! SEO::generate() !!}
        <link rel="stylesheet" href="{{asset('content/bootstrap/bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('js/node_modules/flickity/dist/flickity.css')}}">
        <link rel="stylesheet" href="{{asset('style/des-style.css')}}" media="only screen and (min-width: 993px)">
        <link rel="stylesheet" href="{{asset('style/mob-style.css')}}" media="(max-width:992px)">
    
        <link rel="stylesheet" href="{{asset('style/fontawesome-free-6.4.0-web/css/all.css')}}">
    
        <link rel='stylesheet' id='font-flaticon-css' href="{{asset('style/icon/flaticon.css_ver=2.9.7.css')}}" type='text/css' media='all' />
        <link rel='stylesheet' id='font-flaticon-v2-css' href="{{asset('style/icon/flaticon-v2.css_ver=2.9.7.css')}}" type='text/css'media='all' />
        <link rel='stylesheet' id='font-flaticon-v3-css' href="{{asset('style/icon/flaticon-v3.css_ver=2.9.7.css')}}" type='text/css'media='all' />
        <link rel='stylesheet' id='font-flaticon-v4-css' href="{{asset('style/icon/flaticon-v4.css_ver=2.9.7.css')}}" type='text/css'media='all' />
        <link rel='stylesheet' id='font-flaticon-v5-css' href="{{asset('style/icon/flaticon-v5.css_ver=2.9.7.css')}}" type='text/css'media='all' />
        <link rel='stylesheet' id='font-flaticon-v6-css' href="{{asset('style/icon/flaticon-v6.css_ver=2.9.7.css')}}" type='text/css'media='all' />
        <link rel='stylesheet' id='font-flaticon-v7-css' href="{{asset('style/icon/flaticon-v7.css_ver=2.9.7.css')}}" type='text/css'media='all' />
    
        
        <script src="{{asset('js/code.jquery.com_jquery-3.7.0.min.js')}}" defer></script>
        <script src="{{asset('js/node_modules/flickity/dist/flickity.pkgd.min.js')}}" defer></script>
        <script src="{{asset('content/bootstrap/bootstrap.js')}}" defer></script>
        <script src="{{asset('js/index.js')}}" defer></script>
     </head>
   
<body>
    <!-- start header -->
    <header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    <div class="logo">
                        <a href="{{route('/')}}" title="اوستا"><img src="{{asset('img/logo-light.png')}}" alt="" style="max-height: 60px"></a>
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="search-box">
                        <button class="search-btn">
                            <svg width="31" height="31" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="14.2084" cy="14.2085" r="7.75" fill="white" stroke="#263E6A" stroke-width="2.2"/>
                                <path d="M25.8334 25.8335L21.9584 21.9585" stroke="#263E6A" stroke-width="2.2" stroke-linecap="round"/>
                            </svg>
                        </button>
                        <div id="searchbox">
                            <form action="{{route('search')}}">
                                <input id="input" type="search" name="q" class="show-search bs"
                                    placeholder="جستجو کنید...">
                                <button type="submit" class="showsearch"></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    @if(Auth::check())
                    <div class="header-button">
                        <svg width="36" height="33" viewBox="0 0 36 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M26.6933 28.4706C26.1806 27.0088 25.0507 25.717 23.4789 24.7957C21.9071 23.8744 19.9812 23.375 18 23.375C16.0188 23.375 14.0929 23.8744 12.5211 24.7957C10.9494 25.717 9.81944 27.0088 9.30667 28.4706" stroke="#506A8B" stroke-width="2"/>
                            <ellipse cx="18" cy="13.75" rx="4.5" ry="4.125" stroke="#506A8B" stroke-width="2" stroke-linecap="round"/>
                            <rect x="4" y="3.75" width="28" height="25.5" rx="3" stroke="#506A8B" stroke-width="2"/>
                        </svg>
                        <a href="{{route('dashboard.customer.index')}}" target="_self">سلام 😍 {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</a>
                    </div>
                    @else
                    <div class="header-button">
                        <svg width="36" height="33" viewBox="0 0 36 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M26.6933 28.4706C26.1806 27.0088 25.0507 25.717 23.4789 24.7957C21.9071 23.8744 19.9812 23.375 18 23.375C16.0188 23.375 14.0929 23.8744 12.5211 24.7957C10.9494 25.717 9.81944 27.0088 9.30667 28.4706" stroke="#506A8B" stroke-width="2"/>
                            <ellipse cx="18" cy="13.75" rx="4.5" ry="4.125" stroke="#506A8B" stroke-width="2" stroke-linecap="round"/>
                            <rect x="4" y="3.75" width="28" height="25.5" rx="3" stroke="#506A8B" stroke-width="2"/>
                        </svg>
                        <a href="{{route('login')}}" target="_self">ورود و ثبت‌نام</a>
                    </div>
                    @endif
                </div>
            </div>
            <div class="row align-items-center" id="myHeader">
                <div class="col-md-12">
                    <div class="nav">
                        <div class="row align-items-center">
                            <div class="col-md-auto">
                                <div class="ul-nav">
                                    <ul class="list-item">
                                        <style>
                                            .ul-nav .list-item .item i{
                                                padding:5px;
                                            }
                                        </style>
                                        <li class="item"><i class="fas fa-home"></i><a href="{{route('/')}}">صفحه اصلی</a></li>
                                        <li class="item"><i class="fab fa-discourse"></i><a href="{{route('/')}}/category/articles">مقالات</a></li>
                                        
                                        <li class="item menu-item-130"><i class="fas fa-chalkboard-teacher"></i><a href="#">آموزش</a>
                                            <ul class="sub-menu">
                                                <li><a href="">تجربیات درمانگران</a> </li>
                                                <li><a href="">فیلم های آموزشی</a></li>
                                                <li><a href="{{route('responses')}}">تجربیات شما</a></li>
                                            </ul>
                                        </li>
                                        <li class="item menu-item-130"><i class="far fa-folder-open"></i><a href="">پرونده الکترونیک</a>
                                            <ul class="sub-menu">
                                                <li><a href="{{route('dashboard.customer.index')}}">ورود به پرونده الکترونیکی</a></li>
                                            </ul>
                                        </li>
                                        <li class="item menu-item-130"><i class="far fa-building"></i><a href="{{route('about')}}">درباره ی ما</a>
                                            <ul class="sub-menu">
                                                <li><a href="{{route('about')}}">درباره ی ما</a></li>
                                                <li><a href="{{route('employees')}}">معرفی درمانگران</a></li>
                                                <li><a href="{{route('team')}}">رزومه درمانگران</a></li>
                                            </ul>
                                        </li>
                                        <li class="item"><i class="fas fa-phone"></i><a href="{{route('contact')}}">تماس با ما</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <!-- mobile haeder -->
    <header class="mobile-header">
        <div class="container">
            <div class="row">
                <div class="mob-heder-row">
                    <div class="col-7">
                        <a href="">
                            <img src="{{asset('img/logo-light-mobile.png')}}" alt="" style="max-height: 50px;"">
                        </a>
                    </div>
                        <div class=" col-5">
                            <div class="ct-menu-mobile">
                                <button class="menu-btn" onclick="toggleMenu"><i class="fa-solid fa-bars"></i></button>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
        <div class="menu">
            <form action="">
                <input type="search" name="" id="" class="search-mob"><i class="fa fa-search icon-option" aria-hidden="true"></i>
            </form>
            <div class="ul-nav">
                <ul class="list-item">
                    <li class="item"><a href="">صفحه اصلی</a></li>
                    <li class="item"><a href="">تیم ما</a></li>
                    <li class="item menu-item-130">خدمات +
                        <ul class="sub-menu">
                            <li><a href=""></a> sub</li>
                            <li><a href=""></a> sub</li>
                            <li><a href=""></a> sub</li>
                            <li><a href=""></a> sub</li>
                        </ul>
                    </li>
                    <li class="item"><a href="">مقالات</a></li>
                    <li class="item"><a href="">صفحه اصلی</a></li>
                    <li class="item"><a href="">تماس با ما</a></li>
                </ul>
            </div>
            <div class="header-button">
                <a class="" target="_self">پنل کاربری اوستا</a>
            </div>
            <div class="header-Support">
                <div class="icon-header">
                    <i class="flaticon-telephone text-gradient"></i>
                </div>
                <div class="meta-header">
                    <label for=""> پشتیبانی</label><br>
                    <span>۰۹۹۱۲۵۰۸۳۲۵- ۰۲۱۲۹۱۲۴۲۱۳</span>
                </div>
            </div>
            <div class="header-Support header-email">
                <div class="icon-header">
                    <i class="flaticonv3-envelope text-gradient"></i>
                </div>
                <div class="meta-header">
                    <label for=""> ایمیل ما</label><br>
                    <span>info@avestot.com</span>
                </div>
            </div>
            <div class="header-Support">
                <div class="icon-header">
                    <i class="flaticon-map text-gradient"></i>
                </div>
                <div class="meta-header">
                    <label for=""> پشتیبانی</label><br>
                    <span>تهران، بیمارستان عرفان سعادت آباد، بخش توانبخشی</span>
                </div>
            </div>
        </div>
    </header>
    <!-- end header -->

    <!-- start main  -->
    <main class="main">

        @yield('content')

    </main>
    <!-- end main -->    

    <!-- start footer -->
    <footer class="footer-nav">
            <div class="container">
                <div class="footer-cont">
                    <div class="row">
                        <div class="footer-row">
                            <div class="col-lg-3 col-md-4">
                                <div class="foo-logo">
                                    <div class="logo">
                                        <a href="{{route('/')}}" title="اوستا"><img src="{{asset('img/logo-light.png')}}" alt=""
                                                style="max-height: 60px"></a>
                                    </div>
                                    <p>اوستا مجموعه توانبخشی است که همواره سعی در رفع مشکلات افراد نیازمند به خدمات این
                                        مجموعه را دارد</p>
                                    <div class="foo-btn">
                                        <a href="{{route('about')}}" class="footer-button" target="_self">درباره ما</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="foo-title">
                                    <h4>خبرنامه</h4>
                                    <p>ا عضویت در خبرنامه ما می توانید به بروز ترین مقالات ما و تجربیات مراجعین دسترسی داشته
                                        باشید </p>
                                    <div>
                                        <form action="#" class="foo-form">
                                            <input id="input" type="email" name="ایمیل" class="foo-emali"
                                                placeholder="عضویت در خبرنامه">
                                            <button type="submit">
                                                <i class="fab fa-telegram"></i> 
                                            </button>
                                        </form>
                                    </div>
                                    <div class="icon-contact">
                                        <a href=""><i aria-hidden="true" class="fab fa-facebook-f"></i></a>
                                        <a href=""><i aria-hidden="true" class="fab fa-twitter"></i></a>
                                        <a href=""><i aria-hidden="true" class="fab fa-dribbble"></i></a>
                                        <a href=""><i class="fab fa-behance"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="foo-title">
                                    <h4>درباره ما</h4>
                                    <div class="foo-list">
                                        <ul class="foo-ul">
                                            <li>
                                                <i class="fas fa-map-marker-alt" style="color: aqua;"></i>
                                                <span>
                                                    بیمارستان عرفان سعادت آباد، بخش توانبخشی
                                                    ایران،تهران
                                                </span>
                                            </li>
                                            <li>
                                                <i aria-hidden="true" class="fas fa-phone-alt"></i>
                                                <span>
                                                    ۰۹۹۱۲۵۰۸۳۲۵-۰۲۱۲۹۱۸۴۲۱۳
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                    <p>ساعت کاری:</p>
                                    <p>شنبه تا پنج شنبه:۸صبح تا ۵عصر</p>
                                    <p>جمعه: تعطیل</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="foo-title">
                                    <h4>پیشفرض</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="info-design">
                <p>تمامی حقوق محفوظ است . توسط تیم پرتلاش وبیتو</p>
            </div>
        </footer>
        <!-- end footer -->
        
    
        
    </body>
    </html>