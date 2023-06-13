<?php

namespace App\Http\Controllers\landingpage;

use App\Models\citys;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\districts;
use App\Models\villages;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{
    public function index()
    {

        $items = Address::where('user_apotech_id', auth()->user()->userApotech->id)
            ->with('userApotech')
            ->get();

        // $names = $items->pluck('userApotech.name');

        // dd($items);
        return view('landing-page.profile.address.index', [
            'items' => $items
        ]);
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

    public function store()
    {
        request()->validate([
            // 'penerima' => ['required'],
            // 'no_handphone' => ['required'],
            // 'kabupaten' => ['required'],
            'kecamatan' => ['required'],
            'full_address' => ['required'],
            'latitude' => ['required'],
            'longitude'  => ['required']
        ]);

        DB::beginTransaction();
        try {
            $data = request()->only(['kecamatan', 'full_address', 'latitude', 'longitude']);

            if (request('is_default')) {
                // ubah alamat sebelumnya is default jadi 0
                auth()->user()->userApotech->addressess()->update([
                    'is_default' => 0
                ]);
                $data['is_default'] = 1;
            }

            auth()->user()->userApotech->addressess()->create($data);

            DB::commit();
            return redirect()->route('address.index')->with('success', 'Alamat berhasil ditambahkan.');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
            return redirect()->route('address.index')->with('error', 'Alamat gagal ditambahkan.');
        }
    }

    public function edit($id)
    {
        // $citys = citys::where('name', 'KABUPATEN INDRAMAYU')->pluck('name', 'id');
        $districts = districts::orderBy('name', 'asc')->where('city_code', '3212')->pluck('name', 'id');
        $item = Address::where('id', $id)->firstOrFail();
        return view('landing-page.profile.address.edit', [
            'item' => $item,
            // 'citys' => $citys,
            'districts' => $districts,
        ]);
    }

    public function update($id)
    {
        request()->validate([
            // 'penerima' => ['required'],
            // 'no_handphone' => ['required'],
            // 'kabupaten' => ['required'],
            'kecamatan' => ['required'],
            'full_address' => ['required'],
            'latitude' => ['required'],
            'longitude'  => ['required']
        ]);
        $item = Address::where('id', $id)->firstOrFail();
        DB::beginTransaction();
        try {
            $data = request()->only(['kecamatan', 'full_address', 'latitude', 'longitude']);

            if (request('is_default')) {
                // ubah alamat sebelumnya is default jadi 0
                // ubah alamat sebelumnya is default jadi 0
                // auth()->user()->userApotech->addressess()->update([
                //     'is_default' => 0
                // ]);

                $data['is_default'] = 1;

                // dd($data);
            } else {
                $data['is_default'] = 0;
            }

            // dd($data);
            $item->update($data);

            if (request('is_default')) {
                //ubah alamat sebelumnya is default jadi 0
                Address::where('id', '!=', $id)->update([
                    'is_default' => 0
                ]);
            }

            DB::commit();
            return redirect()->route('address.index')->with('success', 'Alamat berhasil diupdate.');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
            return redirect()->route('address.index')->with('error', 'Alamat gagal diupdate.');
        }
    }


    public function getVillages($id)
    {
        $villages = villages::where('district_id', $id)->pluck('name', 'id');
        return response()->json($villages);
    }

    public function destroy($id)
    {
        $item = Address::findOrFail($id);
        $item->delete();
        return redirect()->route('address.index')->with('success', 'Alamat berhasil dihapus.');
    }
}
