@extends('layouts.app')

@section('title', 'Tambah Post')

@section('content')
    <div class="page-header">
        <h1 class="page-title">Tambah Post Baru</h1>
    </div>

    <div class="panel">
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="title" class="form-label">Judul</label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    class="form-control @error('title') is-invalid @enderror"
                    value="{{ old('title') }}"
                    placeholder="Masukkan judul artikel"
                >
                @error('title')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="body" class="form-label">Isi Artikel</label>
                <textarea
                    id="body"
                    name="body"
                    class="form-control @error('body') is-invalid @enderror"
                    placeholder="Tulis isi artikel di sini"
                >{{ old('body') }}</textarea>
                @error('body')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('posts.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
@endsection
