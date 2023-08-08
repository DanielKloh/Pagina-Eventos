@extends('layout.userAuth')
@section('title',"Login")
@section('content')

<div class="container containerCreate">
<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <div class="card-logo">
                <img src="/img/iconProjeto.png" alt="Logo do projeto">
            </div>
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
                <x-label for="name" class="form-label" value="{{ __('Name') }}" />
                <x-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mb-3">
                <x-label for="email" class="form-label" value="{{ __('Email') }}" />
                <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mb-3">
                <x-label for="password" class="form-label" value="{{ __('Password') }}" />
                <x-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mb-3">
                <x-label for="password_confirmation" class="form-label" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="btnMarginLeft btn btn-success">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
</div>
@endsection