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
        $title = 'Loan Calculator';
        return view('calculators.loan')->with(['title' => $title ]);
    }
}
