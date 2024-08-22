<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Province; 
use App\Models\City; 

class RegionController extends Controller
{
    public function index()
    {
    
        $regions = Region::with('provinces.cities')->get();
        return response()->json($regions);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'provinces' => 'array',
            'provinces.*.name' => 'required|string|max:255',
            'provinces.*.cities' => 'array',
            'provinces.*.cities.*.name' => 'required|string|max:255',
        ]);

        $region = Region::create(['name' => $data['name']]);

        foreach ($data['provinces'] as $provinceData) {
            $province = Province::create([
                'name' => $provinceData['name'],
                'region_id' => $region->id,
            ]);

            foreach ($provinceData['cities'] as $cityData) {
                City::create([
                    'name' => $cityData['name'],
                    'province_id' => $province->id,
                ]);
            }
        }

        return response()->json($region->load('provinces.cities'), 201);
    }

    public function provinces($regionId)
    {
        $provinces = Province::where('region_id', $regionId)->get();
        return response()->json($provinces);
    }

    public function destroy($id)
    {

        $region = Region::find($id);

        if (!$region) {
            return response()->json(['message' => 'Region not found'], 404);
        }

      
        foreach ($region->provinces as $province) {
            foreach ($province->cities as $city) {
                $city->delete();
            }
            $province->delete();
        }

        $region->delete();

        return response()->json(['message' => 'Region deleted successfully'], 200);
    }


      
       public function update(Request $request, $id)
       {
       
           $request->validate([
               'name' => 'required|string|max:255',
           ]);
   
        
           $region = Region::findOrFail($id);
   
        
           $region->name = $request->input('name');
           
         
           $region->save();
   
           // Retornar una respuesta exitosa
           return response()->json([
               'message' => 'Región actualizada exitosamente',
               'region' => $region
           ], 200);
       }
}



