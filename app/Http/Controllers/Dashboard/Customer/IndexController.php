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

class IndexController extends Controller
{
    public function get() {
        if(isset(Auth::user()->accept)){
            if(Auth::user()->accept != NULL)
                $activate='yes';
            else
                $activate='no';  
        }
        else{
            $activate='no';   
        }
        return view('dashboard.customer.index', ['activate' => $activate,
        'notification' =>notification::where('role',Auth::user()->type)->orWhere('role','all')->orderBy('created_at', 'desc')->get(),

        ]);
    }
    
    public function subscription() {
        if(isset(Auth::user()->accept)){
            if(Auth::user()->accept != NULL)
                $activate='yes';
            else
                $activate='no';  
        }
        else{
            $activate='no';   
        }
        if(Auth::check())
            $subscribe= subscribe::where('status' , 'active')->where('user_id' , Auth::user()->id)->orderBy('created_at', 'desc')->FIRST();
        else
            $subscribe =NULL ;
          
        if(isset($subscribe) && $subscribe->created_at->addDays(30) <= Carbon::now() || $subscribe == NULL)
            $access='yes';
        else
            $access='no';
        
        return view('dashboard.customer.subscription', ['activate' => $activate,
            'notification' =>notification::where('role',Auth::user()->type)->orWhere('role','all')->orderBy('created_at', 'desc')->get(),
            'posts' => subscription::where('status' , 'active')->orderBy('created_at', 'desc')->get(),
            'subscribe' => $subscribe,
            'access' => $access,
        ]);
    }

    public function subs(Request $data){

        $this->validate($data, [
            'subscribe_id' => ['required','exists:subscriptions,id'] , 
            'persent' => ['required'],
        ]);

    if(Auth::check()){
    $subscribe= subscribe::where('status' , 'active')->where('user_id' , Auth::user()->id)->orderBy('created_at', 'desc')->FIRST();    
        if($subscribe == NULL){
                $order=new subscribe();
                $order->subscribe_id = $data->input('subscribe_id'); 
                $order->user_id = Auth::user()->id; 
                $order->status = 'active' ; 
                $order->save(); 
                return redirect()->route('dashboard.customer.subscription')->with('info', 'پلن سرمایه گذاری شما انتخاب شد');
                
        }
        if(isset($subscribe) && $subscribe->created_at->addDays(30) <= Carbon::now() || $subscribe == NULL){
                $subscribe->end_at=carbon::now();
                $subscribe->status = 'done' ; 
                $subscribe->save();
                
                $order=new subscribe();
                $order->subscribe_id = $data->input('subscribe_id'); 
                $order->user_id = Auth::user()->id; 
                $order->status = 'active' ; 
                $order->save(); 
                
        }
        else{
            return redirect()->route('dashboard.customer.subscription')->with('info', 'شما نمیتوانید پلن جدیدی انتخاب کنید');
        }
     }
     return redirect()->route('dashboard.customer.subscription')->with('info', 'پلن سرمایه گذاری شما انتخاب شد');

    }


    public function notification($id){
        return view('dashboard.customer.notification',[
            'notification' =>notification::where('role',Auth::user()->type)->orWhere('role','all')->orderBy('created_at', 'desc')->get(),
            'notifi'=>notification::find($id),
        ]);
    }
    
    public function Referal(){
        
        if(isset(Auth::user()->accept)){
            if(Auth::user()->accept !=NULL)
                $activate='yes';
            else
                $activate='no';  
        }
        else{
            $activate='no';   
        }
        
        $referal = referal::where('user_id',Auth::user()->id)->FIRST();
        return view('dashboard.customer.referal',['activate' => $activate,'referal' => $referal,
            'notification' =>notification::where('role',Auth::user()->type)->orWhere('role','all')->orderBy('created_at', 'desc')->get(),
        ]);
    } 
    
    public function ReferalCreate()
    {

        $referal=new referal([
                'user_id' => Auth::user()->id,
                'link' => random_int(1000, 9999),
                'status' => 'active',
                'persent' => '30',
                'amount' => '1',
        ]);
        $referal->save();
     
        return redirect()->route('dashboard.customer.referal')->with('info' , 'کد رفرال شما ایجاد شد');

    }
  
   public function profile(){
        if(isset(Auth::user()->accept)){
            if(Auth::user()->accept == 'yes')
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
            $post->first_name = $request->input('first_name');
            $post->last_name = $request->input('last_name');
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
}
