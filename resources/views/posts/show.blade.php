@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <div class="panel">
        <h1 class="post-title">{{ $post->title }}</h1>
        <p class="post-meta">
            Dibuat pada {{ $post->created_at->format('d/m/Y H:i') }}
            &middot;
            Diperbarui pada {{ $post->updated_at->format('d/m/Y H:i') }}
        </p>

        <div class="post-body">{{ $post->body }}</div>

        <div class="form-actions">
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Kembali</a>
            <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus post ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
        </div>
    </div>
@endsection
