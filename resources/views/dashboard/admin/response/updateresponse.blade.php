@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.admin.index" />
    <x-breadcrumb-item title="ویرایش تجربه" route="dashboard.admin.response.updateresponse" />
@endsection
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
@section('content')
    @if(Session::has('info'))
    <div class="row">
        <div class="col-md-12">
            <p class="alert alert-info">{{ Session::get('info') }}</p>
        </div>
    </div>
@endif
    <div class="col-md-12">
        <x-card type="info">
            <x-card-header>ویرایش تجربه ها</x-card-header>
            <div style="padding:15px">
            <p>کاربر :{{$post->for->first_name}} {{$post->for->last_name}}</p>
            <p>شماره تماس :{{$post->for->mobile}}</p>
            </div>
        <form action="{{ route('dashboard.admin.response.updateresponse', $post->id) }}" method="post" role="form" class="form-horizontal " enctype="multipart/form-data" style="padding:10px;">
            <input type="hidden" style="margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control"  name="id" value="{{ $post->id }}" >
            <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control" value="{{ $post->title }}" name="title"  placeholder="عنوان">
            <textarea type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control" row='8' value="{{ $post->content }}" name="content"  placeholder="توضیحات">{{ $post->content }}</textarea>
            @isset($post->pic)
            عکس ارسالی
            <img src="{{ asset('images/'.$post['pic'].'/'.$post['pic'] ) }}" style="width:250px; height:250px; padding:20px;">
            @endisset
            @isset($post->file)
            <p>فایل ارسالی :<a class="btn btn-warning" href="https://iranmedslp.com/file/{{$post->file}}" target="_blank">برای مشاهده کلیک کنید</a></p>
            @endisset
            {{ csrf_field() }}
             <x-card-footer>
                <button type="submit" style=" margin: 20px 0px; height: 42px;width: 100%;font-size: 20px;"  class="btn btn-success">تایید</button>
             </x-card-footer>
            </form>
            <script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>
            <script type="text/javascript">
                CKEDITOR.replace('content', {
                // Load the Farsi interface.
                    language: 'fa'
                });
                CKFinder.setupCKEditor(null, 'ckfinder/ckfinder.js');
            </script>
    </x-card>
    </div>
    @endsection