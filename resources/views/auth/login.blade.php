@extends('layout.userAuth')
@section('title',"Login")
@section('content')

<x-guest-layout>
    <div class="container container-login">
    <x-authentication-card>
        <x-slot name="logo">
            <div class="card-logo">
                <img src="/img/iconProjeto.png" alt="Logo do projeto">
            </div>
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif


        <form method="POST" action="{{ route('login') }}">
        @csrf

            <div class="mb-3">
                <x-label for="email" class="form-label" value="{{ __('Email') }}" />
                <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mb-3">
                <x-label for="password" class="form-label" value="{{ __('Password') }}" />
                <x-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="mb-3 form-check">
                <label for="remember_me">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>
            

            @if (Route::has('password.request'))
            <a class="forget" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
            @endif

            <x-button class="btnMarginLeft btn btn-success">
                {{ __('Log in') }}
            </x-button>

        </form>
       
    </x-authentication-card>
    </div>
</x-guest-layout>

@endsection