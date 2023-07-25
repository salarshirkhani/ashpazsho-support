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
use App\order;
use App\visits;
use App\teacher;
use App\transaction;
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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile' => ['required', 'regex:/^(09[0-9]{9})|(۰۹[۰-۹]{9})$/', 'unique:users'],
            'password' => [ 'string', 'min:8', 'confirmed'],
        ]);

        $post = new User([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'monile' => $request->input('last_name'),
            'email' => $request->input('email'),
            'mobile' => $request->input('mobile'),
            'password' => Hash::make($request->input('password')),
            'type' => $request->input('type')
        ]);
        if($request->hasfile('pic'))
        {
        $uploadedFile = $request->file('pic');
        $filename = $uploadedFile->getClientOriginalName();
   
        Storage::disk('public')->putFileAs($filename, $uploadedFile, $filename);
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
        

        if (!is_null($post)) {
            $post->first_name = $request->input('first_name');
            $post->last_name = $request->input('last_name');
            $post->email = $request->input('email');
            $post->type = $request->input('type');
            $post->mobile = $request->input('mobile');
            if($request->hasfile('pic'))
            {
            $uploadedFile = $request->file('pic');
            $filename = $uploadedFile->getClientOriginalName();
       
            Storage::disk('public')->putFileAs($filename, $uploadedFile, $filename);
            $post->pic = $filename;
            }
            $post->save();
        }

        return redirect()->route('dashboard.admin.users.index',$request->input('id'))->with('info', 'اکانت کاربری  با موفقیت ویرایش شد');
    }

    public function Role(Request $request)
    {
        $post = User::find($request->input('user_id'));
        if (!is_null($post)) {
            $post->type = $request->input('role');
            $post->save();
        }
        return redirect()->route('dashboard.admin.users.index',$post->id)->with('info', 'اکانت کاربری  با موفقیت ویرایش شد');
    }
    
    public function getuser($id) {
        $user=User::find($id);
        $products=order::where('user_id' , $id)->orderBy('created_at', 'desc')->get();
        $transaction=transaction::where('user_id' , $id)->orderBy('created_at', 'desc')->get();
        return view('dashboard.admin.users.show', [
        'user' => $user,
        'id' => $id,
        'products' => $products,
        'transaction' => $transaction,
        ]);
    }


       
    public function DeleteOrder($id){
        $post = order::find($id);
        $post->delete();
        return redirect()->route('dashboard.admin.users.index')->with('info', 'سفارش پاک شد');
    }


    //PARVANDE ELECTRONIC

    public function parvande($id) {
        $user=User::find($id);
        $doctors=User::where('type' , 'operator')->orderBy('created_at', 'desc')->get();
        $visits=visits::where('user_id' , $id)->orderBy('created_at', 'desc')->get();
        return view('dashboard.admin.users.parvande', [
        'user' => $user,
        'id' => $id,
        'doctors' => $doctors,
        'visits' => $visits,
        ]);
    }

    public function Createpar(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'number' => ['required', 'regex:/^(09[0-9]{9})|(۰۹[۰-۹]{9})$/'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'file' => ['nullable'],
            'height' => ['nullable'],
            'weight' => ['nullable'],
            'lang' => ['nullable'],
            'job' => ['nullable'],
            'doctor' => ['nullable'],
            'address' => ['nullable'],
            'diagnose' => ['nullable'],
            'slp' => ['nullable'],
            'history' => ['nullable'],
            'doc_dig' => ['nullable'],
            'drugs' => ['nullable'],
            'balini' => ['nullable'],
            'change' => ['nullable'],
            'darmangar' => ['nullable'],
            'note' => ['nullable'],
            'moreinfo' => ['nullable'],
            'supervisor' => ['nullable'],
            'information' => ['nullable'],
            'img' => ['nullable','mimes:jpeg,png,jpg,gif,pdf,docx|max:2048'],
            'file' => ['nullable','mimes:jpeg,png,jpg,gif,pdf,docx|max:2048'],
            'sex' => ['required', 'string', 'max:255'] ,
            'age' => ['required', 'string', 'max:255'],
            'id' => ['required','exists:users,id'],
        ]);

        $post = User::find($request->input('id'));
        
        $id=$request->input('id');
        
        if (!is_null($post)) {
            $post->sex = $request->input('sex');
            $post->age = $request->input('age');
            $post->height = $request->input('height');
            $post->weight = $request->input('weight');
            $post->lang = $request->input('lang');
            $post->job = $request->input('job');
            $post->doctor = $request->input('doctor');
            $post->address = $request->input('address');
            $post->diagnose = $request->input('diagnose');
            $post->slp = $request->input('slp');
            $post->history = $request->input('history');
            $post->doc_dig = $request->input('doc_dig');
            $post->drugs = $request->input('drugs');
            $post->information = $request->input('information');
            $post->balini = $request->input('balini');
            $post->change = $request->input('change');
            $post->moreinfo = $request->input('moreinfo');
            $post->supervisor = $request->input('supervisor');
            $post->note = $request->input('note');
            $post->darmangar = $request->input('darmangar');

            if($request->hasfile('img'))
            {
            $uploadedFile = $request->file('img');
            $filename = $uploadedFile->getClientOriginalName();
       
            Storage::disk('local')->putFileAs('/file/'.$filename, $uploadedFile, $filename);
            $post->file_slp = $filename;
            }
           
            if($request->hasfile('file'))
            {
            $uploadedFile = $request->file('file');
            $filename = $uploadedFile->getClientOriginalName();
            Storage::disk('local')->putFileAs('/file/'.$filename, $uploadedFile, $filename);
            $post->flie_clinic = $filename;
            }
        } 
        
        $idx = 1;
        if($request->input('visits'))
        {
            foreach ($request->input('visits') as $tag) {
                $tags = new visits([    
                    'visit_date' => Jalalian::fromFormat('Y/n/j',$tag['visit_date'])->toCarbon()->format('Y/m/d'),
                    'description' => $tag['description'],
                    'procedure' => $tag['procedure'],
                    'percentage' => $tag['percentage'],
                    'user_id' => $id,
                ]);
                $tags->save();

                $idx++;
            }
        }  

        $post->save();
        return redirect()->route('dashboard.admin.users.index')->with('info', '  پرونده ثبت شد. ');
    }

}
 