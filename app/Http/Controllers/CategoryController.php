<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;
use App\Categories;

class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id,Request $request)
    {
        $category = Categories::find($id);
        $items = $category->items()->paginate(5);
        $categories = Categories::all();
        return view('ItemCRUD2.index',compact('items','categories'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
        
    }

}
