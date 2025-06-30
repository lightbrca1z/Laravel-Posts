<x-layout>
    <x-slot:title>Posts | My Laravel App</x-slot>
    
    <div class="posts-header">
        <h1>Posts</h1>
        <a href="{{ route('posts.create') }}">Add new</a>
    </div>

    <div class="posts-list">
        <ul>
            @foreach ($posts as $post)
                <li><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></li>
            @endforeach
        </ul>
    </div>
</x-layout>
