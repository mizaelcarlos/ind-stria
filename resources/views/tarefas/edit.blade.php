@extends('layouts.app')

@section('title', 'Editar tarefa')

@section('content')
<h1>Editar tarefa</h1>

<form action="{{ route('tarefa.update', $tarefa->id) }}" method="POST" class="container mt-4">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição</label>
        <input
            type="text"
            name="descricao"
            id="descricao"
            class="form-control w-50"
            value="{{ old('descricao', $tarefa->descricao) }}"
        >
    </div>

    <div class="mb-3">
        <label for="setor" class="form-label">Setor</label>
        <input
            type="text"
            name="setor"
            id="setor"
            class="form-control w-50"
            value="{{ old('setor', $tarefa->setor) }}"
        >
    </div>

    <div class="mb-3">
        <label for="prioridade" class="form-label">Prioridade</label>
        <select name="prioridade" id="prioridade" class="form-select w-50">
            <option value="baixa" {{ $tarefa->prioridade == 'baixa' ? 'selected' : '' }}>Baixa</option>
            <option value="média" {{ $tarefa->prioridade == 'média' ? 'selected' : '' }}>Média</option>
            <option value="alta" {{ $tarefa->prioridade == 'alta' ? 'selected' : '' }}>Alta</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="usuario_id" class="form-label">Usuário</label>
        <select name="usuario_id" id="usuario_id" class="form-select w-50">
            @foreach($usuarios as $usuario)
                <option
                    value="{{ $usuario->id }}"
                    {{ $usuario->id == $tarefa->usuario_id ? 'selected' : '' }}
                >
                    {{ $usuario->nome }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select name="status" id="status" class="form-select w-50">
            <option value="A Fazer" {{ $tarefa->status == 'A Fazer' ? 'selected' : '' }}>A Fazer</option>
            <option value="Fazendo" {{ $tarefa->status == 'Fazendo' ? 'selected' : '' }}>Fazendo</option>
            <option value="Pronto" {{ $tarefa->status == 'Pronto' ? 'selected' : '' }}>Pronto</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
</form>
@endsection