@extends('layouts.app') @section('content')
<div class="jumbotron">
	<div class="container">
		<h3>Upload Report</h3>

		<div class="row">
			<div class="col-md-12">
				<form method="POST" action="/payroll" enctype="multipart/form-data" id="payroll-form">
					@csrf

					<div class="form-group row">

						<div class="col-md-6">
							<input id="payroll-file" type="file" class="form-control"
								name="file-upload" value="{{ old('file-upload') }}" required
								autofocus>
						</div>
						<div class="col-md-2">
							<button type="submit" class="btn btn-primary">Upload Report</button>
						</div>
						<div class="col-md-2">
							<a href="/" class="btn btn-primary">Cancel</a>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8">
				@isset($message)
					<div class="alert alert-danger " role="alert">
						<span class="glyphicon glyphicon-exclamation-sign"
							aria-hidden="true"></span> <span class="sr-only">Error:</span>
						{{$message}}
					</div>
				@endisset
			</div>
		</div>
	</div>
</div>

@if (count($reports) > 0)
<div class="container">
	<!-- Example row of columns -->
	<div class="row">
		<div class="col-md-8">
			<h2>Payroll Report</h2>
			@include('report_table')
		</div>
	</div>
</div>
@endif
<!-- /container -->
@endsection
