<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Province;
use App\Models\Region;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    public function index()
    {
        return Province::all();
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string', 'region_id' => 'required|exists:regions,id']);
        $province = Province::create($request->all());
        return response()->json($province, 201);
    }

    public function show(Province $province)
    {
        return $province;
    }

    public function update(Request $request, Province $province)
    {
        $request->validate(['name' => 'required|string', 'region_id' => 'required|exists:regions,id']);
        $province->update($request->all());
        return response()->json($province, 200);
    }

    public function destroy(Province $province)
    {
        $province->delete();
        return response()->json(null, 204);
    }

    public function cities($provinceId)
    {
        $cities = City::where('province_id', $provinceId)->get();
        return response()->json($cities);
    }
}
