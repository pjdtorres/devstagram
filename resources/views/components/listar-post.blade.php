<div>
    @if($posts->count())
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6">
            @foreach($posts as $post)
                <div>
                    <a href="{{ route('posts.show', ['post' => $post, 'user' => $post->user ]) }}">
                        <img src="{{ asset('uploads') . '/' . $post->imagem }}" alt="Imagem do post {{ $post->titulo }}">
                    </a>
                </div>
            @endforeach
        </div>
        <div class="my-10">
            {{ $posts->links() }}
        </div>
    @else
        <p class="text-center">Não existem Posts</p>
    @endif
</div>