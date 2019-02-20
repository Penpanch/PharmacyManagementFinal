<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promotion;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('userPharmacy.u_home');
    }

    public function indexaboutU()
    {
        return view('userPharmacy.u_about');
    }


    public function indexprofileU()
    {
        return view('userPharmacy.u_profile');
    }


    public function indexpromotionU(){
        $promotions = Promotion::all();
        return view('userPharmacy.u_promotion', ['promotions' => $promotions]);
    }

    public function indexstockU()
    {
        return view('userPharmacy.u_stock');
    }


    

}
