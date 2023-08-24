<?php

namespace App\Http\Controllers;
use App\User;
use App\order;
use App\comment;
use App\code;
use App\subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Session\Store;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Requests\SearchRequest;
use Illuminate\Auth\Access\Gate; 
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;
use Mews\Captcha;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Crypt;

class FrontController extends Controller
{
    private function escape_like(string $value, string $char = '\\'): string
    {
        return str_replace(
            [$char, '%', '_'],
            [$char.$char, $char.'%', $char.'_'],
            $value
        );
    }
    
    public function index() {

        return redirect()->route('dashboard.customer.index');

    }


    public function subscription() {
      
            if(Auth::check())
              $subscribe= subscribe::where('status' , 'new')->where('user_id' , Auth::user()->id)->where('finish_date' , '!=' , NULL)->where('finish_date','>',carbon::now())->orderBy('created_at', 'desc')->FIRST();
            else
              $subscribe =NULL ;

        return view('subscription',[
            'posts' => subscription::orderBy('created_at', 'desc')->get(),
            'categories' => Category::whereNull('parent_id')->with('allChildren')->where('show','1')->where('type','product')->orderBy('priority', 'desc')->get(),
            'subscribe' => $subscribe,
            'banners' => SliderItem::orderBy('created_at', 'desc')->get(),
        ]);

    }

    public function Message(Request $request) {
        
        $this->validate($request, [
            'img.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => ['required', 'string', 'max:255'] ,
            'user_id' => ['nullable','exists:users,id'],
            'urpost' => ['required', 'string', 'max:255'],
            'urphone' => ['nullable', 'string', 'regex:/^((\+98|0)[0-9]+)|((\+۹۸|۰)[۰-۹]+)$/']
        ]);
        $post = new contact([
            'user_id' => $request->input('user_id'),
            'name' => $request->input('name'),
            'job' => $request->input('urpost'),
            'email' => $request->input('urmail'),
            'status' => $request->input('urgent'),
            'number' => $request->input('urphone'),
        ]);
        $post->save();
        return redirect()->back()->with('info', 'درخواست ثبت شد');
        
    }
    
    public function getAccountInfo(Request $request)
    { 
        $api_key = 'Token '.env('NOBITEX_API_KEY');

        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://api.nobitex.ir/users/wallets/generate-address',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => array('currency' => 'usdt' , 'network' => 'TRX'),
          CURLOPT_HTTPHEADER => array(
            'Authorization:'.$api_key,
            
          ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        echo $response;
        
    }
}
