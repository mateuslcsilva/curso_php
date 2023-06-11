@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container mt-3">
    <h1 style="color: #212121">Meus eventos</h1>
    <h4 style="color: #212121">{{ $user->name }}</h4>
</div>

<div class="col-md-10 offset-md-1 dashboard-events-container p-4 mt-3 pb-1">
    @if (count($events) > 0)
        @foreach ($events as $event)
        <h4>
            <a href="/events/{{ $event->id }}" target="_blank" ><i class="bi bi-box-arrow-up-right"></i>{{ $event->title }}</a>
            <p>{{ count(array_unique($event->users->all())) }}  participante{{ count(array_unique($event->users->all())) > 1 ? "s" : ""}}</p>
            <div>
                <i class="bi bi-pencil-square"><a href="#"></a></i>
                </i>
                <form action="/events/{{ $event->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"><i class="bi bi-trash"></i></button>
                </form>
            </div>
        </h4>
        @endforeach
    @else
        <p>Você ainda não tem eventos, <a href="/events/create">crie agora!!</a></p>
    @endif
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container p-4 mt-3 pb-1">
    @if (count($eventsAsParticipant) > 0)
        @foreach ((array_unique($eventsAsParticipant->all())) as $event)
        <h4>
            <a href="/events/{{ $event->id }}" target="_blank" ><i class="bi bi-box-arrow-up-right"></i>{{ $event->title }}</a>
            <p>{{ count(array_unique($event->users->all())) }}  participante{{ count(array_unique($event->users->all())) > 1 ? "s" : ""}}</p>
            <div>
                </i>
                <form action="/events/leave/{{ $event->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"><i class="bi bi-box-arrow-right"></i></button>
                </form>
            </div>
        </h4>
        @endforeach
    @else
        <p>Você ainda não tem eventos, <a href="/events/create">crie agora!!</a></p>
    @endif
</div>

@endsection