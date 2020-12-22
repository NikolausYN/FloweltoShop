@extends('layouts.app')
@section('content')

<div style="display: flex" class="section">
<div class="img">
<img src="/image/{{$prod -> productimg}}" style="margin-left: 70px; height: 580px; width: 580px" alt="Flower">
</div>

<div style="margin-left: 100px"class="judul">
    <h1>{{$prod -> productname}}</h1>
    <h3>Rp. {{$prod -> productprice}}</h3>
    <h4 style="margin-top:20px">{{$prod -> productdesc}}</h4>
    @guest
    <form style="margin-top: 20px; " action="{{ route('login') }}" method="GET">
        <input type="text" name="search" placeholder="Enter Quantity..." value="">
        <input type="submit" value="Add to Cart">
      </form>
    @else    
    @if (Auth::user()->roleid === 1)
      
    @else 
    <form style="margin-top: 20px;" action="/cart/{{$prod->id}}" method="GET">
        <input type="text" name="qty" placeholder="Enter Quantity...">
        <input type="submit" value="Add to Cart">
      </form>
    @endif 
    @endguest

</div>
</div>

@endsection