@extends('layouts.app')

@section('page-title', 'Nova Duvida')

@section('content')
    <h1>Nova Duvida</h1>

    <x-alert />

    <form action="{{ route('supports.store') }}" method="POST" class="form">
        @include('admin.supports.partials.createform')
    </form>
@endsection

@push('styles')
    <style>
        .icon {
            font-size: 1.2rem;
            color: red;
            font-weight: bold;
            margin-right: 0.5rem;
        }

        .alert {
            font-size: 1rem;
        }
    </style>
@endpush
