<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>

    @stack('metadata')

    <title>@yield('title', 'Loan Calculator')</title>

    @stack('styles')

  </head>
  <body>
    <div class="container">

      @yield('masthead')

      @yield('loanCalculatorForm')

      @if (isset($loanAmount))
        @yield('loanSummary')  
      @endif

      @stack('scripts')

    </div>
  </body>
</html>