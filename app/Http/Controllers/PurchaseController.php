<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\URL;

use App\PurchaseModel;
//require 'vendor/autoload.php';

class PurchaseController extends Controller
{
   
   
    public function show_purchase($id)
    {
     
       $posts = PurchaseModel::find($id);
       return view('order')->with('posts',$posts);
    }

    public function store_purchase(Request $request)
    {

     

     $amount_in_ZAR = null; // varible to store amount in ZAR in the API 
     $amount_entered =$request->input('number'); // storing entered information

     // start calling the Currency API
     $client = new client([
        'headers'=>['content-type'=>'application/json','accept'=>'application/json'],
    ]);
    $response = $client->request('POST','http://apilayer.net/api/live?access_key=e869925562be146c91b66c904647687e',[
    'json'=>[
        'code'=>'e869925562be146c91b66c904647687e',
    ],
    ]);
    $data = $response->getBody();
    $data = json_decode($data,true);
   
   
 
  $pp[]=null; //array to carry all information from API
  $now =null; // variable to contain manipulated information.

    foreach ($data as $key =>$now)
    {
       
            $tt = json_encode($now,true);
            $yy = json_decode($tt,true);
            $pp[]= $yy;
   }

   foreach($pp[6] as $tt=>$aa)
   {
       $now = substr($tt,3); // manipulating currency from the API
       if($now=="ZAR")
       {
        $amount_in_ZAR =  $amount_entered * $aa;
       }
      
      
   }

       

        // getting information from UI
        $purcha = new PurchaseModel;
        $purcha->currency = $request->input('currency');  
   
        $purcha->number_entered = $amount_in_ZAR;
        $purcha->email = auth()->user()->email; 

        return view('order')->with('purcha',$purcha);

       
       


         


    

  }
       

} 

  

?>
