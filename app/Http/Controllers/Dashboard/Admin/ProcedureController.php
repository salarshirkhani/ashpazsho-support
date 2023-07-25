<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\procedure;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class ProcedureController extends Controller
{

    public function GetManagePost(Request $request)
    {
        $posts = procedure::orderBy('created_at', 'desc')->get();
        return view('dashboard.admin.procedure.manage', ['posts' => $posts]);
    }

    public function ShowPost($id){
        $post = procedure::find($id);
        return view('dashboard.admin.procedure.show', ['post' => $post, 'id' => $id]);
    }

    public function DeletePost($id){
        $post = procedure::find($id);
        $post->delete();
        return redirect()->route('dashboard.admin.procedure.manage')->with('info', ' پاک شد');
    }
}
