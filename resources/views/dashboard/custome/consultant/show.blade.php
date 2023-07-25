@extends('layouts.dashboard')
@section('sidebar')
@include('dashboard.customer.sidebar')
@endsection
@section('hierarchy')
<x-breadcrumb-item title="داشبورد" route="dashboard.customer.index" />
<x-breadcrumb-item title="{{ $item->title }}" route="dashboard.customer.consultant.show" />
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
            <x-card-header>مشاهده پاسخ {{ $item->title }}</x-card-header>
                <x-card-body>
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>درخواست</th>   
                                <th>پاسخ مشاور </th>                                
                            </tr>
                            </thead>
                                <tbody>
                                <tr>
                                    <td>{!! $item->description !!}</td>
                                    <td>{{ $item->answer }}</td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>درخواست</th>   
                                    <th>پاسخ مشاور </th>                                
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