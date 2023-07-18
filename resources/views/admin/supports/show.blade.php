@extends('layouts.app')

@section('page-title', 'Detalhes da Duvida - ' . $supportShow->subject)

@section('content')

    <h2>Detalhes da Duvida {{ $supportShow->subject }}</h2>

    <ul class="list-group">
        <li class="list-group-item " aria-current="true">Assunto: {{ $supportShow->subject }}</li>
        <li class="list-group-item">Status: {{ $supportShow->status }}</li>
        <li class="list-group-item">Descrição: {{ $supportShow->body }}</li>
    </ul>

    <div class="mb-3 mt-4">
        <form action="{{ route('supports.destroy', $supportShow->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Excluir</button>
        </form>
    </div>

@endsection
