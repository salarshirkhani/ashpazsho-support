@extends('layouts.panel')
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.customer.index" />
@endsection
@section('panel')
<style>
.generate-box{
    border-radius: 10px;
    
    padding:5px;
    display:block;
    margin-left:auto;
    margin-right:auto;
    margin-top: 30px;
    text-align:center;
    transition: 0.5s; 
}

.generate-box h4{
    text-align: center;
    display: block;
    margin-left: auto;
    margin-right: auto;
    font-size:17px;
    font-weight:900;
    margin-top:10px;
}
.address{
    display:flex-inline;
    margin:15px 0px;
}
.address input{
    width: 80%;
    border-radius: 7px;
    padding: 10px;
    text-align: center;
    border: none;
    background: white;
    box-shadow: 3px 6px 10px #aee4e77a;
}
.address button{
    padding: 10px;
    border: none;
    background: blue;
    color: white;
    font-weight: 900;
    border-radius: 7px;
    box-shadow: 5px 5px 10px #0000ff4f;
}
.address button:hover{
    background: #00c4ff;
    transition: 0.5s;
}
@media (max-width: 976px)
{
    .address input{
        width: 100%;
        margin-top:15px;
    }
    .address button{
        width: 100%;
        margin-top:15px;
    }
}
.submit a{
    padding: 10px;
    border: none;
    background: #6bc297;
    color: white !important;
    font-weight: 900;
    display: block;
    margin-top: 30px;
    text-align: center;
    font-size: 18px;
    border-radius: 7px;
    box-shadow: 5px 5px 10px #6bc29770;
    width: 100%;
    transition: 0.5s;
}
}
.submit a:hover{
    background: red;
    transition: 0.5s;
}
</style>
<link rel="stylesheet" href="{{ asset('panel/css/modal.css') }}" >
<script type="text/javascript" src="{{ asset('panel/js/qrcode.js') }}" ></script>

                      <section class="main-bar col-xl-9 col-12" style="padding: 0% 4%;">
                        <!-- dashbord site ba-hm -->
                        <div class="section-dsh row main-bar disflex col-xl-12 col-12" >
                            <div class="col-xl-8 col-5" >
                                <h1>کسب درآمد</h1>
                            </div>
                            <div class="row col-xl-4 col-7 disflex">
                                <div class="section-dsh-1 row col-xl-10 col-10 disflex">
                                    <div class="row col-xl-4 col-4">
                                        <a href=""> <img src="{{ asset('panel/img/User_box_duotone.svg') }}" alt="User_box_duotone" style="width: 35px; margin-bottom: 3px;"></a>
                                    </div>
                                    <div class="row col-xl-6 col-7">
                                        <span>{{Auth::user()->last_name}}</span>
                                    </div>
                                    <div class="dropdown row col-xl-2 col-1">
                                        <button class="dropbtn" style="background-color: #ffffff; border: none;"><i class="fas fa-sort-down" style="color:rgb(147 146 146); margin-bottom:11px; font-size:20px;"></i></button>
                                        <div class="dropdown-content">
                                            <a href="{{ route('dashboard.customer.profile') }}">ویرایش پروفایل</a>
                                        </div>
                                        <div class="dropdown-content">
                                            <a href="{{ route('dashboard.customer.profile') }}">ویرایش پروفایل</a>
                                            <a href="https://bhmwallet.com">مشاهده سایت</a>
                                        </div>
                                    </div>
                                </div>
                                <!--
                                <div class="col-xl-2 col-2 disflex2">
                                    <a href=""><img src="img/darhboard.svg" alt="darhboard"></a>
                                </div>
                                <div class="col-xl-2 col-2 disflex-3-3" style="padding-right: 88px;">
                                    <a href=""><img src="img/darhboard.svg" alt="darhboard"></a>
                                </div>
                                 -->
                            </div>
                        </div>
                        <!-- General information of users -->
                    <div class="main-bar col-xl-12 col-12">
                                    @if($activate != 'yes')
                                        <style>
                                          .activate{
                                            filter:blur(8px);
                                          }  
                                        </style>
                                        <p class="alert alert-info" style="height:6%;"> <span style=" margin-top: 5px;">حساب کاربری خود را فعال کنید </span><a href="{{ route('dashboard.customer.profile') }}" class="btn btn-primary" style="color:white !important;">فعالسازی حساب</a></p>
                                    @endif
                            @if(Session::has('info'))
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="alert alert-success">{{ Session::get('info') }}</p>
                                </div>
                            </div>
                            @endif
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="col-md-12">
                                        <p class="alert alert-danger">{{ $error }}</p>
                                    </div>
                                @endforeach
                            @endif                           
                            <div class="row activate" style="margin-top:30px;">

                                <div class="col-md-6">
                                    <h4 style="margin-top:45px; font-weight:900">کسب درآمد بدون سرمایه</h4>
                                    <p style="margin-top:20px;">   
                                    تا سقف 30 درصد از کارمزد تمامی معاملات افرادی که توسط شما به پلتفرم باهم معرفی می‌شوند، برای همیشه به شما تعلق می‌گیرد. 
                                    همچنین به ازای هر کاربر دعوت شده که ولت خود را شارژ کند ، مبلغ 50 هزارتومن به ولت شما اضافه خواهد شد .
                                    کافیست کد یا لینک دعوت اختصاصی خود را با دوستانتان به اشتراک بگذارید و بدون سرمایه از بازار ارزهای دیجیتال کسب درآمد داشته باشید
                                    
                                    </p>  
                                </div>
                                <div class="col-md-6">
                                    <img style="width:100%;" src="https://www.ompfinex.com/assets/images/landing/invite-friends.webp" alt="invite friends">
                                </div>
                                <div class="col-md-12">
                                    @if($referal != NULL)
                                    <div class="address">
                                        <input id="text1" type="text" value="{{$referal->link}}" readonly/>
                                        <button onclick="myFunction()">کپی کردن کد رفرال</button>
                                    </div>
                                    @else
                                    <div class="submit">
                                        <a href="{{ route('dashboard.customer.referal.create') }}" > ساخت کد رفرال :)</a>
                                    </div>
                                    @endif
                                </div>
                            </div>

                        
                    </div>
                </section> 
            <script>
            function myFunction() {
              // Get the text field
              var copyText = document.getElementById("text1");
            
              // Select the text field
              copyText.select();
              copyText.setSelectionRange(0, 99999); // For mobile devices
            
               // Copy the text inside the text field
              navigator.clipboard.writeText(copyText.value);
            
              // Alert the copied text
              alert("هورا :)کد رفرال کپی شد ");
            }
            </script>
            <script type="text/javascript">
            
            var qrcode = new QRCode(document.getElementById("qrcode"), {
            	width : 200,
            	height : 200
            });
            
            function makeCode () {		
            	var elText = document.getElementById("text");
            	
            	if (!elText.value) {
            		alert("Input a text");
            		elText.focus();
            		return;
            	}
            	
            	qrcode.makeCode(elText.value);
            }
            
            makeCode();
            
            $("#text").
            	on("blur", function () {
            		makeCode();
            	}).
            	on("keydown", function (e) {
            		if (e.keyCode == 13) {
            			makeCode();
            		}
            	});
            	

            </script>
<!-- Bootstrap 4 -->
<script
    src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
        
@endsection
