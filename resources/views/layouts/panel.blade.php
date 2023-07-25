<!DOCTYPE html>
<html lang="fa_IR">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('panel/css/main.css') }}">
    <script src="{{ asset('assets/dashboard/plugins/chart.js/Chart.min.js')}}"></script>
    <title>پنل کاربری</title>
  </head>
<body>
<style>
.panel-side {
    right: 0;
    width: 22%;
}
p{
  font-weight: 800;
}
label{
  font-weight: 800;
}
</style>
  <!-- Add your site or application content here -->
  <div class="container-fluid">
    <div class="row">

      <div class="col-md-9">
        <div class="panel-head">
          <div class="row">
            <div class="col-md-6">
              <div class="userpart">
                  <div class="userdet">
                    <div class="teacher">
                      @isset(Auth::user()->pic)
                      <img src="{{ asset('images/'.Auth::user()->pic.'/'.Auth::user()->pic ) }}" style="border-radius:50px;" alt="">
                      @else
                      <img src="{{asset('assets/dashboard/img/user2-160x160.jpg') }}" style="border-radius:50px;" alt="">
                      @endisset
                      <div class="teachername">
                          @if(Auth::user()->type=='buyer' )
                              <p>کاربر عادی</p>
                          @endif
                          @if(Auth::user()->type=='operator' )
                          <p>پزشک</p>
                          @endif
                        <h6><b>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</b></h6>
                      </div>
                  </div>
                  </div>
                </div>
            </div>     
        @yield('panel')

    </div>
</div>
<script src="{{ asset('panel/js/vendor/modernizr-3.11.2.min.js') }}"></script>
<script src="{{ asset('panel/js/plugins.js') }}"></script>
<script src="{{ asset('panel/js/main.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
<script>
  window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
  ga('create', 'UA-XXXXX-Y', 'auto'); ga('set', 'anonymizeIp', true); ga('set', 'transport', 'beacon'); ga('send', 'pageview')
</script>
<script src="https://www.google-analytics.com/analytics.js" async></script>
</body>

</html>