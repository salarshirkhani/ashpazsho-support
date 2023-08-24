@extends('layouts.panel')
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.customer.index" />
@endsection
@section('panel')
<style>
.generate-box{
    border-radius: 10px;
    
    padding:5px;
    display:block;
    margin-left:auto;
    margin-right:auto;
    margin-top: 30px;
    text-align:center;
    transition: 0.5s; 
}

.generate-box h4{
    text-align: center;
    display: block;
    margin-left: auto;
    margin-right: auto;
    font-size:17px;
    font-weight:900;
    margin-top:10px;
}
.address{
    display:flex-inline;
    margin:15px 0px;
}
.address input{
    width: 71%;
    border-radius: 7px;
    padding: 10px;
    text-align: center;
    border: none;
    background: white;
    box-shadow: 3px 6px 10px #aee4e77a;
}
.address button{
    padding: 10px;
    border: none;
    background: blue;
    color: white;
    font-weight: 900;
    border-radius: 7px;
    box-shadow: 5px 5px 10px #0000ff4f;
}
.address button:hover{
    background: #00c4ff;
    transition: 0.5s;
}
@media (max-width: 976px)
{
    .address input{
        width: 100%;
        margin-top:15px;
    }
    .address button{
        width: 100%;
        margin-top:15px;
    }
}
.submit{
    padding: 10px;
    border: none;
    background: #ff9426;
    color: white;
    font-weight: 900;
    margin-top: 15px;
    font-size: 18px;
    border-radius: 7px;
    box-shadow: 5px 5px 10px #ff00004f;
    width: 100%;
    transition: 0.5s;
}
.submit:hover{
    background: red;
    transition: 0.5s;
}
</style>
<link rel="stylesheet" href="{{ asset('panel/css/modal.css') }}" >
<script type="text/javascript" src="{{ asset('panel/js/qrcode.js') }}" ></script>
                      <section class="main-bar col-xl-9 col-12" style="padding: 0% 4%;">
                        <!-- dashbord site ba-hm -->
                        <div class="section-dsh row main-bar disflex col-xl-12 col-12" >
                            <div class="col-xl-8 col-5" >
                                <h1>واریز و برداشت</h1>
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
                    <div class="main-bar col-xl-12 col-12">
                            @if(Session::has('info'))
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="alert alert-success">{{ Session::get('info') }}</p>
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
                            @if($coin=='usdt')
                              @include('dashboard.customer.payment.usdt')
                            @endif
                            @if($coin=='trx')
                              @include('dashboard.customer.payment.tron')
                            @endif
                            @if($coin=='dai')
                              @include('dashboard.customer.payment.dai')
                            @endif
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
                
                            <table class="table  table-hover table table-striped table-condensed " style='color: white; overflow-x:auto; margin-right: auto; margin-left: auto;'>
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نوع سابقه</th>
                                    <th>تاریخ</th>
                                    <th>آدرس ولت</th>
                                    <th>مقدار</th>
                                    <th>وضعیت</th>
                                </tr>
                                </thead>
                                    <tbody>
                                 @foreach($transaction->where('coin',$coin) as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>@if($item->type=='income')<p>واریز</p>@else<p>برداشت</p>@endif</td>
                                        <td>{{ Facades\Verta::instance($item->created_at)->format('Y/n/j')}}</td>
                                        <td>{{ $item->wallet }}</td>
                                        <td>{{ $item->amount }}$</td>
                                        <td>@if($item->status=='deny')<p>رد شده</p>@else<p>تایید شده</p>@endif</td>
                                    </tr>
                                 @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr style="border-top:2px solid white;">
                                        <th>#</th>
                                        <th>نوع سابقه</th>
                                        <th>تاریخ</th>
                                        <th>آدرس ولت</th>
                                        <th>مقدار</th>
                                        <th>وضعیت</th>
                                    </tr>
                                    </tfoot>
                            </table>
                        </div>
                    </div>
                </section> 
            <script>
            function myFunction() {
              // Get the text field
              var copyText = document.getElementById("text1");
            
              // Select the text field
              copyText.select();
              copyText.setSelectionRange(0, 99999); // For mobile devices
            
               // Copy the text inside the text field
              navigator.clipboard.writeText(copyText.value);
            
              // Alert the copied text
              alert("هورا :) آدرس ولت کپی شد ");
            }
            </script>
            <script type="text/javascript">
            
            var qrcode = new QRCode(document.getElementById("qrcode"), {
            	width : 200,
            	height : 200
            });
            
            function makeCode () {		
            	var elText = document.getElementById("text");
            	
            	if (!elText.value) {
            		alert("Input a text");
            		elText.focus();
            		return;
            	}
            	
            	qrcode.makeCode(elText.value);
            }
            
            makeCode();
            
            $("#text").
            	on("blur", function () {
            		makeCode();
            	}).
            	on("keydown", function (e) {
            		if (e.keyCode == 13) {
            			makeCode();
            		}
            	});
            	

            </script>
<!-- Bootstrap 4 -->
<script
    src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
        
@endsection
