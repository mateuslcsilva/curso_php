@extends('layouts.main')
@section('title', 'HDC Events')

@section('content')
    <div class="col-md-12 p-4" id="searchContainer">
        <h1>Busque um evento</h1>
        <form action="/" method="GET">
            <input type="text" autocomplete="off" id="search" name="search" class="form-control" placeholder="Procurar...">
        </form>
    </div>

    <div id="eventsContainer" class="col-md-12 p-4">
        @if($search)
        <h2 class="mb-3">Buscando por: {{ $search }}</h2>
        @else
        <h2>Próximos eventos</h2>
        <p>Veja os eventos nos próximos dias</p>
        @endif
        <div id="cardsContainer" class="cards-container px-4">

            @foreach ($events as $event)
                <div class="card col-md-3 p-2">
                    @if ($event->image)
                        <img src="/img/events/{{ $event->image }}" alt="{{ $event->title }}">
                    @else
                        <img src="/img/event_placeholder.jpg" alt="{{ $event->title }}">
                    @endif
                    <div class="card-body">
                        <p class="card-date">{{ date('d/m/y', strtotime($event->date)) }}</p>
                        <h5 class="card-title">{{ $event->title }}</h5>
                        <p class="card-participants">{{ count(array_unique($event->users->all())) }}  participante{{ count(array_unique($event->users->all())) > 1 ? "s" : ""}}</p>
                        <a href="/events/{{ $event->id }}" class="btn btn-primary">Saber Mais</a>
                    </div>
                </div>
            @endforeach
        </div>
        @if (count($events) == 0 && $search)
        <h5>Não foi encontrato nenhum resultado para busca: {{ $search }}</h5>
        @elseif(count($events) == 0)
        <h3>Não há eventos no momento!</h3>
        @endif
    </div>

@endsection
