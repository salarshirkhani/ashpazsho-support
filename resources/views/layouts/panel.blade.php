<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>داشبورد باهم</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('panel/style/style.css') }}" media="only screen and (min-width: 1200px)">
    <link rel="stylesheet" href="{{ asset('panel/style/style-mobile.css') }}" media="only screen and (max-width: 976px)">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{ asset('panel/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
</head>
<body>
    <style>
        .section-dsh-1>div:nth-child(2) {
            color: #878787;
            font-weight: 600;
        }
        .section-dsh-1 {
            border: solid #C7C7C7 2px;
            border-radius: 9px;
            margin-right: 10px;
        
        }
        *,p,label,h2,h3,h4,h1,span{
            font-family: iranyekan;
        }
        .section-dsh {
          margin-right: 0px ;
      }
      li:hover {
         background-color: #6bc297;
      }
        </style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <main class="container">
        <div class="ma-dsh  row">
            <button class="menu-btn">&#9776;</button>
            <aside class="menu said-bar col-xl-3 col-12">
                <div id = "side" class="cold">
                    <img src="{{ asset('/img/logo1.png') }}" alt="logo-bahm" style="padding: 1% 24%;">
                    <!-- <img src="{{ asset('panel/img/پلتفرم سود دلاری باهم.png') }}" alt="پلتفرم سود دلاری باهم"> -->
                    <div class="list">
                        <ul class="list-out ">
                            <li @if(Route::current()->getName() == '/') class="active" @endif> <a href="{{ route('dashboard.customer.index') }}"> <img src="{{ asset('panel/img/Box.svg') }}" alt="Box">داشبورد</a></li>
                            <li> <a href="{{ route('dashboard.customer.subscription') }}"> <img src="{{ asset('panel/img/Folder_dublicate.svg') }}" style="margin-right:1px" alt="Arhive_fill">پلن های ربات باهم</a></li>
                            <li> <a href="{{ route('dashboard.customer.payment') }}"> <img src="{{ asset('panel/img/Wallet_alt_fill.svg') }}" style="margin-right:5px" alt="Arhive_fill"> واریز و برداشت </a></li>  
                            <li> <a href="{{ route('dashboard.customer.profile') }}"> <img src="{{ asset('panel/img/User_box.svg') }}" style="margin-right:5px"  alt="Arhive_fill">ویرایش پروفایل</a></li>
                            <li> <a href="{{ route('dashboard.customer.referal') }}"> <img src="{{ asset('panel/img/Shop.svg') }}" alt="Arhive_fill">کسب درآمد</a></li>
                        </ul>
                    </div>
                    <div class="hr"></div>
                    <div class="list-down">
                        <ul class="list-out ">
                            <li @if(Route::current()->getName() == 'tickets') class="active" @endif> <a href="{{route('dashboard.customer.tickets')}}" > <img src="{{ asset('panel/img/Headphones_fill.svg') }}" alt="Arhive_fill">پشتیبانی</a></li>
                            <li> <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"> <img src="{{ asset('panel/img/close_ring.svg') }}" alt="close_ring">خروج از حساب</a></li>
                        </ul>
                    </div>
                </div>
                <div style="height: 400px;"></div>
            </aside>
            <!-- main page site -->   
        @yield('panel')

      </div>
    </main>

    <footer class="container-fluid footer-dsh">
        <div class="row col-xl-12 col-12 disflex">
            <div class="col-xl-4 col-7"> 
                <span style="font-size: 14px;">تمامی حقوق محفوظ است</span>
            </div>
            <div class="col-xl-6 col-1">

            </div>
            <div class="col-xl-1 col-4">
                <img src="{{ asset('/img/logo1.png') }}" style="width:85%" alt="baham" >        
            </div>
        </div>
    </footer>
    <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
    <!--javascript-->
    <script src="{{ asset('panel/js/script.js') }}"></script>
    <script src="{{ asset('assets/toastr/toastr.min.js')}}"></script>
     <script>
      $(function () {
         $('.toastrDefaultSuccess').click(function() {
          toastr.error('شما حضوری خود را ثبت کرده اید')
        });
        $('.toastrDefaultInfo').click(function() {
          toastr.info('درحال پردازش درخواست')
        });
        $('.toastrDefaultWarning').click(function() {
          toastr.error('شما نمیتوانید این پلن را انتخاب کنید')
        });
      });
     </script>     
</body>

</html>
