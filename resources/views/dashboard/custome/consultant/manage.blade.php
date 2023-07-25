@extends('layouts.dashboard')
@section('sidebar')
@include('dashboard.customer.sidebar')
@endsection
@section('hierarchy')
<x-breadcrumb-item title="داشبورد" route="dashboard.customer.index" />
<x-breadcrumb-item title="درخواست های مشاوره" route="dashboard.customer.consultant.manage" />
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
                                <th>توضیح کوتاه</th>
                                <th>پاسخ مشاور</th>                              
                                <th>مشاهده</th>
                            </tr>
                            </thead>
                                <tbody>
                             @foreach($posts as $item)
                                <tr>
                                    <td>{{ $item->title }}</td>
                                    <td>{!! \Illuminate\Support\Str::limit( $item->description, 100, ' ...') !!}</td>
                                    <td>
                                        @if ($item->answer==NULL)
                                        <p style="color:red; text-shadow:0px 2px 10px;">پاسخی داده نشده است</p>   
                                        @else
                                        <p style="color:green; text-shadow:0px 2px 10px;">مشاور پاسخ داده است</p>                                              
                                        @endif
                                    </td>
                                    <td>
                                    <a href="{{route('dashboard.customer.consultant.show',['id'=>$item->id])}}" class="edit_post" target="_blank"><i class="fas fa-edit"></i></a>
                                    </td>
                                </tr>
                             @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>عنوان</th>
                                    <th>توضیح کوتاه</th>   
                                    <th>پاسخ مشاور</th>                             
                                    <th>مشاهده</th>
                                </tr>
                                </tfoot>
                        </table>
                    </div>
                    </x-card-body>
                <x-card-footer>
                    <a href="{{route('dashboard.customer.consultant.create')}}" class="btn btn-success">ثبت درخواست جدید</a>
                </x-card-footer>      
        </x-card>
    </div>
    @endsection