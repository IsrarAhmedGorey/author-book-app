@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-3xl font-semibold mb-6">Authors List</h1>

        <a href="{{ route('authors.create') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 mb-4">
            Create New Author
        </a>

        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Name</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Number of Books</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($authors as $author)
                    <tr class="border-b border-gray-200">
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $author->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $author->books_count }}</td>
                        <td class="px-6 py-4 text-sm">
                            <a href="{{ route('authors.show', $author->id) }}" class="text-blue-500 hover:text-blue-700 mr-2">View</a>
                            <a href="{{ route('authors.edit', $author->id) }}" class="text-yellow-500 hover:text-yellow-700 mr-2">Edit</a>
                            <form action="{{ route('authors.destroy', $author->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
