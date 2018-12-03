@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            
                <div class="card-header">
                <h1>Order Information  </h1></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

         
       
                </div>
            </div>
        </div>
    </div>
    <table class="table table-striped" border="2">
        <tr>
        <th>User Email</th>
        <th>Foreign Currency Ppurchased</th>
        <th>Exchange Rate</th>
        <th>Surcharge Percentage</th>
        <th>Amount Of Foreign Currency Purchased</th>
        <th>Amount To be Paid in ZAR</th>
        <th>Amount of Surcharge</th>
        <th>Discount Amount</th>
        <th>Order Date</th>
        </tr>
        <tr> 
        <td>{{$orders->email}}</td>
        <td>{{$orders->foreign_currency_purchased}}</td>
        <td>{{$orders->exchange_rate}}</td>
        <td>{{$orders->surcharge_percentage}}</td>
        <td>{{$orders->amount_foreign_currency_purchased}}</td>
        <td>{{ $orders->amount_paid_ZAR}}</td>
        <td>{{$orders->Amount_of_surcharge}}</td>
        @if($orders->discount==null)
        <td>No Discount</td>
        @elseif($orders->discount!=null)
        <td>{{$orders->discount}}</td>
        @endif
        <td>{{$orders->created_at}}</td>
        </tr>

        </table>
</div>
@endsection
