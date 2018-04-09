@extends('layouts.app')

@section('content')


<div class="container">
  <!-- Example row of columns -->
  <div class="row">
    <div class="col-md-8">
      <h2>Payroll Report</h2>
		@include('report_table')
    </div>
  </div>      
</div> <!-- /container -->


@endsection

