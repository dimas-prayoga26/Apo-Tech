<?php

namespace App\Http\Controllers\landingpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductOrderInformationShopController extends Controller
{
    public function index()
    {
        return view('landing-page.profile.product-order-information.index');
    }
}
