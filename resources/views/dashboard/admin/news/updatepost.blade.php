@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.admin.index" />
    <x-breadcrumb-item title="ویرایش پست" route="dashboard.admin.news.updatepost" />
@endsection
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
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
            <x-card-header>ویرایش پست ها</x-card-header>
        <form action="{{ route('dashboard.admin.news.updatepost', $post->id) }}" method="post" role="form" style="padding:10px;" class="form-horizontal " enctype="multipart/form-data">
            <input type="hidden" style="margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control"  name="id" value="{{ $post->id }}" >
            <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control"  value="{{ $post->title }}"  name="title"  placeholder="عنوان">   
            <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control" value="{{ $post->slug }}" name="slug"  placeholder="لینک">
            <x-select-group name="category" label="دسته‌بندی" required :model="$model ?? null">
                @isset($post->category)
                 <x-select-item :value="$post->category">{{$post->postcategory->name}}</x-select-item>
                @endisset
                @foreach($categories as $category)
                    <x-select-item :value="$category->id">@if(!empty($category->parent_id))@for($i = 2; $i <= $category->level; $i ++)&nbsp;&nbsp;&nbsp;@endfor&#x2500;&#x251c; @endif{{ $category->name }}</x-select-item>
                @endforeach
            </x-select-group>
            <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control" value="{{ $post->explain }}" name="explain"  placeholder="توضیح کوتاه">
            <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control" value="{{ $post->writer }}" name="writer"  placeholder="نام نویسنده">
            <img src="{{ asset('images/'.$post['pic'].'/'.$post['pic'] ) }}" style="height: 200px; width: 200px;" alt="{{$post->title}}">
            <input type="file" style="margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; width: 100%; font-size: 16px;" class="dropzone" name="img">
            <textarea type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control"  name="content"  placeholder="توضیحات">{!! $post->content !!}</textarea>
            <textarea type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 140px; border-radius: 7px; font-size: 16px;"class="form-control" name="iframe"  placeholder="کد ای فریم در صورت وجود"{!! $post->iframe !!}></textarea>
            <div class="form-group">
                <label>تاریخ انتشار:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                  </div>
                  <input value="{{ $post->show_at }}" name="created_at" type="text" id="date1" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="">
                </div>
                <!-- /.input group -->
            </div>
            <div style="margin-bottom: 50px;"></div>
            <div class="card">
                <div class="card-header" style="background: #b81717; color: #fff;">
                  <h3 class="card-title">گوگل و سئو</h3>
                </div>
            <div class="card-body">
                <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control" required  name="gtitle"  value="{{ $post->gtitle }}" placeholder=" عنوان سئو">       
                <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control" required name="gexplain" value="{{ $post->gexplain }}"  placeholder="توضیح سئو">
            </div>

            <div class="card-footer">
                <div class="row">
                    <div class="col-12 col-md-4 col-lg-3">
                    </div>
                </div>
            </div>

             ]
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
          </script>
                <script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>
                <script type="text/javascript">
                    CKEDITOR.replace('content', {
                    // Load the Farsi interface.
                        language: 'fa'
                    });
                    CKFinder.setupCKEditor(null, 'ckfinder/ckfinder.js');
                </script>
            {{ csrf_field() }}
             <x-card-footer>
                <button type="submit" style=" margin: 20px 0px; height: 42px;width: 100%;font-size: 20px;"  class="btn btn-primary">ارسال</button>
             </x-card-footer>
            <script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>
                <script type="text/javascript">
                    CKEDITOR.replace('content', {
                    // Load the Farsi interface.
                        language: 'fa'
                    });
                    CKFinder.setupCKEditor(null, 'ckfinder/ckfinder.js');
                </script>
            </form>
    </x-card>
    </div>
    @endsection