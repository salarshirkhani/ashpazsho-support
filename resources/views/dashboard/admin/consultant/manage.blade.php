@extends('layouts.dashboard')
@section('sidebar')
@include('dashboard.admin.sidebar')
@endsection
@section('hierarchy')
<x-breadcrumb-item title="داشبورد" route="dashboard.admin.index" />
<x-breadcrumb-item title="درخواست های مشاوره" route="dashboard.admin.consultant.manage" />
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
            <x-card-header>درخواست ها</x-card-header>
                <x-card-body>
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>عنوان</th>
                                <th>توسط</th>
                                <th>ایمیل</th>
                                <th>توضیح کوتاه</th>
                                <th>پاسخ مشاور</th>                            
                                <th>مشاهده</th>
                                <th>حذف</th>
                            </tr>
                            </thead>
                                <tbody>
                             @foreach($posts as $item)
                                <tr>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{!! \Illuminate\Support\Str::limit( $item->description, 100, ' ...') !!}</td>
                                    <td>{{ $item->answer }}</td>
                                    <td>
                                    <a href="{{route('dashboard.admin.consultant.show',['id'=>$item->id])}}" class="edit_post" target="_blank"><i class="fas fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <a href="{{route('dashboard.admin.consultant.deleteconsultant',['id'=>$item->id])}}" class="delete_post" ><i class="fa fa-fw fa-eraser"></i></a>                 
                                    </td>
                                </tr>
                             @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>عنوان</th>
                                    <th>توسط</th>
                                    <th>ایمیل</th>
                                    <th>توضیح کوتاه</th> 
                                    <th>پاسخ مشاور</th>                                  
                                    <th>مشاهده</th>
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