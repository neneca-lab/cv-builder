
@extends('layouts.start')

@section('content')
    <div class="container">
        <div class="mb-3">
            <p class="form-label">Escolha a sua opção:</p>

            <a href="{{ route('welcome') }}" class="btn btn-primary">Criar Currículo</a>

            <a href="{{ route('download', ['arquivo' => $documento->arquivo]) }}" class="btn btn-success" target="_blank">
                Baixar Currículo
            </a>

        </div>
    </div>
@endsection
