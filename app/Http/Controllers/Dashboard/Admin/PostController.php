<?php

namespace App\Http\Controllers\Dashboard\Admin;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Session\Store;
use App\postcategory;
use App\User;
use Illuminate\Auth\Access\Gate; 
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;
use Illuminate\Support\Facades\Storage;
use App\Keyword;
use App\Http\Requests\SplitsKeywords;
use App\post_tag;
use App\Rules\JalaliDate;
use Hekmatinasser\Verta\Verta;
use Morilog\Jalali\Jalalian;
use Carbon\Carbon;

class PostController extends Controller
{
    use SplitsKeywords;
    public function GetCreatePost()
    {
        return view('dashboard.admin.news.create',['categories' => postcategory::hierarchy()]);
    }

    public function CreatePost(Request $request)
    {
        $post = new post([
            'title' => $request->input('title'),
            'slug' => $request->input('slug'),
            'explain' => $request->input('explain'),
            'iframe' => $request->input('iframe'),
            'content' => $request->input('content'),
            'category'=>$request->input('category'),
            'writer' => $request->input('writer'),
            'gtitle' => $request->input('gtitle'),
            'gexplain' => $request->input('gexplain'),
            'show_at' => Jalalian::fromFormat('Y/n/j',$request->input('created_at'))->toCarbon()->format('Y/m/d'),
        ]);
    //--------------
    
        $uploadedFile = $request->file('img');
        $filename = $uploadedFile->getClientOriginalName();

        Storage::disk('local')->putFileAs('/images/'.$filename, $uploadedFile, $filename);
        $post->pic = $filename;

        $post->save();

        $idx = 1;
        if($request->input('tags'))
        {
            foreach ($request->input('tags') as $tag) {
                $tags = new post_tag([    
                    'name' => $tag['name'],
                ]);
                $tags->post()->associate($post);
                $tags->save();

                $idx++;
            }
        }  

        return redirect()->route('dashboard.admin.news.create')->with('info', '  پست جدید ذخیره شد و نام آن' . $request->input('title'));
    }

    public function GetManagePost(Request $request)
    {
        $posts = post::orderBy('created_at', 'desc')->get();
        return view('dashboard.admin.news.manage', ['posts' => $posts]);
    }

    public function DeletePost($id){
        $post = post::find($id);
        $post->delete();
        return redirect()->route('dashboard.admin.news.manage')->with('info', 'پست پاک شد');
    }

    public function GetEditPost($id)
    { 
        $post = post::find($id);
        return view('dashboard.admin.news.updatepost', ['post' => $post, 'id' => $id,'categories' => postcategory::hierarchy()]);
    }

    public function UpdatePost(Request $request)
    {
        $post = post::find($request->input('id'));
        if (!is_null($post)) {
            $post->title = $request->input('title');
            $post->explain = $request->input('explain');
            $post->iframe = $request->input('iframe');
            $post->slug = $request->input('slug');
            $post->category = $request->input('category');
            $post->writer = $request->input('writer');
            $post->gtitle = $request->input('gtitle');
            $post->show_at = $request->input('created_at');
            $post->gexplain = $request->input('gexplain');
            $post->content = $request->input('content');
            if($request->file('img') != NULL){
                    $uploadedFile = $request->file('img');
                    $filename = $uploadedFile->getClientOriginalName();
                    Storage::disk('local')->putFileAs('/images/'.$filename, $uploadedFile, $filename);
                    $post->pic = $filename;
            }
            $post->save();
        }
        return redirect()->route('dashboard.admin.news.updatepost',$post->id)->with('info', 'پست ویرایش شد');
    }
}