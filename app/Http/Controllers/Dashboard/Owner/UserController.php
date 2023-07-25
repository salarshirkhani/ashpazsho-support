<?php

namespace App\Http\Controllers\Dashboard\Owner;
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

    public function getprofile() {
        $user=User::orderBy('created_at', 'desc')->where('darmangar' , Auth::user()->first_name.' '.Auth::user()->last_name)->get();
        return view('dashboard.owner.users.index', [
        'user' => $user,
        ]);
    }

    //PARVANDE ELECTRONIC

    public function parvande($id) {
        $user=User::find($id);
        $doctors=User::where('type' , 'operator')->orderBy('created_at', 'desc')->get();
        $visits=visits::where('user_id' , $id)->orderBy('created_at', 'desc')->get();
        return view('dashboard.owner.users.parvande', [
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
            'note' => ['nullable'],
            'moreinfo' => ['nullable'],
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
            $post->note = $request->input('note');

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
        return redirect()->route('dashboard.owner.users.index')->with('info', '  پرونده ثبت شد. ');
    }

}
 