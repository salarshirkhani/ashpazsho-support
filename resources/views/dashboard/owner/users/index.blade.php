@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.owner.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.owner.index" />
    <x-breadcrumb-item title="مدیریت کاربر ها" route="dashboard.owner.users.index" />
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
            <x-card-header>مدیریت کاربر ها</x-card-header>
                <x-card-body>
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>تصویر</th>
                                <th>نام و نام خانوادگی</th>
                                <th>شماره موبایل</th>
                                <th>ایمیل</th>
                                <th>تاریخ تولد</th>
                                <th>پرونده الکترونیکی</th>    
                            </tr>
                            </thead>
                                <tbody>
                             @foreach($user as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td><img src="{{ asset('images/'.$item['pic'].'/'.$item['pic'] ) }}" alt="" style="width:100px; height:100px; border-radius: 70px;"></td>
                                    <td>{{ $item->first_name }} {{$item->last_name}}</td>
                                    <td>{{ $item->mobile }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ Facades\Verta::instance($item->birthdate)->format('Y/n/j')}}</td>  
                                    <td>
                                        <a href="{{route('dashboard.owner.users.parvande',['id'=>$item->id])}}" class="btn btn-info">پرونده الکترونیکی</a>
                                    </td>
                                </tr>
                             @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>تصویر</th>
                                    <th>نام و نام خانوادگی</th>
                                    <th>شماره موبایل</th>
                                    <th>ایمیل</th>
                                    <th>تاریخ تولد</th>
                                    <th>پرونده الکترونیکی</th>    
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