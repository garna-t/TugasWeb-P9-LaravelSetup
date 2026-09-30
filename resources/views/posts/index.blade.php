@extends('layouts.app')

@section('title', 'Daftar Post')

@section('content')
    <div class="page-header">
        <h1 class="page-title">Daftar Artikel</h1>
        <a href="{{ route('posts.create') }}" class="btn btn-primary">Tambah Post</a>
    </div>

    @if ($posts->count() > 0)
        <div class="grid">
            @foreach ($posts as $post)
                <x-card :post="$post" />
            @endforeach
        </div>

        {{ $posts->links() }}
    @else
        <div class="empty">
            <h2>Belum ada artikel</h2>
            <p>Silakan tambahkan artikel pertama Anda dengan menekan tombol Tambah Post.</p>
        </div>
    @endif
@endsection
