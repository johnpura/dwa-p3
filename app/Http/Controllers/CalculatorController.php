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
        return view('calculators.loan')->with([ 'title' => config('app.name'),
                                                'loanAmount' => null ]);
    }

    /**
    * POST /calculators/loan
    */
    public function calculateLoanAmount(Request $request)
    {
        // validate user data
        $this->validate($request, [
            'monthlyPayments' => 'required|numeric',
            'interestRate' => 'required|numeric',
            'loanTerm' => 'required'
        ]);

        // initialize POST data
        $payments = $request->input('monthlyPayments');
        $rate = $request->input('interestRate');
        $term = $request->input('loanTerm');
        $wholeDollar = $request->has('wholeDollar');

        // Conversions
        $rate = ($rate / 12) / 100;

        /* Use the formula 
        *  A = (P/i)[1 − (1+i)^-N]
        * 
        *  A is the amount of the loan
        *  P is the monthly payments
        *  i is the interest rate
        *  N is the number of payments 
        */
        $loanAmount = ($payments / $rate) * (1 - pow((1 + $rate), -$term));
        // check if user wants to round off to the nearest dollar
        if ($wholeDollar == true) {
            $loanAmount = round ($loanAmount, 0, PHP_ROUND_HALF_UP);
        }
        else {
            $loanAmount = round ($loanAmount, 2);
        }

        // redirect the user to the loan calculator with the amount of the loan
        return view('calculators.loan')->with([ 'title' => config('app.name'),
                                                'loanAmount' => $loanAmount ]);
    }
}
