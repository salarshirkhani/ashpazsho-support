@extends('layouts.front')
@section('content')
<link rel="stylesheet" href="{{asset('css/custom/main.css')}}">
<link rel="stylesheet" href="{{asset('css/custom/contact.css')}}">
<section class="single-banner" style="background-image: url({{asset('images/teams.png')}}) ;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="single-content" >
                    <h2>خدمات آنلاین ایران مد اس ال پی</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('/')}}">صفحه اصلی</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">خدمات آنلاین</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    .profile-avatar{
        text-align: center;display: block;margin-bottom: -30px;
    }
    .profile-content{
        background: #f3f3f3;border-radius: 10px;height:345px;
    }
    .profile-content h5{
       text-align: center; margin-top: 25px; 
    }
    .profile-content .name{
       font-family: yekan;font-weight: 900;font-size: 27px;color: #3737C8;text-align: center;
    }
    .profile-content p{
       text-align:justify;    padding: 0px 25px;
    }
    .profile-content .look{
       display: block;
       width: 160px;
       position: absolute;
       padding: 10px;
       margin-top: 25px;
       font-size: 16px;
       margin-left: auto;
       margin-right: auto;
       background: #0066FF;
       border-color: #0066FF;
       bottom: 20px;
       left: 115px;
    }
    body{
        background:#fff !important;
    }
    .contact-part{
       background:#fff !important;  
    }

    .contact-info:hover{
        background:#e7e7e7;
        transition: all 500ms;
    }
</style>

        <div class="container">
            <div class="row" style="margin-top:50px;">
                <div class="col-lg-4">
                    <a href="{{route('problem')}}" class="contact-info" style="height: 225px; width:100%;">
                        <i class="fas fa-hospital-user"></i>
                        <h3>بررسی مشکل بیمار شما</h3>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="{{route('procedure')}}" class="contact-info" style="height: 225px; width:100%;">
                        <i class="fas fa-user-md"></i>
                        <h3>ارزیابی آنلاین</h3>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="{{route('find')}}" class="contact-info"  style="height: 225px; width:100%;">
                        <i class="fas fa-diagnoses"></i>
                        <h3>بیماری ات را بشناس</h3>
                    </a>
                </div>
            </div>        
        </div>



<section class="contact-part">
    <div class="container-fuild">
        <div class="row">
            <div class="col-lg-12">
                
            </div>
        </div>
</section>
@endsection