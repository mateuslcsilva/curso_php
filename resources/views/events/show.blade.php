@extends('layouts.main')
@section('title', $event->title)
    
@section('content')

    <div class="col md-10 offset-md-1 pt-5">
        <div class="row">
            <div id="image-container" class="col md-6">
                @if($event->image)
                <img src="/img/events/{{ $event->image }}" class="img-fluid event-image" alt="{{ $event->title }}">
                @else
                <img src="/img/event_placeholder.jpg" class="img-fluid event-image" alt="{{ $event->title }}">
                @endif
            </div>
            <div id="info-container" class="col-md-6">
                <h1>{{ $event->title }}</h1>
                <p class="event-city"><i class="bi bi-geo-alt"></i>{{ $event->city }}</p>
                <p class="event-participants"><i class="bi bi-people"></i>{{ count(array_unique($event->users->all())) }}  participante{{ count(array_unique($event->users->all())) > 1 ? "s" : ""}}</p>
                <p class="event-owner"><i class="bi bi-star"></i>{{ $eventOwner->name }}</p>
                <form action="/events/join/{{$event->id}}" method="POST"> 
                    @csrf
                    <a 
                    href="/events/join/{{$event->id}}" 
                    class="btn btn-primary mt-3" 
                    id="event-submit"
                    onclick="event.preventDefault();
                             this.closest('form').submit();"
                    >Confirmar presença</a>
                </form>
 
                @if($event->items)
                <h3 class="mt-3">O evento conta com:</h3>
                <div>
                    @foreach ($event->items as $item)
                    <p><i class="bi bi-check"></i>{{ $item }}</p>
                    @endforeach
                </div>
                    @endif
            </div>
            <p class="col-md-12">
                <h3>Sobre o evento:</h3>
                <p class="event-description">{{ $event->description }}</p>
            </p>
        </div>
    </div>
        
@endsection
