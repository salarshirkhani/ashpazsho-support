@extends('layouts.front')
@section('content')
<style>
.slider{
      background-repeat: no-repeat;background-position: center;background-size: cover;
      width: 100%;
      border-radius: 20px;
      max-height: 400px;
}

.ad-details-feature {
    direction: ltr !important;
    margin-bottom: 0px;
    margin-top:52px;
    margin-right:20px !important;
    margin-left:20px !important;
}

.select-item{
 display:inline-flex; padding:10px; border-radius: 7px;box-shadow: 0px 0px 15px rgb(73 113 255 / 20%);background:#FBFBFB;transition: all 800ms ; width:100%;height:70px;margin-top:30px;
} 

.select-item:hover{
  background:rgb(73 113 255 / 32%); transition: all 800ms ; cursor:pointer;
}

.select-item h3{
    font-family: kalamehblack;
    font-size:30px;
}

.lef-arroe {
    height: 24%;
    width: 5%;
    margin-top: 14px;
    position: absolute;
    display: block;
    left: 13px;
}
.slick-list {
    width: 100%;
}   
.section-center-heading h2 {
    margin-bottom: 45px;
}

.feature-section{
    display:inline-flex; padding:10px;
}
.feature{
    background:#fff; border-radius:15px; box-shadow: 0px 0px 15px; padding:15px; margin: 0px 0px 0px 80px; width: 200px;
}
.feature img{
    width: 30%; display:block; margin-left:auto; margin-right:auto;
}
.feature h4{
    color: #3737c8;margin-top: 8px; text-align:center; font-size: 22px;
}
.single-banner {
    background: url(images/matn-back.jpeg);
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    padding: 100px 0px;
    margin-top:150px;
    position: relative;
    z-index: 1;
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
    z-index: -1;
}
@media screen and (max-width:769px){
.feature-section{
    display:block; padding:10px; margin-left:auto; margin-right:auto;
}
.feature {
    background: #fff;
    border-radius: 15px;
    box-shadow: 0px 0px 15px;
    padding: 15px;
    margin: 30px 75px 0px 0px;
    width: 200px;
}
.section-center-heading {
    text-align: justify;
}
.kiki span{
    right:85px !important;
}
}

