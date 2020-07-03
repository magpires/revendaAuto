{{-- Este arquivo é utilizado para incluir os campos de entrada nos formulários onde são comuns --}}
<div class="input-field">
	<input type="text" name="nome" class="validade" value="{{ isset($registro->nome) ? $registro->nome : '' }}">
	<label>Nome do papel</label>
</div>

<div class="input-field">
	<input type="text" name="descricao" class="validade" value="{{ isset($registro->descricao) ? $registro->descricao : '' }}">
	<label>Descrição</label>
</div>


