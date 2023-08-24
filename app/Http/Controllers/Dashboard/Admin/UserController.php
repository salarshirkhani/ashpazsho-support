<?php

namespace App\Http\Controllers\Dashboard\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Rules\JalaliDate;
use Hekmatinasser\Verta\Verta;
use Morilog\Jalali\Jalalian;
use Carbon\Carbon;
use Illuminate\Session\Store;
use App\User;
use App\Product;
use App\teacher;
use App\transaction;
use App\order;
use Illuminate\Auth\Access\Gate; 
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function GetCreatePost()
    {
        return view('dashboard.admin.users.create');
    }

    public function CreatePost(Request $request)
    {
        $this->validate($request, [
            'pic.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'mellipic.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'bankpic.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'melli' => ['required','numeric', 'min:8','max:9999999999', 'unique:users'],
            'cartnumber' => ['required','numeric', 'min:9999999999999','max:999999999999999999999', 'unique:users'],
            'shaba' => ['nullable','string', 'min:8', 'max:35', 'unique:users'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'id' => ['required','exists:users,id'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        $post = new User([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'monile' => $request->input('last_name'),
            'birthdate' => Jalalian::fromFormat('Y/n/j',$request->input('birthdate'))->toCarbon()->format('Y/m/d'),
            'email' => $request->input('email'),
            'mobile' => $request->input('mobile'),
            'password' => Hash::make($request->input('password')),
            'type' => $request->input('type')
        ]);
        if($request->hasfile('pic'))
        {
        $uploadedFile = $request->file('pic');
        $filename = $uploadedFile->getClientOriginalName();
   
        Storage::disk('local')->putFileAs($filename, $uploadedFile, $filename);
        $post->profile = $filename;
        }
        $post->save();

        return redirect()->route('dashboard.admin.users.index')->with('info', '  کاربر جدید ذخیره شد و نام آن' .' '. $request->input('first_name'));
    }

    public function getprofile() {
        $user=User::orderBy('created_at', 'desc')->get();
        return view('dashboard.admin.users.index', [
        'user' => $user,
        ]);
    }

    public function getEditprofile($id) {
        $user=User::find($id);
        return view('dashboard.admin.users.edit', [
        'id'=>$id,
        'user'=>$user,
         ]);
    }

    public function DeletePost($id){
        $post = User::find($id);
        $post->delete();
        return redirect()->route('dashboard.admin.users.index')->with('info', 'کاربر پاک شد');
    }

    public function Editprofile(Request $request)
    {
        $post = User::find($request->input('id'));

        $this->validate($request, [
            'pic.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'mellipic.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'bankpic.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'melli' => ['required','numeric', 'min:8','max:9999999999'],
            'cartnumber' => ['required','numeric', 'min:9999999999999','max:999999999999999999999'],
            'shaba' => ['nullable','string', 'min:8', 'max:35'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'id' => ['required','exists:users,id'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);
        Carbon::setLocale('fa_IR');

        if (!is_null($post)) {
            $post->first_name = $request->input('first_name');
            $post->last_name = $request->input('last_name');
            $post->cartnumber = $request->input('cartnumber');
         	$post->shaba = $request->input('shaba');
            $post->melli = $request->input('melli');
            $post->accept = 'yes';
            if (!empty($request->input('password')))
            	$post->password = Hash::make($request->input('password'));
            if($request->hasfile('pic'))
            {
            $uploadedFile = $request->file('pic');
            $filename = $uploadedFile->getClientOriginalName();
       
            Storage::disk('local')->putFileAs($filename, $uploadedFile, $filename);
            $post->profile = $filename;
            }

            if($request->hasfile('mellipic'))
            {
            $uploadedFile = $request->file('mellipic');
            $filename = $uploadedFile->getClientOriginalName();
       
            Storage::disk('local')->putFileAs($filename, $uploadedFile, $filename);
            $post->mellipic = $filename;
            }

            if($request->hasfile('bankpic'))
            {
            $uploadedFile = $request->file('bankpic');
            $filename = $uploadedFile->getClientOriginalName();
       
            Storage::disk('local')->putFileAs($filename, $uploadedFile, $filename);
            $post->bankpic = $filename;
            }
            $post->save();
        }
        if($request->input('type') == 'teacher'){
            $teacher=teacher::where('user_id',$request->input('id'))->FIRST();
            if($teacher==NULL){
                $posts = new teacher([
                    'user_id' => $request->input('id'),
                ]);
                $posts->save(); 
            }
        }
        return redirect()->route('dashboard.admin.users.index',$request->input('id'))->with('info', 'اکانت کاربری  با موفقیت ویرایش شد');
    }

    public function Role(Request $request)
    {
        $post = User::find($request->input('user_id'));
        if (!is_null($post)) {
            $post->type = $request->input('role');
            $post->save();
            if($request->input('role') == 'teacher'){
                $teacher=teacher::where('user_id',$post->id)->FIRST();
                if($teacher==NULL){
                    $teacer = new teacher([
                        'user_id' => $post->id,
                    ]); 
                    $teacer->save();
                }
            }
        }
        return redirect()->route('dashboard.admin.users.index',$post->id)->with('info', 'اکانت کاربری  با موفقیت ویرایش شد');
    }
    
    public function getuser($id) {
        $user=User::find($id);
        $transaction=transaction::where('user_id' , $id)->orderBy('created_at', 'desc')->get();
        return view('dashboard.admin.users.show', [
        'user' => $user,
        'id' => $id,
        'transaction' => $transaction,
        ]);
    }
       
}
 