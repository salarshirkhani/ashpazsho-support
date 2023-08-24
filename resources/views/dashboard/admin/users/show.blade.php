@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.admin.index" />
    <x-breadcrumb-item title="کاربران" route="dashboard.admin.users.index" />
    <x-breadcrumb-item title="صفحه کاربری" route="dashboard.admin.users.show" />
@endsection
@section('content')
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
    @include('dashboard.admin.users.changerole')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
    <div class="container">
        <x-session-alerts></x-session-alerts>
            <div class="row">
              <div class="col-md-3">
      
                  <!-- Profile Image -->
                  <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                      <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{ asset('pics/'.$user['profile'].'/'.$user['profile'] ) }}" alt="{{ $user->first_name }}">
                      </div>
      
                      <h3 class="profile-username text-center">{{ $user->first_name }} {{ $user->last_name }}</h3>
      
                      <p class="text-muted text-center">{{ $user->type }}</p>
      
                      <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>شماره موبایل</b> <a class="float-right">{{ $user->mobile }}</a>
                        </li>
                        <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#modal-lg">تغیر وضعیت کاربری</button>

                      </ul>
                    </div>
                    <!-- /.card-body -->
                  </div>


                  <!-- /.card -->
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12">
                          <x-card type="info" >
                            <x-card-header>اطلاعات کاربری</x-card-header>
                            <x-card-body>
                              <div class="box-body">
                                <form style="padding:15px;" action="{{ route('dashboard.admin.users.ediit', $user->id) }}" method="post" role="form" class="form-horizontal " enctype="multipart/form-data">
                                  <label for="first_name">نام </label> 
                                  <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control" required name="first_name" value="{{ $user->first_name}}"  placeholder="نام">  
                                  <label for="last_name">نام خانوادگی</label> 
                                  <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control" required name="last_name" value="{{ $user->last_name}}"  placeholder="نام خانوادگی">
                                  <h4 style="margin-top:45px; font-weight:900">اطلاعات بانکی</h4>
                                  <label for="cartnumber">شماره کارت</label> 
                                  <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control" required autocomplete="off" name="cartnumber" value="{{ $user->cartnumber}}"  placeholder="شماره کارت خود را به صورت دقیق وارد کنید">  
                                  <label for="shaba">شماره شبا</label> 
                                  <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control" required autocomplete="off" name="shaba" value="{{ $user->shaba}}"  placeholder="شماره شبا خود را به صورت دقیق وارد کنید">  
                                  <label for="bankpic"> عکس کارت بانکی</label>
                                  <img style="width:300px; height:200px;" src="{{ asset('pics/'.$user['bankpic'].'/'.$user['bankpic'] ) }}">
                                  <input type="file" style="margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; width: 100%; font-size: 16px;"  class="dropzone"  name="bankpic" >
                                  <h4 style="margin-top:45px; font-weight:900">اطلاعات هویتی</h4>
                                  <label for="melli">کد ملی</label> 
                                  <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control" required autocomplete="off" name="melli" value="{{ $user->melli}}"  placeholder="کد ملی">        
                                  <input type="hidden" name="id" value="{{$user->id}}">
                                  <label for="pic"> عکس سلفی</label>
                                  <img style="width:200px; height:200px;" src="{{ asset('pics/'.$user['profile'].'/'.$user['profile'] ) }}">
                                  <input type="file" style="margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; width: 100%; font-size: 16px;" class="dropzone"  name="pic" >
                                  <label for="mellipic"> عکس کارت ملی</label>
                                  <img style="width:300px; height:200px;" src="{{ asset('pics/'.$user['mellipic'].'/'.$user['mellipic'] ) }}">
                                  <input type="file" style="margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; width: 100%; font-size: 16px;" class="dropzone"  name="mellipic" >
                                <div style="margin-top:50px;"></div>
                                <p>جهت تمایل به تغیر رمز عبور کادر های پایین را پر کنید در غیر این صورت دو کادر پایین را خالی بگذارید</p>
                                 <input type="password" name="password" class="form-control"  placeholder="کلمه عبور" id="id_password" autocomplete="off">
                                 <input type="password" name="password_confirmation" class="form-control"  placeholder="تکرار کلمه عبور" id="id_password_confirmation">
                                  <script type="text/javascript">
                                          Dropzone.options.dropzone =
                                          {
                                              maxFilesize: 12,
                                              renameFile: function(pic) {
                                                  var dt = new Date();
                                                  var time = dt.getTime();
                                                  return time+pic.name;
                                              },
                                              acceptedFiles: ".jpeg,.jpg,.png,.gif",
                                              addRemoveLinks: true,
                                              timeout: 500000,
                                              success: function(pic, response)
                                              {
                                                  console.log(response);
                                              },
                                              error: function(pic, response)
                                              {
                                                  return 1;
                                              }
                                          };
                                          Dropzone.options.dropzone =
                                          {
                                              maxFilesize: 12,
                                              renameFile: function(mellipic) {
                                                  var dt = new Date();
                                                  var time = dt.getTime();
                                                  return time+mellipic.name;
                                              },
                                              acceptedFiles: ".jpeg,.jpg,.png",
                                              addRemoveLinks: true,
                                              timeout: 500000,
                                              success: function(mellipic, response)
                                              {
                                                  console.log(response);
                                              },
                                              error: function(mellipic, response)
                                              {
                                                  return 1;
                                              }
                                          };
                                          Dropzone.options.dropzone =
                                          {
                                              maxFilesize: 12,
                                              renameFile: function(bankpic) {
                                                  var dt = new Date();
                                                  var time = dt.getTime();
                                                  return time+bankpic.name;
                                              },
                                              acceptedFiles: ".jpeg,.jpg,.png",
                                              addRemoveLinks: true,
                                              timeout: 500000,
                                              success: function(bankpic, response)
                                              {
                                                  console.log(response);
                                              },
                                              error: function(bankpic, response)
                                              {
                                                  return 1;
                                              }
                                          };
                                  </script>
                                   {{ csrf_field() }}
                                   <x-card-footer>
                                      <button type="submit" style=" margin: 20px 0px; height: 42px;width: 100%;font-size: 20px;"  class="btn btn-primary">ارسال و فعال کردن کاربر</button>
                                   </x-card-footer>
                                  </form>
                          </x-card>
                          </div>
                          <script type="text/javascript">
                              Dropzone.options.dropzone =
                                  {
                                      maxFilesize: 12,
                                      renameFile: function(national_pic) {
                                          var dt = new Date();
                                          var time = dt.getTime();
                                          return time+national_pic.name;
                                      },
                                      acceptedFiles: ".jpeg,.jpg,.png,.gif",
                                      addRemoveLinks: true,
                                      timeout: 500000,
                                      success: function(national_pic, response)
                                      {
                                          console.log(response);
                                      },
                                      error: function(national_pic, response)
                                      {
                                          return 1;
                                      }
                                  };
                              </script>
                              </div>                             
                          </x-card>  
                        </div>
                        <div class="col-md-12">
                          <x-card type="info" >
                            <x-card-header> تراکنشات انجام شده   {{$user->first_name}} {{$user->last_name}}</x-card-header>
                            <x-card-body>
                              <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>کدپرداخت</th>
                                            <th>وضعیت</th>
                                            <th>txid</th>
                                            <th>قیمت</th>
                                            <th>تاریخ</th>
                                        </tr>
                                        </thead>
                                            <tbody>
                                         @foreach($transaction as $item)
                                            <tr>
                                                <td>{{ $item->transaction }}</td>
                                                <td>@if($item->status=='paid') <p style="color:green; font-weight:800;">پرداخت موفق</p> @else <p style="color:red; font-weight:800;">پرداخت نشده</p> @endif</td>
                                                <td>{{ $item->cart_number }}</td>
                                                <td>{{ $item->amount }}</td>
                                                <td>{{ Facades\Verta::instance($item->created_at)->format('Y/n/j')}}</td>  
                                            </tr>
                                         @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>کدپرداخت</th>
                                                <th>وضعیت</th>
                                                <th>txid</th>
                                                <th>قیمت</th>
                                                <th>تاریخ</th>
                                            </tr>
                                    </tfoot>
                                  </table>
                              </div>    
                            </x-card-body>
                            <x-card-footer>
                            </x-card-footer>
                          </x-card>  
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
