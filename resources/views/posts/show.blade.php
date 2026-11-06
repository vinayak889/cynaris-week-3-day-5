@extends('posts.layout')

@section('content')
    <h1 class="text-3xl font-bold mb-2">{{ $post->title }}</h1>
    <span class="inline-block mb-4 px-2 py-1 text-xs rounded {{ $post->is_published ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
        {{ $post->is_published ? 'Published' : 'Draft' }}
    </span>

    <div class="prose max-w-none mb-6">
        <p>{{ $post->body }}</p>
    </div>

    <a href="{{ route('posts.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Back to Posts</a>
@endsection
