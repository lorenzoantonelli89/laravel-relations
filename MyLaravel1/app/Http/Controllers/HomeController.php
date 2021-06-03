<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Car;
use App\Brand;
use App\Pilot;

class HomeController extends Controller
{
    public function home(){

        $cars = Car::all();

        return view('pages.home', compact('cars'));
    }

    public function detailsCar($id){

        $car = Car::findOrFail($id);

        return view('pages.details', compact('car'));
    }

    public function newCar(){

        $brands = Brand::all();
        $pilots = Pilot::all();

        return view('pages.new-car', compact('brands', 'pilots'));

    }

    public function store(Request $request){

        $validate = $request -> validate([
            'model' => 'required|string|min:3',
            'kW' => 'required|integer|min:70|max:400',
            
        ]);
        
        $brand = Brand::findOrFail($request -> get('brand_id'));

        $car = Car::make($validate);

        $car -> brand() -> associate($brand);
        $car -> save();

        $car -> pilots() -> attach($request -> get('pilots_id'));
        $car -> save();

        return redirect() -> route('home');

        // dd($validate);
    }
}
