<?php
namespace App\Http\Controllers\Dashboard\Admin;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Session\Store;
use App\User;
use App\Category;
use Illuminate\Auth\Access\Gate; 
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;
use Illuminate\Support\Facades\Storage;
use App\Keyword;
use App\Http\Requests\Dashboard\Admin\ProductStoreRequest;

class ProductController extends Controller
{
    public function GetCreatePost()
    {
        return view('dashboard.admin.product.create',['categories' => Category::hierarchy()]);
    }

    public function CreatePost(Request $request)
    {
        $data = $request->validated();
        $post = new product([
            'name' => $request->input('title'),
            'slug' => $request->input('slug'),
            'explain' => $request->input('explain'),
            'price' => $request->input('price'),
            'category'=>$request->input('category_id'),
            'content' => $request->input('content'),
        ]);
    //--------------
        $uploadedFile = $request->file('img');
     $filename = $uploadedFile->getClientOriginalName();

    Storage::disk('local')->putFileAs('/images/'.$filename, $uploadedFile, $filename);
           $post->pic = $filename;
           
         //-------------
         
        $post->save();


        return redirect()->route('dashboard.admin.product.create')->with('info', 'محصول جدید ایجاد شد و نام آن ' . $request->input('title'));
    }
    public function GetManagePost(Request $request)
    {
        $posts = product::orderBy('created_at', 'desc')->get();
        return view('dashboard.admin.product.manage', ['posts' => $posts]);
    }

    public function DeletePost($id){
        $post = product::find($id);
        $post->delete();
        return redirect()->route('dashboard.admin.product.manage')->with('info', 'پست پاک شد');
    }

    public function GetEditPost($id)
    { 
        $post = product::find($id);
        return view('dashboard.admin.product.updatepost', ['post' => $post, 'id' => $id,'categories' => Category::hierarchy()]);
    }

    public function UpdatePost(Request $request)
    {
        $post = product::find($request->input('id'));
        if (!is_null($post)) {
            $post->name = $request->input('title');
            $post->explain = $request->input('explain');
            $post->price = $request->input('price');
            $post->content = $request->input('content');
            $post->category = $request->input('category_id');
            $post->save();
        }
        return redirect()->route('dashboard.admin.product.manage',$post->id)->with('info', 'محصول ویرایش شد');
    }
}