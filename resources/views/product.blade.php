@extends('layouts.front')
@section('content')
<link rel="stylesheet" href="{{asset('css/vendor/jquery-ui.min.css')}}">
<link rel="stylesheet" href="{{asset('css/custom/main.css')}}">
<link rel="stylesheet" href="{{asset('css/custom/rightbar-details.css')}}">
<section class="single-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="single-content">
                    <h2>{{$item->name}}</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">صفحه اصلی</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="rightbar-list.html">محصولات</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{$item->name}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="ad-details-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="ad-details-card">
                    <div class="ad-details-breadcrumb">
                        <ol class="breadcrumb">
                            <li>
                                <span class="flat-badge sale">{{$category->name}}</span>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">محصولات </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">خانه </li>
                        </ol>
                    </div>
                    <div class="ad-details-heading">
                        <h2>
                            <a href="{{route('product',['name'=>$item->name])}}">{{$item->name}}</a>
                        </h2>
                    </div>
                    <div class="ad-details-slider slider-arrow">
                        <div>
                            <img src="{{ asset('images/'.$item['pic'].'/'.$item['pic'] ) }}" alt="{{$item->name}}">
                        </div>
                    </div>

                    <div class="ad-details-action">
                        <ul>
                            <li>
                                <button type="button">
                                    <i class="fas fa-share-alt"></i>
                                    <span>اشتراک </span>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="ad-details-card">
                    <div class="ad-details-title">
                        <h5>مشخصات </h5>
                    </div>
                    <div class="ad-details-specific">
                        <ul>
                            <li>
                                <h6>قیمت: </h6>
                                <p>{{$item->price}} تومان</p>
                            </li>
                            <li>
                                <h6>منتشر شده:</h6>
                                <p>{!! Facades\Verta::instance($item->created_at)->formatDate() !!}</p>
                            </li>
                            <li>
                                <h6>ارائه دهنده: </h6>
                                <p>iranmed-slp</p>
                            </li>
                            <li>
                                <h6>دسته بندی:</h6>
                                <p>{{$category->name}}</p>
                            </li>
                            <li>
                                <h6>وضعیت:</h6>
                                <p>استفاده شده</p>
                            </li>
                            <li>
                                <h6>نوع محصول:</h6>
                                <p>ویژه</p>
                            </li>
                        </ul>  
                    </div>
                </div>
                <div class="ad-details-card">
                    <div class="ad-details-title">
                        <h5>توضیحات </h5>
                    </div>
                    <div class="ad-details-descrip">
                        {!!$item->explain!!}
                        {!!$item->content!!}
                    </div>
                </div>
                <!-- YOU CAN ADD ANOTHER BOX HERE -->
            </div>
            <div class="col-lg-4">
                <div class="ad-details-price">
                    <h5>{{$item->price}} تومان</h5>
                    <i class="fas fa-wallet"></i>
                </div>
                <button class="ad-details-number">
                    <i class="fas fa-cart-arrow-down"></i>
                    <span>خرید محصول</span>
                </button>
                <div class="ad-details-card">
                    <div class="ad-details-title">
                        <h5>ساعات کاری</h5>
                    </div>
                    <div class="ad-details-opening">
                        <ul>
                            <li>
                                <h6>شنبه </h6>
                                <p>09:00 صبح  - 05:00 بعد ظهر</p>
                            </li>
                            <li>
                                <h6>یکشنبه </h6>
                                <p>09:00 صبح  - 05:00 بعد ظهر</p>
                            </li>
                            <li>
                                <h6>دوشنبه </h6>
                                <p>09:00 صبح  - 05:00 بعد ظهر</p>
                            </li>
                            <li>
                                <h6>سه شنبه </h6>
                                <p>09:00 صبح  - 05:00 بعد ظهر</p>
                            </li>
                            <li>
                                <h6>چهارشنبه </h6>
                                <p>09:00 صبح  - 05:00 بعد ظهر</p>
                            </li>
                            <li>
                                <h6>پنجشنبه </h6>
                                <p>09:00 صبح  - 05:00 بعد ظهر</p>
                            </li>
                            <li>
                                <h6>جمعه </h6>
                                <p>بسته</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="{{asset('js/vendor/jquery-ui.min.js')}}"></script>
<script src="{{asset('js/custom/price-range.js')}}"></script>
<script src="{{asset('js/vendor/slick.min.js')}}"></script>
<script src="{{asset('js/custom/slick.js')}}"></script>
@endsection