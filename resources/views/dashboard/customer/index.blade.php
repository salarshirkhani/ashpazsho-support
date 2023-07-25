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
    overflow-y: auto;
    width: 100%;
}
.shopholder table td {
    background-color: white;
    width: 20%;
    padding: 18px 0px;
    font-size: 22px;
    vertical-align: middle;
    border: none;
}
.shopholder table th {
    background-color: white;
    width: 20%;
    padding: 17px 0px;
    font-size: 18px;
    vertical-align: middle;
    border: none;
}
.shopholder tbody::before {
    content: "";
    display: block;
    color: transparent;
    height: 0px;
}
.accordion {
    background-color: #b2d1eb;
    color: #00f;
    border: 1px solid #00f;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    text-align: right;
    outline: none;
    font-weight: 800;
    font-size: 23px;
    transition: 0.4s;
}

.active, .accordion:hover {
  background-color: #b2d1eb;
}

.panel {
  padding: 0 18px;
  background-color: white;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
}
.accordion:after {
    content: '\02795';
    font-size: 13px;
    color: #00f;
    float: left;
    margin-top: 10px;
    margin-left: 5px;
}

.accordion.active:after {
  content: "\2796"; /* Unicode character for "minus" sign (-) */
}
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
<?php $i=0;?>
        <div class="col-md-6">
          <h3 class="pagetitle">اطلاعات بیمار</h3>
        </div>
      </div>
    </div>
    <h3 class="latesttitle">پرونده <b>الکترونیکی</b></h3>
    <div class="container">
      <div class="latestlist">
        <div class="chartbar">
            <div class="chartshead">
              <div class="tab">
                <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen" onload="openfirst()">نمودار روند درمانی بیمار</button>

              </div>
             </div>
          
          <div id="London" class="tabcontent">
            <canvas id="bar-chartt" width="300" height="150"></canvas>  
          </div>
          
        </div> 
        <script>
          document.getElementById("defaultOpen").click();
          Chart.defaults.global.defaultFontFamily ='kalameh',
          new Chart(document.getElementById("bar-chartt"), {
              type: 'line',
              data: {
                fill:false,
                labels: [<?php foreach($visits as $item){ $i++;
                       echo $i.',' ; 
                     } ?>],
                datasets: [
                  {
                    label: "مراجعه بیمار",
                    backgroundColor: "#0040ff4f",
                    borderColor:"blue",
                    data: [<?php foreach($visits as $item){
                       echo $item['percentage'].',' ; 
                     }?>],
                  },
                  
                ]
              },
              options: {
                legend: { display: false },
                title: {
                  display: true,
                },
           
                scales: {
                      yAxes: [{
                          ticks: {
                              beginAtZero:true
                          }
                      }]
                  }
           
              }
           
           
          });
        </script>
        
      </div>

      <div class="shopholder">
        <div style="margin-top:50px;"></div>
        <button class="accordion">ویزیت ها</button>
        <div class="panel">
            <h3>ویزیت ها</h3>
            <table id="example2" class="table table-bordered table-hover">
                        <thead>
                                <tr>
                                    <th>تاریخ</th>
                                    <th></th>
                                </tr>
                        </thead>
                        <tbody>
                                 @foreach($visits as $item)
                                    <tr>
                                        <td>{{ Facades\Verta::instance($item->visit_date)->format('Y/n/j')}}</td>
                                        <td><a href="{{route('dashboard.customer.visit.show',['id'=>$item->id])}}"  style=" margin: 20px 0px; height: 42px;width: 100%;font-size: 20px; background: #00eaff;"  class="checkout-button" target="_blank">مشاهده</a></td>
                                    </tr>
                                 @endforeach
                        </tbody>
                        <tfoot>

                        </tfoot>
            </table>
         </div>
 
        <button class="accordion">اطلاعات عمومی بیمار</button>
            <div class="panel">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="email">ایمیل</label>
                            <input type="text" class="form-control"  name="email" value="{{ Auth::user()->email }}" readonly placeholder="ایمیل">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="title">نام شما</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}" name="title" placeholder="نام شما" readonly>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="city">شهر</label>
                            <input type="text" class="form-control" name="city" readonly  placeholder="شهر">
                        </div>
                    </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                            <label for="sex">جنسیت</label>
                            <input type="text" class="form-control"  name="sex" readonly value="{{ Auth::user()->sex }}" placeholder="جنسیت">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="age">سن بیمار</label>
                            <input type="text" class="form-control"  name="age" readonly value="{{ Auth::user()->age }}" placeholder="سن بیمار">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="number">شماره همراه</label>
                            <input type="text" class="form-control" readonly name="number" value="{{ Auth::user()->number }}" placeholder="شماره همراه شما" >
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="height">قد حدودی</label>
                            <input type="text" class="form-control" readonly name="height" value="{{ Auth::user()->height }}"  placeholder="قد حدودی">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="weight">وزن حدودی</label>
                            <input type="text" class="form-control" readonly name="weight" value="{{ Auth::user()->weight }}"  placeholder="وزن حدودی">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="lang">زبان</label>
                            <input type="text" class="form-control" readonly name="lang" value="{{ Auth::user()->lang }}"  placeholder="زبان">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="job">شفل</label>
                            <input type="text" class="form-control" readonly name="job" value="{{ Auth::user()->job }}"  placeholder="شفل">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="doctor">نام پزشک معالج</label>
                            <input type="text" class="form-control" readonly name="doctor"  value="{{ Auth::user()->doctor }}" placeholder="نام پزشک معالج">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="address">آدرس</label>
                            <textarea class="form-control" row="6" name="address" readonly style="height:100px" value="{{ Auth::user()->address }}" placeholder="آدرس">{{ Auth::user()->address }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            
        <button class="accordion">اطلاعات تخصصی بیمار</button>
            <div class="panel">
                <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                         <label for="diagnose">تشخیص پزشکی</label>
                        <input type="text" class="form-control"  name="diagnose" readonly value="{{ Auth::user()->diagnose }}" placeholder="تشخیص پزشکی">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                         <label for="slp">تشخیص اس ال پی</label>
                        <input type="text" class="form-control"  name="slp" readonly value="{{ Auth::user()->slp }}"  placeholder="تشخیص اس ال پی">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                         <label for="history">تاریخچه پزشکی</label>
                        <textarea class="form-control" name="history" readonly value="{{ Auth::user()->history }}" placeholder="تاریخچه پزشکی">{{ Auth::user()->history }}</textarea>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="doc_dig">تاریخچه درمانی</label>
                        <textarea class="form-control" name="doc_dig" readonly value="{{ Auth::user()->doc_dig }}" placeholder="تاریخچه درمانی">{{ Auth::user()->doc_dig }}</textarea>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="drugs">داروهای مصرفی فعلی بیمار</label>
                        <textarea class="form-control" name="drugs" readonly value="{{ Auth::user()->drugs }}" placeholder="داروهای مصرفی فعلی بیمار">{{ Auth::user()->drugs }}</textarea>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="information">اطلاعات ارزیابی اولیه بیمار</label>
                        <textarea class="form-control" name="information" readonly value="{{ Auth::user()->information }}" placeholder="اطلاعات ارزیابی سطح پایه (اولیه) بیمار">{{ Auth::user()->information }}</textarea>
                    </div>
                </div>
                @isset(Auth::user()->flie_clinic)
                <p>فایل ارسالی :<a class="btn btn-warning" href="https://iranmedslp.com/file/{{Auth::user()->flie_clinic}}/{{Auth::user()->flie_clinic}}" target="_blank">برای مشاهده اطلاعات پاراکلینیک بیمار کلیک کنید</a></p>
                @endisset
                @isset(Auth::user()->file_slp)
                <p>فایل ارسالی :<a class="btn btn-warning" href="https://iranmedslp.com/file/{{Auth::user()->file_slp}}/{{Auth::user()->file_slp}}" target="_blank">برای مشاهده اطلاعات پاراکلینیک Iran-Med-Slp کلیک کنید</a></p>
                @endisset
            </div>
        </div>

      </div>



      <div class="latestfoot">

      </div>
    </div>
  </div>
    <script>
    var acc = document.getElementsByClassName("accordion");
    var i;
    
    for (i = 0; i < acc.length; i++) {
      acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.maxHeight) {
          panel.style.maxHeight = null;
        } else {
          panel.style.maxHeight = panel.scrollHeight + "px";
        } 
      });
    }
    </script>
    @include('dashboard.customer.sidebar')
@endsection
