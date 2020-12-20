@extends('layouts.app')
@section('content')

<div style="display: flex" class="section">
<div class="img">
<img src="/image/{{$cate -> catimg}}" style="margin-left: 70px; height: 580px; width: 580px" alt="Flower">
</div>

<div class="card" style="margin-left:50px; width: 1150px">
    <div class="card-header">Update Category</div>

    <div class="card-body">
        <form method="POST" action="/managec/{{$cate->id}}/update">
            @method("PATCH")
            @csrf

            <div class="form-group row">
                <label for="catname" class="col-md-4 col-form-label text-md-right">Category Name</label>

                <div class="col-md-6">
                    <input id="catname" class="form-control" name="catname">
                </div>
            </div>

            <div class="form-group row">
                <label for="catimg" class="col-md-4 col-form-label text-md-right">Category Image</label>

                <div class="col-md-6">
                    <input type="file" id="catimg" class="" name="catimg">
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