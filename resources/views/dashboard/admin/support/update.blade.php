@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.admin.index" />
    <x-breadcrumb-item title="ویرایش گروه " route="dashboard.admin.support.manage" />
@endsection
@section('content')
@if(Session::has('info'))
    <div class="row">
        <div class="col-md-12">
            <p class="alert alert-info">{{ Session::get('info') }}</p>
        </div>
    </div>
@endif
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
    <div class="col-md-12">
        <x-card type="info">
            <x-card-header>ویرایش گروه</x-card-header>
        <form style="padding:10px;" action="{{ route('dashboard.admin.support.update', $post->id) }}" method="post" role="form" class="form-horizontal " enctype="multipart/form-data">
            <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control" required value="{{ $post->subject }}"   name="subject"  placeholder="عنوان">            
            <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control" required value="{{ $post->slug }}"  name="slug"  placeholder="لینک">
            <input type="hidden" value="{{$post->id}}" name="id">
            <select name="status" style="padding:10px; margin: 10px 0px 16px 0px; height: 50px; border-radius: 7px; font-size: 16px;"class="form-control">
                <option value="open">فعال<option>
                <option value="closed">غیرفعال<option>
            </select>   
            <textarea type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 140px; border-radius: 7px; font-size: 16px;"class="form-control" value="{{ $post->description }}"  name="description"  placeholder="محتوا">{{ $post->description }}</textarea>
            <input type="file" style="margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; width: 100%; font-size: 16px;" class="dropzone"  name="img">
            <div style="margin-top:40px;"></div>
            <h3 style="font-size:20px; margin-bottom:25px;">مدیریت کاربران</h3>
            <x-card type="info">
                <x-card-header>کاربران گروه</x-card-header>
                    <x-card-body>
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نام و نام خانوادگی</th>
                                    <th>موبایل</th>
                                    <th>نقش</th>
                                    <th>ادمین کردن</th>
                                    <th>پاک کردن</th>
                                </tr>
                                </thead>
                                    <tbody>
                                 @foreach($subscribe as $item)
                                    <tr>
                                        <td>{{ $item->user->id}}</td>
                                        <td>{{ $item->user->first_name }} {{ $item->user->last_name }}</td>
                                        <td>{{ $item->user->mobile}}</td>
                                        <td>{{$item->type}}</td>
                                        <td>@if($item->type != 'admin') <a href="{{route('dashboard.admin.support.changerole',['id'=>$item->id])}}" class="btn btn-block bg-gradient-primary btn-sm">تغییر نقش</a> @endif</td>
                                        <td><a href="{{route('dashboard.admin.support.deleteuser',['id'=>$item->id])}}" class="delete_post" ><i class="fa fa-fw fa-eraser"></i></a></td>
                                    </tr>
                                 @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>نام و نام خانوادگی</th>
                                        <th>موبایل</th>
                                        <th>نقش</th>
                                        <th>ادمین کردن</th>
                                        <th>پاک کردن</th>
                                    </tr>
                                    </tfoot>
                            </table>
                        </div>
                        </x-card-body>
                    <x-card-footer>
                    </x-card-footer>      
            </x-card>
            <div style="margin-top:40px;"></div>
            <x-card type="info">
                <x-card-header>اضافه کردن کاربر</x-card-header>
                    <x-card-body>
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نام و نام خانوادگی</th>
                                    <th>موبایل</th>
                                    <th>اضافه کردن به گروه</th>
                                </tr>
                                </thead>
                                    <tbody>
                                 @foreach($users as $item)
                                    <tr>
                                        <td>{{ $item->id}}</td>
                                        <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                                        <td>{{ $item->mobile}}</td>
                                        <td>
                                            <form action="{{ route('dashboard.admin.support.adduser') }}" method="post" >
                                                <input type="hidden" name="user_id" value="{{ $item->id}}">
                                                <input type="hidden" name="support_id" value="{{$post->id}}">
                                                @csrf
                                                <button type="submit" class="btn btn-block bg-gradient-success btn-sm">اضافه کردن</button>
                                            </form>
                                        </td>
                                    </tr>
                                 @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>نام و نام خانوادگی</th>
                                        <th>موبایل</th>
                                        <th>اضافه کردن به گروه</th>
                                    </tr>
                                    </tfoot>
                            </table>
                        </div>
                        </x-card-body>
                    <x-card-footer>
                    </x-card-footer>      
            </x-card>
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
            {{ csrf_field() }}
             <x-card-footer>
                <button type="submit" style=" margin: 20px 0px; height: 42px;width: 100%;font-size: 20px;"  class="btn btn-primary">ارسال</button>
             </x-card-footer>
            </form>
    </x-card>
    <script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('content', {
        // Load the Farsi interface.
            language: 'fa'
        });
        CKFinder.setupCKEditor(null, 'ckfinder/ckfinder.js');
    </script>
    </div>
    @endsection