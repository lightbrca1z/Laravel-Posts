<x-layout>
    <x-slot:title>{{ $post->title }} | My Laravel App</x-slot>

    <div class="post-header">
        <h1>{{ $post->title }}</h1>
        <a href="{{ route('posts.edit', ['post' => $post->id]) }}">Edit</a>
        
        <form method="post" action="{{ route('posts.destroy', ['post' => $post->id]) }}" id="delete-form">
            @method('DELETE')
            @csrf
            <button>Delete</button>
        </form>
    </div>
    
    <div class="post-content">
        <p>{!! e(nl2br($post->body)) !!}</p>
    </div>

    <div class="comments-section">
        <h2>Comments</h2>

        <ul>
            @forelse ($post->comments as $comment)
                <li>{{ $comment->body }}</li>
            @empty
                <li>No comments.</li>
            @endforelse
        </ul>
    </div>

    <h2>Add a Comment</h2>
    <form>
        @csrf
        <div>
            <input type="text" name="body">
       </div>
       <div>
        <button>Add</button>
       </div>
    </form>
    
    <p class="back-link"><a href="{{ route('posts.index') }}">Back to Posts</a></p>

    <script>
        'use strict';

        {
            const from = document.getElementById('#delete-form');

            from.addEventListener('submit', (e) => {
                e.preventDefault();

                if (confirm('本当に削除しますか？') === false) {
                    return;
                }

                form.submit();
            });
        }

    </script>

</x-layout>
