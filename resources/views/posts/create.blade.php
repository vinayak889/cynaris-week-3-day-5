@extends('posts.layout')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Create New Post</h1>

    <form action="{{ route('posts.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block font-medium">Title</label>
            <input type="text" name="title" value="{{ old('title') }}" class="w-full border border-gray-300 p-2 rounded">
            @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block font-medium">Body</label>
            <textarea name="body" rows="5" class="w-full border border-gray-300 p-2 rounded">{{ old('body') }}</textarea>
            @error('body')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-2">
            <input type="checkbox" name="is_published" id="is_published" value="1" {{ old('is_published') ? 'checked' : '' }}>
            <label for="is_published">Publish immediately</label>
        </div>

        <div class="flex gap-2">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Submit</button>
            <a href="{{ route('posts.index') }}" class="bg-gray-400 text-white px-4 py-2 rounded">Cancel</a>
        </div>
    </form>
@endsection
