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
        
        <section class="section feature-part" style=" padding-bottom: 100px; padding-top: 70px; background:url(images/wave.svg) no-repeat center; background-size:cover;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">

                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="section-center-heading" style="text-align: justify;">
                            <h2>
                                <span style="color: #3737c8; font-family: kalamehblack; font-size:50px;">چرا ایران مد اس ال پی</span>
                            </h2>
                            <span>
گروه بلع‌درمانی ایران‌ مد اس ال پی در سال 1396 و با همت یک مجموعه جوان متخصص برای نخستین بار در سیستم درمانی کشور ایجاد شده است. هدف ما در این گروه ارائه خدمات با کیفیت حداکثری به بیماران دارای اختلال بلع بوده است.
<a href="#about" class="btn btn-inline" style="display: block;width: 255px;margin-top: 50px;font-size: 16px;">
                            <i class="fas fa-eye"></i>
                            <span>می خواهم بیشتر بدانم</span>
                        </a> 
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                            <iframe style="width: 100%; height: 450px; border-radius: 15px; border: none;" src="https://www.aparat.com/video/video/embed/videohash/5P2SZ/vt/frame" title="معرفی گروه توانبخشی بلع و گفتار iranmedslp" allowFullScreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe>            
                    </div>
                    
                </div> 
            </div>
        </section>
        <section class="intro-part" id="about" style="background:url(images/why-back.svg) no-repeat center; background-size:cover; color=black; padding: 70px 0px 95px;margin-top: 0px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-center-heading" style="text-align: justify;font-family: kalamehblack;">
                            <h2 style="color: #3737C8;">درباره وب سایت گفتار درمانی ما</h2>
                            <p style="color:#767676; font-family: iransans;">
گروه بلع‌درمانی ایران‌ مد اس ال پی در سال 1396 و با همت یک مجموعه جوان متخصص برای نخستین بار در سیستم درمانی کشور ایجاد شده است. هدف ما در این گروه ارائه خدمات با کیفیت حداکثری به بیماران دارای اختلال بلع بوده است. اولین بار در سال 1396 خلاء وجود گروه تخصصی درمان اختلال بلع در کشورمان ایران را حس کردیم و همین امر ایده شکل‌گیری یک گروه متخصص در درمان اختلال بلع با استفاده از بروزترین تجهیزات و روش‌های درمانی را در ذهنمان ایجاد کرد.
باتوجه به حساسیت‌های درمان اختلال بلع، تیم ما از باتجربه‌ترین و حاذق‌ترین افراد دعوت به همکاری نموده و در این مدت در درمان بیش از 16 هزار بیمار دارای اختلال بلع مشارکت داشته است. رسالت ما خلق امید و انگیزه و فراهم ساختن بهترین مراقبت‌های پزشکی و توانبخشی برای تمامی مراجعینی است که برای درمان به ما اعتماد می‌کنند.
                                </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section feature-part" style=" padding-bottom: 100px; padding-top: 30px; background:url(images/steps.svg) no-repeat center; background-size:cover;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-center-heading" >
                            <h2>
                                <span style="color: #0066FF; font-family: kalamehblack; font-size:50px;">تیم ایران مد اس ال پی را بیشتر بشناسید </span>
                            </h2>
                            <span style="display:block;">
گروه آموزشی- درمانی Iran-Med-SLP متشکل از درمانگران با سابقه کار بیشتر از 5 سال و ویزیت بیش از 16 هزار بیمار دارای اختلال بلع در بیمارستان‌های تهران، در سال 1396 تاسیس شده است. هدف اصلی ایجاد این گروه آگاه‌سازی مردم سرزمینمان ایران در مورد اختلالات بلع، عواقب آن و ارائه خدمت به بیماران نیازمند دریافت خدمات گفتار درمانی است.                             </span>
                        <a href="{{route('team')}}" class="btn btn-inline hover-slide-right" style="display: inline-flex;width: 255px;margin-top: 50px;font-size: 16px; margin-left:auto; margin-right:auto;">
                            <i class="fas fa-eye"></i>
                            <span>رزومه درمانگران</span>
                        </a> 
                        <a href="{{route('employees')}}" class="btn btn-inline hover-slide-right " style="display: inline-flex;width: 255px;margin-top: 50px;font-size: 16px; margin-left:auto; margin-right:auto; background: #0066FF; border-color: #0066FF;">
                            <i class="fas fa-file"></i>
                            <span>معرفی درمانگران</span>
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

       