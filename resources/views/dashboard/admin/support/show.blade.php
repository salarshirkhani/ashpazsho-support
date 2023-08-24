@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('hierarchy')
<x-breadcrumb-item title="داشبورد" route="dashboard.admin.index" />
<x-breadcrumb-item title="چت با کاربر" route="dashboard.admin.support.show" />
@endsection
@section('content')
    @if(Session::has('info'))
    <div class="row">
        <div class="col-md-12">
            <p class="alert alert-info">{{ Session::get('info') }}</p>
        </div>
    </div>
@endif
<div class="col-md-12">
    <div class="card-body" style="background:white">
        <div class="card-body">
            <div class="direct-chat-messages">
        
              @foreach ($chats as $chats)
        
               @if ($chats->sender_id == Auth::user()->id)
                <div class="direct-chat-msg right">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-right">{{$chats->user->last_name}}</span>
                      <span class="direct-chat-timestamp float-left">{{$chats->created_at}}</span>
                    </div>
                    <img class="direct-chat-img" src="{{ asset('assets/dashboard/img/user2-160x160.jpg') }}" alt="message user image">
                    <div class="direct-chat-text" style="background: #3e7eff;border: 1px solid #1060ff; color: #fff;">
                      {{$chats->content}}
                    </div>
                  </div>
               @else
               <div class="direct-chat-msg">
                <div class="direct-chat-infos clearfix">
                  <span class="direct-chat-name float-left">{{$chats->user->last_name}}</span>
                  <span class="direct-chat-timestamp float-right">{{$chats->created_at}}</span>
                </div>
                <img class="direct-chat-img" src="{{ asset('assets/dashboard/img/user2-160x160.jpg') }}" alt="message user image">
                <div class="direct-chat-text">
                  {{$chats->content}}
                </div>
              </div>
               @endif
        
              @endforeach
        
            </div>
          </div>
          <div class="card-footer">
            <form action="{{route('dashboard.admin.support.send')}}" method="post">
              <div class="input-group">
                <input type="hidden" name="sender_id" value="{{Auth::user()->id}}">
                <input type="hidden" name="support_id" value="{{$chats->support_id}}">
                @csrf
                <input type="text" name="content" placeholder="پیامی بنویسید..." class="form-control">
                <span class="input-group-append">
                  <button type="submit" class="btn btn-primary">ارسال</button>
                </span>
              </div>
            </form>
          </div>

        </div>

</div>
          <form action="{{route('dashboard.admin.support.closechat')}}" style="margin:20px; padding:10px;" method="post">
             <div class="input-group">
                <input type="hidden" name="support_id" value="{{$chats->support_id}}">
                @csrf
                <span class="input-group-append">
                  <button type="submit" class="btn btn-danger">بستن گروه</button>
                </span>
             </div>
        </form>

@endsection