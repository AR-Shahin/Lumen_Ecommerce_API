<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Validation\Validator;




class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return $this->returnResponse('Data Retrieve Successfully',$categories);
    }

    public function store(CategoryRequest $request){

        $category = new Category();
        $category->name = $request->input('name');
        $category->slug = $request->input('name');
        $category->save();
        return $this->returnResponse('Data save successfully',$category,true,201);
    }

    public function show($id)
    {
        $category = Category::find($id);

        return $category ? $this->returnResponse('Data Retrieve Successfully!', $category) : $this->returnResponse('Data not Found!',[],false,404);
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = Category::find($id);
        if ($category) {
            $category->name = $request->input('name');
            $category->slug = $request->input('name');
        }
        return $category->save() ? $this->returnResponse('Data Updated Successfully!!', $category) : $this->returnResponse('Data not found!',[],false,404);
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if ($category) {
            $category->delete();
        }
        return $category ? $this->returnResponse('Product Deleted Successfully!!', []) : $this->returnResponse('Product not found!',[],false,404);
    }
}
