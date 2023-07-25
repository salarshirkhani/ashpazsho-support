@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.admin.index"/>
    <x-breadcrumb-item title="تنظیمات سایت" route="dashboard.admin.setting.manage"/>
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
        <x-card type="info">
            <x-card-header>تنظیمات سایت</x-card-header>
            <form style="padding:10px;" action="{{ route('dashboard.admin.setting.manage') }}" method="post" role="form" class="form-horizontal" enctype="multipart/form-data">
   
                  <div class="form-group">
                    <label>تایتل سئو</label>
                    <div class="input-group">
                        <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control" value="{{ $seotitle }}" name="seotitle"  placeholder="عنوان سئو">  
                    </div>
                    <!-- /.input group -->
                </div>
                <div class="form-group">
                    <label>متا دیسکرپشن سئو</label>
                    <div class="input-group">
                        <textarea 
                            type="text" 
                            style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"
                            class="form-control" 
                            value="{!! $metadesciption !!}" 
                            name="metadesciption"  
                            placeholder="توضیحات">{!! $metadesciption !!}</textarea>     
                    </div>
                    <!-- /.input group -->
                </div>
                {{ csrf_field() }}
                <x-card-footer>
                    <button type="submit" style=" margin: 20px 0px; height: 42px;width: 100%;font-size: 20px;"
                            class="btn btn-primary">ارسال
                    </button>
                </x-card-footer>
            </form>
        </x-card>
    </div>
@endsection
