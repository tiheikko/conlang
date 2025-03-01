<div class="grid-item">
    <a class="card text-center text-decoration-none" href="{{ route('article.show', $article->id) }}">
        <img class="card-img-top" src="{{ asset($article->cover_path) }}" alt="Card image cap">
        <div class="card-body">
            <p class="card-text">
                {{ $article->title }}
            </p>
        </div>
    </a>
</div>
