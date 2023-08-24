@extends('layouts.panel')
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.customer.index" />
@endsection
@section('panel')
<style>
.payment-box{
    border-radius: 10px;
    background: linear-gradient(180deg, #D8F2FF 0%, #BAE5C3 100%, #9DC8A2 100%);
    padding:5px;
    margin-top: 30px;
    transition: 0.5s; 
}
.payment-box:hover {
    transition: 0.5s; 
    z-index: 1;
    margin-top:10px;
}
.payment-box h4{
    text-align: center;
    display: block;
    margin-left: auto;
    margin-right: auto;
    font-size:17px;
    font-weight:900;
    margin-top:10px;
}
.payment-box img{
    text-align: center;
    display: block;
    margin-left: auto;
    width:115px;
    margin-right: auto;
    padding-left:0px !important;
}
.payment-box button{
    color: #FFF;
    font-size: 14px;
    font-family: Yekan Bakh FaNum;
    font-weight: 700;
    text-align: center;
    display: block;
    margin-left: auto;
    margin-right: auto;
    margin-top: 17px;
    background: #6c76b8;
    border: none;
}
.white-box{
    border-radius: 10px;
    background: #fff;
    padding:20px;
    margin-top: 30px; 
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
                      <section class="main-bar col-xl-9 col-12" style="padding: 0% 4%;">
                        <!-- dashbord site ba-hm -->
                        <div class="section-dsh row main-bar disflex col-xl-12 col-12" >
                            <div class="col-xl-8 col-5" >
                                <h1>واریز و برداشت</h1>
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
                                    @if(Auth::user()->accept == NULL)
                                        <style>
                                          .activate{
                                            filter:blur(8px);
                                          }  
                                        </style>
                                        <p class="alert alert-info" style="height: 6%;"> <span style="float:right; margin-top: 5px;">حساب کاربری خود را فعال کنید </span><a href="{{ route('dashboard.customer.profile') }}" class="btn btn-primary" style="color:white !important; float: left;">فعالسازی حساب</a></p>
                                    @endif
                        <div class="main-bar col-xl-12 col-12 activate">

                            @if(Session::has('info'))
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="alert alert-info">{{ Session::get('info') }}</p>
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
                        <h4 style="margin-top:45px; font-weight:900">واریز به حساب </h4>                
                        <div class="row activate">
                            <div class="col-md-3">
                                <div data-toggle="modal" data-target="#usdt"  class="payment-box">
                                    <img src="{{ asset('panel/img/usdt.svg') }}">
                                    <h4>واریز با تتر</h4>
                                    <button data-toggle="modal" data-target="#usdt" class="btn btn-primary">ساخت آدرس ولت</button>
                                </div>
                                 <div class="modal fade show" id="usdt" aria-modal="true" role="dialog">
                                    <div class="modal-dialog modal-danger">
                                      <div class="modal-content ">
                                        <div class="modal-header">
                                          <h4 class="modal-title">واریز با تتر</h4>
                                          <button type="button" class="close uncheckd" data-dismiss="modal" aria-label="Close">
                                            <span  aria-hidden="true">×</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12 alert alert-info">
                                                        لطفا مقدار وجه مورد نظر خود را به صورت عددی و به دلار وارد کرد و سپس دکمه ثبت را فشار دهید
                                                        پس از کسر کارمزد شبکه و تایید ادمین به کیف پول شما واریز می شود
                                                    </div>
                                                    <div class="col-md-12 alert alert-warning">
                                                         حداقل واریز 50 تتر می باشد
                                                    </div>
                                                    <form id="usdtadd" action="{{ route('dashboard.customer.payment.grnt') }}" method="post" style="display: inline-flex;">
                                                      @csrf 
                                                      <input type="hidden" name="coin" value="usdt" > 
                                                      <input type="hidden" name="network" value="TRX" >
                                                      <input type="number" name="value" placeholder="مقدار واریزی به دلار و عدد مثلا 58" style="padding:10px; text-align:right; margin: 10px 0px 16px 0px; height: 47px; border-radius: 7px; font-size: 16px;" class="form-control" required > 
                                                    </form>                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="submit" class="btn btn-success btn-lg toastrDefaultInfo" onclick="document.getElementById('usdtadd').submit();">ایجاد ولت</button>
                                       </div>
                                      </div>
                                     </div>
                                </div>    
                            </div>
                            
                            <div class="col-md-3">
                                <div class="payment-box" data-toggle="modal" data-target="#dai" style="background:linear-gradient(180deg, #D8F2FF 0%, #FCE2BF 95.31%);">
                                    <img src="{{ asset('panel/img/dai.f917b1b 1.svg') }}" style="width: 100px;">
                                    <h4>واریز با دای</h4>
                                    <button data-toggle="modal" data-target="#dai" class="btn btn-primary">ساخت آدرس ولت</button>
                                </div>
                                 <div class="modal fade show" id="dai" aria-modal="true" role="dialog">
                                    <div class="modal-dialog modal-danger">
                                      <div class="modal-content ">
                                        <div class="modal-header">
                                          <h4 class="modal-title">واریز با دای</h4>
                                          <button type="button" class="close uncheckd" data-dismiss="modal" aria-label="Close">
                                            <span  aria-hidden="true">×</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12 alert alert-info">
                                                        لطفا مقدار وجه مورد نظر خود را به صورت عددی و به دلار وارد کرد و سپس دکمه ثبت را فشار دهید
                                                        پس از کسر کارمزد شبکه و تایید ادمین به کیف پول شما واریز می شود
                                                    </div>
                                                    <div class="col-md-12 alert alert-warning">
                                                         حداقل واریز 50 تتر می باشد
                                                    </div>
                                                    <form id="daiadd" action="{{ route('dashboard.customer.payment.grnt') }}" method="post" style="display: inline-flex;">
                                                      @csrf 
                                                      <input type="hidden" name="coin" value="dai" >
                                                      <input type="hidden" name="network" value="BSC" >
                                                      <input type="number" name="value" placeholder="مقدار واریزی به دلار و عدد مثلا 58" style="padding:10px; text-align:right; margin: 10px 0px 16px 0px; height: 47px; border-radius: 7px; font-size: 16px;" class="form-control" required > 
                                                    </form>                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="submit" class="btn btn-success btn-lg toastrDefaultInfo" onclick="document.getElementById('daiadd').submit();">ایجاد ولت</button>
                                       </div>
                                      </div>
                                     </div>
                                </div>          
                            </div>
                            
                            <div class="col-md-3">
                                <div data-toggle="modal" data-target="#tron" class="payment-box" style="background:linear-gradient(180deg, #D8F2FF 0%, #F1D2D2 85.31%);">
                                    <img src="{{ asset('panel/img/trx 1.svg') }}" style="width: 100px;">
                                    <h4>واریز با ترون</h4>
                                    <button data-toggle="modal" data-target="#tron" class="btn btn-primary">ساخت آدرس ولت</button>
                                </div>
                                 <div class="modal fade show" id="tron" aria-modal="true" role="dialog">
                                    <div class="modal-dialog modal-danger">
                                      <div class="modal-content ">
                                        <div class="modal-header">
                                          <h4 class="modal-title">واریز با ترون</h4>
                                          <button type="button" class="close uncheckd" data-dismiss="modal" aria-label="Close">
                                            <span  aria-hidden="true">×</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12 alert alert-info">
                                                        لطفا مقدار وجه مورد نظر خود را به صورت عددی و به دلار وارد کرد و سپس دکمه ثبت را فشار دهید
                                                        پس از کسر کارمزد شبکه و تایید ادمین به کیف پول شما واریز می شود
                                                    </div>
                                                    <div class="col-md-12 alert alert-warning">
                                                         حداقل واریز 50 تتر می باشد
                                                    </div>
                                                    <form id="tronadd" action="{{ route('dashboard.customer.payment.grnt') }}" method="post" style="display: inline-flex;">
                                                      @csrf 
                                                      <input type="hidden" name="coin" value="trx" > 
                                                      <input type="hidden" name="network" value="TRX" >
                                                      <input type="number" name="value" placeholder="مقدار واریزی به دلار و عدد مثلا 58" style="padding:10px; text-align:right; margin: 10px 0px 16px 0px; height: 47px; border-radius: 7px; font-size: 16px;" class="form-control" required > 
                                                    </form>                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="submit" class="btn btn-success btn-lg toastrDefaultInfo" onclick="document.getElementById('tronadd').submit();">ایجاد ولت</button>
                                       </div>
                                      </div>
                                     </div>
                                </div>      
                            </div>
                            
                            <div class="col-md-3">
                                <div class="payment-box" data-toggle="modal" data-target="#about" style="background:linear-gradient(180deg, #D8F2FF 0%, #FCE2BF 65.31%);">
                                    <img src="{{ asset('panel/img/9729306 1.svg') }}" style="width:93px;">
                                    <h4>واریز ریالی ( به زودی )</h4>
                                    <button data-toggle="modal" data-target="#about" class="btn btn-primary">درباره واریز ریالی</button>
                                </div>
                            </div>
                                <div class="modal fade show" id="about" aria-modal="true" role="dialog">
                                    <div class="modal-dialog modal-danger">
                                      <div class="modal-content ">
                                        <div class="modal-header">
                                          <h4 class="modal-title">درباره واریز ریالی</h4>
                                          <button type="button" class="close uncheckd" data-dismiss="modal" aria-label="Close">
                                            <span  aria-hidden="true">×</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12 alert alert-infp">
                                                      در حال حاضر در حال برنامه نویسی این بخش و گرفتن مجوز های مربوطه از وزارت صمت هستیم
                                                      به زودی این قابلیت به سیستم اضافه خواهد شد و پس از واریز ریالی به صورت اتوماتیک واریزی شما به تتر تبدیل خواهد شد و می توانید در ولت خود نگه داری کنید
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                       </div>
                                      </div>
                                     </div>
                                </div>                            
                        </div>
                        
                        <h4 style="margin-top:105px; font-weight:900">برداشت از حساب </h4>
                        <p>صاحب کارت ملی و صاحب کارت بانکی و نام و نام خانوادگی داخل سایت باید با هم تطابق داشته باشند. برای هر درخواست برداشت نسبت به مقدار برداشت کارمزد  و هزینه های انتقال کسر میگردد.</p>
                        <p style="clear:both">
                            *درخواست واریز شما از زمان تغییر وضعیت به آماده پرداخت بین 3 تا 4 روز کاری انجام می‌شود*
                        </p>
                        <div class="white-box">
                            <h4 style="margin-top:105px; margin-top:10px; font-size:20px; color:#3f477c; font-weight:900;">انتقال به کارت بانکی</h4>
                            <p style="color:red;">
                                طبق بند دال ماده 7 قوانین ضد پولشویی بانک مرکزی ، باهم  ملزم به احراز هویت کاربران در هنگام درخواست واریز به حساب بانکی می باشد. https://www.cbi.ir/simplelist/8114.aspx
                            </p>
                            <a data-toggle="modal" data-target="#cart" class="btn btn-success" style="color:white !important; margin-top:10px;" >درخواست انتقال به کارت</a>
                                <div class="modal fade show" id="cart" aria-modal="true" role="dialog">
                                    <div class="modal-dialog modal-danger">
                                      <div class="modal-content ">
                                        <div class="modal-header">
                                          <h4 class="modal-title">واریز به کارت</h4>
                                          <button type="button" class="close uncheckd" data-dismiss="modal" aria-label="Close">
                                            <span  aria-hidden="true">×</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12 alert alert-infp">
                                                        @if(Auth::user()->bankpic != NULL && Auth::user()->mellipic != NULL)
                                                            @if(Auth::user()->accept == 'yes')
                                                           تومان {{Auth::user()->amount}} مقدار قابل برداشت
                                                            <form action="{{ route('dashboard.customer.payment.varizrial') }}" method="post" style="display: inline-flex;">
                                                              @csrf 
                                                              <input type="hidden" name="coin" value="trx" > 
                                                              <input type="number" name="value" placeholder="مقدار برداشتی شما" style="padding:10px; text-align:right; margin: 10px 0px 16px 0px; height: 47px; border-radius: 7px; font-size: 16px;" class="form-control" required > 
                                                            </form> 
                                                            @else
                                                                <p style="alert alert-info">اطلاعات شما ارسال شده است و هم اکنون در حال بررسی توسط ادمین است . درصورت داشتن ابهام یا پرسش به پشتیبانی پیام دهید</p>
                                                            @endif
                                                        @else
                                                            <p style="color:red;">
                                                                طبق بند دال ماده 7 قوانین ضد پولشویی بانک مرکزی ، باهم  ملزم به احراز هویت کاربران در هنگام درخواست واریز به حساب بانکی می باشد. https://www.cbi.ir/simplelist/8114.aspx
                                                            </p>
                                                            <p style="alert alert-info">شما اول باید اطلاعات حساب خود را تکمیل کنید</p>
                                                            <div class="submit">
                                                                <a href="{{ route('dashboard.customer.verify') }}" >تکمیل اطلاعات حساب کاربری</a>
                                                            </div>
                                                        @endif
           
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                       </div>
                                      </div>
                                     </div>
                                </div> 
                            <a href="#" data-toggle="modal" data-target="#wallet" class="btn btn-primary" style="color:white !important; margin-top:10px;" >درخواست انتقال به ولت</a>
                                <div class="modal fade show" id="wallet" aria-modal="true" role="dialog">
                                    <div class="modal-dialog modal-danger">
                                      <div class="modal-content ">
                                        <div class="modal-header">
                                          <h4 class="modal-title">واریز به ولت</h4>
                                          <button type="button" class="close uncheckd" data-dismiss="modal" aria-label="Close">
                                            <span  aria-hidden="true">×</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12 alert alert-infp">
                                                        @if(Auth::user()->bankpic != NULL && Auth::user()->mellipic != NULL)
                                                            @if(Auth::user()->accept == 'yes')
                                                           تومان {{Auth::user()->amount}} مقدار قابل برداشت
                                                            <form action="{{ route('dashboard.customer.payment.varizwallet') }}" method="post" style="display: inline-flex;">
                                                              @csrf 
                                                              <input type="hidden" name="coin" value="trx" > 
                                                              <input type="number" name="value" placeholder="مقدار برداشتی شما" style="padding:10px; text-align:right; margin: 10px 0px 16px 0px; height: 47px; border-radius: 7px; font-size: 16px;" class="form-control" required > 
                                                            </form> 
                                                            @else
                                                                <p style="alert alert-info">اطلاعات شما ارسال شده است و هم اکنون در حال بررسی توسط ادمین است . درصورت داشتن ابهام یا پرسش به پشتیبانی پیام دهید</p>
                                                            @endif
                                                        @else
                                                            <p style="color:red;">
                                                                طبق بند دال ماده 7 قوانین ضد پولشویی بانک مرکزی ، باهم  ملزم به احراز هویت کاربران در هنگام درخواست واریز به حساب بانکی می باشد. https://www.cbi.ir/simplelist/8114.aspx
                                                            </p>
                                                            <p style="alert alert-info">شما اول باید اطلاعات حساب خود را تکمیل کنید</p>
                                                            <div class="submit">
                                                                <a href="{{ route('dashboard.customer.verify') }}" >تکمیل اطلاعات حساب کاربری</a>
                                                            </div>
                                                        @endif
           
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                       </div>
                                      </div>
                                     </div>
                                </div> 
                        </div>
                        <h4 style="margin-top:105px; font-weight:900">سوابق مالی</h4>
                        <p>آخرین سوابق مالی خود را اعم از واریز و برداشت را در اینجا مشاهده کنید </p>
                        
        <style>

            .table {
                background: rgb(255 255 255) !important;
                color: #2c2b2b;
                width: 100%;
                max-width: 1300px;
                border-radius: 7px;
                padding: 40px;
                overflow-x: auto;
            }
            .table thead {
                vertical-align: bottom;
                background: #6374ff;
                color: white;
                border-radius: 7px !important;
            }
            .table tfoot {
                vertical-align: bottom;
                background: #6374ff;
                color: white;
                border-radius: 7px !important;
            }
            
            table {
                border-collapse: collapse;
                margin: 50px 0px;
            }
            .table-hover tbody tr:hover {
                background-color: rgba(0,0,0,.075);
            }
            
            .table-striped tbody tr:nth-of-type(odd) {
                background-color: rgba(0,0,0,.05);
            }
            .table-bordered thead td, .table-bordered thead th {
            }
            .table thead th {
                vertical-align: bottom;
                border-bottom: 2px solid #dee2e6;
            }
            .table-bordered td, .table-bordered th {
            }
            .table td, .table th {
                padding: 0.75rem;
                vertical-align: top;
                text-align: center;
            }
            .add-button {
                background: #69c397;
                padding: 10px;
                border: none;
                border-radius: 3px;
                color: white;
                margin-top: 50px;
            }
                        
            .add-button:hover{
                background: #07b107;
            }
            .table tr td {
                color: #2c2b2b;
            }
            </style>
            <div class="grayBlueBg">
                
                            <table class="table  table-hover table table-striped table-condensed " style='color: white; overflow-x:auto; margin-right: auto; margin-left: auto;'>
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نوع سابقه</th>
                                    <th>تاریخ</th>
                                    <th>ارز</th>    
                                    <th>مقدار</th>
                                    <th>وضعیت</th>
                                </tr>
                                </thead>
                                    <tbody>
                                 @foreach($transaction as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>@if($item->type=='income')<p>واریز</p>@else<p>برداشت</p>@endif</td>
                                        <td>{{ Facades\Verta::instance($item->created_at)->format('Y/n/j')}}</td>
                                        <td>{{ $item->coin }}</td>
                                        <td>{{ $item->amount }}$</td>
                                        <td>@if($item->status=='deny')<p>رد شده</p>@else<p>تایید شده</p>@endif</td>
                                    </tr>
                                 @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr style="border-top:2px solid white;">
                                        <th>#</th>
                                        <th>نوع سابقه</th>
                                        <th>تاریخ</th>
                                        <th>ارز</th>    
                                        <th>مقدار</th>
                                        <th>وضعیت</th>
                                    </tr>
                                    </tfoot>
                            </table>
                        </div>
                    </div>
                </section> 
  <!-- jQuery -->

<!-- Bootstrap 4 -->
<script
    src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
        
@endsection
