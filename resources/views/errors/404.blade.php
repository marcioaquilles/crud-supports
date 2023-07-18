@extends('layouts.app')

@section('page-title', 'Página 404')

@section('content')
    <div class="row justify-content-center align-items-center">
        @if (isset($message))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong><i class="bi bi-exclamation-triangle icon"></i></strong> {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="col">
            <main>
                <div class="main">
                    <section>
                        <div class="container mt-5">
                            <h1 class="text-center">
                                <img src="{{ asset('img/404.png') }}" class="img-fluid" alt="404 - Not Found">
                            </h1>
                            <p class="text-center font-bold h5">
                                <a href="{{ route('supports.index') }}"
                                    class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hove">
                                    Volte aqui
                                </a>
                            </p>
                        </div>
                    </section>
                </div>
            </main>
        </div>
    </div>
@endsection
