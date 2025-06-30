<x-layout>
    <x-slot:title>Edit post | My Laravel App</x-slot>

    <h1>Edit post</h1>
    
    <form method="post" action="{{ route('posts.update', $post) }}">
        @method('PATCH')
        @csrf
        <label>
            Title:<br/>
            <input type="text" name="title" value="{{ old('title', $post->title) }}"><br/>
        </label>
        @error('title')
            <p class="error">{{ $message }}</p>
        @enderror
        </div>        
        <div>
        <label>
            Body:<br/>
            <textarea name="body">{{ old('body', $post->body) }}</textarea><br/>
        </label>
        @error('body')
            <p class="error">{{ $message }}</p>
        @enderror
        </div>
        <div>
        <button type="submit">Update</button>
        </div>
   
    </form>
   
    <p class="back-link"><a href="{{ route('posts.show', $post) }}">Back to Posts</a></p>
</x-layout>
