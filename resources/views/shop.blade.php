@extends('layouts.front')
@section('content')
<link rel="stylesheet" href="{{asset('css/vendor/jquery-ui.min.css')}}">
<link rel="stylesheet" href="{{asset('css/custom/main.css')}}">
<link rel="stylesheet" href="{{asset('css/custom/grid-list.css')}}">
<section class="single-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="single-content">
                    <h2>محصولات</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('/')}}">صفحه اصلی</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">محصولات</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="ad-list-part">
    <div class="container">
        <div class="row">
            @foreach($products as $item)            
            <div class="col-sm-6 col-md-4 col-lg-3 card-grid">
                <div class="product-card">
                    <div class="product-head">
                       <div class="product-img" style="background:url({{ asset('images/'.$item['pic'].'/'.$item['pic'] ) }}) no-repeat center; background-size:cover;">
                           <i class="cross-badge fas fa-bolt"></i>
                           <span class="flat-badge sale">ویژه </span>
                           <ul class="product-meta">
                               <li>
                                   <i class="fas fa-eye"></i>
                                   <p>264</p>
                               </li>
                               <li>
                                   <i class="fas fa-star"></i>
                                   <p>4.5/7</p>
                               </li>
                           </ul>
                       </div>
                   </div>
                   <div class="product-info">
                       <div class="product-tag">
                           <i class="fas fa-tags"></i>
                           <ol class="breadcrumb">
                               <li class="breadcrumb-item">
                                   <a href="#">محصولات </a>
                               </li>
                               <li class="breadcrumb-item active" aria-current="page">کتاب ها </li>
                           </ol>
                       </div>
                       <div class="product-title">
                           <h5>
                               <a href="{{route('product',['name'=>$item->slug])}}">{!! \Illuminate\Support\Str::limit($item->explain, 70, ' ...') !!}</a>
                           </h5>
                           <ul class="product-location">
                               <li>
                                   <i class="fas fa-clock"></i>
                                   <p>{!! Facades\Verta::instance($item->created_at)->formatDate() !!}</p>
                               </li>
                           </ul>
                       </div>
                       <div class="product-details">
                           <div class="product-price">
                               <h5>{{$item->price}} تومان</h5>
                           </div>

                       </div>
                   </div>
               </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-lg-12">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <i class="fas fa-long-arrow-alt-left"></i>
                        </a>
                        {{$products->links()}}
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection