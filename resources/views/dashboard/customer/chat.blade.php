@extends('layouts.panel')
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.customer.index" />
@endsection
@section('panel') 
<style>
.direct-chat-msg {
    margin-bottom: 10px;
    clear: both;
}
.direct-chat-primary .right > .direct-chat-text {
    color: #ffffff;
    float: right;
    text-align: right;
}
.right .direct-chat-text::after, .right .direct-chat-text::before {
    border-right-color: #d2d6de;
    border-left-color: transparent;
    left: 92%;
    right: auto;
}
.right .direct-chat-img {
    float: right;
    width: 15%;
}
.direct-chat-img {
    width: 15%;
    float: left;
}
.btn-primary {
    color: #fff;
    background-color: #6bc296;
    border-color: #ced4da;
}
.direct-chat-primary .right > .direct-chat-text::after, .direct-chat-primary .right > .direct-chat-text::before {
    border-right-color: #5d6bae;
}

</style>
<section class="main-bar col-xl-9 col-12" style="padding: 0% 4%;">
    <!-- dashbord site ba-hm -->
    <div class="section-dsh row main-bar disflex col-xl-12 col-12" >
        <div class="col-xl-8 col-5" >
            <h1>چت با پشتیبانی</h1>
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
    <div class="main-bar col-xl-12 col-12">
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

<div class="grayBlueBg">
    <div class="card direct-chat direct-chat-primary">
        <div class="card-header ui-sortable-handle" style="cursor: default;">
          <h3 class="card-title">چت</h3>
        </div>
        <div class="card-body">
<div class="card-body">
    <div class="direct-chat-messages">

      @foreach ($chats as $chats)

       @if ($chats->sender_id == Auth::user()->id)
        <div class="direct-chat-msg right" style="float:right">
            <div class="direct-chat-infos clearfix">
              <span class="direct-chat-name float-right">{{$chats->user->name}}</span>
              <span class="direct-chat-timestamp float-right">{{ Facades\Verta::instance($chats->created_at)->format('Y/n/j')}}</span>
            </div>
            <div class="direct-chat-text" style="background: #5d6bae; border: 1px solid #ced4da; color: #fff;word-break: break-word;padding: 5px;">
              {{$chats->content}}
            </div>
          </div>
       @else
       <div class="direct-chat-msg" style="float:left">
        <div class="direct-chat-infos clearfix">
          <span class="direct-chat-name float-left">{{$chats->user->name}}</span>
          <span class="direct-chat-timestamp float-right">{{ Facades\Verta::instance($chats->created_at)->format('Y/n/j')}}</span>
        </div>
        <div class="direct-chat-text">
          {{$chats->content}}
        </div>
      </div>
       @endif

      @endforeach

    </div>
    <div class="direct-chat-contacts">


    </div>
  </div>
  <div class="card-footer">
    <form action="{{route('dashboard.customer.send')}}" method="post">
      <div class="input-group">
        <input type="hidden" name="sender_id" value="{{Auth::user()->id}}">
        <input type="hidden" name="support_id" value="{{$chats->support_id}}">
        @csrf
        <input type="text" name="content" name="message" required placeholder="پیام خود را بنویسید" class="form-control">
        <span class="input-group-append">
          <button type="submit" class="btn btn-primary">ارسال</button>
        </span>
      </div>
    </form>
  </div>
  <!-- /.card-footer-->
</div>
</div>
@endsection
