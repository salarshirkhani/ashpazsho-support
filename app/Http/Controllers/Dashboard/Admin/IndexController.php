<?php

namespace App\Http\Controllers\Dashboard\Admin;
use App\User;
use App\Rules\JalaliDate;
use Hekmatinasser\Verta\Verta;
use Morilog\Jalali\Jalalian;
use Carbon\Carbon;
use App\transaction;
use App\Http\Controllers\Controller;
use DB;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class IndexController extends Controller
{
    public function get() {

        return view('dashboard.admin.index',[
            'user' => User::orderBy('created_at', 'desc')->get(),
            ]);
    }

    public function getAccountInfo(Request $request)
    {
        $api_key = 'Token '.env('NOBITEX_API_KEY');

        $client = new Client(['base_uri' => 'https://api.nobitex.ir']);
        $headers = [
          'Authorization' => $api_key,
        ];
        $options = [
              'name' => 'currency',
              'contents' => 'btc'
        ];

        try {
            $response = $client->post('/users/wallets/generate-address',[
                
                'options' => [
                    'currency' => 'btc',
                    'wallet' => 'btc',
                ],
            
                'headers' => [
                    "Authorization" => $api_key,
                ]
            ]);
            

            if ($response->getStatusCode() == 200) {
                 return response()->json(json_decode($response->getBody()), 200);
             }

             return response()->json(['error'=>'Error getting account info'],500);

         } catch (\Exception | \Throwable$e) {

             return response()->json(['error'=>$e->getMessage()],500);
         }
    }
    
    public function GenerateWallet(Request $request)
    {
        $api_key = env('NOBITEX_API_KEY');

        $client = new Client(['base_uri' => 'https://api.nobitex.ir']);

        $headers = [
          'Authorization' => 'Token '.$api_key
        ];
        $options = [
          'multipart' => [
            [
              'name' => 'currency',
              'contents' => 'btc'
            ]
        ]];
        $request = new Request('POST', '/users/wallets/generate-address', $headers);
        $res = $client->sendAsync($request, $options)->wait();
        echo $res->getBody();
    }
}
