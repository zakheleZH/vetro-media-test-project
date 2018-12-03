@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            
                <div class="card-header">
                @if($purcha->currency=="USD")
                <div class="card-header">
              
                    You must Pay R:{{$purcha->number_entered}}<br>
                    
                    </div>
                    <form action="{{URL::to('/store_Order')}}" method="post">

<input type="hidden" name="_token" value="{{csrf_token()}}">
<input type="hidden" name="$purcha->number_entered" value="{{$purcha->number_entered}}"><br>
<input type="hidden" name="$purcha->currency" value="{{$purcha->currency}}"><br>
<input type="submit" name="submit" value="Make an Order">
</form>
</div>
               
            @elseif($purcha->currency=="GBP")
            <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-header">
                    You must Pay R:{{$purcha->number_entered}}<br>
                   
                    </div>
                    <form action="{{URL::to('/store_Order')}}" method="post">

<input type="hidden" name="_token" value="{{csrf_token()}}">
<input type="hidden" name="$purcha->number_entered" value="{{$purcha->number_entered}}"><br>
<input type="hidden" name="$purcha->currency" value="{{$purcha->currency}}"><br>
<input type="submit" name="submit" value="Make an Order">
</form>
</div>
               @elseif($purcha->currency=="EUR")
               <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-header">
                    You must Pay R:{{$purcha->number_entered}}<br>
                   
                    </div>
                    <form action="{{URL::to('/store_Order')}}" method="post">

<input type="hidden" name="_token" value="{{csrf_token()}}">
<input type="hidden" name="$purcha->number_entered" value="{{$purcha->number_entered}}"><br>
<input type="hidden" name="$purcha->currency" value="{{$purcha->currency}}"><br>
<input type="submit" name="submit" value="Make an Order">
</form>
</div>
               @elseif($purcha->currency=="KES")
               
                </div>
               
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-header">
                    You must Pay R:{{$purcha->number_entered}}<br>
                   
                    </div>

                 <form action="{{URL::to('/store_Order')}}" method="post">

                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <input type="hidden" name="$purcha->number_entered" value="{{$purcha->number_entered}}"><br>
                  <input type="hidden" name="$purcha->currency" value="{{$purcha->currency}}"><br>
                   <input type="submit" name="submit" value="Make an Order">
                   </form>
	

@else
 @endif

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
