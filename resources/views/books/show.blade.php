@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-3xl font-semibold mb-6">{{ $book->title }}</h1>

        <h3 class="text-xl font-semibold mb-4">Author:</h3>
        <p class="text-lg text-gray-700">{{ $book->author->name }}</p>

        <div class="mt-6">
            <a href="{{ route('books.index') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                Back to Books List
            </a>
        </div>
    </div>
@endsection
