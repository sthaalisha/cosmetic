<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class KhaltiController extends Controller
{
    public function verify(Request $request)
    {
       
        $args = http_build_query(array(
            'token' => 'QUao9cqFzxPgvWJNi9aKac',
            'amount'  => 2000
          ));
          
          $url = "https://khalti.com/api/v2/payment/verify/";
          
          # Make the call using API.
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, $url);
          curl_setopt($ch, CURLOPT_POST, 1);
          curl_setopt($ch, CURLOPT_POSTFIELDS,$args);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
          
          $headers = ['Authorization: Key test_secret_key_f0f37b5f8b61495ba56d0c6b71bfe015'];
          curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
          
          // Response
          $response = curl_exec($ch);
          $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
          curl_close($ch);

          if($status_code == 200)
          {
            return response()->json([

            ]);
          }

    }
}
