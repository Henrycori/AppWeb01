@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->content }}</p>
        <p><small>Por: {{ $post->user->name }}</small></p>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Volver</a>
    </div>
    <h3>Comentarios</h3>

@foreach ($post->comments as $comment)
    <div class="mb-2">
        <strong>{{ $comment->user->name }}:</strong> {{ $comment->content }}
    </div>
@endforeach

@auth
<button id="btnComentar" class="btn btn-success mb-3" onclick="abrirComentario()">
    Comentar
</button>

<div id="commentForm" style="display:none;">
    <form action="{{ route('comments.store', $post) }}" method="POST">
        @csrf
        <textarea name="content" class="form-control" required></textarea>

        <button class="btn btn-primary mt-2">Enviar comentario</button>
        <button type="button" class="btn btn-secondary mt-2" onclick="cancelarComentario()">
            Cancelar
        </button>
    </form>
</div>

<script>
function abrirComentario() {
    document.getElementById('commentForm').style.display = 'block';
    document.getElementById('btnComentar').style.display = 'none';
}

function cancelarComentario() {
    document.getElementById('commentForm').style.display = 'none';
    document.getElementById('btnComentar').style.display = 'inline-block';
}
</script>
@endauth


@endsection
