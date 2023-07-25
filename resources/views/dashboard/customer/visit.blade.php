@extends('layouts.panel')
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.customer.index" />
@endsection
@section('panel')
<style>
  .form-control{
    margin:10px;
  }
  .shopholder {
    direction: rtl;
    display: block;
    margin-right: auto;
    margin-left: auto;
    overflow-y: hidden;
    overflow-x: hidden;
    width: 100%;
}
</style>
<style>
    .checkout-button{
      text-decoration: none;
      color: inherit;
      margin: 0 20px;
      background-color: #00eaff;
      border: 1px solid transparent;
      padding: 11px 25px;
      border-radius: 5px;
      transition: 0.5s;
      font-weight: 700;
    }
    .checkout-button:hover{
      text-decoration: none;
        color: inherit;
      box-shadow: 1px 1px 20px 0.2px #ffd700b0;
      background: transparent;
      border: 1px solid #00eaff;
    }
  </style>
        <div class="col-md-6">
          <h3 class="pagetitle">مشاهده ویزیت</h3>
        </div>
      </div>
    </div>
    <h3 class="latesttitle">مشاهده ویزیت  <b>{{ Facades\Verta::instance($item->visit_date)->format('Y/n/j')}}</b> </b></h3>
    <div class="container">
      <div class="shopholder">
        <div class="box-body">
            <div style="margin-top:50px;"></div>
            <h3>شرح حال</h3>
            {{$item->description}}
            <div style="margin-top:50px;"></div>
            <h3>اقدامات انجام شده</h3>
            {{ $item->procedure }}
        </div>
      </div>



      <div class="latestfoot">

      </div>
    </div>
  </div>
    @include('dashboard.customer.sidebar')
@endsection
