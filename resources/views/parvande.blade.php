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
        
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>         
        <section class="intro-part" style=" padding-bottom: 100px; padding-top:0px; margin-top:30px; background:url(images/steps.svg) no-repeat center; background-size:cover;">
                <div class="container">
                    <div class="col-lg-12">
                        @if(Session::has('info'))
                        <div class="row">
                            <div class="col-md-12">
                                <p class="alert alert-info">{{ Session::get('info') }}</p>
                            </div>
                        </div>
                        @endif
                         @if ($errors->any())
                            @foreach ($errors->all() as $error)
                            <div class="col-md-12">
                                <p class="alert alert-danger">{{ $error }}</p>
                            </div>
                            @endforeach
                        @endif
                    </div>  
                </div>
            <div class="container">
                <div class="row">
                <div class="col-md-12">
                    <div class="section-center-heading" style="text-align: justify;">
                        <h2 style="color: #3737c8; font-family: kalamehblack; font-size:45px;">ایجاد پرونده الکترونیکی ایران مد اس ال پی</h2>
                    </div>                    
                </div>
                <div class="blog-details-form">
                    <div class="form-title">
                    </div>
                    @if(Auth::check())
                    <form action="{{route('par')}}" method="POST">
                        @csrf 
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="email" value="{{ Auth::user()->email }}" placeholder="ایمیل">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    @if(Auth::check())
                                    <input type="text" class="form-control" value="{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}" name="title" placeholder="نام شما">
                                    @else
                                    <input type="text" class="form-control" name="title" placeholder="نام شما">
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="city"  placeholder="شهر">
                                </div>
                            </div>
                             <div class="col-lg-6">
                                <div class="form-group">
                                    <select class="form-control" name="sex" required label="جنسیت">
                                        <option class="form-control" value="مرد">مرد</option>
                                        <option class="form-control" value="زن">زن</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="age" required  placeholder="سن بیمار">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    @if(Auth::check())
                                    <input type="text" class="form-control" required name="number" value="{{ Auth::user()->email }}" placeholder="شماره همراه شما" >
                                    @else
                                    <input type="text" class="form-control" required name="number"  placeholder="شماره همراه شما">
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="height"  placeholder="قد حدودی">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="weight"  placeholder="وزن حدودی">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="lang"  placeholder="زبان">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="job"   placeholder="شفل">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="doctor"   placeholder="نام پزشک معالج">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <textarea class="form-control" row="6" name="address"  style="height:100px" placeholder="آدرس"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="diagnose"   placeholder="تشخیص پزشکی">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="slp"  placeholder="تشخیص اس ال پی">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <textarea class="form-control" name="history"  placeholder="تاریخچه پزشکی"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <textarea class="form-control" name="doc_dig"  placeholder="تاریخچه درمانی"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <textarea class="form-control" name="drugs"  placeholder="داروهای مصرفی فعلی بیمار"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <textarea class="form-control" name="information"  placeholder="اطلاعات ارزیابی سطح پایه (اولیه) بیمار"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="file">اطلاعات پاراکلینیک بیمار</label>
                                    <input type="file" style="margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; width: 100%; font-size: 16px;" class="dropzone"  name="file">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="img">اطلاعات پاراکلینیک Iran-Med-Slp</label>
                                    <input type="file" style="margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; width: 100%; font-size: 16px;" class="dropzone"  name="img">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-btn">
                                    <button type="submit" class="btn btn-inline">
                                        <i class="fas fa-tint"></i>
                                        <span>ایجاد پرونده الکترونیک</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    @else
                    <a href="{{route('register')}}" class="btn btn-inline">برای ثبت پرونده باید در سایت ثبت نام کنید یا وارد شوید</a>
                    @endif
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
            <script type="text/javascript">
                Dropzone.options.dropzone =
                    {
                        maxFilesize: 12,
                        renameFile: function(file) {
                            var dt = new Date();
                            var time = dt.getTime();
                            return time+file.name;
                        },
                        acceptedFiles: ".jpeg,.jpg,.png,.gif,.pdf,.docx",
                        addRemoveLinks: true,
                        timeout: 500000,
                        success: function(file, response)
                        {
                            console.log(response);
                        },
                        error: function(file, response)
                        {
                            return 1;
                        }
                    };

                Dropzone.options.dropzone =
                    {
                        maxFilesize: 12,
                        renameFile: function(img) {
                            var dt = new Date();
                            var time = dt.getTime();
                            return time+img.name;
                        },
                        acceptedFiles: ".jpeg,.jpg,.png,.gif",
                        addRemoveLinks: true,
                        timeout: 500000,
                        success: function(img, response)
                        {
                            console.log(response);
                        },
                        error: function(img, response)
                        {
                            return 1;
                        }
                    };
            </script>
@endsection

       