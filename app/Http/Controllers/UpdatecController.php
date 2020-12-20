<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class UpdatecController extends Controller
{
    public function index($id)
    {
        $id = Category::find($id)->first();
        return view('updatec', ['cate'=>$id]);
    }
}
