@extends('layouts.app')
@section('content')
<h1 style="text-align: center">Transaction History</h1>
@foreach($user as $i)
<div style="display: flex" class="section my-5">
    <div class="img">
    <img src="/image/{{$i->joinProduct->productimg}}" style="margin-left: 70px; height: 300px; width: 300px" alt="Flower">
    </div>
    
    <div class="card" style="margin-left:50px; width: 1150px; height: 300px">
        {{-- <div class="card-header">Update Cart</div> --}}
    
        <div class="card-body">
            <h4>{{$i->joinproduct->productname}}</h4>
            <h4>{{$i->subtotal}}</h4>
            <form method="POST" action="/managec/{{$i->id}}/update">
                @method("PATCH")
                @csrf
    
                <div class="form-group row">
                    <label for="qty" class="col-md-4 col-form-label text-md-right">Quantity</label>
    
                    <div class="col-md-6">
                        <input id="qty" value="{{$i->qty}}" class="form-control" name="qty">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endsection