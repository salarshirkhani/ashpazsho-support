<?php

namespace App\Http\Controllers\Dashboard;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Session\Store;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ProfileUpdateRequest;
use Illuminate\Auth\Access\Gate; 
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;
use Illuminate\Support\Facades\Storage;
use App\User;

class ProfileController extends Controller
{
    public function edit() {
        return view('dashboard.owner.profile.edit');
    }

    public function update(ProfileUpdateRequest $request) {
        $post = User::find(Auth::user()->id);
        

        if (!is_null($post)) {
            $post->first_name = $request->input('first_name');
            $post->last_name = $request->input('last_name');
            $post->email =Auth::user()->email;
            $post->about = $request->input('about');
            $post->description = $request->input('description');
            $post->situation = $request->input('situation');
            $post->mobile = $request->input('mobile');
            $post->instagram = $request->input('instagram');
        if($request->hasfile('pic'))
        {
            $uploadedFile = $request->file('pic');
            $filename = $uploadedFile->getClientOriginalName();
       
            Storage::disk('local')->putFileAs('/images/'.$filename, $uploadedFile, $filename);
            $post->pic = $filename;
        }
            
        }
        if($request->hasfile('resume'))
        {
            $uploadedFile = $request->file('resume');
            $filename = $uploadedFile->getClientOriginalName();
       
            Storage::disk('local')->putFileAs('/files/'.$filename, $uploadedFile, $filename);
            $post->resume = $filename;
        }
        $post->save();

        return redirect()->back()->with('success', 'پروفایل شما با موفقیت بروزرسانی شد!');
    }
}
