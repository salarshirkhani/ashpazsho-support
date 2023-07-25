@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.admin.index" />
@endsection
@section('content')
    <div class="container">
        <x-session-alerts></x-session-alerts>
            <x-card type="success">
                <x-card-header>
                    <div class="text-center">{{$post->title}}</div>
                </x-card-header>

                <x-card-body>
                    <p>توسط:{{$post->name}}</p>
                    <p>آدرس ایمیل:{{$post->email}}</p>
                    <p>شماره تماس:{{$post->number}}</p>
                    <p>شهر :{{$post->city}}</p>
                    <p>سن :{{$post->age}}</p>
                    <p>جنسیت :{{$post->sex}}</p>
                    <p>شرح مختصر :{{$post->explain}}</p>
                    @isset($post->file)
                    <p>فایل ارسالی :<a class="btn btn-warning" href="https://iranmedslp.com/file/{{$post->file}}" target="_blank">برای مشاهده کلیک کنید</a></p>
                    @endisset
                    <p>متن درخواست:</p>
                    {{$post->description}}
                    <br>
                </x-card-body>
                
                <x-card-footer>
                </x-card-footer>
            </x-card>
    </div>
@endsection
