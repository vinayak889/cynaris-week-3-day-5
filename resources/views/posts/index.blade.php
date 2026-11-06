@extends('posts.layout')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Blog Posts</h1>
        <a href="{{ route('posts.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Create Post</a>
    </div>

    <table class="w-full border-collapse border border-gray-200 mb-4">
        <thead>
            <tr class="bg-gray-50 text-left">
                <th class="p-2 border">ID</th>
                <th class="p-2 border">Title</th>
                <th class="p-2 border">Status</th>
                <th class="p-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($posts as $post)
                <tr>
                    <td class="p-2 border">{{ $post->id }}</td>
                    <td class="p-2 border">{{ $post->title }}</td>
                    <td class="p-2 border">
                        <span class="px-2 py-1 text-xs rounded {{ $post->is_published ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                            {{ $post->is_published ? 'Published' : 'Draft' }}
                        </span>
                    </td>
                    <td class="p-2 border flex gap-2">
                        <a href="{{ route('posts.show', $post) }}" class="text-blue-600">View</a>
                        <a href="{{ route('posts.edit', $post) }}" class="text-yellow-600">Edit</a>
                        <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="p-4 text-center text-gray-500">No posts found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Pagination Links --}}
    <div>
        {{ $posts->links() }}
    </div>
@endsection
