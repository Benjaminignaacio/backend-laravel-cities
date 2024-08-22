<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Province;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        return City::all();
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string', 'province_id' => 'required|exists:provinces,id']);
        $city = City::create($request->all());
        return response()->json($city, 201);
    }

    public function show(City $city)
    {
        return $city;
    }

    public function update(Request $request, City $city)
    {
        $request->validate(['name' => 'required|string', 'province_id' => 'required|exists:provinces,id']);
        $city->update($request->all());
        return response()->json($city, 200);
    }

    public function destroy(City $city)
    {
        $city->delete();
        return response()->json(null, 204);
    }
}
