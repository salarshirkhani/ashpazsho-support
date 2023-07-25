<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Session\Store;
use App\time;
use App\User;
use App\schedule;
use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;
use Illuminate\Support\Facades\Storage;
use App\Rules\JalaliDate;
use Hekmatinasser\Verta\Verta;
use Morilog\Jalali\Jalalian;
use Carbon\Carbon;

class DateController extends Controller
{
    public function GetDate()
    {
        $date=time::orderBy('created_at', 'desc')->get();
        $users=User::where('type','operator')->orderBy('created_at', 'desc')->get();
        return view('dashboard.admin.date.manage', ['posts' => $date,'users' => $users,]);
    }

    public function GetCreatePost(Request $request)
    {
        $users=User::where('type','operator')->orderBy('created_at', 'desc')->get();

        return view('dashboard.admin.date.create', ['users' => $users,]);
    }

    public function CreatePost(Request $request)
    {
        $post = new time([
            'user_id' => $request->input('user_id'),
            'date' =>Jalalian::fromFormat('Y/n/j',$request->input('date'))->toCarbon()->format('Y/m/d'),    
            'start_time' => $request->input('start_time'),
            'finish_time' => $request->input('finish_time'),
        ]);
        $post->save();
        return redirect()->route('dashboard.admin.date.manage')->with('info', 'تاریخ جدید ایجاد شد ' );
    }

    public function DeletePost($id){
        $post = time::find($id);
        $post->delete();
        return redirect()->route('dashboard.admin.date.manage')->with('info', 'تاریخ پاک شد');
    }

    public function GetEditPost($id)
    {
        $users = User::orderBy('created_at', 'desc')->get();
        $post = message::find($id);
        return view('dashboard.admin.date.update', ['post' => $post, 'id' => $id , 'users' => $users]);
    }


    //Schedule

    public function GetSchedule()
    {
        $date=schedule::orderBy('created_at', 'desc')->get();
        return view('dashboard.admin.schedule.manage', ['posts' => $date,]);
    }

    public function DeleteSche($id){
        $post = schedule::find($id);
        $post->delete();
        return redirect()->route('dashboard.admin.schedule.manage')->with('info', 'نوبت دهی پاک شد');
    }

}
