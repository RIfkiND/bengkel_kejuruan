@extends('layouts.app')

@section('content')
    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content ">
                        <div class="card login-form mb-0">
                            <div class="card-body d-flex align-items-center"> <!-- Updated line -->
                                <div class="col-md-6"> <!-- Updated line -->
                                    <img src="../Asset/images/login.png" class="img-fluid" alt="Login Image">
                                    <!-- Updated line -->
                                </div>
                                <h2 class="d-flex position-absolute" style="top: 5%; right: 43%">Login</h2>
                                <!-- Updated line -->
                                <div class="col-md-6"> <!-- Updated line -->
                                    @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    <form class="mt-5 mb-5 login-input" method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="form-group">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email" autofocus
                                                placeholder="Email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                required autocomplete="current-password" placeholder="Password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary" style="width: 100%">Masuk</button>
                                    </form>
                                </div> <!-- Updated line -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
