@extends('layouts.master')

@push('metadata')
    {{-- Required meta tags --}}
    <meta charset="utf-8">
    {{-- Responsive viewport meta tag  --}}
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
@endpush

@section('title')
    {{ $title }}
@endsection

@push('styles')
    {{-- Font Style--}}
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    {{-- Bootstrap CSS --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    {{-- Custom styles --}}
    <link href="/css/main.css" rel="stylesheet">
@endpush

@section('masthead')
    <header class="py-5 text-center">
        @if(count($errors) > 0)
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    <strong>{{ $error }}</strong> 
                </div>
            @endforeach
        @endif
        <h1 class="title">{{ $title }}</h1>
        <p class="lead">This loan calculator will determine how much you can borrow for different payments, interest rates and terms.</p>
    </header>
@endsection

@section('loanCalculatorForm')
    <form class="form-wrapper" id="loanCalculator" method="post" action="/calculateLoan" novalidate>
        {{ csrf_field() }}
        {{-- Monthly Payments --}}
        <div class="mb-3">
            <label for="monthlyPayments">Monthly Payments</label>
            <input type="text" class="form-control" id="monthlyPayments" name="monthlyPayments">
            @if($errors->get('monthlyPayments'))
                <ul class="list-unstyled">
                    @foreach($errors->get('monthlyPayments') as $error)
                        <li class="invalid">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            
        </div>
        {{-- Interest Rate --}}
        <div class="mb-3">
            <label for="interestRate">Interest Rate</label>
            <input type="text" class="form-control" id="interestRate" name="interestRate">
            @if($errors->get('interestRate'))
                <ul class="list-unstyled">
                    @foreach($errors->get('interestRate') as $error)
                        <div class="invalid">{{ $error }}</div>
                    @endforeach
                </ul>
            @endif
        </div>
        {{-- Loan Period --}}
        <div class="mb-3">
            <label for="loanTerm">Loan Term (in months)</label>
            <select class="custom-select d-block w-100" id="loanTerm" name="loanTerm">
                <option value="">Choose...</option>
                <option value="12">12</option>
                <option value="24">24</option>
                <option value="36">36</option>
                <option value="48">48</option>
                <option value="60">60</option>
                <option value="72">72</option>
                <option value="84">84</option>
            </select>
            @if($errors->get('loanTerm'))
                @foreach($errors->get('loanTerm') as $error)
                    <div class="invalid">{{ $error }}</div>
                @endforeach
            @endif
        </div>
        {{-- Whole dollar amount checkbox --}}
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="wholeDollar" name="wholeDollar">
            <label class="custom-control-label" for="wholeDollar">Round off to the nearest dollar</label>
        </div>
        {{-- Calculate button --}}
        
        <div class="row mt-3">
            <div class="col">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Calculate</button>
            </div>
            <div class="col">
                <button class="btn btn-primary btn-lg btn-block" type="reset">Clear</button>
            </div>
          </div>
        
    </form>
@endsection

@section('loanSummary')
    <footer id="loanAmount">
        <div class="text-center">
            <h3 class="display-4">Estimated Loan Amount</h3>
            <h1 class="display-2 text-primary">${{ $loanAmount }}</h1>
        </div>
    </footer>
@endsection

@push('scripts')
    {{-- Required JavaScript for Bootstrap --}}
    {{-- jQuery first, then Popper.js, then Bootstrap J --}}
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endpush