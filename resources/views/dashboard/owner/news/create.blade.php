@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.owner.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.owner.index" />
    <x-breadcrumb-item title="افزودن اخبار" route="dashboard.owner.news.create" />
@endsection
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
    @if(Session::has('info'))
    <div class="row">
        <div class="col-md-12">
            <p class="alert alert-info">{{ Session::get('info') }}</p>
        </div>
    </div>
@endif
    <div class="col-md-12">
        <x-card type="info">
            <x-card-header>بلاگ</x-card-header>
        <form style="padding:10px;" action="{{ route('dashboard.owner.news.create') }}" method="post" role="form" class="form-horizontal " enctype="multipart/form-data">
            <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control" required  name="title"  placeholder="عنوان">       
            <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control"   name="slug"  placeholder="لینک">                   
            <x-select-group name="category" label="دسته‌بندی" required :model="$model ?? null">
                @foreach($categories as $category)
                    <x-select-item :value="$category->id">@if(!empty($category->parent_id))@for($i = 2; $i <= $category->level; $i ++)&nbsp;&nbsp;&nbsp;@endfor&#x2500;&#x251c; @endif{{ $category->name }}</x-select-item>
                @endforeach
            </x-select-group>
            <textarea type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 140px; border-radius: 7px; font-size: 16px;"class="form-control" name="iframe"  placeholder="کد ای فریم در صورت وجود"></textarea>
            <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control" required name="explain"  placeholder="توضیح کوتاه">
            <textarea type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 140px; border-radius: 7px; font-size: 16px;"class="form-control" required name="content"  placeholder="محتوا"></textarea>
            <input type="hidden" name="writer" value="{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}">
            <input type="file" style="margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; width: 100%; font-size: 16px;" class="dropzone" required name="img">
            <div style="margin-top:40px;"></div>
            <div class="form-group">
                <label>تاریخ انتشار:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                  </div>
                  <input required name="created_at" type="text" id="date1" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="">
                </div>
                <!-- /.input group -->
            </div>
            <div class="form-group">
                <label>برچسب ها</label>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>نام برچسب</th>
                    </tr>
                    </thead>
                    <tbody id="tag">
                    @if(old('tags'))
                        @foreach(old('tags') as $idx => $tag)
                            @if(!empty($tag['key']) || !empty($tag['value']))
                                @include('dashboard.admin.product.tag-item', [
                                    'idx' => $idx,
                                    'name' => $tag['name'],
                                ])
                            @endif
                        @endforeach
                    @elseif(!empty($model))
                        @foreach($model->tags as $tag)
                            @include('dashboard.admin.product.tag-item', ['tag' => $tag])
                        @endforeach
                    @endif
                    </tbody>
                    <tfoot>
                    <tr>
                    <td colspan="3">
                        <button id="add-tag" type="button" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></button>
                    </td>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <div style="margin-bottom: 50px;"></div>
            <div class="card">
                <div class="card-header" style="background: #b81717; color: #fff;">
                  <h3 class="card-title">گوگل و سئو</h3>
                </div>
            <div class="card-body">
                <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control" required  name="gtitle"  placeholder=" عنوان سئو">       
                <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control" required name="gexplain"  placeholder="توضیح سئو">
            </div>

            <div class="card-footer">
                <div class="row">
                    <div class="col-12 col-md-4 col-lg-3">
                    </div>
                </div>
            </div>

             <!-- /.card-body -->
             </div>
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
          <script>
                document.addEventListener("DOMContentLoaded", function () {
                    let field = `@include('dashboard.admin.news.tag-item', ['tag' => null])`;
                    let idx = $("#tag tr").length + 1;
                    $('#add-tag').click(function () {
                        $("#tag").append(field.replace(/IDX/g, idx.toString()));
                        updateListeners();
                        idx ++;
                    });
                    function onRemove() {
                        $(this).closest('tr').remove();
                    }
                    function updateListeners() {
                        $('.btn-remove-tag').click(onRemove);
                    }
                });

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
            </form>
    </x-card>
    </div>
    @endsection