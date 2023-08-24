<?php
namespace App\Http\Controllers\Dashboard\Customer;
use App\notification;
use Carbon\Carbon;
use App\code;
use App\User;
use App\subscription;
use App\subscribe;
use App\transaction;
use Illuminate\Auth\Access\Gate; 
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    public function payment() {
        if(isset(Auth::user()->accept)){
            if(Auth::user()->accept == 'yes')
                $activate='yes';
            else
                $activate='no';  
        }
        else{
            $activate='no';   
        }
        return view('dashboard.customer.payment', ['activate' => $activate,
        'notification' =>notification::where('role',Auth::user()->type)->orWhere('role','all')->orderBy('created_at', 'desc')->get(),
        'transaction' => transaction::orderBy('created_at', 'desc')->where('user_id' , Auth::user()->id)->get(),
        ]);
    }
    
    public function grnt(Request $request) {
        if(isset(Auth::user()->accept)){
            if(Auth::user()->accept == 'yes')
                $activate='yes';
            else
                $activate='no';  
        }
        else{
            $activate='no';   
        }
        $this->validate($request, [
            'coin' => ['required', 'string', 'max:6'],
            'network' => ['required', 'string', 'max:6'],
            'value' => ['required', 'numeric', 'min:50'],
        ]);
        
        
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
          CURLOPT_POSTFIELDS => array('currency' => $request->input('coin') , 'network' => $request->input('network')),
          CURLOPT_HTTPHEADER => array(
            'Authorization:'.$api_key,
            
          ),
        ));
        
        $response = curl_exec($curl);
        $response2 = json_decode($response,true);
        
        curl_close($curl);
        
        
        return view('dashboard.customer.payment.generate', ['activate' => $activate,
           'notification' =>notification::where('role',Auth::user()->type)->orWhere('role','all')->orderBy('created_at', 'desc')->get(),
           'coin'=>$request->input('coin'),
           'transaction' => transaction::orderBy('created_at', 'desc')->where('user_id' , Auth::user()->id)->get(),
           'value'=>$request->input('value'),
           'address'=>$response2['address']
        ]);
    }
    
    public function create(Request $request)
    {
        $this->validate($request, [
            'coin' => ['required', 'string', 'max:6'],
            'value' => ['required', 'numeric', 'min:50'],
            'address' => ['required', 'string', 'max:255'],
        ]);
        
        $transaction=new transaction([
                'user_id' => Auth::user()->id,
                'amount' => $request->input('value'),
                'coin' => $request->input('coin'),
                'wallet' => $request->input('address'),
                'type' => 'income',
                'status' => 'deny',

        ]);
        $transaction->save();
     
        return redirect('dashboard/customer/payment')->with('info' , 'درخواست واریز شما ثبت شد . پس از تایید کیف پول شما شارژ خواهد شد');

    }
 

}
