@extends('layouts.app')
@section('content')

<div style="display: flex" class="section">

<div class="card" style="margin-left:400px; width: 1150px">
    <div class="card-header">Add New Flower</div>

    <div class="card-body">
        <form method="POST" action="/products/addf" enctype="multipart/form-data">
            @method("PATCH")
            @csrf

            <div class="form-group row">
                <label for="cat" class="col-md-4 col-form-label text-md-right">Category</label>

                <div class="col-md-6">
                    <select id="catname" name="catname" class="form-control">

                        @foreach ($cat as $catt)
                        <option value="{{$catt -> catname}}">{{$catt -> catname}}</option>
                        @endforeach
                        
                      </select>

                </div>
            </div>

            <div class="form-group row">
                <label for="fname" class="col-md-4 col-form-label text-md-right">Flower Name</label>

                <div class="col-md-6">
                    <input id="fname" class="form-control" name="productname">
                </div>
            </div>

            <div class="form-group row">
                <label for="fprice" class="col-md-4 col-form-label text-md-right">Flower Price (Rupiah)</label>

                <div class="col-md-6">
                    <input id="fprice" class="form-control" name="productprice">
                </div>
            </div>

            <div class="form-group row">
                <label for="fdesc" class="col-md-4 col-form-label text-md-right">Flower Description</label>

                <div class="col-md-6">
                    <input id="fdesc" class="form-control" name="productdesc">
                </div>
            </div>

            <div class="form-group row">
                <label for="fimg" class="col-md-4 col-form-label text-md-right">Flower Image</label>

                <div class="col-md-6">
                    <input type="file" id="fimg" class="" name="productimg">
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">Add</button>

                </div>
            </div>
        </form>
    </div>
</div>

@endsection