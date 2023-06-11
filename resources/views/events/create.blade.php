@extends('layouts.main')
@section('title', 'Criar evento')
@section('content')
    @auth
    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1 class="mb-3">Crie um evento</h1>
        <form action="/events" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="form-group">
            <label for="image">Imagem</label>
            <input type="file" id="image" name="image" class="form-control-file">
        </div>
        <div class="form-group">
            <label for="title">Evento</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Nome do evento">
        </div>
        <div class="form-group">
            <label for="date">Data</label>
            <input type="date" class="form-control" id="date" name="date">
        </div>
        <div class="form-group">
            <label for="title">Cidade</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Cidade do evento">
        </div>
        <div class="form-group">
            <label for="title">O evento é privado?</label>
            <select type="text" class="form-control" id="private" name="private">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
        </div>
        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea name="description" id="description" cols="30" rows="5" class="form-control" placeholder="O que acontecerá no evento"></textarea>
        </div>
        <div class="form-group">
            <label for="description">Adicione itens de infraestrutura</label>
            <div class="infra-container">
                <div>
                    <input type="checkbox" name="items[]" id="cadeiras" value="Cadeiras">
                    <label for="cadeiras">Cadeiras</label>
                </div>
                <div>
                    <input type="checkbox" name="items[]" id="palco" value="Palco">
                    <label for="palco">Palco</label>
                </div>
                <div>
                    <input type="checkbox" name="items[]" id="freeBeer" value="Cerveja grátis">
                    <label for="freeBeer">Cerveja grátis</label>
                </div>
                <div>
                    <input type="checkbox" name="items[]" id="openFood" value="Open foods">
                    <label for="openFood">Open food</label>
                </div>
            </div>
        </div>
        <input type="submit" value="Criar evento" class="btn btn-primary mt-3">
    </form>
    </div>
    @endauth
    
    @guest
    <h2 class="m-5">Por favor, faça <a href="/login">login</a> ou <a href="/register">registre-se</a> para criar um evento.</h2>
    @endguest

@endsection