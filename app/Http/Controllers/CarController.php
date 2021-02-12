<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->name;
        $color = $request->color;
        $type = $request->type;


        if (!isset($name)) {
            return 'กรุณากรอกชื่อ';
        } elseif (!isset($color)) {
            return 'กรุณาระบุสี';
        } elseif (!isset($type)) {
            return 'กรุณาระบุประเภทรถ';
        }
        // เช็คซ้ำ
        $car_name=Car::where('name',$name)->first();

        if (empty($car_name)) {
            // new car
            $car = new Car();
            $car->name=$name;
            $car->color=$color;
            $car->type=$type;
            $car->save();
            return response()->json([
                'massage' =>'สำเร็จ',
                'data' => $car,
            ],200);
        } else {
            // return 'มีรถในระบบแล้ว';
            return response()->json([
                'massage' =>'มีรถนี้ในระบบแล้ว',
            ],200);
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        //
    }
}
