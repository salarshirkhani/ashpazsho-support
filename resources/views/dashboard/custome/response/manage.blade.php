@extends('layouts.dashboard')
@section('sidebar')
@include('dashboard.customer.sidebar')
@endsection
@section('hierarchy')
<x-breadcrumb-item title="داشبورد" route="dashboard.customer.index" />
<x-breadcrumb-item title="تجربه های ثبت شده" route="dashboard.customer.response.manage" />
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
            <x-card-header>تجربه ها</x-card-header>
                <x-card-body>
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>عنوان</th>
                                <th>متن</th>
                                <th>وضعیت</th>                              
                            </tr>
                            </thead>
                                <tbody>
                             @foreach($posts as $item)
                                <tr>
                                    <td>{{ $item->title }}</td>
                                    <td>{!! \Illuminate\Support\Str::limit( $item->content, 800, ' ...') !!}</td>
                                    <td>
                                        @if ($item->status=='new')
                                        <p style="color:red; text-shadow:0px 2px 10px;">تایید نشده است</p>   
                                        @else
                                        <p style="color:green; text-shadow:0px 2px 10px;">تایید شده است</p>                                              
                                        @endif
                                    </td>
                                </tr>
                             @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>عنوان</th>
                                    <th>متن</th>
                                    <th>وضعیت</th>      
                                </tr>
                                </tfoot>
                        </table>
                    </div>
                    </x-card-body>
                <x-card-footer>
                    <a href="{{route('dashboard.customer.response.create')}}" class="btn btn-success">ثبت درخواست جدید</a>
                </x-card-footer>      
        </x-card>
    </div>
    @endsection