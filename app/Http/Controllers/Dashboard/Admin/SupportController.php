<?php

namespace App\Http\Controllers\Dashboard\Admin;
use App\User;
use App\Rules\JalaliDate;
use Hekmatinasser\Verta\Verta;
use Morilog\Jalali\Jalalian;
use Carbon\Carbon;
use App\support;
use App\chat;
use App\subscribe;
use App\Http\Controllers\Controller;
use DB;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Notifications\NewMessage;
use Illuminate\Support\Facades\Auth;
class SupportController extends Controller
{
    public function GetCreateSupport()
    {
        return view('dashboard.admin.support.create');
    }

    public function Sendsupport(Request $request) {

        $this->validate($request, [
            'img.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'subject' => ['required', 'string', 'max:255'] ,
            'slug' => ['required', 'string', 'max:255'],
            'status' => ['nullable', 'string'],
            'description' => ['required', 'string'],
        ]);
        $support = new support([
            'subject' => $request->input('subject'),
            'slug' => $request->input('slug'),
            'departmant' => $request->input('departmant'),
            'description' => $request->input('description'),    
            'status' => $request->input('status'),       
        ]);
        if($request->hasfile('img'))
        {
            $uploadedFile = $request->file('img');
            $filename = $uploadedFile->getClientOriginalName();
    
            Storage::disk('local')->putFileAs($filename, $uploadedFile, $filename);
            $support->profile = $filename;
        }
        $support->save();


        $sup = support::orderBy('created_at', 'desc')->where('slug',$request->input('slug'))->where('status','open')->FIRST();
        $chat = new chat([
            'sender_id' => Auth::user()->id,
            'support_id' => $sup->id,
            'content' => 'گروه جدید ایحاد شد',
            'status' => 'new',       
        ]);
        $chat->save();

        return redirect()->route('dashboard.admin.support.create')->with('info', 'گروه جدید ایجاد شد و نام آن ' .' '. $request->input('subject'));
    }

        
    public function GetManagePost() {
        
        $support=support::orderBy('created_at',  'DESC')->get();
        
        return view('dashboard.admin.support.manage', ['support' => $support ]);
    }

    public function GetEditPost($id)
    { 
        $post = support::find($id);
        $users=User::orderBy('created_at',  'DESC')->get();
        $subscribe=subscribe::where('support_id', $id)->orderBy('created_at',  'DESC')->get();

        return view('dashboard.admin.support.update', ['post' => $post, 'id' => $id,'users' => $users,'subscribe' => $subscribe]);
    }

    public function UpdatePost(Request $request)
    {
        $this->validate($request, [
            'img.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'subject' => ['required', 'string', 'max:255'] ,
            'slug' => ['required', 'string', 'max:255'],
            'status' => ['nullable', 'string'],
            'description' => ['required', 'string'],
        ]);

        $post = support::find($request->input('id'));
        if (!is_null($post)) {
            $post->subject = $request->input('subject');
            $post->slug = $request->input('slug');
            $post->description = $request->input('description');
            $post->status = $request->input('status');
            if($request->hasfile('img'))
            {
                $uploadedFile = $request->file('img');
                $filename = $uploadedFile->getClientOriginalName();
        
                Storage::disk('local')->putFileAs($filename, $uploadedFile, $filename);
                $support->profile = $filename;
            }
        }
       $post->save();


        return redirect()->route('dashboard.admin.support.manage',$request->input('id'))->with('info', 'گروه ویرایش شد');
    }

    //USERS MANAGMENT

    public function AddUser(Request $request){

        $this->validate($request, [
            'support_id' => ['required','exists:supports,id'],
            'user_id' => ['required','exists:users,id'],
        ]);

        $support = new subscribe([
            'support_id' => $request->input('support_id'),
            'user_id' => $request->input('user_id'),
            'type' => 'member',   
        ]);
        $support->save();
        
        return redirect()->route('dashboard.admin.support.updatepost',$request->input('support_id'))->with('info', 'کاربر به گروه اضافه شد');
    }

    public function changerole($id){
        $post = subscribe::find($id);
        $post->type = 'admin';
        $post->save();
        return redirect()->back()->with('info', 'کاربر تغییر کرد');
    }

    public function deleteuser($id){
        $post = subscribe::find($id);
        $post->delete();
        return redirect()->back()->with('info', 'کاربر حذف شد ');
    }


    //CHATS

    public function ShowPost($id) {
        $support=support::find($id);
        $chats=chat::where('support_id',$id)->get();
        foreach($chats as $item){
            if($item->sender_id != Auth::user()->id){
                $item->status = 'read';
                $item->save();
            }
        }
        return view('dashboard.admin.support.show', [
        'support' => $support,
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
        
        $support=support::find($request->input('support_id'));
        $support->status='pending';
        
        if(isset($support->person->mobile)){
            $url = "https://ippanel.com/services.jspd";

            $rcpt_nm = array($support->person->mobile);
            $param = array
            (
               'uname' => 'webitofa',
               'pass' => 'sl7976190',
               'from' => 90000145,
               'message' => 'پیام جدیدی در پلتفرم باهم برای شما ارسال شد',
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
        }        
        
        $support->save();
        $chat->save();
        


        // notify(new NewMessage($user));

        return redirect()->back()->with('info', 'پیام با موفقیت ارسال شد');
    }
    
     public function close(Request $request){

        $this->validate($request, [
            'support_id' => ['required','exists:supports,id'],
        ]);

        $support=support::find($request->input('support_id'));
        $support->status='closed';
        $support->save();
        
        return redirect('dashboard/admin/support/manage')->with('info', 'تیکت بسته شد');
    }
}