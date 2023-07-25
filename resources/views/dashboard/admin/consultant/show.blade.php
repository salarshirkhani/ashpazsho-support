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
                    <div class="text-center">{{$post->name}}</div>
                </x-card-header>

                <x-card-body>
                    <p>توسط:{{$post->title}}</p>
                    <p>آدرس ایمیل:{{$post->email}}</p>
                    <p>شماره تماس:{{$post->number}}</p>
                    <p>شهر :{{$post->city}}</p>
                    <p>سن :{{$post->age}}</p>
                    <p>جنسیت :{{$post->sex}}</p>
                    <p>شرح مختصر :{{$post->explain}}</p>
                    <p>متن سوال:</p>
                    {{$post->description}}
                    <br>
                    <p style="margin-top:10px; font-size:17px">پاسخ خود را در کادر زیر وارد کنید:</p>
                    <form style="padding:10px;" action="{{ route('dashboard.admin.consultant.answer', $post->id) }}" method="post" role="form" class="form-horizontal " >
                        <input type="hidden" style="margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control"  name="id" value="{{ $post->id }}" >
                        <textarea type="text" style="border:1px solid blue; padding:10px; margin: 10px 0px 16px 0px; height: 140px; border-radius: 7px; font-size: 16px;"class="form-control" required name="answer"  placeholder="پاسخ مشاور در اینجا تایپ شود">{{$post->answer}}</textarea>
                </x-card-body>
                @csrf
                <x-card-footer>
                    <button type="submit" class="btn btn-outline-primary">ارسال پاسخ</button></form>
                </x-card-footer>
            </x-card>
    </div>
@endsection
