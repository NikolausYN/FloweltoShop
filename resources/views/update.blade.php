@extends('layouts.app')
@section('content')

<div style="display: flex" class="section">
<div class="img">
<img src="/image/{{$prod -> productimg}}" style="margin-left: 70px; height: 580px; width: 580px" alt="Flower">
</div>

<div class="card" style="margin-left:50px; width: 1150px">
    <div class="card-header">Update Flower</div>

    <div class="card-body">
        <form method="POST" action="/product/{{$prod->id}}/update">
            @method("PATCH")
            @csrf

            <div class="form-group row">
                <label for="cat" class="col-md-4 col-form-label text-md-right">Category</label>

                <div class="col-md-6">
                    <select id="service_status" name="service_status" class="form-control">

                        @foreach ($cat as $catt)
                        <option value="{{$catt -> catname}}">{{$catt -> catname}}</option>
                        @endforeach
                        
                      </select>

                </div>
            </div>

            <div class="form-group row">
                <label for="fname" class="col-md-4 col-form-label text-md-right">Flower Name</label>

                <div class="col-md-6">
                    <input id="fname" class="form-control" name="fname">
                </div>
            </div>

            <div class="form-group row">
                <label for="fprice" class="col-md-4 col-form-label text-md-right">Flower Price (Rupiah)</label>

                <div class="col-md-6">
                    <input id="fprice" class="form-control" name="fprice">
                </div>
            </div>

            <div class="form-group row">
                <label for="fdesc" class="col-md-4 col-form-label text-md-right">Flower Description</label>

                <div class="col-md-6">
                    <input id="fdesc" class="form-control" name="fdesc">
                </div>
            </div>

            <div class="form-group row">
                <label for="fimg" class="col-md-4 col-form-label text-md-right">Flower Image</label>

                <div class="col-md-6">
                    <input type="file" id="fimg" class="" name="fimg">
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

@endsection