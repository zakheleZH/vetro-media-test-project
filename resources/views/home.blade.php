@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

     <form action="{{URL::to('/store_purchase')}}" method="post">
	<label for="state" ><font color="blue"><b>Please Select currency >>></b></font></label>
					<select name="currency" id="currency" style="text-size:200">
				<option value="USD">US Dollars (USD) </option>

						<option value="GBP">British Pound (GBP)</option>
						
						<option value="EUR">Euro (EUR)</option>

						<option value="KES">Kenyan Shilling (KES)</option>
					
					</select><br>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                   Enter Number:<input type="number" name="number"  required><br>
                   <input type="submit" name="submit" value="Purchase">

	
</form>

 
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
