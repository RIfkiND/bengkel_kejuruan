@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    @if(Auth::user()->role == 'Guru')
                    <a href="#" class="btn btn-primary">Guru</a>
                    @elseif(Auth::user()->role == 'Admin')
                    <a href="#" class="btn btn-primary">Admin</a>
                    @elseif(Auth::user()->role == 'SuperAdmin')
                    <a href="#" class="btn btn-primary">SuperAdmin</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
