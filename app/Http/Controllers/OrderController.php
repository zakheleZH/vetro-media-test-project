<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\OrderModel;

class OrderController extends Controller
{
    public function store_Order(Request $request)
    {
          $orders = new OrderModel;
          $entered_currency=$request->input('$purcha->currency');
          $entered_amount_ZAR = $request->input('$purcha->number_entered');
          // declaring varible to be stored in the database
          $currecy_stored = null;
         
          $exchange_rate = null;
          $surcharge_percentage = null;
          $Amount_foreign_currency_purchased = null;
          $Amount_of_surcharge = null;
          $discount= null;
          $total_order_foreign_currency_amount= null;
          
          //calculate USD rate
          if($entered_currency=="USD")
          {
            

            $exchange_rate=0.0808279;
            $surcharge_percentage=0.075;
            $Amount_foreign_currency_purchased =  $entered_amount_ZAR * $exchange_rate;
            $total_order_foreign_currency_amount= $Amount_foreign_currency_purchased +($Amount_foreign_currency_purchased *  $surcharge_percentage);
            $Amount_of_surcharge = $Amount_foreign_currency_purchased *  $surcharge_percentage;

          }


           //calculate GBP rate

           $email = new OrderModel;
           if($entered_currency=="GBP")
           {
            $entered_currency=$request->input('$purcha->currency');
            $entered_amount_ZAR = $request->input('$purcha->number_entered');
           
             $exchange_rate = 0.0527032;
             $surcharge_percentage = 0.05;
             $Amount_foreign_currency_purchased =  $entered_amount_ZAR * $exchange_rate;
             $total_order_foreign_currency_amount= $Amount_foreign_currency_purchased +($Amount_foreign_currency_purchased *  $surcharge_percentage);
             $Amount_of_surcharge = $Amount_foreign_currency_purchased *  $surcharge_percentage;
             $order_date =date("Y-m-d h:i:sa");
             
               // email information
        $to_name = "Vetro Media Practical Test";
        $to_email = 'php.java777@gmail.com'; // sending information to this address
        $data = array('entered_currency'=>"$entered_currency",
              'exchange_rate'=>"$exchange_rate",
              'surcharge_percentage'=>"$surcharge_percentage",
              'Amount_foreign_currency_purchased'=>"$Amount_foreign_currency_purchased",
              'entered_amount_ZAR'=>"$entered_amount_ZAR",
              'Amount_of_surcharge'=>"$Amount_of_surcharge",
              'order_date'=>"$order_date",
        
      );
            //sending email 
              Mail::send('email.mail', $data, function($message) use ($to_name, $to_email) {
                  $message->to($to_email, $to_name)
                          ->subject('Vetro Media Practical Test');
                  $message->from('vetro.media777@gmail.com','Vetro Media Practical Test');
              });


            
           }
             //calculate EUR rate
           if($entered_currency=="EUR")
           {
             $exchange_rate = 0.0718710;
             $surcharge_percentage=0.05;
             $Amount_foreign_currency_purchased =  $entered_amount_ZAR * $exchange_rate;
             $total_order_foreign_currency_amount= $Amount_foreign_currency_purchased +($Amount_foreign_currency_purchased *  $surcharge_percentage);
             $Amount_of_surcharge = $Amount_foreign_currency_purchased *  $surcharge_percentage;
             $discount = $total_order_foreign_currency_amount - ($total_order_foreign_currency_amount *0.02); //calculating the discount

           }

             //calculate KES rate
          if($entered_currency=="KES")
          {
            $exchange_rate= 7.81498;
            $surcharge_percentage=0.025;
            $Amount_foreign_currency_purchased =  $entered_amount_ZAR * $exchange_rate;
            $total_order_foreign_currency_amount= $Amount_foreign_currency_purchased +($Amount_foreign_currency_purchased *  $surcharge_percentage);
            $Amount_of_surcharge = $Amount_foreign_currency_purchased *  $surcharge_percentage;

            

           

          }
          


          $orders = new OrderModel;
            $orders->email = auth()->user()->email;
            $orders->foreign_currency_purchased =$entered_currency; 
            $orders->exchange_rate = $exchange_rate;
            $orders->surcharge_percentage = $surcharge_percentage;
            $orders->amount_foreign_currency_purchased = $Amount_foreign_currency_purchased;
            $orders->amount_paid_ZAR = $entered_amount_ZAR;
            $orders->Amount_of_surcharge = $Amount_of_surcharge;
            $orders->discount = $discount;
            $orders->save(); // saving information to the database

     if($orders->foreign_currency_purchased =="GBP")
      {
        return "Please check your Email address to view your Order Information";
      }
     else
      {
          
        return view('view_order')->with('orders',$orders);

      }

    }

  
}

?>