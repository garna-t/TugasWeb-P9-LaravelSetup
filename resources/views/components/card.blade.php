@props(['post'])

<article class="card">
    <h2 class="card-title">{{ $post->title }}</h2>
    <p class="card-date">Dibuat pada {{ $post->created_at->format('d/m/Y H:i') }}</p>
    <p class="card-text">{{ str($post->body)->limit(120) }}</p>
    <div class="card-actions">
        <a href="{{ route('posts.show', $post) }}" class="btn btn-primary btn-sm">Lihat</a>
        <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning btn-sm">Edit</a>
        <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus post ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
        </form>
    </div>
</article>
