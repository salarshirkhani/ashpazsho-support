@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.customer.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.customer.index" />
    <x-breadcrumb-item title=" ثبت نظر" route="dashboard.customer.response.manage" />
@endsection
@section('content')
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
تیم ایران مد اس ال پی پذیرای نظرات شما است . لطفا نظرات خود را به صورت دقیق در این بخش بنویسید

    <div class="col-md-12">
        <x-card type="info">
            <x-card-header>ثبت نظر</x-card-header>
        <form style="padding:10px;" action="{{ route('dashboard.customer.response.create') }}" method="post" role="form" class="form-horizontal " enctype="multipart/form-data">
            <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control" required  name="title"  placeholder="عنوان"> 
            اگر تصویری دارید در بخش زیر بارگذاری کنید           
            <input type="file" style="margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; width: 100%; font-size: 16px;" class="dropzone"  name="img">
            اگر فیلمی دارید در بخش زیر بارگذاری کنید
            <input type="file" style="margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; width: 100%; font-size: 16px;" class="dropzone"  name="file">          
            <textarea type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 140px; border-radius: 7px; font-size: 16px;"class="form-control"  name="content"  placeholder="متن "></textarea>
            {{ csrf_field() }}
             <x-card-footer>
                <button type="submit" style=" margin: 20px 0px; height: 42px;width: 100%;font-size: 20px;"  class="btn btn-primary">ارسال</button>
             </x-card-footer>
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
    </x-card>
    </div>
    @endsection