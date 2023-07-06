@extends('layout.main')
@section('title',"Daniel Events")
@section('content')
    

<div id="search-container" class="col-md-12">
    <h1>Busque um evento</h1>
    <form action="/" method="get">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
    </form>
</div>

<div id="events-container" class="col-md-12">
    @if ($search)
        <h2>Buscando por: {{$search}}</h2>
    @else
        <h2>Próximos Eventos</h2>
    @endif

    @if (count($events) == 0)
        <p class="subtitle">Não ha eventos </p>
        <div style="text-align: center">
            <a href="/" class="btn btn-primary falhaBusca" >Voltar</a>
        </div>
    @else
        <p class="subtitle">Veja os eventos dos próximos dias</p>
    @endif
    <div id="cards-container" class="row">
        @foreach($events as $event)
        <div class="card col-md-3">
            <img src="/img/events/{{$event->image}}" alt="{{ $event->title }}" class="imageEvent">
            <div class="card-body">
                <p class="card-date">{{date("d/m/y",strtotime($event->date))}}</p>
                <h5 class="card-title">{{ $event->title }}</h5>
                <p class="card-participants">X Participantes</p>
                <a href="/event/{{$event->id}}" class="btn btn-primary">Saber mais</a>
            </div>
        </div>
        @endforeach


    </div>
</div>

@endsection