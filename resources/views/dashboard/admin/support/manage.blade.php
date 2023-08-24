@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('hierarchy')
<x-breadcrumb-item title="داشبورد" route="dashboard.admin.index" />
<x-breadcrumb-item title="پشتیبانی" route="dashboard.admin.support.manage" />
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
            <x-card-header>پشتیبانی</x-card-header>
                <x-card-body>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>نام چت</th>
                                <th>وضعیت</th>
                                <th>لینک</th>
                                <th>ویرایش</th>
                                <th>نمایش</th>
                            </tr>
                            </thead>
                                <tbody>
                             @foreach($support as $item)
                                <tr>
                                    <td>{{ $item->id}}</td>
                                    <td>{{ $item->subject }}</td>
                                    <td>
                                        @if($item->status == 'open')<p style="color:green">فعال</p>@endif
                                        @if($item->status == 'closed')<p style="color:red">غیرفعال</p>@endif        
                                    </td>
                                    <td>{{ $item->slug }}</td>
                                    <td>
                                        <a href="{{route('dashboard.admin.support.updatepost',['id'=>$item->id])}}" class="edit_post" target="_blank"><i class="fas fa-edit"></i></a>
                                    </td>
                                    <td><a href="{{route('dashboard.admin.support.show',['id'=>$item->id])}}" class="btn btn-block bg-gradient-primary btn-sm">نمایش</a></td>
                                </tr>
                             @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>نام چت</th>
                                    <th>وضعیت</th>
                                    <th>لینک</th>
                                    <th>ویرایش</th>
                                    <th>نمایش</th>
                                </tr>
                                </tfoot>
                        </table>
                    </div>
                    </x-card-body>
                <x-card-footer>
                    <a href="{{route('dashboard.admin.support.create')}}" class="btn btn-success">ثبت گروه جدید</a>
                </x-card-footer>      
        </x-card>
    </div>
    @endsection