@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.owner.sidebar')
@endsection
@section('hierarchy')
<x-breadcrumb-item title="داشبورد" route="dashboard.owner.index" />
<x-breadcrumb-item title="کاربران" route="dashboard.owner.users.index" />
@endsection
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
@if(Session::has('info'))
    <div class="row">
        <div class="col-md-12">
            <p class="alert alert-info">{{ Session::get('info') }}</p>
        </div>
    </div>
@endif
@if ($errors->any())
<div class="wrap-messages">
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">{{ $error }}</div>
    @endforeach
</div>
@endif
    <div class="col-md-12">
        <x-card type="info">
            <x-card-header>مدیریت پرونده الکترونیک</x-card-header>
            <form action="{{route('dashboard.owner.users.par')}}" style="padding:15px;" method="POST">
                <input type="hidden" name="id" value="{{$user->id}}">
                @csrf 
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="email">ایمیل</label>
                            <input type="text" class="form-control"  name="email" value="{{ $user->email }}" placeholder="ایمیل">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">   
                            <label for="title">نام شما</label>
                            <input type="text" class="form-control" value="{{ $user->first_name }} {{ $user->last_name }}" name="title" placeholder="نام شما">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="city">شهر</label>
                            <input type="text" class="form-control" name="city"  placeholder="شهر">
                        </div>
                    </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                            <label for="sex">جنسیت</label>
                            <select class="form-control" name="sex" required label="جنسیت">
                                <option class="form-control" value="مرد">مرد</option>
                                <option class="form-control" value="زن">زن</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="age">سن بیمار</label>
                            <input type="text" class="form-control"  name="age" required value="{{ $user->mobile }}" placeholder="سن بیمار">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="number">شماره همراه</label>
                            <input type="text" class="form-control" required name="number" value="{{ $user->mobile }}" placeholder="شماره همراه ">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="height">قد حدودی</label>
                            <input type="text" class="form-control"  name="height" value="{{ $user->height }}" placeholder="قد حدودی">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="weight">وزن حدودی</label>
                            <input type="text" class="form-control"  name="weight" value="{{ $user->weight }}" placeholder="وزن حدودی">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="lang">زبان</label>
                            <input type="text" class="form-control"  name="lang" value="{{ $user->lang }}" placeholder="زبان">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="job">شفل</label>
                            <input type="text" class="form-control"  name="job" value="{{ $user->job }}"  placeholder="شفل">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="doctor">نام پزشک معالج</label>
                            <input type="text" class="form-control"  name="doctor" value="{{ $user->doctor }}"  placeholder="نام پزشک معالج">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="address">آدرس</label>
                            <textarea class="form-control" row="6" name="address" value="{{ $user->address }}" style="height:100px" placeholder="آدرس">{{ $user->address }}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="diagnose">تشخیص پزشکی</label>
                            <input type="text" class="form-control"  name="diagnose" value="{{ $user->diagnose }}"  placeholder="تشخیص پزشکی">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="slp">تشخیص اس ال پی</label>
                            <input type="text" class="form-control"  name="slp" value="{{ $user->slp }}" placeholder="تشخیص اس ال پی">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="history">تاریخچه پزشکی</label>
                            <textarea class="form-control" name="history"  placeholder="تاریخچه پزشکی">{{ $user->history }}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="doc_dig">تاریخچه درمانی</label>
                            <textarea class="form-control" name="doc_dig"  placeholder="تاریخچه درمانی">{{ $user->doc_dig }}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="drugs">داروهای مصرفی فعلی بیمار</label>
                            <textarea class="form-control" name="drugs"  placeholder="داروهای مصرفی فعلی بیمار">{{ $user->drugs }}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="information">اطلاعات ارزیابی اولیه بیمار</label>
                            <textarea class="form-control" name="information"  placeholder="اطلاعات ارزیابی سطح پایه (اولیه) بیمار">{{ $user->information }}</textarea>
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
                        <div class="form-group">
                            <label for="moreinfo">اطلاعات ارزیابی دوره‌ای بیمار </label>
                            <textarea class="form-control" name="moreinfo"  placeholder="اطلاعات ارزیابی دوره‌ای بیمار ">{{ $user->moreinfo }}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="balini">یادداشت‌های بالینی</label>
                            <textarea class="form-control" name="balini"  placeholder="یادداشت‌های بالینی">{{ $user->balini }}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="change">تغییر برنامه درمانی</label>
                            <textarea class="form-control" name="change"  placeholder="تغییر برنامه درمانی (در صورت عدم تغییر خالی بگذارید)">{{ $user->change }}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="note">سایر یادداشت ها</label>
                            <textarea class="form-control" name="note"  placeholder="سایر یادداشت‌ها">{{ $user->note }}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div style="margin-top:50px;"></div>
                            <h3>تاریخچه ویزیت ها</h3>
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>تاریخ</th>
                                    <th>شرح جلسه</th>    
                                    <th>اقدامات انجام شده</th>                               
                                    <th>درصد پیشرفت</th>
                                </tr>
                                </thead>
                                    <tbody>
                                 @foreach($visits as $item)
                                    <tr>
                                        <td>{{ Facades\Verta::instance($item->visit_date)->format('Y/n/j')}}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->procedure }}</td>
                                        <td>{{ $item->percentage }}</td>
                                    </tr>
                                 @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>تاریخ</th>
                                        <th>شرح جلسه</th>    
                                        <th>اقدامات انجام شده</th>                               
                                        <th>درصد پیشرفت</th>
                                    </tr>
                                    </tfoot>
                            </table>
                            <label>افزودن ویزیت</label>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>تاریخ</th>
                                    <th>شرح جلسه</th>
                                    <th>اقدامات انجام شده</th>
                                    <th>درصد پیشرفت</th>
                                </tr>
                                </thead>
                                <tbody id="tag">

                                </tbody>
                                <tfoot>
                                <tr>
                                <td colspan="4">
                                    <button id="add-tag" type="button" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></button>
                                </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-btn">
                            <button type="submit" style=" margin: 20px 0px; height: 42px;width: 100%;font-size: 20px;" class="btn btn-primary">
                                <span>به روز رسانی پرونده الکترونیک</span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    let field = `@include('dashboard.admin.users.tag-item', ['tag' => null])`;
                    let idx = $("#tag tr").length + 1;
                    $('#add-tag').click(function () {
                        $("#tag").append(field.replace(/IDX/g, idx.toString()));
                        updateListeners();
                        idx ++;
                    });
                    function onRemove() {
                        $(this).closest('tr').remove();
                    }
                    function updateListeners() {
                        $('.btn-remove-tag').click(onRemove);
                    }
                });

          </script>
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
    </x-card>
    </div>
    @endsection