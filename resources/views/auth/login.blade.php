@extends('layouts.app')

{{-- Style with CSS Vanilla in loginregister.css, setup at app.blade.php --}}
@section('content')
<section class="nodeva-container">
    <div class="login-nodeva-container">
        <form class="left-container" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="title-container">
                <p class="welcome-text">Welcome back user !!!</p>
                <p class="login-text">Log in</p>
            </div>

            <div class="input-container">
                <div class="">
                    <p class="">Email</p>
                    <input type="text" name="email" id="" class="@error('email') is-invalid @enderror"
                        value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="">
                    <p class="">Password</p>
                    <input type="password" name="password" id="" class="@error('password') is-invalid @enderror"
                        required autocomplete="current-password" placeholder="Password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="btn-login-container">
                <button class="" type="submit">LOGIN
                    <div style="width: 20px; padding-bottom: 3px">
                        <img src="{{ asset('Asset/icons/nodeva-icons/arrow-right.png') }}" alt="" class="w-full">
                    </div>
                </button>
            </div>
        </form>

        <div class="right-container position-relative">
            <div class="position-absolute img-login-container">
                <img src="{{ asset('Asset/images/Saly-10.png') }}" alt="" class="w-full">
            </div>
        </div>
    </div>

    <!-- Bootstrap Toast for Error Message -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="errorToast" class="toast align-items-center text-bg-danger border-0" role="alert" aria-live="assertive"
            aria-atomic="true" data-bs-delay="3000" style="width: 350px; border-radius: 15px;">
            <div class="d-flex">
                <div class="toast-body" style="padding: 15px;">
                    {{ session('error') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    </div>
</section>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Check if there is an error message in the session
        @if (session('error'))
            var errorToast = new bootstrap.Toast(document.getElementById('errorToast'));
            errorToast.show();
        @endif
    });
</script>

@endsection
