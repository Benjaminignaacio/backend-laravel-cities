<?php

namespace App\Http\Controllers;

use App\Models\Street;
use Illuminate\Http\Request;

class StreetController extends Controller
{
    public function index()
    {
        return Street::with('region', 'province', 'city')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'region_id' => 'required|exists:regions,id',
            'province_id' => 'required|exists:provinces,id',
            'city_id' => 'required|exists:cities,id',
        ]);
        $street = Street::create($request->all());
        return response()->json($street, 201);
    }

    public function show(Street $street)
    {
        return $street->load('region', 'province', 'city');
    }

    public function update(Request $request, Street $street)
    {
        $request->validate([
            'name' => 'required|string',
            'region_id' => 'required|exists:regions,id',
            'province_id' => 'required|exists:provinces,id',
            'city_id' => 'required|exists:cities,id',
        ]);
        $street->update($request->all());
        return response()->json($street, 200);
    }

    public function destroy(Street $street)
    {
        $street->delete();
        return response()->json(null, 204);
    }
}
