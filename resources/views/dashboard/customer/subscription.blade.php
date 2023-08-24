@extends('layouts.panel')
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.customer.index" />
@endsection
@section('panel') 
<style>
    .subplan a {
        background: #5865af;
        box-shadow:none;
        border-radius: 0px 0px 7px 7px;
    }
    .subplan h2 {
        text-align: center;
        background: #6ac397;
        border-top-right-radius: 7px;
        border-top-left-radius: 7px;
    }
</style>
<link rel="stylesheet" href="{{ asset('panel/css/modal.css') }}" >
 <section class="main-bar col-xl-9 col-12" style="padding: 0% 4%;">
                        <!-- dashbord site ba-hm -->
                        <div class="section-dsh row main-bar disflex col-xl-12 col-12" >
                            <div class="col-xl-8 col-8" >
                                <h1>انتخاب پلن</h1>
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
                            @if($access=='no')
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="alert alert-warning">شما پلن خود را انتخاب کرده اید و طبق قوانین تا یک ماه نمیتوانید پلن خودر را تغییر دهید . جهت اطلاعات بیشتر با پشتیبانی تماس بگیرید</p>
                                </div>
                            </div>
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
                            <div class="row" id="subscriptions">
                              @if($activate != 'yes')
                              <style>
                                .section-dsh-2,.Diagram,.Banner,.col-md-4{
                                  filter:blur(8px);
                                }  
                              </style>
                              <p class="alert alert-info"> <span style="float:right; margin-top: 5px;">حساب کاربری خود را فعال کنید </span><a href="{{ route('dashboard.customer.profile') }}" class="btn btn-primary" style="color:white !important; float: left;">فعالسازی حساب</a></p>
                              @endif         
                              @isset($subscribe)
                                @php $plan=$subscribe['subscribe_id'] @endphp
                              @endisset
                              @foreach ($posts as $item)  
                                <div class="col-md-4 col-xs-12" style="margin-top:20px;">
                                  @if(isset($plan) && $plan == $item->id)
                                  <div class="subplan" style="background:#6bc2974f;">
                                    <h2>پلن فعال</h2>
                                    {!!$item->description!!}
                                    @if($activate != 'yes')
                                    <a href="#"><svg width="20" height="10" viewBox="0 0 20 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M18.5112 1.5L15.478 4.5852C13.059 7.04558 11.8495 8.27577 10.3753 8.46519C10.0141 8.5116 9.64862 8.5116 9.28743 8.46519C7.81326 8.27577 6.60377 7.04558 4.18479 4.5852L1.15151 1.5" stroke="white" stroke-width="1.5" stroke-linecap="round"></path>
                                      </svg>حساب شما فعال نیست
                                    </a>
                                    @else
                                    <a class="toastrDefaultWarning" href="#"><svg width="20" height="10" viewBox="0 0 20 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M18.5112 1.5L15.478 4.5852C13.059 7.04558 11.8495 8.27577 10.3753 8.46519C10.0141 8.5116 9.64862 8.5116 9.28743 8.46519C7.81326 8.27577 6.60377 7.04558 4.18479 4.5852L1.15151 1.5" stroke="white" stroke-width="1.5" stroke-linecap="round"></path>
                                      </svg>انتخاب شده 
                                    </a>
                                    @endif
                                  </div>
                                  @else
                                  <div class="subplan">
                                    <h2>{{$item->name}}</h2>
                                    {!!$item->description!!}
                                    @if($activate != 'yes')
                                    <a href="#"><svg width="20" height="10" viewBox="0 0 20 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M18.5112 1.5L15.478 4.5852C13.059 7.04558 11.8495 8.27577 10.3753 8.46519C10.0141 8.5116 9.64862 8.5116 9.28743 8.46519C7.81326 8.27577 6.60377 7.04558 4.18479 4.5852L1.15151 1.5" stroke="white" stroke-width="1.5" stroke-linecap="round"></path>
                                      </svg>حساب شما فعال نیست
                                    </a>
                                    @else
                                    @if($access=='no')
                                    <a href="#" class="toastrDefaultWarning" data-toggle="modal" data-target="#modal-success{{$item->id}}"><svg width="20" height="10" viewBox="0 0 20 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M18.5112 1.5L15.478 4.5852C13.059 7.04558 11.8495 8.27577 10.3753 8.46519C10.0141 8.5116 9.64862 8.5116 9.28743 8.46519C7.81326 8.27577 6.60377 7.04558 4.18479 4.5852L1.15151 1.5" stroke="white" stroke-width="1.5" stroke-linecap="round"></path>
                                      </svg>انتخاب پلن
                                    </a>
                                    @else
                                    <a href="#" data-toggle="modal" data-target="#modal-success{{$item->id}}"><svg width="20" height="10" viewBox="0 0 20 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M18.5112 1.5L15.478 4.5852C13.059 7.04558 11.8495 8.27577 10.3753 8.46519C10.0141 8.5116 9.64862 8.5116 9.28743 8.46519C7.81326 8.27577 6.60377 7.04558 4.18479 4.5852L1.15151 1.5" stroke="white" stroke-width="1.5" stroke-linecap="round"></path>
                                      </svg>انتخاب پلن
                                    </a>
                                    <div class="modal fade show" id="modal-success{{$item->id}}" aria-modal="true" role="dialog">
                                    <div class="modal-dialog modal-danger">
                                      <div class="modal-content ">
                                        <div class="modal-header">
                                          <h4 class="modal-title">{{$item->name}}</h4>
                                          <button type="button" class="close uncheckd" data-dismiss="modal" aria-label="Close">
                                            <span  aria-hidden="true">×</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12 alert alert-warning">
                                                      آیا مایل به انتخاب این پنل هستید ؟ توجه داشته باشید پس از انتخاب پنل معاملاتی خود ، تا 30 روز قادر به تغییر این پنل نیستید
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                              <button type="submit" class="btn btn-success btn-lg toastrDefaultInfo" onclick="document.getElementById('addsubs{{$item->id}}').submit();">انتخاب پلن {{$item->name}}</button>
                                        </div>
                                      </div>
                                     </div>
                                     </div>
                                     @endif
                                    @endif
                                  </div>
                                  @endif
                                  <form id="addsubs{{$item->id}}" action="{{ route('dashboard.customer.subs') }}" method="post" style="display: inline-flex;">
                                  @csrf 
                                  <input type="hidden" name="subscribe_id" value="{{$item->id}}" > 
                                  <input type="hidden" name="persent" value="{{$item->persent}}" > 
                                </form>
                                </div>

                              @endforeach  
                            
                                  
                                
                             
                               </div>
                            
   
                         </div>
                    </section> 
<!-- Bootstrap 4 -->
<script
    src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>

@endsection
