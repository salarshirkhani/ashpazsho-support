@extends('layouts.front')
@section('content')
<link rel="stylesheet" href="{{asset('css/vendor/jquery-ui.min.css')}}">
<link rel="stylesheet" href="{{asset('css/custom/main.css')}}">
<link rel="stylesheet" href="{{asset('css/custom/blog-list.css')}}">
<section class="single-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="single-content">
                    <h2> مقالات</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/">صفحه اصلی</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"> مقالات</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="blog-part">
    <div class="container">
        <div class="row content-reverse">
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="blog-sidebar">
                            <div class="blog-sidebar-title">
                                <h5>جستجو </h5>
                            </div>
                            <form action="{{route('search')}}" class="blog-src">
                                <input type="text" name="q" placeholder="جستجو...">
                                <button type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 m-auto">
                        <div class="blog-sidebar">
                            <div class="blog-sidebar-title">
                                <h5>پست های محبوب</h5>
                            </div>
                            <ul class="blog-suggest">
                               @foreach($posts->where('category','!=','6') as $item)  
                                <li>
                                    <div class="suggest-img">
                                        <a href="{{route('single',['id'=>$item->slug])}}">
                                            <img src="{{ asset('images/'.$item['pic'].'/'.$item['pic'] ) }}" alt="{{$item->title}}">
                                        </a>
                                    </div>
                                    <div class="suggest-content">
                                        <div class="suggest-title">
                                            <h4>
                                                <a href="{{route('single',['id'=>$item->slug])}}">{{$item->title}}</a>
                                            </h4>
                                        </div>
                                        <div class="suggest-meta">
                                            <div class="suggest-date">
                                                <i class="far fa-calendar-alt"></i>
                                                <p>{!! Facades\Verta::instance($item->created_at)->formatDate() !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach       
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 m-auto">
                        <div class="blog-sidebar">
                            <div class="blog-sidebar-title">
                                <h5>دنبال کردن ما </h5>
                            </div>
                            <ul class="blog-icon">
                                <li>
                                    <a href="#">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://instagram.com/moayed_salmani_slp">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    @foreach($posts->where('category','!=','6') as $item) 
                    <div class="col-sm-10 col-md-6 col-lg-6">
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
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="pagination">
                            {{$posts->onEachSide(1)->links()}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection