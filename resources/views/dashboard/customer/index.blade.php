@extends('layouts.panel')
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.customer.index" />
@endsection
@section('panel')
<style>
    .section-dsh {
          margin-right: -10px ;
    }
</style>
              <!-- main page site -->
              <section class="main-bar col-xl-9 col-12" style="padding: 0% 4%;">
                <!-- dashbord site ba-hm -->
                <div class="section-dsh row main-bar disflex col-xl-12 col-12" >
                    <div class="col-xl-8 col-5" >
                        <h1>داشبورد</h1>
                    </div>
                    <div class="row col-xl-4 col-7 disflex">
                        <div class="section-dsh-1 row col-xl-10 col-10 disflex">
                            <div class="row col-xl-4 col-4">
                                <a href=""> <img src="{{ asset('panel/img/User_box_duotone.svg') }}" alt="User_box_duotone" style="width: 35px; margin-bottom: 3px;"></a>
                            </div>
                            <div class="row col-xl-6 col-7">
                                        <span>{{Auth::user()->last_name}}</span>
                            </div>
                            <div class="dropdown row col-xl-2 col-1">
                                <button class="dropbtn" style="background-color: #ffffff; border: none;"><i class="fas fa-sort-down" style="color:rgb(147 146 146); margin-bottom:11px; font-size:20px;"></i></button>
                                <div class="dropdown-content">
                                    <a href="{{ route('dashboard.customer.profile') }}">ویرایش پروفایل</a>
                                </div>
                                <div class="dropdown-content" style="bottom:-55px">
                                    <a href="{{ route('dashboard.customer.profile') }}" >سیگنال دهی هوشمند</a>
                                </div>
                            </div>
                        </div>
                        <!--
                        <div class="col-xl-2 col-2 disflex2">
                            <a href=""><img src="img/darhboard.svg" alt="darhboard"></a>
                        </div>
                        <div class="col-xl-2 col-2 disflex-3-3" style="padding-right: 88px;">
                            <a href=""><img src="img/darhboard.svg" alt="darhboard"></a>
                        </div>
                         -->
                    </div>
                </div>
                <!-- General information of users -->
                <div class="row main-bar col-xl-12 col-12">
                    @if($activate != 'yes')
                        <style>
                          .section-dsh-2,.Diagram,.Banner{
                            filter:blur(8px);
                          }  
                        </style>
                        <p class="alert alert-info"> <span style="float:right; margin-top: 5px;">حساب کاربری خود را فعال کنید </span><a href="{{ route('dashboard.customer.profile') }}" class="btn btn-primary" style="color:white !important; float: left;">فعالسازی حساب</a></p>
                    @endif
                    </div>
                <div class="section-dsh-2 row main-bar col-xl-12 col-12">
                    <!-- first table -->
                    <div class="section-dsh-2-3tab col-xl-4 col-12" >
                        <div class="section-dsh-2-0tab row" >
                            <div class="col-xl-7 col-7">
                                <span >مقدار سرمایه</span>
                                <span >255,656, <sub>ریال</sub></span>  
                            </div>    
                            <div class="col-xl-5 col-5">
                                <img src="{{ asset('panel/img/Chart.svg') }}" width="95px" alt="Chart">
                            </div>
                        </div>
                    </div>
                    <!-- tow table -->
                    <div class="section-dsh-2-3tab col-xl-4 col-12" >
                        <div class="section-dsh-2-1tab row" >
                            <div class="col-xl-7 col-7">
                                <span> صندوق سرمایه گذاری</span>
                                <span>دارا یکم </span>
                            </div>    
                            <div class="col-xl-5 col-5">
                                <img src="{{ asset('panel/img/Widget.svg') }}" width="95px" alt="Chart">
                            </div>
                        </div>
                    </div>
                    <!-- three table -->
                    <div class="section-dsh-2-3tab col-xl-4 col-12" >
                        <div class="section-dsh-2-2tab row" >
                            <div class="col-xl-7 col-7" >
                                <span>مدت عضویت </span>
                                <span> 178روز </span>
                            </div>    
                            <div class="col-xl-5 col-5">
                                <img src="{{ asset('panel/img/Date_today.svg') }}" width="95px"  alt="Chart">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Diagram and chart section -->
                <div  class="Diagram row main-bar col-xl-12 col-12">
                    <div>
                        <span>نمودار</span>
                        <span>سرمایه</span>
                    </div>
                    <canvas id="myChart"></canvas>
                </div>
                <!-- Banner section of the site -->
                <div class="Banner row col-12">
                    <img src="{{ asset('panel/img/nemoodar 1.png') }}" alt="nemoodar" usemap="#workmap">
                    <map name="workmap">
                        <area shape="rect" coords="710,122,850,162" alt="more..." href="#">    
                    </map>    
                </div>
            </section> 
@endsection
