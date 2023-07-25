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
.btn i {
    margin-top: 3px;
}
.select-item h3{
    font-family: kalamehblack;
    font-size:30px;
}
.btn.hover-slide-right::before {
  top: 0; bottom: 0; left: 0; 
  height: 100%; width: 0%;
}
.btn.hover-slide-right:hover::before {
  width: 100%;
}
.btn-2::before {
  background-color: rgb(28, 31, 30);
  transition: 0.3s ease-out;
}
.btn-2 span {
  color: rgb(28, 31, 30);
  border: 1px solid rgb(28, 31, 30);
  transition: 0.2s;
}  
.btn-2 span:hover {
  color: rgb(255,255,255);
  transition: 0.2s 0.1s;
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
    body{
        background:#fff !important;
    }
    .contact-part{
       background:#fff !important;  
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
        
        <section class="section feature-part" style="padding-top: 30px; background:url({{ asset('images/why-back.svg') }}) no-repeat center; background-size:cover;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        @if(Session::has('info'))
                        <div class="row">
                            <div class="col-md-12">
                                <p class="alert alert-info">{{ Session::get('info') }}</p>
                            </div>
                        </div>
                        @endif
                        @if(Session::has('error'))
                        <div class="row">
                            <div class="col-md-12">
                                <p class="alert alert-info">{{ Session::get('error') }}</p>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <img src="{{ asset('images/'.$item['pic'].'/'.$item['pic'] ) }}" style="width: 215px; height: 215px; border-radius:15px;" alt="author">
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <div class="section-center-heading" style="text-align: justify;">
                            <h2>
                                <span style="color: #3737c8; font-family: kalamehblack; font-size:35px;">صفحه نوبت دهی {{$item->first_name}} {{$item->last_name}}</span>
                            </h2>
                            <span>  {{$item->about}} </span>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3 col-sm-12">
                                    <a href="#about" class="btn btn-inline" style="display: block;width: 100%;padding: 7px;margin-top: 50px;font-size: 14px;">
                                        <i class="fas fa-eye"></i>
                                        <span>مشاهده رزومه</span>
                                    </a>  
                                </div>
                                 <div class="col-md-3 col-sm-12">
                                    <a href="https://instagram.com/{{$item->instagram}}" class="btn btn-inline hover-slide-right " style="width: 100%;margin-top: 50px;padding: 7px;font-size: 14px;  background: #D973B0; border-color: #D973B0;">
                                        <i class="fas fa-file"></i>
                                        <span>مشاهده اینستاگرام</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    
                </div> 
            </div>
        </section>
        
        <section class="intro-part" style=" padding-bottom: 100px; padding-top:0px; margin-top:30px; background:url(images/steps.svg) no-repeat center; background-size:cover;">
            <div class="container">
                <div class="row">
                <div class="col-md-12">
                    <div class="section-center-heading" style="text-align: justify;">
                        <h2 style="color: #3737c8; font-family: kalamehblack; font-size:45px;">فرم نوبت دهی {{$item->first_name}} {{$item->last_name}} </h2>
                    </div>                    
                </div>
                <div class="blog-details-form">
                    <div class="form-title">
                    </div>
                    <form action="{{route('schedu')}}" method="POST">
                        @csrf 
                        @if(Auth::check())
                          <input type="hidden" name="user_id" value="{{Auth::user()->id}}"> 
                          <input type="hidden" name="doctor_id" value="{{$item->id}}"> 
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
                            <div class="col-lg-6">
                                <div class="form-group">
                                    @if(Auth::check())
                                    <input type="text" class="form-control" name="mobile" value="{{ Auth::user()->mobile }}" placeholder="شماره همراه شما" >
                                    @else
                                    <input type="text" class="form-control" name="mobile"  placeholder="شماره همراه شما">
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <select class="form-control" name="date" label="انتخاب نوبت">
                                        @foreach($time as $time)
                                        <option class="form-control" value="تاریخ {!! Facades\Verta::instance($time->date)->format(' %d  %B، %Y') !!} از ساعت{{$time->start_time}} تا ساعت {{$time->finish_time}}">تاریخ  <p style="direction:ltr">{!! Facades\Verta::instance($time->date)->format(' %d  %B، %Y') !!} </p> از ساعت{{$time->start_time}} تا ساعت {{$time->finish_time}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-btn">
                                    <button type="submit" class="btn btn-inline">
                                        <i class="fas fa-tint"></i>
                                        <span>نوبت خود را ثبت کنید</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
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

       