<?php

namespace App\Http\Controllers\Dashboard\Customer;

use App\Category;
use App\Http\Controllers\Controller;
use App\consultant;
use App\User;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Session\Store;
use App\visits;
use App\Rules\JalaliDate;
use Hekmatinasser\Verta\Verta;
use Morilog\Jalali\Jalalian;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function get() {

        $visits=visits::where('user_id' , Auth::user()->id)->orderBy('created_at', 'asc')->get();
        return view('dashboard.customer.index', [
            'visits' => $visits,
            'categories' => Category::all(),
            'consultant' => consultant::orderBy('created_at', 'desc')->where('email',Auth::user()->email)->get(),
        ]);
    }

    public function notification($id){
        return view('dashboard.customer.notification',[
            'consultant' => consultant::orderBy('created_at', 'desc')->where('email',Auth::user()->email)->get(),

        ]);
    }
  
   public function profile(){
        return view('dashboard.customer.profile',[
            'consultant' => consultant::orderBy('created_at', 'desc')->where('email',Auth::user()->email)->get(),

        ]);
    }
  
    public function Editprofile(Request $request)
    {
        $this->validate($request, [
            'pic.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'id' => ['required','exists:users,id'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);
        $post = User::find($request->input('id'));
        
        if (!is_null($post)) {
            $post->first_name = $request->input('first_name');
            $post->last_name = $request->input('last_name');
            if (!empty($request->input('password')))
            	$post->password = Hash::make($request->input('password'));
            if($request->hasfile('pic'))
            {
            $uploadedFile = $request->file('pic');
            $filename = $uploadedFile->getClientOriginalName();
       
            Storage::disk('local')->putFileAs('/images/'.$filename, $uploadedFile, $filename);
            $post->pic = $filename;
            }
            $post->save();
        }

        return redirect()->route('dashboard.customer.profile')->with('info', 'اکانت کاربری  با موفقیت ویرایش شد');
    }
    
    public function ShowPost($id){
        $post = visits::find($id);
        return view('dashboard.customer.visit', ['item' => $post, 'id' => $id,            
        'consultant' => consultant::orderBy('created_at', 'desc')->where('email',Auth::user()->email)->get(),
     ]);
    }
}
