<?php
namespace App\Http\Controllers\Dashboard\Admin;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Session\Store;
use App\User;
use App\response;
use Illuminate\Auth\Access\Gate; 
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;
use Illuminate\Support\Facades\Storage;

class ResponseController extends Controller
{

    public function GetManagePost(Request $request)
    {
        $posts = response::orderBy('created_at', 'desc')->get();
        return view('dashboard.admin.response.manage', ['posts' => $posts]);
    }

    public function DeletePost($id){
        $post = response::find($id);
        $post->delete();
        return redirect()->route('dashboard.admin.response.manage')->with('info', 'نظر پاک شد');
    }

    public function GetEditPost($id)
    { 
        $post = response::find($id);
        return view('dashboard.admin.response.updateresponse', ['post' => $post, 'id' => $id]);
    }

    public function UpdatePost(Request $request)
    {
        $post = response::find($request->input('id'));
        if (!is_null($post)) {
            $post->title = $request->input('title');
            $post->content = $request->input('content');
            $post->status = 'accept';

            $post->save();
        }
        return redirect()->route('dashboard.admin.response.manage',$post->id)->with('info', 'نظر منتشر شد');
    }
}