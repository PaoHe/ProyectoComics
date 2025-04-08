@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-10 bg-white text-black p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">Formulario de contacto</h1>
    <form action="#" method="POST">
        @csrf
        <label class="block mb-2 font-medium">Tu mensaje:</label>
        <textarea name="mensaje" rows="5" class="w-full border border-gray-300 rounded p-2"></textarea>
        <button class="mt-4 bg-yellow-500 text-black px-4 py-2 rounded hover:bg-yellow-600">Enviar</button>
    </form>
</div>
@endsection