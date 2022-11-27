@extends('user.layouts.login')
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
            <div class="card-group">
                <div class="card p-4">
                    <form role="form" method="POST" action="{{ route('user.checklogin') }}">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <h1>Login</h1>
                            <p class="text-muted">Sign In to your account</p>
                            @if(Session::has('unauthorized'))
                                <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">
                                    <i class="fa fa-warning"></i> &nbsp; {{ Session::get('unauthorized') }}
                                </p>
                            @endif
                            <div class="input-group mb-3">
                                <input id="email" type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-group mb-4">
                                <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="row">
                            <div class="col-6">
                                <button class="btn btn-primary px-4" type="submit">Login</button>
                            </div>
                            <div class="col-6 text-right">
                                <button class="btn btn-link px-0" type="button">Forgot password?</button>
                            </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection
