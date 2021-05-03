<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Validator;




class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return $this->returnResponse('Data Receive Successfully',$categories);
    }

    public function store(Request $request){

       
        $category = new Category();
        $category->name = $request->input('name');
        $category->slug = $request->input('name');
        $category->save();
        return $this->returnResponse('Data save successfully',$category,true,201);
        }
}
