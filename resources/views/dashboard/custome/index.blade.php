@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.customer.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.customer.index" />
@endsection
@section('content')
    <div class="container">
        <x-session-alerts></x-session-alerts>
            <x-card type="success">
                <x-card-header>
                    <div class="text-center"> محصولات خریداری شده کاربر</div>
                </x-card-header>

                <x-card-body>
                </x-card-body>

                <x-card-footer>
                    <a href="" class="btn btn-outline-primary">مشاهده تمامی محصولات سایت</a>
                </x-card-footer>
            </x-card>
    </div>
@endsection
