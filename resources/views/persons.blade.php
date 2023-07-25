@extends('layouts.front')
@section('content')
<link rel="stylesheet" href="{{asset('css/custom/main.css')}}">
<link rel="stylesheet" href="{{asset('css/custom/contact.css')}}">
<section class="single-banner" style="background-image: url({{asset('images/teams.png')}}) ;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="single-content" >
                    <h2>با تیم قوی ایران مد اس ال پی آشنا شوید</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('/')}}">صفحه اصلی</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">تیم ما</li>
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
        <section class="section feature-part" style=" padding-bottom: 100px; padding-top: 70px; background:url(images/wave.svg) no-repeat center; background-size:cover;">
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
                                    <a href="{{route('profile',['id'=>$item->id])}}" class="btn btn-inline hover-slide-right look">
                                        <i class="fas fa-file"></i>
                                        <span>مشاهده</span>
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