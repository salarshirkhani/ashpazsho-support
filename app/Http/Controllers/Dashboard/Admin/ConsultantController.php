<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\consultant;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class ConsultantController extends Controller
{

    public function GetManagePost(Request $request)
    {
        $posts = consultant::orderBy('created_at', 'desc')->get();
        return view('dashboard.admin.consultant.manage', ['posts' => $posts]);
    }

    public function ShowPost($id){
        $post = consultant::find($id);
        return view('dashboard.admin.consultant.show', ['post' => $post, 'id' => $id]);
    }
    public function AnswerPost(Request $request){
        $post = consultant::find($request->input('id'));
        if (!is_null($post)) {
            $post->answer = $request->input('answer');
            $post->save();
        }
        return redirect()->route('dashboard.admin.consultant.manage')->with('info', 'مشاوره ویرایش شد');
       }

    public function DeletePost($id){
        $post = consultant::find($id);
        $post->delete();
        return redirect()->route('dashboard.admin.consultant.manage')->with('info', ' پاک شد');
    }
}
