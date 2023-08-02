@extends('layouts.frontt')
@section('content')
<link rel="stylesheet" href="{{ asset('style/profile/profile_des.css') }}" media="only screen and (min-width: 993px)">
<link rel="stylesheet" href="{{ asset('style/profile/profile_mobile.css') }}" media="(max-width:992px)">
<style>
.addcomment input,select {
    background: #FFF;
    border-radius: 10px;
    border: none;
    padding: 15px 5px;
    margin-top: 5px;
    margin-right: 0px;
    width: 80%;
    font-family: 'iranyekan';
    margin-bottom: 20px;
}
.addcomment select {
    background: #FFF;
    border-radius: 10px;
    border: none;
    padding: 15px 5px;
    margin-top: 5px;
    margin-right: 0px;
    width: 80%;
    margin-bottom: 20px;
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
                                <span style="color: #2d8e93 !important; font-family: 'KalamehWeb_Black'; font-size:35px;">صفحه نوبت دهی {{$item->first_name}} {{$item->last_name}}</span>
                            </h2>
                            <span style="font-family: 'iranyekan';">  {{$item->about}} </span>
                            <div class="col-md-12">
                                <div class="row justify-content-end">
                                    <div class="col-md-3 col-sm-12">
                                        <a href="#" class="btn btn-inline-right">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="31" viewBox="0 0 28 31" fill="none">
                                                <path d="M20.1217 26.7123C19.7422 25.3739 18.906 24.1912 17.7427 23.3476C16.5795 22.5041 15.1542 22.0469 13.688 22.0469C12.2217 22.0469 10.7965 22.5041 9.63324 23.3476C8.47 24.1912 7.63379 25.3739 7.2543 26.7123" stroke="#CCD2E3" stroke-width="2"/>
                                                <ellipse cx="13.6877" cy="13.2343" rx="3.33032" ry="3.77676" stroke="#CCD2E3" stroke-width="2" stroke-linecap="round"/>
                                                <rect x="3.58691" y="4.16309" width="20.2021" height="23.1784" rx="3" stroke="#CCD2E3" stroke-width="2"/>
                                            </svg>
                                            <span> دانلود رزومه </span>
                                        </a>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                        <a href="#" class="btn btn-inline-left">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="31" viewBox="0 0 28 31" fill="none">
                                                <path d="M20.1217 26.7123C19.7422 25.3739 18.906 24.1912 17.7427 23.3476C16.5795 22.5041 15.1542 22.0469 13.688 22.0469C12.2217 22.0469 10.7965 22.5041 9.63324 23.3476C8.47 24.1912 7.63379 25.3739 7.2543 26.7123" stroke="#FCDDEC" stroke-width="2"/>
                                                <ellipse cx="13.6877" cy="13.2343" rx="3.33032" ry="3.77676" stroke="#FCDDEC" stroke-width="2" stroke-linecap="round"/>
                                                <rect x="3.58691" y="4.16309" width="20.2021" height="23.1784" rx="3" stroke="#FCDDEC" stroke-width="2"/>
                                            </svg>
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
        
   <!-- Call-request-page -->

   <div class="row">
    <div class="row-Call-request">
        <div class="col-lg-12 col-12">
            <div class="header-Call-request">
                <svg width="418" height="123" viewBox="0 0 418 123" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_332_304)">
                    <path opacity="0.7" d="M80.6472 82.027C70.8204 77.1387 10.7174 86.0175 6.14678 84.7538C2.17038 83.0246 2.94737 48.3408 5.73543 43.0534C6.69525 41.1578 8.06643 40.792 11.4486 41.4572C15.6079 42.4549 71.1861 37.5664 83.1611 36.6354C84.1665 37.6662 86.4518 33.975 87.046 35.2719C87.9601 36.7683 115.384 35.6377 143.722 34.5404C154.142 34.1413 175.03 33.1105 206.109 32.5119C211.731 32.4121 207.299 34.4738 213.88 33.7423C227.911 32.1461 258.534 34.4406 269.184 32.8444C277.73 31.5807 279.559 31.5476 287.695 33.044C294.687 34.3408 340.301 34.8065 345.65 32.7446C346.929 32.1461 347.89 32.4453 347.797 33.2102C347.797 33.2102 378.969 35.804 379.06 36.4358C379.244 37.2006 380.112 37.6329 381.072 37.1675C382.717 36.3694 416.265 35.9702 416.538 38.2647C417.362 44.7492 409.637 71.4855 405.205 77.837C400.542 84.5542 380.661 75.1102 362.971 78.3026C275.263 73.6471 283.215 74.9771 266.852 77.0056C264.978 74.6446 257.437 80.1647 252.912 76.0081C251.085 74.3121 237.556 73.8133 234.539 75.4427C233.259 76.141 215.342 75.3098 196.877 75.1102C178.412 74.9106 159.352 75.4094 155.925 77.7039C141.573 73.6471 86.3605 81.4284 80.6472 82.027Z" fill="#E3E3E3"/>
                    <path opacity="0.7" d="M40.4694 79.7664C36.6301 77.4718 24.4266 81.7947 14.8285 83.8565C13.5487 84.1226 6.51001 85.3196 5.36737 84.7876C3.99619 83.7236 0.202618 44.8496 0.0655006 43.3865C-0.208735 40.327 0.385441 42.2891 1.71091 42.5218C2.4422 42.6549 5.41307 42.023 6.14436 41.8901C9.66371 40.9922 14.5085 39.0966 17.7536 37.7C18.622 38.5979 17.2966 35.1063 18.2106 36.2702C20.6331 39.3627 49.8391 25.6289 54.1355 23.9994C55.8723 23.3344 55.7351 25.5956 57.3806 24.1989C59.1174 22.7025 62.8652 21.5386 66.4303 20.408C79.822 16.085 73.469 13.8902 81.0104 14.5553C84.4841 14.6551 99.6583 9.06837 100.572 6.47458C100.71 5.74299 101.212 5.87601 101.578 6.60758C101.624 6.70735 104.595 6.14202 107.794 5.77624C110.993 5.41045 114.147 5.11117 114.33 5.37718C114.741 6.10878 115.244 6.37481 115.381 5.80949C115.427 4.81188 128.133 0.0565602 129.047 2.18482C131.652 8.30353 138.6 35.0398 139.834 41.5907C141.159 48.6406 132.109 41.491 128.773 46.7119C124.111 47.6098 115.747 49.5385 104.823 52.7308L101.121 56.5882C99.1099 54.6928 100.344 60.5788 96.3675 57.3199C94.7679 56.023 90.3802 57.0872 90.4715 58.9492C90.5172 59.6809 84.4841 60.9446 78.4052 62.8069C72.3263 64.6358 66.2018 66.9635 66.4303 69.3911C60.26 67.4955 48.4679 75.6427 40.4694 79.7664Z" fill="#E3E3E3"/>
                    <path opacity="0.7" d="M140.747 113.486C131.606 109.263 83.4324 122.299 78.8617 121.301C75.2053 119.838 68.8522 85.5529 70.132 80.1657C70.589 78.237 71.6403 77.7716 74.6112 78.2039C78.3133 78.9022 119.768 70.9877 133.892 68.3938C134.943 69.3582 136.131 65.5341 136.908 66.7645C138.508 68.8928 218.951 56.6219 235.861 54.6268C240.523 54.0613 237.232 56.4557 242.58 55.1588C253.915 52.3655 279.83 51.8335 288.332 49.2396C295.187 47.1446 296.65 47.0448 303.734 47.6767C310.911 48.3085 347.703 43.9521 351.542 41.3584C352.457 40.6268 353.279 40.8264 353.416 41.5911C353.416 41.5911 379.652 40.7266 379.834 41.2253C380.108 41.9903 381.022 42.2895 381.662 41.7243C382.896 40.8264 410.092 36.2706 410.914 38.4653C413.2 44.7503 413.565 71.9852 411.462 78.7691C409.223 85.9852 390.026 79.2014 376.269 84.3559C297.382 90.0754 312.601 88.5458 295.599 93.168C293.541 91.0066 288.423 97.1917 283.76 93.5005C281.886 92.0043 270.506 92.7357 268.266 94.6644C267.353 95.4626 252.177 96.2607 236.683 97.6242C221.189 99.0208 205.375 101.016 202.953 103.577C191.48 100.783 150.208 111.125 140.747 113.486Z" fill="#E3E3E3"/>
                    </g>
                    <defs>
                    <clipPath id="clip0_332_304">
                    <rect width="418" height="123" fill="white"/>
                    </clipPath>
                    </defs>
                </svg>
                <h3 class="head-Call-request">فرم نوبت دهی {{$item->first_name}} {{$item->last_name}} </h3>
            </div>
        </div>
        <div class="col-lg-12">

            <div class="Call-request">

                <div class="form-call addcomment">

                    <form action="{{route('schedu')}}"  method="POST">
                        <input type="hidden" name="_token" value="Kc7J0vF8SLCZwwBkG1aP3BZM8s4DsS72mcHVcppY"> 
                        <input type="hidden" name="post_id" value="9">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="namepl">
                                    @if(Auth::check())
                                    <input type="text" class="form-control" value="{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}" name="name" placeholder="نام شما">
                                    @else
                                    <input type="text" class="form-control" name="name" placeholder="نام شما">
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="namepl">
                                    @if(Auth::check())
                                    <input type="text" class="form-control" name="email" value="{{ Auth::user()->email }}" placeholder="ایمیل شما">
                                    @else
                                    <input type="email" class="form-control" name="email" placeholder="ایمیل شما">
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="namepl">
                                    @if(Auth::check())
                                    <input type="text" class="form-control" name="mobile" value="{{ Auth::user()->mobile }}" placeholder="شماره همراه شما" >
                                    @else
                                    <input type="text" class="form-control" name="mobile"  placeholder="شماره همراه شما">
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="namepl">
                                    <select class="form-control" name="date" label="انتخاب نوبت">
                                        @foreach($time as $time)
                                        <option class="form-control" value="تاریخ {!! Facades\Verta::instance($time->date)->format(' %d  %B، %Y') !!} از ساعت{{$time->start_time}} تا ساعت {{$time->finish_time}}">تاریخ  <p style="direction:ltr">{!! Facades\Verta::instance($time->date)->format(' %d  %B، %Y') !!} </p> از ساعت{{$time->start_time}} تا ساعت {{$time->finish_time}}</option>
                                        @endforeach
                                    </select>
                                </div>
                        
                        <div class="submitt" style="    padding: 0px 20%;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="29" height="28" viewBox="0 0 29 28" fill="none">
                                <rect x="6.02881" y="5.02539" width="16.4495" height="19.4331" rx="2" stroke="#CCD2E3" stroke-width="2"/>
                                <path d="M10.7285 10.7412H17.7783" stroke="#CCD2E3" stroke-width="2" stroke-linecap="round"/>
                                <path d="M10.7285 15.3135H17.7783" stroke="#CCD2E3" stroke-width="2" stroke-linecap="round"/>
                                <path d="M10.7285 19.8862H15.4284" stroke="#CCD2E3" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                            <input type="submit" value="ارسال فرم">
                        </div>
                    </div>
                </div>
                      </form>
                </div>
            </div>
            <div class="non" style=" text-align: center; position: relative; top: -163px; left: 30px;">
                <img src="img/slider-img-5555.png" alt="">
            </div>
        </div>


    </div>
</div>
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

       