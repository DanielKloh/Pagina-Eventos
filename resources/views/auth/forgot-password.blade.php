@extends('layout.userAuth')
@section('title',"Login")
@section('content')
<div class="container container-forgot">
<x-guest-layout>
    <x-authentication-card>


        <x-slot name="logo">
            <div class="card-logo">
                <img src="/img/iconProjeto.png" alt="Logo do projeto">
            </div>
        </x-slot>

        <div class="forgotText">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-validation-errors class="mb-4" />

        <form method="POST" class="inputEmail" action="{{ route('password.email') }}">
            @csrf

            <div class="col-md-12">
                <x-label for="email" class="form-label" value="{{ __('Email') }}" />
                <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="">
                <x-button class="btnForgot btn btn-success">
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>


    </x-authentication-card>
</x-guest-layout></div>
@endsection