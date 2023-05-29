<?php

namespace App\Http\Controllers\landingpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        return view('landing-page.profile.address.index');
    }

    public function create()
    {
        return view('landing-page.profile.address.create');
    }
    public function edit($id)
    {
        return view('landing-page.profile.address.edit');
    }
}
