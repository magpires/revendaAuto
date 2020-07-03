@extends('layouts.app')

@section('content')
<div class="container">
	<h2 class="center">Adicionar Papel</h2>

	@include('admin._caminho')
	
	<div class="row">
		<form action="{{ route('papeis.store') }}" method="post">

		{{csrf_field()}}
		@include('admin.papel._form')

		<button class="btn green">Adicionar</button>

			
		</form>
			
	</div>
	
</div>
	

@endsection