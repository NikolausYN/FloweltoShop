<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show()
    {
        $cat = Category::all();
        return view('managec', ['cat'=>$cat]);
    }

    public function delete($id)
    {
        $cate = Category::findOrFail($id);
        $cate->delete();
        $prod = Product::where('catid', $id->catid);
        $prod->delete();

        return redirect('/home'); 
    }
    
}
