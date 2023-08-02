@extends('layout.main')
@section('title',"Dashboard")
@section('content')


<div class="col-md-10 offset-md-1 dashboard-title-container">

    <h1>Daniel Events Dashboard</h1>
</div>


<div class="col-md-10 offset-md-1 dashboard-events-container">


    @if (count($events) > 0)
        <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Participantes</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($events as $item)
                    <tr>
                        <td scropt="row">{{$loop->index + 1}}</td>
                        <td><a href="/event/{{$item->id}}"> {{$item->title}}</a></td>
                        <td>{{$item->participantes}}</td>
                        <td>
                            <a href="/event/edit/{{$item->id}}" class="btn btn-info edit-btn">Editar</a>
                            <form action="/event/{{$item->id}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-danger delete-btn">Deletar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    @else ()
    <p>Voce não tem eventos <a href="/event/create">Criar Eventos</a></p>
    @endif
</div>


@endsection