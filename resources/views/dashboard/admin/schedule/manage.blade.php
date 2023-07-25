@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.admin.index" />
    <x-breadcrumb-item title="مدیریت نوبت ها" route="dashboard.admin.schedule.manage" />
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
            <x-card-header>مدیریت نوبت ها</x-card-header>
                <x-card-body>
                    <div class="box-body">
                        <table id="example" class="table table-bordered table-hover">
                            <thead>
                            <tr>

                                <th>تاریخ</th>
                                <th>دکتر</th>
                                <th>نام بیمار</th>
                                <th>شماره همراه</th>
                                <th>ایمیل</th>
                                <th>حذف</th>
                            </tr>
                            </thead>
                                <tbody>
                             @foreach($posts as $item)
                                <tr>
                                    <td>{{ $item->content }}</td>
                                    <td>{{$item->doctor->first_name}} {{$item->doctor->last_name}}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->mobile }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        <a href="{{route('dashboard.admin.schedule.deletesche',['id'=>$item->id])}}" class="delete_post" ><i class="fa fa-fw fa-eraser"></i></a>
                                    </td>
                                </tr>
                             @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>تاریخ</th>
                                    <th>دکتر</th>
                                    <th>نام بیمار</th>
                                    <th>شماره همراه</th>
                                    <th>ایمیل</th>
                                    <th>حذف</th>
                                </tr>
                                </tfoot>
                        </table>
                    </div>
                    </x-card-body>
                <x-card-footer>
                </x-card-footer>
        </x-card>
    </div>
    @endsection
