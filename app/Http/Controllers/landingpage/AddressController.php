<?php

namespace App\Http\Controllers\landingpage;

use App\Models\citys;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\districts;
use App\Models\villages;

class AddressController extends Controller
{
    public function index()
    {
        return view('landing-page.profile.address.index');
    }

    public function create()
    {
        $citys = citys::where('name', 'KABUPATEN INDRAMAYU')->pluck('name', 'id');
        $districts = districts::orderBy('name', 'asc')->where('city_code', '3212')->pluck('name', 'id');

        // dd($citys);
        return view('landing-page.profile.address.create', [
            'citys' => $citys,
            'districts' => $districts,
        ]);
    }
    public function edit($id)
    {
        return view('landing-page.profile.address.edit');
    }

    public function getVillages($id)
    {
        $villages = villages::where('district_id', $id)->pluck('name', 'id');
        return response()->json($villages);
    }

}
