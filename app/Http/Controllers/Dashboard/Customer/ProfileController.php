<?php
namespace App\Http\Controllers\Dashboard\Customer;
use App\notification;
use Carbon\Carbon;
use App\code;
use App\referal;
use App\User;
use App\subscription;
use App\subscribe;
use Illuminate\Auth\Access\Gate; 
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{

   public function profile(){
        if(isset(Auth::user()->accept)){
            if(Auth::user()->accept != NULL)
                $activate='yes';
            else
                $activate='no';
        }
        else{
            $activate='no';   
        }
        return view('dashboard.customer.profile',[
            'notification' =>notification::where('role',Auth::user()->type)->orWhere('role','all')->orderBy('created_at', 'desc')->get(),
			'activate' =>  $activate,
        ]);
    }
  
    public function Editprofile(Request $request)
    {
        $this->validate($request, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);
        $post = User::find(Auth::user()->id);
        
        if (!is_null($post)) {
            $post->first_name = $request->input('first_name');
            $post->last_name = $request->input('last_name');
            $post->accept = 'peding';
            
            if (!empty($request->input('password')))
            	$post->password = Hash::make($request->input('password'));
            	
            $post->save();
        }

        return redirect()->route('dashboard.customer.profile')->with('info', 'اکانت کاربری  با موفقیت ویرایش شد');
    }

    public function Editpass(Request $request)
    {
        $this->validate($request, [
            'id' => ['required','exists:users,id'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $post = User::find($request->input('id'));
        
        if (!is_null($post)) {
            if (!empty($request->input('password')))
            	$post->password = Hash::make($request->input('password'));

            $post->save();
        }

        return redirect()->route('dashboard.customer.profile')->with('info', 'اکانت کاربری  با موفقیت ویرایش شد');
    }
    
    
    //verify payment
    
    public function verify(){
        if(isset(Auth::user()->accept) && Auth::user()->mellipic != NULL && Auth::user()->cartnumber != NULL && Auth::user()->bankpic != NULL){
            if(Auth::user()->accept == 'yes' && Auth::user()->mellipic != NULL && Auth::user()->cartnumber != NULL && Auth::user()->bankpic != NULL){
                $activate='yes';
            }else
                $activate='no';
        }
        else{
            $activate='no';   
        }
        return view('dashboard.customer.verify',[
            'notification' =>notification::where('role',Auth::user()->type)->orWhere('role','all')->orderBy('created_at', 'desc')->get(),
			'activate' =>  $activate,
        ]);
    }
    
    
    public function Editverify(Request $request)
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
        $post = User::find($request->input('id'));
        
        if (!is_null($post)) {
            $post->cartnumber = $request->input('cartnumber');
         	$post->shaba = $request->input('shaba');
            $post->melli = $request->input('melli');
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

        return redirect()->route('dashboard.customer.profile')->with('info', 'اکانت کاربری  با موفقیت ویرایش شد');
    }
}
