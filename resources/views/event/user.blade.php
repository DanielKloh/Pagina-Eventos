@extends('layout.main')
@section('title',"Profile")
@section('content')


<h1>Meu perfil</h1>

@php
    var_dump($user);
@endphp

<div class="container containerProfile ">

<h2> Nome de Usuário</h2>
<p>{{$user["name"]}}</p>

<h2> Email de accesso</h2>
<p>{{$user["email"]}}</p>


<button class="btn btn-info"><a href="/profile/edit">alterar</a></button>
</div>
{{-- <h2> {{$user["password"]}}</h2> --}}

@endsection