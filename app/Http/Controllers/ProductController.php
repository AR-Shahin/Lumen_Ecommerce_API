<?php

namespace App\Http\Controllers;

use App\Helper\HelperTrait;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use Illuminate\Validation\Validator;

class ProductController extends Controller
{
    use HelperTrait;
    public function index()
    {
        $products = Product::latest()->get();
        return $this->returnResponse('Data Retrieve Successfully', $products);
    }

    public function store(ProductRequest $request)
    {
        $product = new Product();
        $product->name = $request->input('name');
        $product->slug = $request->input('name');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');
        $product->category_id = $request->input('category_id');
        $product->description = $request->input('description');
        if($request->has('image')){
            $img = $request->file('image');
            $this->storageImageOrFile($img, 'uploads/products/', 'image', $product);
        }
        $product->save();
        return $this->returnResponse('Data save successfully', $product, true, 201);
    }

    public function show($id)
    {
        $product = Product::find($id);

        return $product ? $this->returnResponse('Data Retrieve Successfully!', $product) : $this->returnResponse('Data not Found!', [], false, 404);
    }

    public function update(ProductRequest $request, $id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->name = $request->input('name');
            $product->slug = $request->input('name');
        }
        return $product->save() ? $this->returnResponse('Data Updated Successfully!!', $product) : $this->returnResponse('Data not found!', [], false, 404);
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
        }
        return $product ? $this->returnResponse('Product Deleted Successfully!!', []) : $this->returnResponse('Product not found!', [], false, 404);
    }
}
