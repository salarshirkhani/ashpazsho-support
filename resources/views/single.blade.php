@extends('layouts.frontt')
@section('content')
<link rel="stylesheet" href="{{asset('style/single/single-des.css')}}" media="only screen and (min-width: 993px)">
<link rel="stylesheet" href="{{asset('style/single/single-mobile.css')}}      <div class="container" style="padding-bottom: 80px;">
<div class="container" style="padding-bottom: 80px;">
    <div class="row">
        <div class="col-lg-9 col-md-12 col-12">
        @if(Session::has('info'))
            <div class="row">
                <div class="col-md-12">
                    <p class="alert alert-info">{{ Session::get('info') }}</p>
                </div>
            </div>
        @endif
        <div class="blogorg">
            <p class="authorname">نویسنده: {{$item->writer}} </p>
            <p class="blogdate" style="color: gray;">{!! Facades\Verta::instance($item->created_at)->formatDate() !!}</p>
            <h3>{{$item->title}}</h3>
            <img src="{{ asset('images/'.$item['pic'].'/'.$item['pic'] ) }}" alt="{{$item->title}}">
            <div class="blogtext">
                
                @isset($item->iframe)
                {!! $item->iframe !!}
                @endisset
                {!!$item->content!!}
            </div>
            <span>
            @foreach($tags as $tag)
                <p class="signle-tag" onclick="document.getElementById('{{$tag->id}}').submit();">{{$tag->name}}</p>, 
                <form action="#" id="{{$tag->id}}">
                    <input type="hidden" name="q" value="{{$tag->name}}">
                </form>
            @endforeach 
            </span>
        </div>
        <div class="prodtabcontent" style="display: block;">
          <h3>نظرات کاربران</h3>
            <div class="addcomment">
                <form action="{{route('comment')}}" method="POST">
                  @csrf 
                  <input type="hidden" name="post_id" value ="{{$item->id}}" >
                  @if(Auth::check())
                     <input type="hidden" name="user_id" value="{{Auth::user()->id}}"> 
                  @endif
                 <div class="row">
                      <div class="col-md-6">
                          <div class="namepl">
                              <label for="mail">ایمیل</label>
                              <input type="email" name="email" id="mail">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="namepl">
                              <label for="firstname">نام و نام خانوادگی</label>
                              @if(Auth::check())
                              <input type="text" name="name" value="{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}" id="firstname" required="">
                              @else
                              <input type="text" name="name"  id="firstname" required="خالی نباشد">
                              @endif
                            </div>
                      </div>
                  </div>
                  <div class="col-md-12">
                      <div class="commentpl">
                          <label for="yourcomment">دیدگاه شما</label><br>
                          <textarea id="yourcomment" name="content" rows="4" required=""></textarea>
                      </div>
                  </div>
                  <div class="col-md-4">

                  </div>
                  <div class="col-md-12">
                      <input type="submit" value="فرستادن دیدگاه">
                  </div>
                </form>
          </div>
        </div>            
    </div>
    <div class="col-lg-3 col-md-12 col-12">
        <div class="side-3" style="margin-top: 70px;">
            <div class="sidehead">
              <h4>محتوای مرتبط</h4>
            </div>
            <div class="sidebody">
            <style>
             .side-3 .sidebody ul li{
                margin: 10px;
                font-size: 14px;
                font-family: 'iranyekan';
                font-weight: 800;
             }

             .side-3 .sidebody ul li a:hover{
                color: #0f9453;
             }
            </style>
              <ul>
                @foreach($related_posts as $post)
                    <li><a href="{{route('single',['id'=>$post->slug])}}">{!! \Illuminate\Support\Str::limit($post->title, 80, ' ...') !!}</a></li>
                @endforeach
              </ul>
            </div>
          </div>
      </div>
</div>
</div>

@endsection