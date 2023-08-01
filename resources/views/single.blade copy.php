@extends('layouts.front')
@section('content')
<style>

   .blog-details-content p img{
       
       display:block;
       margin-left:auto !important;
       margin-right:auto !important;
       
   }
</style>
<?php $id=$item->id; ?>
<link rel="stylesheet" href="{{asset('css/custom/blog-details.css')}}">
<section class="single-banner" style="background-image: url('{{ asset('images/'.$item['pic'].'/'.$item['pic'] ) }}') ;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="single-content">
                    <h2>{{$item->title}}</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('/')}}">صفحه اصلی</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('blog')}}">وبلاگ  </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{$item->title}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="blog-details-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <div class="blog-details-title">
                    <h2>
                        <a href="{{route('single',['id'=>$item->slug])}}">{{$item->title}}</a>
                    </h2>
                </div>
                @if(Session::has('info'))
                <div class="row">
                    <div class="col-md-12">
                        <p class="alert alert-info">{{ Session::get('info') }}</p>
                    </div>
                </div>
                @endif
                <ul class="blog-details-meta">
                    <li>
                        <a href="#">
                            <i class="far fa-user"></i>
                            <p>{{$item->writer}}</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('single',['id'=>$item->slug])}}">
                            <i class="far fa-calendar-alt"></i>
                            <p>{!! Facades\Verta::instance($item->created_at)->formatDate() !!}</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('blog')}}">
                            <i class="far fa-folder-open"></i>
                            <p>گفتار درمانی</p>
                        </a>
                    </li>
                </ul>
                <div class="blog-details-image">
                    <img src="{{ asset('images/'.$item['pic'].'/'.$item['pic'] ) }}" alt="{{$item->title}}">
                </div>
                <div class="blog-details-content" style="text-align: justify;">
                    <div class="description">
                        {{$item->explain}}
                    </div>
                    <div class="sub-content">
                        @isset($item->iframe)
                        {!! $item->iframe !!}
                        @endisset
                        {!!$item->content!!}
                </div>
                <div class="blog-details-widget">
                   <ul class="tag-list">
                    <li>
                        <h4>برچسب ها:</h4>
                    </li>
                    @foreach($tags as $tag)
                        <li>
                            <a href="#">{{$tag->name}} </a>
                        </li>
                    @endforeach 
                    </ul> 
                    <ul class="share-list">
                        <li>
                            <h4>اشتراک:</h4>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=http://iranmedslp.com/single/{{$item->title}}">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://twitter.com/share?text={{$item->title}}&url=http://iranmedslp.com/single/{{$item->title}}">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://telegram.me/share/url?url=http://iranmedslp.com/single/{{$item->title}}">
                                <i class="fab fa-telegram"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://web.whatsapp.com/send?text=http://iranmedslp.com/single/{{$item->title}}">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="blog-details-author">
                    <div class="author-intro">
                        <a href="#">
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
                         @endif
                        </a>
                        <h4>
                            <a href="#">{{$item->writer}}</a>
                        </h4>
                        <p>
                            <a href="#">www.iranmedslp.com</a>
                        </p>
                    </div>
                    <div class="author-content">
                        <ul>
                            <li>
                                <a href="#">
                                    <i class="fab fa-telegram"></i>
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
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            </li>
                        </ul>
                        @if($item->writer == 'مهرداد خلیلی')
                       <p>
                           گ - ۲۸۰۶
کارشناسی ارشد گفتاردرمانی 
محل فعالیت: بیمارستان نیکان غرب و بیمارستان عرفان سعادت آباد
                         </p>
                        @endif
                        
                        @if($item->writer == 'نرگس خاکباز')
                        <p>گ-۲۰۰۵
                        کارشناس گفتاردرمانی و کارشناس ارشد مدیریت توانبخشی 
                        درمانگر تخصصی بلع 
                        محل فعالیت : بیمارستان عرفان سعادت آباد</p>
                        @endif
                        
                        @if($item->writer == 'شیما حسین آبادی')
                        <p>گ-۲۳۰۳
                        کارشناس ارشد گفتاردرمانی
                        درمانگر تخصصی بلع و گفتار 
                        محل فعالیت : بیمارستان نیکان غرب</p>
                        @endif
                        
                        @if($item->writer == 'سیما اعتباری')
                        <p>گ-۱۹۹۸
                        کارشناس گفتاردرمانی 
                        درمانگر تخصصی بلع، صوت و ارتباط 
                        محل فعالیت: بیمارستان های عرفان سعادت آباد و نیکان غرب ، مرکز جامع توانبخشی دریا</p>
                        @endif
                        @if($item->writer == 'موید سلمانی')
                         <p>موید سلمانی 
                        گ-۱۸۸۱
                        کارشناسی ارشد گفتاردرمانی 
                        سرپرست گروه iranmedslp
                        درمانگر بلع ، صوت و گفتار و ارتباط 
                        محل فعالیت: بیمارستان های عرفان سعادت آباد و نیکان غرب</p>
                        @endif
                        
                    </div>
                </div>
                <div class="row">
                    @foreach($related_posts as $item) 
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
                                 @endif                             
                                 </a>
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
                    <div class="blog-details-comment">
                        <div class="comment-title">
                            <h3>نظر  ({{$comments->count()}})</h3>
                        </div>
                        <ul class="comment-list">
                            @if($comments->count()==0)
                                 <p>هیچ دیدکاهی ثبت نشده است ! شما اولین نفری باشید که نظر خود را ثبت می کنید</p>
                            @endif
                            @foreach ($comments as $comment)
                            <li>
                                <div class="comment">
                                    <div class="comment-author">
                                        <a href="#">
                                            <img src="{{asset('images/profile.png')}}" alt="comment">
                                        </a>
                                    </div>
                                    <div class="comment-content">
                                        <h4>
                                            <a href="#">{{$comment->name}}</a>
                                            <span>{!! Facades\Verta::instance($comment->created_at)->formatDate() !!}</span>
                                        </h4>
                                        <p>{{$comment->description}}</p>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="blog-details-form">
                        <div class="form-title">
                            <h3>ارسال نظر</h3>
                        </div>
                        <form action="{{route('comment')}}" method="POST">
                            @csrf 
                            <input type="hidden" name="post_id" value ="{{$id}}" >
                            @if(Auth::check())
                              <input type="hidden" name="user_id" value="{{Auth::user()->id}}"> 
                            @endif
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        @if(Auth::check())
                                        <input type="text" class="form-control" value="{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}" name="name" placeholder="نام شما">
                                        @else
                                        <input type="text" class="form-control" name="name" placeholder="نام شما">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        @if(Auth::check())
                                        <input type="text" class="form-control" name="email" value="{{ Auth::user()->email }}" placeholder="ایمیل شما">
                                        @else
                                        <input type="email" class="form-control" name="email" placeholder="ایمیل شما">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="content" placeholder="ارسال نظر"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-btn">
                                        <button type="submit" class="btn btn-inline">
                                            <i class="fas fa-tint"></i>
                                            <span>نظر خود را ثبت کنید</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection