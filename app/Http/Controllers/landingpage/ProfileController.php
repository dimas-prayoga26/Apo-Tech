<?php

namespace App\Http\Controllers\landingpage;

use App\Models\StatusUser;
use App\Models\UserApotech;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        return view('landing-page.profile.index');
    }

    public function edit()
    {
        return view('landing-page.profile.edit',[
            'user_apotech' => auth()->user()->userApotech
        ]);
    }

    public function update()
    {
        request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'nama_toko' => ['required'],
            'phone_number' => ['required'],
            'jenis_kelamin' => ['required']
        ]);


        $data = request()->only(['first_name','last_name','phone_number','jenis_kelamin']);

        $user_apotech = auth()->user()->userApotech;

        $user_apotech->update($data);

        $user_apotech->user->update([
            'username' => request('nama_toko')
        ]);

        return redirect()->back()->with('success','Profile berhasil diupdate');
    }

    public function upload_license(Request $request)
{
    $request->validate([
        'uploadLicense' => ['required', 'mimes:png,jpg,jpeg', 'max:2048']
    ]);

    try {
        DB::beginTransaction();

        $path = 'files/licenses/image';

        if ($request->hasFile('uploadLicense')) {
            $file = $request->file('uploadLicense');
            $productImageFileName = md5($file->getClientOriginalName() . rand(rand(231, 992), 123882)) . "." . $file->getClientOriginalExtension();
            $data = $file->storeAs($path, $productImageFileName, 'public');
        } else {
            $data = null;
        }

        Auth::user()->userApotech->update([
            'licenses' => $data
        ]);

        Auth::user()->update([
            'status_user_id' => StatusUser::where('name', 'verification process')->first()->id ?? null
        ]);

        if (count($request->allFiles()) > 0) {
            if (!File::isDirectory($path)) File::makeDirectory($path, 0755, true, true);

            if ($request->file('uploadLicense')) {
                $request->file('uploadLicense')->move($path, $productImageFileName);
            }
        }

        DB::commit();

        return redirect()->route('profile.index')->with('success', 'License berhasil diupload');
    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->route('profile.index')->with('error', 'Terjadi kesalahan saat mengupload License');
    }
}

public function change_image_profile(Request $request)
    {
        $request->validate([
            'image_profile' => ['required', 'mimes:png,jpg,jpg', 'max:2048']
        ]);

        try {
            DB::beginTransaction();
    
            $path = 'files/profile/image';

             // Menghapus gambar lama
            // Menghapus gambar lama
            $oldImage = Auth::user()->userApotech->image;
            if ($oldImage) {
                File::delete(public_path($oldImage));
            }
    
            if ($request->hasFile('image_profile')) {
                $file = $request->file('image_profile');
                $productImageFileName = md5($file->getClientOriginalName() . rand(rand(231, 992), 123882)) . "." . $file->getClientOriginalExtension();
                $data = $file->storeAs($path, $productImageFileName, 'public');
            } else {
                $data = null;
            }
    
            Auth::user()->userApotech->update([
                'image' => $data
            ]);
    
            if (count($request->allFiles()) > 0) {
                if (!File::isDirectory($path)) File::makeDirectory($path, 0755, true, true);
    
                if ($request->file('image_profile')) {
                    $request->file('image_profile')->move($path, $productImageFileName);
                }
            }
    
            DB::commit();
    
            return redirect()->route('profile.index')->with('success', 'Profile berhasil diupdate');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('profile.index')->with('error', 'Terjadi kesalahan saat mengupload Profile');
        }

        return redirect()->route('profile.index')->with('success', 'Profile berhasil diupdate');
    }

}
