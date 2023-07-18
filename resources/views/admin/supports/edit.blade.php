@extends('layouts.app')

@section('page-title', 'Editar Duvida - ' . $supportEdit->subject)

@section('content')

    <h2>Editar Duvida: {{ $supportEdit->subject }}</h2>

    <x-alert />

    <form action="{{ route('supports.update', $supportEdit->id) }}" method="POST" class="form">
        @method('PUT')
        @include('admin.supports.partials.editform')
    </form>

@endsection
