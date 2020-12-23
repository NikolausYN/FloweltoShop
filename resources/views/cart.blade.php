@extends('layouts.app')
@section('content')
<h1 style="text-align: center">My Cart</h1>
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
    
                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">Update</button>
    
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
<a style="background-color:pink; border-color:pink; text-align: center" href="/co" class="btn btn-primary">Checkout</a>

@endsection