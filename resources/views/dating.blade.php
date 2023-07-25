@extends('layouts.front')
@section('content')
<link rel="stylesheet" href="{{asset('css/custom/main.css')}}">
<link rel="stylesheet" href="{{asset('css/custom/contact.css')}}">
<section class="single-banner" style="background-image: url({{asset('images/teams.png')}}) ;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="single-content" >
                    <h2>صفحه نوبت دهی ایران مد اس ال پی</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('/')}}">صفحه اصلی</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">نوبت دهی</li>
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
</style>
        <section class="intro-part" id="about" style="background:url(images/why-back.svg) no-repeat center; background-size:cover; color=black; padding: 70px 0px 95px;margin-top: 0px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-center-heading" style="text-align: justify;font-family: kalamehblack;">
                            <h2 style="color: #3737C8;">درباره سیستم نوبت دهی ایران مد اس ال پی</h2>
                            <p style="color:#767676; font-family: iransans;">
                                به سایت توانبخشی بلع و گفتار Iran-Med-Slp خوش آمدید. در ابتدا لازم است که اشاره کنیم بهترین راه دسترسی به ما برقراری تماس تلفنی است. کمی پایین‌تر شماره ها و آدرس ما درج شده است. شما می‌توانید با برقراری تماسی کوتاه اطلاعات خوبی در مورد فرایند پذیرش، ارزیابی و درمان بیمارتان کسب کنید.
با کلیک بر آیکون مسیرهای دسترسی تماس تلفنی، مراجعه حضوری، ارتباط الکترونیک با ما در تماس باشید.

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container">
            <div class="row" style="margin-top:50px;">
                <div class="col-lg-4">
                    <div class="contact-info" style="height: 356px;">
                        <i class="fas fa-map-marker-alt"></i>
                        <h3>پیدا کردن</h3>
                        <p>
     <span>تهران</span>                        اتوبان همت غرب، نرسیده به خروجی دهکده المپیک، روبروی بوستان جوانمردان، بیمارستان نیکان غرب، طبقه دوم، واحد گفتاردرمانی, 
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-info" style="height: 356px;">
                        <i class="fas fa-phone-alt"></i>
                        <h3>در تماس باشید</h3>
                        <p>
                            02147564260 <span>09912508325</span>
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-info"  style="height: 356px;">
                        <i class="fas fa-envelope"></i>
                        <h3>ارسال ایمیل</h3>
                        <p>
                            iranmedslp@gmail.com
                        </p>
                    </div>
                </div>
            </div>        
        </div>
        <section class="section feature-part" style=" padding-bottom: 100px; padding-top: 70px; background:url({{asset('images/wave.svg')}}) no-repeat center; background-size:cover;">
            <div class="container">
                <div class="row">
                   @foreach($posts as $item) 
                    <div class="col-lg-4 col-sm-12">
                        <div style="width:100%; margin-top:30px;">
                            <a href="{{route('profile',['id'=>$item->id])}}" class="blog-avatar profile-avatar" >
                                <img src="{{ asset('images/'.$item['pic'].'/'.$item['pic'] ) }}" style="width: 145px; height:145px;" alt="author">
                            </a>
                            <div class="profile-content">
                                <div class="product-title">
                                    <h5>
                                        <a href="{{route('profile',['id'=>$item->id])}}"  class="name">{{$item->first_name}} {{$item->last_name}}</a>
                                    </h5>
                                    <p>
                                        {{$item->about}}
                                    </p>
                                    <a href="{{route('doctor',['id'=>$item->id])}}" class="btn btn-inline hover-slide-right look">
                                        <i class="fas fa-file"></i>
                                        <span>انتخاب نوبت</span>
                                    </a> 
                                </div>
                            </div>
                        </div>
                    </div>
                   @endforeach 
                </div>
            </div>
        </section>


<section class="contact-part">
    <div class="container-fuild">
        <div class="row">
            <div class="col-lg-12">
                
            </div>
        </div>
</section>
@endsection