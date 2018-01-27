<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\User;
use DB;

class CarController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Status 0 = deleted
    | Status 1 = on hold
    | Status 3 = allowed
    |--------------------------------------------------------------------------
    |*
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $category_id = $request->category_id;
        $categories = Category::all();
        if(isset($category_id)){
            $allCars = Car::where('category_id', $category_id)->paginate(6);
            $cars = Car::where('status', 2)->where('category_id', $category_id)->paginate(6);
        }
        else{
            $allCars = Car::paginate(6);
            $cars = Car::where('status', 2)->paginate(6);
        }
        $user = Auth::user();
        $isAdmin = isset($user) ? $user->isAdmin() : false;

        if ($request->ajax()) {
            return view('cars.index', compact('categories', 'cars', 'isAdmin', 'allCars'))->render();
        }
        return view('cars.index', compact('categories', 'cars', 'isAdmin', 'allCars'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = Auth::user();
        if($user){
            $categories = Category::all();
            return view('cars.create', compact('categories'));
        }
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array | \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            if (isset($request)) {
                /*get id of Category*/
                $cat_name = $request->category;
                $cats = Category::where('cat_name', $cat_name)->take(1)->get();
                foreach($cats as $cat){}
                /*end it*/



                $car = new Car;
                $car->car_name = $request->name;
                $car->car_price = $request->price;
                $car->car_year = $request->year;
                $car->car_mileage = $request->mileage;
                $car->user_id = Auth::user()->id;
                $car->category_id = isset($cat->id) ? $cat->id : 2;

                /*Check if upload is image*/
                $upload = $request->img;
                if(isset($upload)){
                    if(substr($upload->getMimeType(), 0, 5) == 'image') {

                        $name = $upload->getClientOriginalName();
                        $upload->move('images', $name);
                        $car->car_img = $name;
                    }
                }
                else{
                    $car->car_img = "default.jpg";
                }
                /*end Check*/
                $car->save();
                return redirect()->intended('/');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = Auth::user();
        $isAdmin = isset($user) ? $user->isAdmin() : false;
        $car = Car::where('id', $id)->get();
        $car = $car[0];
        return view('cars.show', compact('car', 'isAdmin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

//    public function categoryChange(Request $request){
//        $category_id = isset($request->category_id) ? $request->category_id : "";
//        $cars = Car::where('category_id', $category_id)->get();
//        if ($request->ajax()) {
//            return view('cars.index', compact('cars'))->render();
//        }
//        return view('cars.index', compact('cars'));
//
//    }

}
