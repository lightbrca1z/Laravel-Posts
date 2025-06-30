<x-layout>
    <x-slot:title>My Laravel App</x-slot>

    <h1>Add new post</h1>
    
    <form method="post" action="{{ route('posts.store') }}">
        @csrf
        <label>
            Title:<br/>
            <input type="text" name="title" value="{{ old('title') }}"><br/>
        </label>
        @error('title')
            <p class="error">{{ $message }}</p>
        @enderror
        </div>        
        <div>
        <label>
            Body:<br/>
            <textarea name="body">{{ old('body') }}</textarea><br/>
        </label>
        @error('body')
            <p class="error">{{ $message }}</p>
        @enderror
        </div>
        <div>
        <button type="submit">Add</button>
        </div>
   
    </form>
   
    <p class="back-link"><a href="{{ route('posts.index') }}">Back to Posts</a></p>
</x-layout>