@media screen and (max-width:309px){

.feature {

    margin: 30px 26px 0px 0px;
}
    
}


    
}
</style>
        <section class="slider ">
            <div class="container-fuild">
                <div class="col-md-12 col-lg-12">
                        <div class="ad-details-feature slider-arrow">
                           @foreach($slider as $slider) 
                            <div class="feature-card">
                                <div class="feature-img">
                                    <a href="{{$slider->url}}" >
                                        <img src="{{ asset('images/'.$slider['image'].'/'.$slider['image'] ) }}" alt="{{$slider->id}}" class="slider">
                                    </a>
                                </div>
                                <style>
                                    .feature-card::before {
                                        background:none ;
                                    }
                                </style>
                                @if($slider->title!=NULL)
                                <style>
                                    .feature-card::before {
                                        background:linear-gradient(rgba(0,0,0,0) 30%, rgba(0,0,0,0.9) 90%); !important;
                                    }
                                </style>
                                <div class="feature-content">
                                    <div class="feature-title">
                                        <h3>
                                            <a href="{{$slider->url}}">{{$slider->title}}</a>
                                        </h3>
                                    </div>
                                    <ul class="feature-meta">

                                    </ul>
                                </div>
                                @endif
                            </div>
                            @endforeach
                        </div>
                    </div>
        </div>
        </section>
        <section class="section feature-part" style="padding-top: 20px;">
          <div class="container" style=""> 
          <div class="row">
              <div class="col-lg-4 col-md-6 col-sm-12">
                  <a href="{{route('appointment')}}" class="select-item">
                      <img src="{{asset('images/clock.svg')}}" style="width: 20%;" alt="درخواست نوبت">
                      <h3 style="color: #3737c8;margin-top: 8px;margin-right: 9px;">درخواست نوبت</h3>
                      <img src="{{asset('images/arrow_left.png')}}" class="lef-arroe" alt="درخواست نوبت">
                  </a>
              </div>  
              <div class="col-lg-4 col-md-6 col-sm-12">
                  <a href="{{route('consultant')}}" class="select-item">
                      <img src="{{asset('images/chats.svg')}}" style="width: 20%;" alt="دثبت مشاوره رایگان">
                      <h3 style="color: #3737c8;margin-top: 8px;margin-right: 9px;">ثبت مشاوره رایگان</h3>
                      <img src="{{asset('images/arrow_left.png')}}" class="lef-arroe" alt="ثبت مشاوره رایگان">
                  </a>
              </div>  
              <div class="col-lg-4 col-md-6 col-sm-12">
                  <a href="{{route('services')}}" class="select-item">
                      <img src="{{asset('images/arzyabi.svg')}}" style="width: 20%;" alt="جست و جوی بیماری">
                      <h3 style="color: #3737c8;margin-top: 8px;margin-right: 9px;">خدمات آنلاین</h3>
                      <img src="{{asset('images/arrow_left.png')}}" class="lef-arroe" alt="جست و جوی بیماری">
                  </a>
              </div>  
          </div>
          </div>
        </section>
        
        
        <section class="section feature-part" style="margin-top: 100px; padding-bottom: 100px; padding-top: 40px; background:url(images/why-back.svg) no-repeat center; background-size:cover;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-center-heading">
                            <h2>
                                <span style="color: #3737c8; font-family: kalamehblack; font-size:50px; top:0px;">چرا ایران مد اس ال پی</span>
                            </h2>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                       <div class="feature-section">
                           <div class="feature">
                               <img src="{{asset('images/pasokh.svg')}}" style="width: 35%;" alt="پاسخ به درمان">
                               <h4> پاسخ به درمان </h4>
                               <p style="text-align:center; margin-top: 10px;"> موفقیت ما در درمان بیماران بالای 86% بوده است</p>
                           </div>
                           <div class="feature">
                               <img src="{{asset('images/experience.svg')}}" style="width: 36%;" alt="بیشترین تجربه">
                               <h4> بیشترین تجربه </h4>
                               <p style="text-align:center; margin-top: 10px;">همکاران ما در درمان بیش از 16 هزار بیمار دارای اختلال بلع مشارکت داشته اند</p>
                           </div>
                       </div> 
                       <div class="feature-section">
                           <div class="feature">
                               <img src="{{asset('images/methods.svg')}}" alt="جدیدترین متد">
                               <h4 style="">به روز بودن </h4>
                               <p style="text-align:center; margin-top: 10px;">ما با استفاده از جدیدترین روش‌های درمانی و پیشرفته‌ترین ابزار‌ها در خدمت شما خواهیم بود</p>
                           </div>
                           <div class="feature">
                               <img src="{{asset('images/dastresi.svg')}}" style="padding: 7px;" alt="دسترسی حداکثری">
                               <h4>دسترسی حداکثری</h4>
                               <p style="text-align:center; margin-top: 10px;">با شروع دریافت خدمات، امکان دسترسی حداکثری به درمانگر اختلال بلع  برایتان فراهم می‌شود.</p>
                           </div>
                       </div> 
                    </div>
                    <div class="col-md-6 col-sm-12">
                            <iframe style="width: 100%; height: 470px; border-radius: 15px; border: none;" src="https://www.aparat.com/video/video/embed/videohash/5P2SZ/vt/frame" title="معرفی گروه توانبخشی بلع و گفتار iranmedslp" allowFullScreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe>            
                    </div>
                    <div class="col-12">
                        <a href="{{route('about')}}" class="btn btn-inline" style="display: block;margin-right: auto;width: 255px;margin-left: auto;margin-top: 50px;font-size: 16px;">
                            <i class="fas fa-eye"></i>
                            <span>می خواهم بیشتر بدانم</span>
                        </a> 
                    </div>
                </div> 
            </div>
        </section>
        
        
        <section class="section feature-part">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-lg-5">
                        <div class="section-side-heading">
                            <h2 style="font-family: kalamehblack;">
                            با اعتماد به تیم Iran-Med-Slp, در کوتاه ترین زمان ممکن میتوانید <span> از غذا خوردنتان لذت ببرید.</span>
                            </h2>
                            <p>آخرین مطالب را در اینجا مشاهده خواهید کرد</p>
                            <a href="https://www.iranmedslp.com/category/articles" class="btn btn-inline">
                                <i class="fas fa-eye"></i>
                                <span>مشاهده همه مطلب ها</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-7">
                        <div class="feature-item-slider slider-arrow">
                            @foreach($posts->where('category','1')->slice(0,8) as $item) 
                            <div class="feature-card">
                                <div class="feature-img">
                                    <a href="#">
                                        <img src="{{ asset('images/'.$item['pic'].'/'.$item['pic'] ) }}" alt="{{$item->title}}">
                                    </a>
                                </div>
                     
                                <div class="feature-bookmark">
                                    <button type="button">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                </div>
                                <div class="feature-content">
                                    <div class="feature-title">
                                        <h3>
                                            <a href="{{route('single',['id'=>$item->slug])}}">{{$item->title}}</a>
                                        </h3>
                                    </div>
                                    <ul class="feature-meta">
                                        <li>
                                            <span>
                                                <small>توسط {{$item->writer}}</small>
                                            </span>
                                        </li>
                                        <li>
                                            <i class="fas fa-clock"></i>
                                             @isset($item->show_at)
                                                <span>{!! Facades\Verta::instance($item->show_at)->formatDate() !!}</span>
                                             @else
                                                <span>{!! Facades\Verta::instance($item->created_at)->formatDate() !!}</span>
                                             @endisset
                                            
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="feature-thumb-slider">
                            @foreach($posts->where('category','1')->slice(0,8) as $item) 
                            <div>
                                <img src="{{ asset('images/'.$item['pic'].'/'.$item['pic'] ) }}" alt="{{$item->title}}">
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!--
        <section class="section recomend-part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-center-heading">
                            <h2 style="background:url(images/title.png) no-repeat center; background-size:cover; background-size: contain; height: 93px;">
                                <span>آخرین محصولات</span>
                            </h2>
                            <p style="text-align:center">آخرین محصولات سایت مارا در اینجا مشاهده کنید</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="recomend-slider slider-arrow">
                            @foreach($products as $item)  
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
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="center-50">
                            <a href="{{route('products')}}" class="btn btn-inline">
                                <i class="fas fa-eye"></i>
                                <span>مشاهده تمامی محصولات</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    -->
            <section class="section recomend-part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-center-heading kiki">
                            <h2 style="background:url(images/title.png) no-repeat center; background-size:cover; background-size: contain; height: 93px;">
                                <span>آخرین فیلم های ما</span>
                            </h2>
                            <p style="text-align:center">آخرین ویدیو های جذاب مارا در اینجا مشاهده کنید</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="recomend-slider slider-arrow">
                            @foreach($posts->where('category','6')->slice(0,8) as $item)  
                            <div class="product-card">
                                 <div class="product-head">
                                    <div class="product-img" style="background:url({{ asset('images/'.$item['pic'].'/'.$item['pic'] ) }}) no-repeat center; background-size:cover;">
                                        <span class="flat-badge sale" style="background:none; "><img src="{{asset('images/play.svg')}}" style="position:relative; left:50px; top:25px; width:80%" > </span>
                                        <ul class="product-meta">
                                            <li>
                                                <a href="{{route('single',['id'=>$item->slug])}}" style="text-align:right">{{$item->title}}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="center-50">
                            <a href="https://www.iranmedslp.com/category/movies" class="btn btn-inline">
                                <i class="fas fa-eye"></i>
                                <span>مشاهده تمامی فیلم ها</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section recomend-part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-center-heading kiki">
                            <h2 style="background:url(images/title.png) no-repeat center; background-size:cover; background-size: contain; height: 93px;">
                                <span>آخرین اخبار</span>
                            </h2>
                            <p style="text-align:center">جدیدترین اخبار مجموعه ایران مد اس ال پی در این بخش قابل مشاهده است</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="recomend-slider slider-arrow">
                            @foreach($posts->where('category','7')->slice(0,8) as $item)  
                            <div class="product-card">
                                 <div class="product-head">
                                    <div class="product-img" style="background:url({{ asset('images/'.$item['pic'].'/'.$item['pic'] ) }}) no-repeat center; background-size:cover;">
                                        <i class="cross-badge fas fa-bolt"></i>
                                        <span class="flat-badge sale">ویژه </span>
                                        <ul class="product-meta">
                                            <li>
                                                <a href="{{route('single',['id'=>$item->slug])}}" style="text-align:right">{{$item->title}}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <div class="product-tag">
                                        <i class="fas fa-tags"></i>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="#">اخبار </a>
                                            </li>
                                        </ol>
                                    </div>
                                    <div class="product-title">
                                        <h5>
                                            <a href="{{route('single',['id'=>$item->slug])}}">{!! \Illuminate\Support\Str::limit($item->explain, 70, ' ...') !!}</a>
                                        </h5>
										<ul class="product-location">
                                            <li>
                                                <i class="fas fa-clock"></i>
                                               @isset($item->show_at)
                                                <p>{!! Facades\Verta::instance($item->show_at)->formatDate() !!}</p>
                                               @else
                                                <p>{!! Facades\Verta::instance($item->created_at)->formatDate() !!}</p>
                                               @endisset                                          
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="center-50">
                            <a href="https://www.iranmedslp.com/category/news" class="btn btn-inline">
                                <i class="fas fa-eye"></i>
                                <span>مشاهده تمامی اخبار</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section recomend-part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-center-heading kiki">
                            <h2 style="background:url(images/title.png) no-repeat center; background-size:cover; background-size: contain; height: 93px;">
                                <span>تجربیات درمانگران</span>
                            </h2>
                            <p style="text-align:center">با تجربیات و داستان های درمانگران همراه شوید</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="recomend-slider slider-arrow">
                            @foreach($posts->where('category','8') as $item)  
                            <div class="product-card">
                                 <div class="product-head">
                                    <div class="product-img" style="background:url({{ asset('images/'.$item['pic'].'/'.$item['pic'] ) }}) no-repeat center; background-size:cover;">
                                        <i class="cross-badge fas fa-bolt"></i>
                                        <span class="flat-badge sale">ویژه </span>
                                        <ul class="product-meta">
                                            <li>
                                                <a href="{{route('single',['id'=>$item->slug])}}" style="text-align:right">{{$item->title}}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <div class="product-tag">
                                        <i class="fas fa-tags"></i>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="#">تجربه درمانگران </a>
                                            </li>
                                        </ol>
                                    </div>
                                    <div class="product-title">
                                        <h5>
                                            <a href="{{route('single',['id'=>$item->slug])}}">{!! \Illuminate\Support\Str::limit($item->explain, 70, ' ...') !!}</a>
                                        </h5>
										<ul class="product-location">
                                            <li>
                                                <i class="fas fa-clock"></i>
                                               @isset($item->show_at)
                                                <p>{!! Facades\Verta::instance($item->show_at)->formatDate() !!}</p>
                                               @else
                                                <p>{!! Facades\Verta::instance($item->created_at)->formatDate() !!}</p>
                                               @endisset                                          
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="center-50">
                            <a href="https://www.iranmedslp.com/category/resume" class="btn btn-inline">
                                <i class="fas fa-eye"></i>
                                <span>مشاهده تمامی تجربه ها</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="single-banner" style="padding:120px 0px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-center-heading" >
                            <h2 style="color:#fff;">در مورد اختلال بلع چه می‌دانیم؟</h2>
                            <p style="color:#fff;">اختلال بلع، مشکلی که میلیون‌ها انسان در سراسر دنیا درگیر آن هستند، به هر گونه مشکل در فرایند انتقال آب و مواد غذایی از حفره دهان به معده گفته می شود. این نام برای خیلی از ما انسان‌ها ناآشنا بوده و وقتی برای اولین بار به گوشمان می رسد.............</p>
                            <a href="https://www.iranmedslp.com/single/the%20most%20common%20questions%20about%20disphagia" class="btn btn-outline">
                                <i class="fas fa-plus-circle"></i>
                                <span>بیشتر بخوانید</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
<script>
$(document).ready(function(){
  initSlick();
  $('.slick-inner').slick({
  slidesToShow: 1,
  dots:false,
  centerMode: true,
    arrows:false,
  });
});

function initSlick(){
  $('.slick-wrapper .slick-inner').each(function(){
     $(this).slick({
       slidesToShow: 1,
       dots:false,
       centerMode: true,
       arrows:false
     });
    const slickSlider = $(this);
    const slickControls = $(this).siblings('.slick-controls');
    slickControls.find('[data-role="slick-control"]').click(function(e){
       e.preventDefault();

    });
  });
}
</script>
@endsection