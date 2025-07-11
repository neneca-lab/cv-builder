<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Currículo - {{ $data['nome'] }}</title>
    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            color: #000;
        }

        h1 {
            font-size: 20pt;
            font-weight: bold;
            text-transform: uppercase;
            text-align: left;
            margin-bottom: 10px;
            /*border-bottom: 2px solid #000;*/
            padding-bottom: 5px;
        }

        .cargo {
            margin-top: -10px;
            font-size: 15pt;
        }

        .localizacao {
            font-size: 10pt;
        }

        .contact {
            font-size: 12pt;
            margin-bottom: 20px;
            text-transform: lowercase;
        }

        .contact p {
            margin: 2px 0;
        }

        .section {
            margin-bottom: 15px;
        }

        .section-title {
            font-weight: bold;
            text-transform: uppercase;
            font-size: 12pt;
            margin-bottom: 10px;
            /*border-bottom: 1px solid #999;*/
            padding-bottom: 3px;
        }

        .content {
            margin-top: -10px;
            font-size: 10pt;
            line-height: 1.5;
            padding-left: 5px;
        }

        .content p {
            margin-bottom: 10px;
        }

        .bold {
            font-weight: bold;
        }

        .list {
            padding-left: 20px;
        }

    </style>
</head>
<body>

    <h1>{{ $data['nome'] }}</h1>

    <div class="cargo">
        <p><strong>{{ $data['cargo'] }}</strong></p>
    </div>

    <div class="localizacao">
        <p>{{ $data['cidade'] }} - {{ $data['estado']  }}, {{ $data['pais'] }}</p>
    </div>

    <div class="contact">
        <p>
            {{ $data['email'] }} |
            <a href="{{ $data['linkedin'] }}" target="_blank">LinkedIn</a> |
            <a href="{{ $data['gitHub'] }}" target="_blank">GitHub</a>
        </p>
    </div>

    <div class="section">
        <div class="section-title">Perfil</div>
        <div class="content">
            {!! nl2br(e($data['perfil'])) !!}
        </div>
    </div>

    <div class="section">
        <div class="section-title">Experiência</div>
        <div class="content">
            {!! nl2br(e($data['experiencia'])) !!} <br>
            Tecnologias: {!! nl2br(e($data['tecnologia'])) !!}
        </div>
    </div>

    <div class="section">
        <div class="section-title">Atividade(es) realizadas</div>
        <div class="content">
            {!! nl2br(e($data['atividade'])) !!}
        </div>
    </div>

    <div class="section">
        <div class="section-title">Habilidades</div>
        <div class="content">
            @php
                $habilidades = $data['habilidades'];
//                dd($habilidades);
                $parts = explode(",", $habilidades)
            @endphp

            @foreach($parts as $part)
                <ul class="list">
                    <li>{{$part}}</li>
                </ul>
            @endforeach
        </div>
    </div>

    <div class="section">
        <div class="section-title">Formação</div>
        <div class="content">
            {!! nl2br(e($data['formacao'])) !!}
        </div>
    </div>

    <div class="section">
        <div class="section-title">Idioma</div>
        <div class="content">
            {!! nl2br(e($data['idioma'])) !!}
        </div>
    </div>

</body>
</html>
