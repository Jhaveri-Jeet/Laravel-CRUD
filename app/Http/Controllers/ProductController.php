<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index', ['products' => Product::latest()->get()]);
    }

    public function insertProduct(Request $request)
    {
        $request->validate([
            'productName' => 'required',
            'productDescription' => 'required',
            'productImage' => 'required|mimes:jpeg,png,jpg',
        ]);

        // Uploading Image
        $imageName = time() . '.' . $request->productImage->extension();
        $request->productImage->move(public_path('uploads'), $imageName);

        $product = new Product();
        $product->name = $request->productName;
        $product->description = $request->productDescription;
        $product->image = $imageName;

        $product->save();
        return back()->withSuccess("Product Successfully Uploaded !");
    }

    public function updateProductPage($id)
    {
        return view('products.update', ['product' => Product::where('id', $id)->first()]);
    }

    public function updateProduct(Request $request, $id)
    {
        $request->validate([
            'productName' => 'required',
            'productDescription' => 'required',
            'productImage' => 'nullable|mimes:jpeg,png,jpg',
        ]);

        $product = Product::where('id', $id)->first();
        if (isset($request->productImage)) {
            // Uploading Image
            $imageName = time() . '.' . $request->productImage->extension();
            $request->productImage->move(public_path('uploads'), $imageName);
            $product->image = $imageName;
        }

        $product->name = $request->productName;
        $product->description = $request->productDescription;

        $product->save();
        return back()->withSuccess("Product Successfully Updated !");
        dd($request->all());
    }

    public function deleteProduct($id)
    {
        $product = Product::where('id', $id)->first();
        $product->delete();

        return back();
    }
}
