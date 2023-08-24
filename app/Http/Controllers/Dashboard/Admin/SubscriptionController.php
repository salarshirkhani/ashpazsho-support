<?php
namespace App\Http\Controllers\Dashboard\Admin;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Session\Store;
use App\subscription;
use Illuminate\Auth\Access\Gate; 
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;
use Illuminate\Support\Facades\Storage;

class SubscriptionController extends Controller
{

    public function GetCreatePost()
    {
        return view('dashboard.admin.subscription.create');
    }

    public function CreatePost(Request $request)
    {
        $post = new subscription([
            'name' => $request->input('name'),
            'persent' => $request->input('persent'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
        ]);
         
        $post->save();
        return redirect()->route('dashboard.admin.subscription.manage')->with('info', 'اشتراک جدید ایجاد شد و نام آن ' .' '. $request->input('name'));
    }

    public function GetManagePost(Request $request)
    {
        $posts = subscription::orderBy('created_at', 'desc')->get();
        return view('dashboard.admin.subscription.manage', ['posts' => $posts]);
    }

    public function DeletePost($id){
        $post = subscription::find($id);
        $post->delete();
        return redirect()->route('dashboard.admin.subscription.manage')->with('info', 'اشتراک پاک شد');
    }

    public function GetEditPost($id)
    { 
        $post = subscription::find($id);
        return view('dashboard.admin.subscription.update', ['post' => $post, 'id' => $id]);
    }

    public function UpdatePost(Request $request)
    {
        $post = subscription::find($request->input('id'));
        if (!is_null($post)) {
            $post->name = $request->input('name');
            $post->persent = $request->input('persent');
            $post->description = $request->input('description');
            $post->status = $request->input('status');
        }

       $post->save();

        return redirect()->route('dashboard.admin.subscription.manage',$post->id)->with('info', 'اشتراک ویرایش شد');
    }
}