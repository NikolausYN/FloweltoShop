<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function index($id)
    {
        $id = Product::find($id);
        return view('update', ['prod'=>$id]);
    }
}
