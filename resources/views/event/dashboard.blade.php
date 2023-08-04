@extends('layout.main')
@section('title',"Dashboard")
@section('content')


<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus Eventos</h1>
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
                        <td>{{count($item->users)}}</td>
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



<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Eventos que estou participando</h1>
</div>

<div class="col-md-10 offset-md-1 dashboard-events-container">

    @if (count($eventsAsParticipantes) > 0)
        
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
            @foreach ($eventsAsParticipantes as $item)
            <tr>
                <td scropt="row">{{$loop->index + 1}}</td>
                <td><a href="/event/{{$item->id}}"> {{$item->title}}</a></td>
                <td>{{count($item->users)}}</td>
                <td>
                   <form action="/event/leave/{{$item->id}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger btn-delete"> Sair do evento</button>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>

        </table>

    @else
    <p>Voce ainda não está participando de nenhum evento. <a href="/">Veja todos os eventso </a></p>    
    @endif
</div>


@endsection