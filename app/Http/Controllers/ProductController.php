<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Support\Facades\DB;

use App\Category;
use App\Product;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index($id){
        $category = Category::where('id',$id)->first();
        $flower = Product::where('catid',$id)->simplePaginate(8);
        // return $cat;
        return view('products', compact('category','flower'));
    }

    public function search(Request $request, $id)
	{
        //return $id;
        $search = $request->search;
 
		$flower = DB::table('product')
		->where('productname','like',"%".$search."%")->get();
        $category = Category::find($id)->first();
 

		return view('products', compact('flower', 'category'));
 
    }
    
    public function searchharga(Request $request)
	{
        $searchharga = $request->search;
        
		$category = DB::table('product')
		->where('productprice','like', $searchharga)
        ->simplePaginate(8);
        $prod = Category::all()->first();
 
		return view('products', compact('category', 'prod'));
 
    }
    
    public function update(Request $request,Product $prod){
        $cat = DB::table('category')->where('catname',$request->catname)->first();
        //return $cat->id;

        if ($request->hasFile('productimg')) {
            if ($request->file('productimg')->isValid()) {
                $validated = $request->validate([
                    'catname' => 'required',
                    'productname' => 'required|string|min:5|unique:product',
                    'productdesc' => 'required|string|min:20',
                    'productprice' => 'required|numeric|min:50000',
                    'productimg' => 'image',
                ]);
                $extension = $request->image->extension();
                $request->image->storeAs('/public', $validated['productname'].".".$extension);
                $url = Storage::url($validated['productname'].".".$extension);
                Product::where('id', $prod->id)->update([
                    'catid' =>$cat->id,
                    'productname' => $request->productname,
                    'productdesc' => $request->productdesc,
                    'productprice' => $request->productprice,
                    'productimg' => $url,
                ]);
                return redirect('/home');
            }
        }
        else{
            $validated = $request->validate([
                'catname' => 'required',
                'productname' => 'required|string|min:5|unique:product',
                'productdesc' => 'required|string|min:20',
                'productprice' => 'required|numeric|min:50000',
            ]);
            
            Product::where('id', $prod->id)->update([
                'catid' => $cat->id,
                'productname' => $request->productname,
                'productdesc' => $request->productdesc,
                'productprice' => $request->productprice,
                'productimg' => "noimg.jpg",
            ]);
            return redirect('/home');
        }
    }

    public function addf(){
        return view('addf');
    }

    public function addflower(Request $request){
        // return $request;
        $cat = DB::table('category')->where('catname',$request->catname)->first();
        //return $cat->id;

        if ($request->hasFile('productimg')) {
            if ($request->file('productimg')->isValid()) {
                $validated = $request->validate([
                    'catname' => 'required',
                    'productname' => 'required|string|min:5|unique:product',
                    'productdesc' => 'required|string|min:20',
                    'productprice' => 'required|numeric|min:50000',
                    'productimg' => 'image|mimes:jpeg,png,jpg,gif,svg',
                ]);
                $extension = $request->image->extension();
                $request->image->storeAs('/public', $validated['productname'].".".$extension);
                $url = Storage::url($validated['productname'].".".$extension);
                Product::create([
                    'catid' =>$cat->id,
                    'productname' => $request->productname,
                    'productdesc' => $request->productdesc,
                    'productprice' => $request->productprice,
                    'productimg' => $url,
                ]);
                return redirect('/home');
            }
        }
        else{
            $validated = $request->validate([
                'catname' => 'required',
                'productname' => 'required|string|min:5|unique:product',
                'productdesc' => 'required|string|min:20',
                'productprice' => 'required|numeric|min:50000',
            ]);
            
            Product::create([
                'catid' => $cat->id,
                'productname' => $request->productname,
                'productdesc' => $request->productdesc,
                'productprice' => $request->productprice,
                'productimg' => "noimg.jpg",
            ]);
            return redirect('/home');
        }
    }

    public function delete($id)
    {
        $prod = Product::findOrFail($id);
        $prod->delete();

        return redirect('/home'); 
    }

    public function cart(Request $request, $id)
    {
        $validated = $request->validate([
            'qty' => 'required|numeric|min:1',
        ]);
        $harga = Product::findOrFail($id);
        $subtotal = $request->qty * $harga->productprice;
    
        Cart::create([
            'userid' => Auth::user()->id,
            'productid'=> $id,
            'qty' => $request->qty,
            'subtotal' => $subtotal,
        ]);

        return view('/home');
    }

    public function showcart(){
        $user = User::find(Auth::user()->id)->joinCart;


       return view('cart', ['user'=>$user]);
    }


    public function transh(){
        Transaction::create([
            'userid' => Auth::user()->id,
            'productid'=> $id,
            'qty' => $request->qty,
            'subtotal' => $subtotal,
        ]);

       return view('cart', ['user'=>$user]);

    }

}
