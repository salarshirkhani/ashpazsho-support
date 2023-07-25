@extends('layouts.front')
@section('content')
<link rel="stylesheet" href="{{asset('css/custom/main.css')}}">
<style>
    .single-banner {
    background: url(../../images/bg/01.jpg);
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    padding: 100px 0px;

    
}

.single-banner::before {
    position: absolute;
    content: "";
    top: 0px;
    right: 0px;
    width: 100%;
    height: 100%;
    background: -webkit-gradient(linear, right top, right bottom, from(rgba(4,53,138,0.65)), to(rgba(5,44,112,0.65)));
    background: linear-gradient(rgba(4,53,138,0.65), rgba(5,44,112,0.65));
    z-index: -1
}

.single-content {
    text-align: center
}

.single-content h2 {
    color: var(--white);
    text-transform: uppercase;
    margin-bottom: 13px
}

.single-content .breadcrumb {
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center
}

@media (max-width: 767px) {
    .single-banner {
        padding:70px 0px
    }
}

</style>
<section class="single-banner" style="background-image: url({{asset('images/teams.png')}}) ; padding: 160px 0px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="single-content" >
                    <h2>جست و جوی بیماری</h2>
                    <form action="{{route('search')}}" class="header-search" style="margin: 0px 0px;margin-top: 71px;">
                        <div class="header-main-search">

                            @csrf
                            <input type="text" name="q" class="form-control" placeholder="بیماری مد نظرتو بنویس..."  >
                            <button type="submit" class="header-search-btn">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="intro-part" style=" padding-bottom: 100px; padding-top: 30px; background:url(images/steps.svg) no-repeat center; background-size:cover; margin-top:0px;">
    <div class="container">
        <div class="row">
        <div class="col-md-12">
            <div class="section-center-heading" style="text-align: justify;">
                <h2 style="color: #3737c8; font-family: kalamehblack; font-size:45px;"> دیگر بیماری ها</h2>
            </div>                    
        </div>
         @foreach($posts->take(5) as $item) 
            <div class="col-sm-10 col-md-4 col-lg-4">
                <div class="blog-card">
                    <div class="blog-img">
                        <img src="{{ asset('images/'.$item['pic'].'/'.$item['pic'] ) }}" style="height: 200px;" alt="{{$item->title}}">
                    </div>
                    <div class="blog-content">
                        <a href="{{route('single',['id'=>$item->id])}}" class="blog-avatar">
                       @if($item->writer == 'مهرداد خلیلی')
                            <img src="{{asset('images/khalili.jpeg')}}" alt="author">
                         @endif
                         
                         @if($item->writer == 'نرگس خاکباز')
                            <img src="{{asset('images/khakbaz.jpeg')}}" alt="author">
                         @endif
                         
                         @if($item->writer == 'شیما حسین آبادی')
                            <img src="{{asset('images/hoseinabadi.jpeg')}}" alt="author">
                         @endif
                         
                         @if($item->writer == 'سیما اعتباری')
                            <img src="{{asset('images/etebari.jpeg')}}" alt="author">
                         @endif
                         @if($item->writer == 'موید سلمانی')
                            <img src="{{asset('images/avatar/01.jpg')}}" alt="author">
                         @endif                                </a>
                        <ul class="blog-meta">
                            <li>
                                <i class="fas fa-user"></i>
                                <p>
                                    <a href="{{route('single',['id'=>$item->slug])}}">{{$item->writer}}</a>
                                </p>
                            </li>
                            <li>
                                <i class="fas fa-clock"></i>
                                <p>{!! Facades\Verta::instance($item->created_at)->formatDate() !!}</p>
                            </li>
                        </ul>
                        <div class="blog-text">
                            <h4>
                                <a href="{{route('single',['id'=>$item->slug])}}">{{$item->title}}</a>
                            </h4>
                            {!! \Illuminate\Support\Str::limit($item->explain, 120, ' ...') !!}    
                       </div>
                        <a href="{{route('single',['id'=>$item->slug])}}" class="blog-read">
                            <span>ادامه مطلب</span>
                            <i class="fas fa-long-arrow-alt-right"></i>
                        </a>
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
               با جستجوی عنوان مشکل و بیماری‌تان، به مقالات و ویدیو‌های آموزشی متخصصین ما دسترسی پیدا خواهید کرد. 
            </div>
        </div>
</section>
@endsection