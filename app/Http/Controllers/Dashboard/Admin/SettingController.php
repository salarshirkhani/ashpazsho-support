<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Session\Store;
use App\Setting;
use App\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;
use Illuminate\Support\Facades\Storage;


class SettingController extends Controller
{
    public function index()
    {
        $post = Setting::where('name','seotitle')->first();
        if (!is_null($post)) {
            $seotitle = $post->value;
            
        }
        $post = Setting::where('name','metadesciption')->first();
        if (!is_null($post)) {
            $metadesciption = $post->value;
        }
    return view('dashboard.admin.setting.manage', ['metadesciption' => $metadesciption,'seotitle' => $seotitle])->with('info', 'تنطیمات ویرایش شد');
    }

    public function post()
    {
        $post = Setting::where('name','seotitle')->first();
        if (!is_null($post)) {
            $post->value = $request->input('seotitle');
            $post->save();
        }
        $post = Setting::where('name','metadesciption')->first();
        if (!is_null($post)) {
            $post->value = $request->input('metadesciption');
            $post->save();
        }
    return redirect()->route('dashboard.admin.setting.manage')->with('info', 'تنطیمات ویرایش شد');
    }
}
