@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-3xl font-semibold mb-6">Edit Book</h1>

        <form action="{{ route('books.update', $book->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-600">Book Title</label>
                <input type="text" id="title" name="title" class="w-full p-3 border border-gray-300 rounded-md" value="{{ $book->title }}" required>
            </div>

            <div class="mb-4">
                <label for="author_id" class="block text-sm font-medium text-gray-600">Author</label>
                <select id="author_id" name="author_id" class="w-full p-3 border border-gray-300 rounded-md" required>
                    <option value="">Select Author</option>
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}" {{ $author->id == $book->author_id ? 'selected' : '' }}>
                            {{ $author->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                Update Book
            </button>
        </form>
    </div>
@endsection
