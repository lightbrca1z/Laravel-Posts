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
                <li>
                    <span class="comment-text">{{ $comment->body }}</span>
                    <form method="post" class="comment-delete-form" action="{{ route('posts.comments.destroy', ['post' => $post->id, 'comment' => $comment->id]) }}">
                        @method('DELETE')
                        @csrf
                        <button>Delete</button>
                    </form>
                </li>
            @empty
                <li>No comments.</li>
            @endforelse
        </ul>
    </div>

    <h2>Add a Comment</h2>
    <form method="post" action="{{ route('posts.comments.store', $post) }}">
        @csrf
        <div>
            <input type="text" name="body">
            @error('body')
                <p class="error">{{ $message }}</p>
            @enderror
       </div>
       <div>
        <button>Add</button>
       </div>
    </form>
    
    <p class="back-link"><a href="{{ route('posts.index') }}">Back to Posts</a></p>

    <script>
        'use strict';

        {
            // Post delete form
            const form = document.getElementById('delete-form');

            form.addEventListener('submit', (e) => {
                e.preventDefault();

                if (confirm('本当に削除しますか？') === false) {
                    return;
                }

                form.submit();
            });

            // Comment delete forms
            const commentForms = document.querySelectorAll('.comment-delete-form');
            commentForms.forEach((commentForm) => {
                commentForm.addEventListener('submit', (e) => {
                    e.preventDefault();

                    if (confirm('本当に削除しますか？') === false) {
                        return;
                    }

                    commentForm.submit();
                });
            });
        }

    </script>

</x-layout>
