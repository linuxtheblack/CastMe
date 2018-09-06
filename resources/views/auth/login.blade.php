@extends('layouts.master') 
@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    @if( session('error') )
    <div class="alert alert-danger" role="alert">
      {{ session('error') }}
    </div>
    @endif
    <div class="card">
      <div class="card-header">{{ title_case(__('login')) }}</div>

      <div class="card-body">
        <form action="{{ route('login') }}" method="POST" aria-label="{{ title_case(__('login')) }}">
          <div class="form-group row">
            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ title_case(__('e-mail address')) }}</label>

            <div class="col-md-6">
              <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"
                required autofocus> @if ($errors->has('email'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
              </span> @endif
            </div>
          </div>

          <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ title_case(__('password')) }}</label>

            <div class="col-md-6">
              <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required> @if ($errors->has('password'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
              </span> @endif
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-6 offset-md-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old( 'remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                  {{ title_case(__('remember me')) }}
                </label>
              </div>
            </div>
          </div>

          <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
              <button type="submit" class="btn btn-primary">
                {{ title_case(__('login')) }}
              </button>

              <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ title_case(__('forgot your password?')) }}
              </a>
            </div>
          </div>

          @csrf @method('POST')
        </form>
      </div>
    </div>
  </div>
</div>
@endsection