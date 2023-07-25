@extends('layouts.front')
@section('content')
<link rel="stylesheet" href="{{asset('css/custom/main.css')}}">
<link rel="stylesheet" href="{{asset('css/custom/contact.css')}}">
<section class="single-banner" style="background-image: url({{asset('images/products.jpg')}}) ;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="single-content" >
                    <h2>راه های ارتباطی</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('/')}}">صفحه اصلی</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">تماس با ما</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="contact-part">
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
                        02129124213 <span>09912508325</span>
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

        <div class="row">
            <div class="col-lg-12">
                <div class="contact-map">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3237.752337656441!2d51.26734311521808!3d35.7568915801768!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f8de3419918c985%3A0x98a4415bee1d9062!2sWest%20Nikan%20Hospital!5e0!3m2!1sen!2snl!4v1652821574823!5m2!1sen!2snl" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>                </div>
            </div>
        </div>

    </div>
</section>
@endsection