@extends('layouts.app')

@section('content')
<div style='height:70vh' class="section">
<div class="container justify-content-center h-100">
    <div class="row text-center">
        <div class="col-md-12" >
            <h1 class="judul">Manage Categories</h1>
        </div>
        </div>
        <div class="row h-100 align-items-enter">
            @foreach ($cat as $catt)
            <div class="text-center offset-md-1 col-md-4">
        
            <div class="card" style="width: 28rem; margin-top: 7%">
                <img class="card-img-top" src="{{$catt -> catimg}}" style="height: 446px; width: 446px" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">{{$catt -> catname}}</h5>
                  <form method="POST" action="/managec/{{$catt-> id}}/delete">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
            
                    <div class="form-group">
                        <input style="background-color:pink; border-color:pink" type="submit" class="btn btn-danger delete-user" value="Delete Category">
                    </div>
                </form>
                  <a style="margin-top:10px; background-color:pink; border-color:pink" href="/updatec/{{$catt -> id}}" class="btn btn-primary">Update Category</a>
                </div>
              </div>
            </div>
              @endforeach
    </div>
</div>
</div>
@endsection