@extends('layout.main')
@section('title',$event->title)
@section('content')

  <div class="col-md-10 offset-md-1">
    <div class="row">
      <div id="image-container" class="col-md-6">
        <img src="/img/events/{{ $event->image }}" class="img-fluid" alt="{{ $event->title }}">
      </div>
      <div id="info-container" class="col-md-6">
        <h1>{{ $event->title }}</h1>
        <p class="event-city"><ion-icon name="location-outline"></ion-icon> {{ $event->city }}</p>
        <p class="events-participants"><ion-icon name="people-outline"></ion-icon> {{count($event->users)}} Participantes</p>
        <p class="event-owner">Dono do Evento:</p>
        <p class="event-owner">{{$eventOwner["name"]}}</p>
@if (!$hasUserJoin)
<form action="/event/join/{{$event->id}}" method="POST">
  @csrf
  <a href="/event/join/{{ $event->id }}" 
    class="btn btn-primary" 
    id="event-submit"
    onclick="event.preventDefault();
    this.closest('form').submit();">
    Confirmar Presença
  </a>
</form>
@else
<p class="already-joined-msg">Você ja está participando deste evento</p>
    
@endif
        <h3>O evento conta com:</h3>
        @foreach ($event->items as $item)
            <li id="items-list">  <span>{{$item}}</span></li>
        @endforeach
      </div>
      <div class="col-md-12" id="description-container">
        <h3>Sobre o evento:</h3>
        <p class="event-description">{{ $event->description }}</p>
      </div>
    </div>
  </div>

@endsection