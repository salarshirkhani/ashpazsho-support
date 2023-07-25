@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.admin.index"/>
    <x-breadcrumb-item title="افزودن تاریخ نوبت دهی" route="dashboard.admin.date.create"/>
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
            <x-card-header>ساخت تاریخ نوبت دهی جدید</x-card-header>
            <form style="padding:10px;" action="{{ route('dashboard.admin.date.create') }}" method="post"
                  role="form" class="form-horizontal " enctype="multipart/form-data">
                  <x-select-group name="user_id" label="دکتر" required :model="$model ?? null">
                    @foreach($users as $user)
                    <x-select-item value="{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</x-select-item>
                    @endforeach
                  </x-select-group>    
                  <div class="form-group">
                    <label>تاریخ :</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                      </div>
                      <input id="date1" name="date" type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="">
                    </div>
                    <!-- /.input group -->
                </div>
                <div class="form-group">
                    <label>ساعت شروع:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input name="start_time" type="text" class="form-control mdtimepicker-input">
                    </div>
                    <!-- /.input group -->
                </div>
                <div class="form-group">
                    <label>ساعت پایان:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input name="finish_time" type="text" class="form-control mdtimepicker-input">
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
