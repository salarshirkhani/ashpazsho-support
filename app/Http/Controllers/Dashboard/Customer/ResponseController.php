<?php

namespace App\Http\Controllers\Dashboard\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Session\Store;
use Illuminate\Auth\Access\Gate; 
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;
use Illuminate\Support\Facades\Storage;
use Hekmatinasser\Verta\Verta;
use Morilog\Jalali\Jalalian;
use Carbon\Carbon;
use App\User;
use App\response;
use App\consultant;

class ResponseController extends Controller
{
    
    public function GetCreatePost()
    {
        return view('dashboard.customer.response.create');
    }

    public function CreatePost(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'content' => ['nullable'],
            'file' => ['nullable','mimes:mp4,x-flv,x-mpegURL,MP2T,3gpp,quicktime,x-msvideo,x-ms-wmv|max:8048'],
            'img.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $post = new response([
            'title' => $request->input('title'),
            'user_id' => Auth::user()->id,
            'content' => $request->input('content'),
            'status'=> 'new',
        ]);
    //--------------
    
        if($request->hasfile('img'))
        {
        $uploadedFile = $request->file('img');
        $filename = $uploadedFile->getClientOriginalName();
        Storage::disk('local')->putFileAs('/images/'.$filename, $uploadedFile, $filename);
        $post->pic = $filename;
        }

        if($request->hasfile('file'))
        {
        $uploadedFile = $request->file('file');
        $filename = $uploadedFile->getClientOriginalName();
        Storage::disk('local')->putFileAs('/images/'.$filename, $uploadedFile, $filename);
        $post->file = $filename;
        }

        $post->save();

        return redirect()->route('dashboard.customer.response.create')->with('info', '  نظر جدید ذخیره شد و نام آن' . $request->input('title'));
    }

    public function GetManagePost(Request $request)
    {
        $posts = response::orderBy('created_at', 'desc')->get();
        return view('dashboard.customer.response.manage', ['posts' => $posts]);
    }

}