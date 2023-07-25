<?php

namespace App\Http\Controllers\Dashboard\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\consultant;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class ConsultantController extends Controller
{
    public function GetCreatePost()
    {
        return view('dashboard.customer.consultant.create', [
            'consultant' => consultant::orderBy('created_at', 'desc')->where('email',Auth::user()->email)->get(),
    ]);
    }

    public function CreatePost(Request $request)
    {

        $post = new consultant([
            'title' => $request->input('name'),
            'name' => $request->input('title'),
            'number' => $request->input('number'),
            'city' => $request->input('city'),
            'email'=>Auth::user()->email,
            'description' => $request->input('content'),
        ]);
        $post->save();
        return redirect()->route('dashboard.customer.consultant.create')->with('info', '  مشاوره جدید ذخیره شد و نام آن' .' ' . $request->input('name'));
    }
    public function GetManagePost(Request $request)
    {
        $posts = consultant::orderBy('created_at', 'desc')->where('email',Auth::user()->email)->get();
        return view('dashboard.customer.consultant', [
            'posts' => $posts,            
            'consultant' => consultant::orderBy('created_at', 'desc')->where('email',Auth::user()->email)->get(),
    ]);
    }

    public function ShowPost($id){
        $post = consultant::find($id);
        return view('dashboard.customer.consultant.show', ['item' => $post, 'id' => $id,            
        'consultant' => consultant::orderBy('created_at', 'desc')->where('email',Auth::user()->email)->get(),
     ]);
    }
}
