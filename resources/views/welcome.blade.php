@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Cadastro de Currículo</h1>
        <form action="{{ route('curriculo.store') }}" method="POST" enctype="multipart/form-data" target="_blank">
            @csrf

            <div class="mb-3">
                <label for="nome" class="form-label">Nome completo</label>
                <input type="text" id="nome" name="nome" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="cargo" class="form-label">Cargo</label>
                <input type="text" id="cargo" name="cargo" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="cep" class="form-label">CEP</label>
                <input type="text" id="cep" name="cep" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="cidade" class="form-label">Cidade</label>
                <input type="hidden" id="cidade" name="cidade" class="form-control">
                <input type="text" id="cidade_input" name="cidade_input" class="form-control" disabled>

            </div>

            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <input type="hidden" id="estado" name="estado" class="form-control">
                <input type="text" id="estado_input" name="estado_input" class="form-control" disabled>
            </div>

            <div class="mb-3">
                <label for="pais" class="form-label">País</label>
                <input type="text" id="pais" name="pais" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="linkedin" class="form-label">Linkedin</label>
                <input type="text" id="linkedin" name="linkedin" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="gitHub" class="form-label">GitHub</label>
                <input type="text" id="gitHub" name="gitHub" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="perfil" class="form-label">Perfil</label>
                <textarea type="tel" id="perfil" name="perfil" class="form-control" placeholder="Conte-me mais sobre você" required></textarea>
            </div>

            <div class="mb-3">
                <label for="formacao" class="form-label">Formação acadêmica</label>
                <textarea id="formacao" name="formacao" class="form-control" rows="3" placeholder="Descreva sua formação" required></textarea>
            </div>

            <div class="mb-3">
                <label for="experiencia" class="form-label">Experiência profissional</label>
                <textarea id="experiencia" name="experiencia" class="form-control" rows="5" placeholder="Descreva suas experiências profissionais" required></textarea>
            </div>

            <div class="mb-3">
                <label for="tecnologia" class="form-label">Tecnologias (separe por virgulas)</label>
                <input id="tecnologia" name="tecnologia" class="form-control" rows="5"  required>
            </div>

            <div class="mb-3">
                <label for="atividade" class="form-label">Atividade(es)</label>
                <textarea id="atividade" name="atividade" class="form-control" rows="5" placeholder="Descreva as atividades realizadas no ultimo/atual emprego" required></textarea>
            </div>

            <div class="mb-3">
                <label for="habilidades" class="form-label">Habilidades (separe por virgulas)</label>
                <textarea id="habilidades" name="habilidades" class="form-control" rows="3" placeholder="Liste suas habilidades" required></textarea>
            </div>

            <div class="mb-3">
                <label for="idioma" class="form-label">Idioma</label>
                <textarea type="tel" id="idioma" name="idioma" class="form-control" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Enviar Currículo</button>
        </form>
    </div>

    <script>
        document.getElementById('cep').addEventListener('blur', async function () {
            const cep = this.value.replace(/\D/g, '');
            if (cep.length === 8) {
                try {
                    const res = await fetch(`/consulta-cep/${cep}`);
                    if (!res.ok) throw new Error('CEP não encontrado');
                    const data = await res.json();
                    document.getElementById('cidade').value = `${data.localidade}`;
                    document.getElementById('estado').value = `${data.uf}`;
                    document.getElementById('cidade_input').value = `${data.localidade}`;
                    document.getElementById('estado_input').value = `${data.uf}`;
                } catch (err) {
                    alert('Erro ao buscar o CEP.');
                }
            }
        });
    </script>
@endsection
