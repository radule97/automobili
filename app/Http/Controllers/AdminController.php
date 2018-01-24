<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Car;

class AdminController extends Controller
{
    //
    public function __construct(){

        $this->middleware('IsAdmin');

    }

    public function index(){

        return view('admin.index' /*,compact('')*/);

    }

    public function makeCategory(){

        return view('admin.makeCategory' /*,compact('')*/);

    }

    public function store(Request $request){

        $category = new Category;
        $category->cat_name = isset($request->name) ? $request->name : "";
        $category->save();
        return redirect()->intended('/admin');

    }
    public function allowCar(Request $request){
        $id = $request->id;
        Car::where('id', $id)->update(['status'=>'2']);
        return redirect()->back();
    }
    public function deleteCar(Request $request){
        $id = $request->id;
        Car::where('id', $id)->update(['status'=>'0']);
        return redirect()->back();
    }

}
