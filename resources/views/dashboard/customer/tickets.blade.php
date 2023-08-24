@extends('layouts.panel')
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.customer.index" />
@endsection
@section('panel') 
<section class="main-bar col-xl-9 col-12" style="padding: 0% 4%;">
    <!-- dashbord site ba-hm -->
    <div class="section-dsh row main-bar disflex col-xl-12 col-12" >
        <div class="col-xl-8 col-5" >
            <h1>پشتیبانی</h1>
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
                                        <div class="dropdown-content">
                                            <a href="{{ route('dashboard.customer.profile') }}">ویرایش پروفایل</a>
                                            <a href="https://bhmwallet.com">مشاهده سایت</a>
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

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>

        <style>

            .table {
                background: rgb(255 255 255) !important;
                color: #2c2b2b;
                width: 100%;
                max-width: 1300px;
                border-radius: 7px;
                padding: 40px;
                overflow-x: auto;
            }
            .table thead {
                vertical-align: bottom;
                background: #6e78b5;
                color: white;
                border-radius: 7px !important;
            }
            .table tfoot {
                vertical-align: bottom;
                background: #6e78b5;
                color: white;
                border-radius: 7px !important;
            }
            
            table {
                border-collapse: collapse;
                margin: 50px 0px;
            }
            .table-hover tbody tr:hover {
                background-color: rgba(0,0,0,.075);
            }
            
            .table-striped tbody tr:nth-of-type(odd) {
                background-color: rgba(0,0,0,.05);
            }
            .table-bordered thead td, .table-bordered thead th {
            }
            .table thead th {
                vertical-align: bottom;
                border-bottom: 2px solid #dee2e6;
            }
            .table-bordered td, .table-bordered th {
            }
            .table td, .table th {
                padding: 0.75rem;
                vertical-align: top;
                text-align: center;
            }
            .add-button {
                background: #69c397;
                padding: 10px;
                border: none;
                border-radius: 3px;
                color: white;
                margin-top: 50px;
            }
                        
            .add-button:hover{
                background: #07b107;
            }
            .table tr td {
                color: #2c2b2b;
            }
            </style>
            <div class="grayBlueBg">
                
                            <a href="{{route('dashboard.customer.support')}}" class="btn btn-success add-button" style="color:#fff !important">ایجاد تیکت پشتیبانی جدید</a>
            
                            <table class="table  table-hover table table-striped table-condensed " style='color: white; overflow-x:auto; margin-right: auto; margin-left: auto;'>
                                <thead>
                                <tr>
                                    <th>موضوع</th>
                                    <th>دپارتمان</th>
                                    <th>وضعیت</th>
                                    <th>نمایش</th>    
                                    <th>بستن</th>
                                </tr>
                                </thead>
                                    <tbody>
                                 @foreach($support as $item)
                                    <tr>
                                        <td>{{ $item->subject }}</td>
                                        <td>{{ $item->departmant }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td><a style="background: rgb(0, 195, 255);padding: 6px;border-radius: 3px;color: white;" href="{{route('dashboard.customer.chat',['id'=>$item->id])}}" class="btn btn-success">نمایش تیکت</a></td>
                                        <td>
                                            <form action="{{route('dashboard.customer.closechat')}}" style="text-align:center;display:block ; margin-right:auto ; margin-left:auto;" method="post">
                                                 <div class="input-group">
                                                    <input type="hidden" name="support_id" value="{{$item->id}}">
                                                    @csrf
                                                    <span  style="text-align:center;display:block ; margin-right:auto ; margin-left:auto;">
                                                      <button type="submit" style="background: red;padding: 7px;border-radius: 4px;color: white; text-align:center; border:none !important; cursor:pointer" >پایان پشتیبانی</button>
                                                    </span>
                                                 </div>
                                            </form>
                                        </td>
                                    </tr>
                                 @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr style="border-top:2px solid white;">
                                        <th>موضوع</th>
                                        <th>دپارتمان</th>
                                        <th>وضعیت</th>
                                        <th>نمایش</th>    
                                        <th>بستن</th>
                                    </tr>
                                    </tfoot>
                            </table>
            
            </div>
    </div>
</section> 
@endsection