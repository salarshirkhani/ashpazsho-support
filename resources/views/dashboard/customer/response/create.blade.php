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

        <div class="col-md-6">
          <h3 class="pagetitle">تجربه درمان</h3>
        </div>
      </div>
    </div>
    <h3 class="latesttitle">ایجاد <b>تجربه جدید </b></h3>
    <div class="container">
      @if(Session::has('info'))
          <div class="row">
              <div class="col-md-12">
                  <p class="alert alert-info">{{ Session::get('info') }}</p>
              </div>
          </div>
      @endif
      @if ($errors->any())
      @foreach ($errors->all() as $error)
          <div class="col-md-12">
              <p class="alert alert-danger">{{ $error }}</p>
          </div>
      @endforeach
      @endif
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
      <div class="shopholder">
        <form style="padding:10px;" action="{{ route('dashboard.customer.response.create') }}" method="post" role="form" class="form-horizontal " enctype="multipart/form-data">
          <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control" required  name="title"  placeholder="عنوان"> 
          اگر تصویری دارید در بخش زیر بارگذاری کنید           
          <input type="file" style="margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; width: 100%; font-size: 16px;" class="dropzone"  name="img">
          اگر فیلمی دارید در بخش زیر بارگذاری کنید
          <input type="file" style="margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; width: 100%; font-size: 16px;" class="dropzone"  name="file">          
          <textarea type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 140px; border-radius: 7px; font-size: 16px;"class="form-control" required name="content"  placeholder="متن "></textarea>
          {{ csrf_field() }}
          <button type="submit" style=" margin: 20px 0px; height: 42px;width: 100%;font-size: 20px; background: #00eaff;"  class="checkout-button">ارسال</button>      
          </form>
          <script type="text/javascript">
              Dropzone.options.dropzone =
                  {
                      maxFilesize: 12,
                      renameFile: function(img) {
                          var dt = new Date();
                          var time = dt.getTime();
                          return time+img.name;
                      },
                      acceptedFiles: ".jpeg,.jpg,.png,.gif",
                      addRemoveLinks: true,
                      timeout: 500000,
                      success: function(img, response)
                      {
                          console.log(response);
                      },
                      error: function(img, response)
                      {
                          return 1;
                      }
                  };

                  Dropzone.options.dropzone =
                  {
                      maxFilesize: 12,
                      renameFile: function(file) {
                          var dt = new Date();
                          var time = dt.getTime();
                          return time+file.name;
                      },
                      acceptedFiles: ".mp4,.avi,.mpeg,.gif",
                      addRemoveLinks: true,
                      timeout: 500000,
                      success: function(file, response)
                      {
                          console.log(response);
                      },
                      error: function(file, response)
                      {
                          return 1;
                      }
                  };
          </script>
          <script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>
          <script type="text/javascript">
              CKEDITOR.replace('content', {
              // Load the Farsi interface.
                  language: 'fa'
              });
              CKFinder.setupCKEditor(null, 'ckfinder/ckfinder.js');
          </script>
      </div>



      <div class="latestfoot">

      </div>
    </div>
  </div>
    @include('dashboard.customer.sidebar')
@endsection
