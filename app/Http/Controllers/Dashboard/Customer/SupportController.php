<?php
namespace App\Http\Controllers\Dashboard\Customer;
use App\notification;
use Carbon\Carbon;
use App\support;
use App\chat;
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

class SupportController extends Controller
{

    public function tickets() {
        return view('dashboard.customer.tickets',[
            'support' => support::orderBy('created_at', 'desc')->where('user_id',Auth::user()->id)->get(),
        ]);
    }

    public function support() {
        return view('dashboard.customer.support',[
 
        ]);
    }
    
    public function profile() {
        return view('dashboard.customer.profile',[
 
        ]);
    }

    public function Sendsupport(Request $request) {

        $this->validate($request, [
            'user_id' => ['nullable','exists:users,id'],
            'subject' => ['required', 'string', 'max:255'] ,
            'departmant' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ]);
        $support = new support([
            'user_id' => $request->input('user_id'),
            'subject' => $request->input('subject'),
            'departmant' => $request->input('departmant'),
            'description' => $request->input('content'),    
            'status' => 'new',       
        ]);
        $support->save();

        $sup = support::orderBy('created_at', 'desc')->where('user_id',Auth::user()->id)->where('status','new')->FIRST();

        $chat = new chat([
            'sender_id' => $request->input('user_id'),
            'support_id' => $sup ->id,
            'content' => $request->input('content'),
            'status' => 'new',       
        ]);
        $chat->save();

        return redirect()->route('dashboard.customer.chat', ['id' => $sup->id]) ;
    }

    public function Chats($id) {
        $chats=chat::where('support_id',$id)->get();
        foreach($chats as $item){
            if($item->sender_id != Auth::user()->id){
                $item->status = 'read';
                $item->save();
            }
        }
        return view('dashboard.customer.chat',[
            'chats' => $chats,
        ]);
    } 

    public function Message(Request $request){

        $this->validate($request, [
            'sender_id' => ['required','exists:users,id'],
            'support_id' => ['required','exists:supports,id'],
            'content' => ['required', 'string'],
        ]);

        $chat = new chat([
            'sender_id' => $request->input('sender_id'),
            'support_id' => $request->input('support_id'),
            'content' => $request->input('content'),
            'status' => 'new',       
        ]);
        
            $url = "https://ippanel.com/services.jspd";

            $rcpt_nm = array('09372833776');
            $param = array
            (
               'uname' => 'webitofa',
               'pass' => 'sl7976190',
               'from' => 90000145,
               'message' => 'پیام جدید در پلتفرم باهم ثبت شد',
               'to' => json_encode($rcpt_nm),
               'op' => 'send'
            );
            $handler = curl_init($url);             
    		curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
    		curl_setopt($handler, CURLOPT_POSTFIELDS, $param);
    		curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
    		$response2 = curl_exec($handler);
    		$response2 = json_decode($response2);
    		$res_code = $response2[0];
    		$res_data = $response2[1];

        $support=support::find($request->input('support_id'));
        $support->status='new';
        $support->save();
        
        $chat->save();
        return redirect()->back()->with('info', 'پیام ارسال شد');
    }
    
    public function close(Request $request){

        $this->validate($request, [
            'support_id' => ['required','exists:supports,id'],
        ]);

        $support=support::find($request->input('support_id'));
        $support->status='closed';
        $support->save();
        
        return redirect()->back()->with('info', 'تیکت بسته شد');
    }


}
