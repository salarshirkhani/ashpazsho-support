<?php

namespace App\Http\Controllers\Dashboard\Owner;
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
        return view('dashboard.owner.news.create',['categories' => postcategory::hierarchy()]);
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

        return redirect()->route('dashboard.owner.news.create')->with('info', '  پست جدید ذخیره شد و نام آن' . $request->input('title'));
    }

    public function GetManagePost(Request $request)
    {
        $posts = post::orderBy('created_at', 'desc')->where('writer' , Auth::user()->first_name.' '.Auth::user()->last_name)->get();
        return view('dashboard.owner.news.manage', ['posts' => $posts]);
    }

}