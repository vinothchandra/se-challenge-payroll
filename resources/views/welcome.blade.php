@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
<!--                 <div class="card-header">{{ __('Login') }}</div> -->

                <div class="card-body">
                    <form method="POST" action="/payroll">
                        @csrf

                        <div class="form-group row">
                            <label for="payroll-file" class="col-sm-4 col-form-label text-md-right">{{ __('Payroll File') }}</label>

                            <div class="col-md-6">
                                <input id="payroll-file" type="file" class="form-control{{ $errors->has('file-upload') ? ' is-invalid' : '' }}" name="file-upload" value="{{ old('file-upload') }}" required autofocus>

                                @if ($errors->has('file-upload'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('file-upload') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary"> Upload
                                </button>
                                <a href="/" class = "btn btn-primary">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
