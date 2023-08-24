@extends('layouts.panel')
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.customer.index" />
@endsection
@section('panel') 
@if(Session::has('info'))
    <div class="row">
        <div class="col-md-12">
            <p class="alert alert-info">{{ Session::get('info') }}</p>
        </div>
    </div>
@endif
<section class="main-bar col-xl-9 col-12" style="padding: 0% 4%;">
    <!-- dashbord site ba-hm -->
    <div class="section-dsh row main-bar disflex col-xl-12 col-12" >
        <div class="col-xl-8 col-5" >
            <h1>ارسال تیکت</h1>
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


    <div class="grayBlueBg">
        <div class="container" style="margin-top:30px;"> 
            @if(Session::has('info'))
            <div class="row">
                <div class="col-md-12">
                    <p class="alert alert-info">{{ Session::get('info') }}</p>
                </div>
            </div>
            @endif
        </div>
        <div class="contactForm">
            <div class="title">ارسال تیکت پشتیبانی</div>
            <form class="myAccount" method="POST" action="{{ route('dashboard.customer.support') }}">
                @csrf
                    <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                    <input style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control" type="text" name="subject" placeholder="موضوع" requierd>
                    <select style="padding:10px; margin: 10px 0px 16px 0px; height: 46px; border-radius: 7px; font-size: 16px;"class="form-control" name="departmant" required>
                        <option value="sales">بازاریابی و فروش</option>
                        <option value="support">پشتیبانی فنی</option>
                        <option value="billing">مالی</option>
                    </select>
                    <textarea style="padding:10px; margin: 10px 0px 16px 0px; border-radius: 7px; font-size: 16px;"class="form-control" name="content" cols="30" rows="10" placeholder="متن درخواست شما" required></textarea>
                <div class="flex">
                <button class="btn btn-success btn-lg toastrDefaultInfo" type="submit">ارسال پیام</button>
                </div>
            </form>
        </div>
    </div>
</div>
</section> 
@endsection
