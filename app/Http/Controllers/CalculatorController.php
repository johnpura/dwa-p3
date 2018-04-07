<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    /**
    * GET /calculators/loan
    */
    public function index()
    {
        return view('calculators.loan')->with(['title' => config('app.name')]);
    }
}
