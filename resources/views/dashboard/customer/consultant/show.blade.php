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
          <h3 class="pagetitle">مشاهده مشاوره</h3>
        </div>
      </div>
    </div>
    <h3 class="latesttitle">مشاهده پاسخ  <b>{{ $item->title }} </b></h3>
    <div class="container">
      <div class="shopholder">
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
      </div>



      <div class="latestfoot">

      </div>
    </div>
  </div>
    @include('dashboard.customer.sidebar')
@endsection
