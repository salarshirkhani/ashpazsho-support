@extends('layouts.panel')
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.customer.index" />
@endsection
@section('panel')
                      <section class="main-bar col-xl-9 col-12" style="padding: 0% 4%;">
                        <!-- dashbord site ba-hm -->
                        <div class="section-dsh row main-bar disflex col-xl-12 col-12" >
                            <div class="col-xl-8 col-5" >
                                <h1>اطلاعات هویتی</h1>
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
                                            <a href="{{ route('dashboard.customer.profile') }}">اطلاعات هویتی</a>
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
                        <div class="row main-bar col-xl-12 col-12">
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
                            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>

                          @if($activate != 'yes') 
                            <form style="padding:15px;" action="{{ route('dashboard.customer.profile.edit') }}" method="post" role="form" class="form-horizontal" autocomplete="off" enctype="multipart/form-data">
                          @else
                            <form style="padding:15px;" action="{{ route('dashboard.customer.profile.pass') }}" method="post" role="form" class="form-horizontal" autocomplete="off" enctype="multipart/form-data">
                          @endif
                                @if($activate != 'yes')       
                                    <h4 style="margin-top:45px; font-weight:900">اطلاعات بانکی</h4>
                                    <p>لطفا حداقل یک کارت بانکی خود را وارد نمایید. این کارت حتما باید به نام خود شما باشد. امکان واریز وجه از طریق درگاه بانکی صرفا از مبدا کارت‌هایی که تایید شده‌ باشند وجود خواهد داشت</p>
                                    <label for="cartnumber">شماره کارت</label> 
                                    <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control" required autocomplete="off" name="cartnumber" value="{{Auth::user()->cartnumber}}"  placeholder="شماره کارت خود را به صورت دقیق وارد کنید">  
                                    <label for="shaba">شماره شبا</label> 
                                    <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control" required autocomplete="off" name="shaba" value="{{Auth::user()->shaba}}"  placeholder="شماره شبا خود را به صورت دقیق وارد کنید">  
                                    <label for="bankpic"> عکس کارت بانکی</label>
                                    <input type="file" style="margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; width: 100%; font-size: 16px;" required class="dropzone"  name="bankpic" >
                                    <h4 style="margin-top:45px; font-weight:900">اطلاعات هویتی</h4>
                                    <p>لطفا کد ملی و عکس سلفی خود را در این بخش بارگذاری فرمایید . طبیعی است که اطلاعات هویتی شما باید با اطلاعات بانکی شما سازگاری داشته باشد</p>
                              @isset(Auth::user()->melli)
                                    <p style="margin:20px 0px; color:orange">کد ملی نوشته شده توسط شما {{Auth::user()->melli}} می باشد در صورت تمایل به تغییر لطفا با ما تماس بگیرید</p>
                                    <input type="hidden" name="melli" value="{{Auth::user()->melli}}" >      
                                    @else
                                    <label for="melli">کد ملی</label> 
                              @endisset
                                  <input type="hidden" name="id" value="{{Auth::user()->id}}">
                                    <label for="pic"> عکس سلفی</label>
                                    <input type="file" style="margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; width: 100%; font-size: 16px;" class="dropzone" required name="pic" >
                                    <label for="mellipic"> عکس کارت ملی</label>
                                    <input type="file" style="margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; width: 100%; font-size: 16px;" class="dropzone" required name="mellipic" >
                                    <div><label formcontrolname="policy" tabindex="5" class="ant-checkbox-wrapper flex items-center select-none text-basic-200 text-medium "><span class="ant-checkbox"><input type="checkbox" name="acceptrules" required class="ant-checkbox-input"><span class="ant-checkbox-inner"></span></span><span> با قوانین و ضوابط باهم موافقم. </span></label><a href="https://bhmwallet.com/rules/" target="_blank" rel="noopener noreferrer" class="text-small text-primary ng-tns-c120-14"> (مشاهده قوانین) </a></div>
                                  <div style="margin-top:50px;"></div>
                              @else
                              <p class="alert alert-info">شما قبلا احراز هویت انجام داده اید جهت تغییر اطلاعات خود با پشتیبانی تماس بگیرید</p>
                              <h4 style="margin-top:45px; font-weight:900">اطلاعات بانکی</h4>
                              <label for="cartnumber">شماره کارت</label> 
                              <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control" readonly autocomplete="off" name="cartnumber" value="{{ Auth::user()->cartnumber}}"  placeholder="شماره کارت خود را به صورت دقیق وارد کنید">  
                              <label for="shaba">شماره شبا</label> 
                              <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control" readonly autocomplete="off" name="shaba" value="{{ Auth::user()->shaba}}"  placeholder="شماره شبا خود را به صورت دقیق وارد کنید">  
                              <label for="bankpic"> عکس کارت بانکی</label>
                              <img style="width:300px; height:200px;" src="{{ asset('pics/'.Auth::user()->bankpic.'/'.Auth::user()->bankpic ) }}">
                              <h4 style="margin-top:45px; font-weight:900">اطلاعات هویتی</h4>
                              <p style="margin:20px 0px; color:orange">کد ملی نوشته شده توسط شما {{Auth::user()->melli}} می باشد در صورت تمایل به تغییر لطفا با ما تماس بگیرید</p>
                              <input type="hidden" name="id" value="{{Auth::user()->id}}">
                              <label for="pic"> عکس سلفی</label>
                              <img style="width:200px; height:200px;" src="{{ asset('pics/'.Auth::user()->profile.'/'.Auth::user()->profile ) }}">
                              <label for="mellipic"> عکس کارت ملی</label>
                              <img style="width:300px; height:200px;" src="{{ asset('pics/'.Auth::user()->mellipic.'/'.Auth::user()->mellipic ) }}">
                              <div style="margin-top:50px;"></div>
                              @endif
                                    <script type="text/javascript">
                                            Dropzone.options.dropzone =
                                            {
                                                maxFilesize: 12,
                                                renameFile: function(pic) {
                                                    var dt = new Date();
                                                    var time = dt.getTime();
                                                    return time+pic.name;
                                                },
                                                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                                                addRemoveLinks: true,
                                                timeout: 500000,
                                                success: function(pic, response)
                                                {
                                                    console.log(response);
                                                },
                                                error: function(pic, response)
                                                {
                                                    return 1;
                                                }
                                            };
                                            Dropzone.options.dropzone =
                                            {
                                                maxFilesize: 12,
                                                renameFile: function(mellipic) {
                                                    var dt = new Date();
                                                    var time = dt.getTime();
                                                    return time+mellipic.name;
                                                },
                                                acceptedFiles: ".jpeg,.jpg,.png",
                                                addRemoveLinks: true,
                                                timeout: 500000,
                                                success: function(mellipic, response)
                                                {
                                                    console.log(response);
                                                },
                                                error: function(mellipic, response)
                                                {
                                                    return 1;
                                                }
                                            };
                                            Dropzone.options.dropzone =
                                            {
                                                maxFilesize: 12,
                                                renameFile: function(bankpic) {
                                                    var dt = new Date();
                                                    var time = dt.getTime();
                                                    return time+bankpic.name;
                                                },
                                                acceptedFiles: ".jpeg,.jpg,.png",
                                                addRemoveLinks: true,
                                                timeout: 500000,
                                                success: function(bankpic, response)
                                                {
                                                    console.log(response);
                                                },
                                                error: function(bankpic, response)
                                                {
                                                    return 1;
                                                }
                                            };
                                    </script>
                                     {{ csrf_field() }}
                             
                                        <button type="submit" style=" margin: 20px 0px; height: 42px;width: 100%;font-size: 20px; background: #6cc296;"  class="checkout-button">ارسال</button>
                         
                                    </form>
                         </div>
                    </section> 
        
@endsection
