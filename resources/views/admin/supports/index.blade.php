@extends('layouts.app')

@section('page-title', 'Home')

@section('content')

    <h1>Listagem das Dúvidas</h1>

    <x-success />

    <a href="{{ route('supports.create') }}" class="btn btn-primary">Adicionar duvida</a><br><br>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Assunto</th>
                <th scope="col">Status</th>
                <th scope="col">Descrição</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($supports as $support)
                <tr>
                    <td>{{ $support['subject'] }}</td>
                    <td>
                        <span
                            class="badge rounded-pill
                            @if ($support['status'] === 'a') bg-primary text-light
                            @elseif ($support['status'] === 'p')
                                bg-success text-light
                            @elseif ($support['status'] === 'c')
                                bg-warning text-dark @endif
                        ">{{ $support['status'] }}
                        </span>
                    </td>
                    <td>{{ $support['body'] }}</td>
                    <td>
                        <a href="{{ route('supports.show', $support['id']) }}"
                            class="btn btn-warning icon d-flex justify-content-center align-items-center"><i
                                class="bi bi-eye"></i>
                            Detalhes</a>
                        <a href="{{ route('supports.edit', $support['id']) }}"
                            class="mt-2 btn btn-warning icon d-flex justify-content-center align-items-center"><i
                                class="bi bi-pencil-square"></i>
                            Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection

@push('styles')
    <style>
        .icon {
            font-size: .9rem;
            display: flex;
            font-weight: 500;
        }

        .icon i {
            margin-right: 0.5rem;
            color: #000;
        }

        .bi-check-circle {
            font-size: 1.2rem;
            color: green;
            font-weight: bold;
            margin-right: 1rem;
            align-items: baseline;
            justify-content: baseline;
        }

        .alert {
            display: flex;
            align-items: baseline;
            font-size: 1.2rem;
        }
    </style>
@endpush
