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
          <h3 class="pagetitle">تجربه درمان</h3>
        </div>
      </div>
    </div>
    <h3 class="latesttitle">مشاهده   <b>تجربیات شما</b></h3>
    <div class="container">
      <div class="shopholder">
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

                  </tfoot>
          </table>
      </div>
      </div>



      <div class="latestfoot">
        <a href="{{route('dashboard.customer.response.create')}}" style=" margin: 20px 0px; width: 100%;font-size: 20px; background: #00eaff;"  class="checkout-button">ثبت تجربه جدید</a>

      </div>
    </div>
  </div>
    @include('dashboard.customer.sidebar')
@endsection
