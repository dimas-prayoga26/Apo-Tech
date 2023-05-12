<?php

namespace App\Http\Controllers\landingpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowShopController extends Controller
{
    public function index()
    {
        return view('landing-page.show-shop.index');
    }
}
