<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\StatusUser;
use App\Models\UserApotech;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class RequestVerificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('contents.request-verification.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function datatable(Request $request)
{
    $roles = ['buyer', 'seller'];

    $data = UserApotech::with(['user.status_user'])
        ->whereHas('user', function ($query) use ($roles) {
            $query->where(function ($subQuery) {
                $subQuery->whereNotNull('licenses')
                    ->orWhere('licenses', '<>', '');
            })
            ->whereHas('roles', function ($roleQuery) use ($roles) {
                $roleQuery->whereIn('name', $roles);
            });
        })
        ->get();

    return DataTables::of($data)->make();
}





    public function set_verification()
    {
        if (request()->ajax()) {
            DB::beginTransaction();
            try {
                $user_apotech_id = request('user_apotech_id');
                $status_name = request('status_name');
                $user_apotech = UserApotech::where('id', $user_apotech_id)->first();
                    $user_apotech->user()->update([
                        'status_user_id' => StatusUser::where('name', $status_name)->first()->id ?? NULL
                    ]);
                    if ($status_name === 'verified') {
                        $user_apotech->user->assignRole('seller');
                    }
                DB::commit();
                return response()->json($user_apotech_id);
            } catch (\Throwable $th) {
                throw $th;
                DB::rollBack();
                return response()->json(['status' => false]);
            }
        }
    }


    


}
